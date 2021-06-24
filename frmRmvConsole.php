<?php 
    $id =trim($_GET['id']);
    session_start();
  if (!isset($_SESSION['email']))
      Header("location:index.php"); 

    //recuperar os dados no banco de dados
    include 'conexao.php';
    $pdo = Conexao::conectar(); 
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM consoles WHERE id=?;"; //o ? indica uma argumento para o sql
    $query = $pdo->prepare($sql);
    $query->execute(array($id)); // o array($id) é um parâmetro passado para o argumento do SQL. 

    $consoles = $query->fetch(PDO::FETCH_ASSOC);
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

    <title>Remoção de Console</title>
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
            <h3>Remover Console</h3>
        </div>
    <form action="remConsole.php" method="POST" id='frmRmvConsole' class="col s12">    
        <div class="row">
             <div class="col s10">
                 <label for ="lblId"><h4><blockquote>ID:  <?php echo $id?></blockquote></h4></label>
                 <input type="hidden" id="id" name="id" value="<?php echo $id;?>">

                 <label for ="lblNome"><H4>NOME: <?php echo $consoles['nome'];?></H4></label>
                 <label for ="lblVersao"><H4>VERSAO: <?php echo $consoles['versao'];?></H4></label>
             </div>
        </div>
            <div class="input-field col s8">
               <button class="btn waves-effect waves-light purple accent-3" type="submit" name="btnRemover">
               Remover <i class="material-icons">delete</i> 
               </button>

              <button class="btn waves-effect waves-light deep-purple accent-1" type="button" name="btnVoltar"
                onclick="JavaScript:location.href='listarConsole.php'">
               Voltar <i class="material-icons">arrow_back</i> 
               </button>
            </div>
            <br/>
     </form>
</body>
</html>
