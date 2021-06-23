<?php
    include 'conexao.php';

    $jogosID = trim($_POST['id']);
    $consolesID = trim($_POST['slcConsoles']);
    $quantidades = $_POST['txtQuantidade']; 
    $valor = $_POST['txtValor'];
    $valortotal = $quantidades * $valor;

    if (!empty($jogosID) && !empty($consolesID)){
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "INSERT INTO venda (jogos, consoles, quantidades, valor, valortotal) VALUES (?, ?, ?, ?, ?);"; 
        $query = $pdo->prepare($sql); 
        $query->execute(array($jogosID, $consolesID, $quantidades, $valor, $valortotal)); 


        //atualização da quantidade de vagas disponiveis da tabela da venda
        //primeiro recuperar os dados do venda 
        $sql = "SELECT * FROM jogos WHERE id=?;"; 
        $query = $pdo->prepare($sql);
        $query->execute(array($jogosID));
        $jogos = $query->fetch(PDO::FETCH_ASSOC); //recupera os dados do jogos para


        $quantvendida = $jogos['quantidade'] - $quantidades; 

        //atualizar a quantidade de jogo no banco de dados 
        $sql = "UPDATE jogos SET quantidade=? WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($quantvendida ,$jogosID));
        Conexao::desconectar();
    }
    header("location: listarJogos.php"); 
?>