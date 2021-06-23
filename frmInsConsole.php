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

    <title>Inserir Console</title>
</head>
<body>
    <div class="container grey lighten-2 col s12">
        <div class="grey darken-1 col s12">
            <h3>Adicionar Novo Console</h3>
        </div>
     <div class="row">
        <form action="insConsole.php" method="POST" id="frmInsConsole" class="col s12">
            <div class="input-field col s8">
                <label for="lblNome">Informe o Nome do Console: </label>
                <input type="text" class="form-control" id="txtNome" name="txtNome">
            </div>
            <div class="input-field col s5">
                <label for="lblVersao">Informe a Versao: </label>
                <input type="text" class="form-control" id="txtVersao" name="txtVersao">
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
                onclick="JavaScript:location.href='listarConsole.php'">
               Voltar <i class="material-icons">arrow_back</i> 
               </button>
            </div>

        </form>   
     </div>
    </div>
</body>
</html>