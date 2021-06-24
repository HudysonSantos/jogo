<?php //listarConsole.php
    session_start();
    if (!isset($_SESSION['email']))
        Header("location:index.php"); 
        
    if (isset($_GET['busca']))
    $busca = $_GET['busca'];
    else $busca = ''; 

    include 'conexao.php'; 
     $pdo = Conexao::conectar(); 
     $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     if ($busca!='')
        $sql = "Select * from consoles WHERE nome like '%" . $busca .  "%' order by id"; 
        else $sql = "Select * from consoles order by id"; 
        $listarConsole = $pdo->query($sql); 
     
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

    <title>Lista Console</title>
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
    
   <div class="container">
   <div class="row">
        <div class="col s12">
        <h3 class="grey darken-1 white-text text-dark-3" class="text-black">
          Listar Console 
          <a class="btn-floating btn-large waves-effect waves-light black"
               onclick="JavaScript:location.href='frmInsConsole.php'"><i class="material-icons">add</i></a>
        </h3>

        <div class="row">
            <div class="input-field">
                <form action="listarConsole.php" method="GET" id="frmBuscaConsole" class="col s12" >
                    <div class="input-field col s12">
                        <label for="lblNome" class="black-text text-dark-4">Informe o Console: </label>
                        <input type="text" placeholder="Informe o Console para ser buscado"
                               class="form-control col s8" id="txtBusca" name="busca"> 
                        <button class="btn waves-effect waves-light col m1 grey darken-4" type="submit" name="action">
                        <i class="material-icons right">search</i></button>
                    </div>
                </form>
            </div>
        </div>
             
        <table class="striped highlight  grey darken-2 responsive-table">
            <tr class="light-black darken-2  black-text text-lighten-3">    
                <th>ID</th>
                <th>NOME</th>
                <th>VERSAO</th>
                <th></th>
                <th></th>
            </tr>
            <?php 
                foreach ($listarConsole as $console){
            ?>
                <tr>
                    <td><?php echo $console['id'];?></td>
                    <td><?php echo $console['nome'];?></td>
                    <td><?php echo $console['versao'];?></td>
                    <td> <a class="btn-floating btn-small waves-effect waves-light deep-purple"
                          onclick="JavaScript:location.href='frmEdtConsole.php?id=' +
                          <?php echo $console['id'];?>" >
                           <i class="material-icons">edit</i>
                    </td>
                    <td> <a class="btn-floating btn-small waves-effect waves-light deep-purple"
                          onclick="JavaScript:location.href='frmRmvConsole.php?id=' +
                          <?php echo $console['id'];?>" >
                           <i class="material-icons">delete</i>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
      
      </div>
     </div>
    </div>
</body>
</html>