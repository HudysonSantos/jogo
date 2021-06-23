<?php 
    $id =trim($_GET['id']);

    //recuperar os dados no banco de dados
    include 'conexao.php';
    $pdo = Conexao::conectar(); 
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM jogos WHERE id=?;"; //o ? indica uma argumento para o sql
    $query = $pdo->prepare($sql);
    $query->execute(array($id)); // o array($id) é um parâmetro passado para o argumento do SQL. 

    $jogos = $query->fetch(PDO::FETCH_ASSOC);
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

    <title>Remoção de Jogos</title>
</head>
<body>
    <div class="container grey lighten-2 col s12">
        <div class="grey darken-1 col s12">
            <h3>Remover Jogo</h3>
        </div>
    <form action="remJogos.php" method="POST" id='frmRmvJogos' class="col s12">    
        <div class="row">
             <div class="col s10">
                 <label for ="lblId"><h4><blockquote>ID:  <?php echo $id?></blockquote></h4></label>
                 <input type="hidden" id="id" name="id" value="<?php echo $id;?>">

                 <label for ="lblNome"><H4>NOME: <?php echo $jogos['nome'];?></H4></label>
                 <label for ="lblCategoria"><H4>CATEGORIA: <?php echo $jogos['categoria'];?></H4></label>
                 <label for ="lblValor"><H4>VALOR: <?php echo $jogos['valor'];?></H4></label>
                 <label for ="lblQuantidade"><H4>QUANTIDADE: <?php echo $jogos['quantidade'];?></H4></label>
             </div>
        </div>
            <div class="input-field col s8">
               <button class="btn waves-effect waves-light purple accent-3" type="submit" name="btnRemover">
               Remover <i class="material-icons">delete</i> 
               </button>

              <button class="btn waves-effect waves-light deep-purple accent-1" type="button" name="btnVoltar"
                onclick="JavaScript:location.href='listarJogos.php'">
               Voltar <i class="material-icons">arrow_back</i> 
               </button>
            </div>
            <br/>
     </form>
</body>
</html>
