<?php 
   //abrir a conexão 
   include 'conexao.php';  

   // recupar campos do formulário usando método post
   $nome = trim($_POST['txtNome']);
   $categoria = trim($_POST['txtCategoria']);
   $valor = trim($_POST['txtValor']);
   $quantidade = trim($_POST['txtQuantidade']);

   if (!empty($nome) && !empty($valor)){
       $pdo = Conexao::conectar(); 
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "INSERT INTO jogos (nome, categoria, valor, quantidade) VALUES (?, ?, ?, ?);";
       $query = $pdo->prepare($sql);
       $query->execute(array($nome, $categoria, $valor, $quantidade));
       Conexao::desconectar(); 
   }
   else echo "campo nome ou quantidade são vazios..."; 
  
   header("location: listarJogos.php")
?>