<?php  //edtConsole.php
   //abrir a conexão 
   include 'conexao.php';  

   // recupar campos do formulário usando método post
   $id = trim($_POST['id']); 
   $nome = trim($_POST['txtNome']);
   $versao = trim($_POST['txtVersao']);
   

   if (!empty($nome) && !empty($versao)){
       $pdo = Conexao::conectar(); 
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "UPDATE consoles SET nome=?, versao=? WHERE id=?";
       $query = $pdo->prepare($sql);
       $query->execute(array($nome, $versao, $id));
       Conexao::desconectar(); 
   }
   else echo "campo nome ou versao são vazios..."; 
   header("location: listarConsole.php")
?>