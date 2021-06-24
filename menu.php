<?php 
  session_start();
  if (!isset($_SESSION['email']))
      Header("location:index.php"); 
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
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <title>Sistema de Jogos FEMA 2021 - ADS</title>
</head>

<body>
   <!-- menu suspenso -->
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
  <br>
  <div class = "container col m8 s8 center"><img src="imagens/forza.jpg">
    <h4><font color="black" face="Verdana" size="5"><b>Forza Horizon 5 é anunciado na E3 com gráficos impressionantes, com previsão de
    Lançamento para 9 de Novembro.</b></font></h4>
  </div>
</body>
</html>

<script type="text/javascript"> 

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });

  // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
  // var collapsibleElem = document.querySelector('.collapsible');
  // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

  // Or with jQuery

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });

</script>