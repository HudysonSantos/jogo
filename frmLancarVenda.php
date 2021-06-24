<?php
   include 'conexao.php';

   session_start();
   if (!isset($_SESSION['email']))
       Header("location:index.php"); 

    //recuperar o id pelo método GET
    $id =$_GET['id']; 

    //recuperar os dados no banco de dados
    $pdo = Conexao::conectar(); 
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM jogos WHERE id=?;"; 
    $query = $pdo->prepare($sql);
    $query->execute(array($id));
   
    $dados = $query->fetch(PDO::FETCH_ASSOC);
   
    //atribui dados em variáveis
    $nome = $dados['nome'];
    $categoria = $dados['categoria'];
    $valor = $dados['valor'];
    $quantidade = $dados['quantidade']; 
     

   $sql = "Select * from consoles order by nome "; 
   $listarConsole = $pdo->query($sql); 

   Conexao::desconectar(); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"> </script>
    
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"> </script>

    <title>Lançar Venda</title>
</head>
<body>
    <nav class="grey black">
    <div class="nav-wrapper">
      <a href="menu.php" class="brand-logo center ">XGames</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="listarJogos.php">Jogos</a></li>
        <li><a href="listarConsole.php">Consoles</a></li>
        <li><a href="logout.php">Sair</a></li>
      </ul>
      <h7 class= "grey-text text-lighten-1" right>Logado: <?php echo $_SESSION['email'];?> <h7>
    </div>
  </nav>
    <div class="container grey lighten-2 col s12">
        <div class="grey darken-1 col s12">
            <h3>Lançar Venda</h3>
        </div>
     <div class="row">
        <form action="lancarVenda.php" method="POST" id="frmLancarVenda" class="col s12">
             <div class="input-field col s8">
              <h6>
                <label for="lblID">
                <font size="4"> <b>ID: </b> <?php echo $id;?></font>
                </label> 
                <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
              </h6>
            </div>

            <div class="input-field col s12">
              <h4>
                <label for="lblNome">
                <font size="6"><b>Nome: </b>  <?php echo $nome;?> </font>
                </label> 
                <input type="hidden" id="nome" name="nome" value="<?php echo $nome;?>">
              </h4>
            </div>

            <div class="input-field col s8">
                <select id="slcConsoles" name="slcConsoles">
                <option value="" disabled selected>Escolha o Console</option>
                <?php 
                    foreach($listarConsole as $versao) { ?>
                        <option value="<?php echo $versao['id']?>"><?php echo $versao['versao']?></option>
                    <?php } ?>

                </select>
                <label for="lblConsoles" >Escolha o Console</label>
            </div>
  
            <div class="input-field col s8">
                <label for="LblQuantidade">Informe a Quantidade: </label>
                <input type="number"  class="form-control" id="txtQuantidade" name="txtQuantidade" onblur="calcular()">
            </div>

            <div class="input-field col s6">
              <h6>
                <label for="lblValor">
                <font size="6"> Valor do Jogo:<b> R$  <?php echo $valor;?></b></font>
                </label> 
                <input type="hidden" id="txtValor" name="txtValor" value="<?php echo $valor;?>" onblur="calcular()">
              </h6>
            </div>

            <div class="input-field col s5">
                 <label for="LblValorTotal"><font size="4"><b>Valor Total:R$</b>
                 <label id="valortotal"></label>
                 </font></label>
            </div>

            <br/> <br/> 
            <div class="input-field col s8">
               <button class="btn waves-effect waves-light pink accent-3" type="submit" name="btnGravar">
               Gravar <i class="material-icons">send</i> 
               </button>

               <button class="btn waves-effect waves-light deep-purple" type="reset" name="btnLimpar">
               Limpar <i class="material-icons">brush</i> 
               </button>

            </div>

        </form>   
     </div>
    </div>
</body>
</html>

<script type="text/javascript">
function calcular() {
    var quantidade = parseInt(document.getElementById('txtQuantidade').value, 10);
    var valor = parseFloat(document.getElementById('txtValor').value, 10);
    var valortotal = quantidade * valor; 
    if (isNaN(valortotal)) 
        valortotal = 0;

    document.getElementById("valortotal").innerHTML = valortotal.toFixed(2); 

    //document.getElementById('total').value = nota;
}
</script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });
  
  $(document).ready(function(){
    $('select').formSelect();
  });

</script>