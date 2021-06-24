<?php //frmEdtJogos.php
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

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Editar Jogos</title>
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
            <h3>Alterar Dados do Jogos</h3>
        </div>
     <div class="row">
        <form action="edtJogos.php" method="POST" id="frmEdtJogos" class="col s12">
            
            <div class="input-field col s8">
              <h3>
                <label for="lblID">
                         <b>ID: </b> <?php echo $id;?>
                </label> 
                <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
              </h3>
            </div>
           
            <br>
            <div class="input-field col s8">
                <label for="lblNome">Informe o Nome do Jogo</label>
                <input type="text" class="form-control" id="txtNome" name="txtNome"
                value="<?php echo $nome?>">
            </div>
            <div class="input-field col s5">
                <label for="lblCategoria">Informe a Categoria: </label>
                <input type="text" class="form-control" id="txtCategoria" name="txtCategoria"
                value="<?php echo $categoria?>">
            </div>
            <div class="input-field col s5">
                <label for="lblValor">Informe o Valor: </label>
                <input type="text" class="form-control" id="txtValor" name="txtValor"
                value="<?php echo $valor?>">
            </div>      
            <div class="input-field col s5">
                <label for="lblQuantidade">Informe a Quantidade: </label>
                <input type="number" class="form-control" id="txtQuantidade" name="txtQuantidade"
                value="<?php echo $quantidade?>">
            </div>

            <br>
            <div class="input-field col s8">
               <button class="btn waves-effect waves-light pink accent-3" type="submit" name="btnGravar">
               Gravar <i class="material-icons">send</i> 
               </button>

               <button class="btn waves-effect waves-light deep-purple" type="reset" name="btnLimpar">
               Limpar <i class="material-icons">brush</i> 
               </button>

               <button class="btn waves-effect waves-light deep-purple accent-1" type="button" name="btnVoltar"
                onclick="JavaScript:location.href='listarJogos.php'">
               Voltar <i class="material-icons">arrow_back</i> 
               </button>
            </div>

        </form>   
     </div>
    </div>
</body>
</html>