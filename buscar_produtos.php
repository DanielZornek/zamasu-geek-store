<?php
	
	session_start();
	require "conexao.php";

	if (!isset($_SESSION['quantidade'])) {
	    $_SESSION['quantidade'] = 4;
	}

	if (isset($_POST['carregar_mais'])) {
	    $_SESSION['quantidade'] += 4; 
	}

	$quantidade = $_SESSION['quantidade'];

	try{
		$stmt = $pdo->prepare("SELECT * FROM PRODUTO LIMIT :qtd");

		$stmt->bindParam(":qtd", $quantidade, PDO::PARAM_INT);

		$stmt->execute();

		$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

	}catch(PDOExecption $e){
		echo "Erro ao buscar produtos: " . $e->getMessage();
	}
?>