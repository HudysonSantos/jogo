<?php  //edtJogos.php
   //abrir a conexão 
   include 'conexao.php';  

   // recupar campos do formulário usando método post
   $id = trim($_POST['id']); 
   $nome = trim($_POST['txtNome']);
   $categoria = trim($_POST['txtCategoria']);
   $valor = trim($_POST['txtValor']);
   $quantidade = trim($_POST['txtQuantidade']);

   if (!empty($nome) && !empty($quantidade)){
       $pdo = Conexao::conectar(); 
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "UPDATE jogos SET nome=?, categoria=?, valor=?,quantidade=? WHERE id=?";
       $query = $pdo->prepare($sql);
       $query->execute(array($nome, $categoria, $valor,$quantidade, $id));
       Conexao::desconectar(); 
   }
   else echo "campo nome ou nota são vazios..."; 
   header("location: listarJogos.php")
?>