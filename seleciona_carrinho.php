<?php
		
	require_once "conexao.php";

	try{

		$stmt = $pdo->prepare("SELECT * FROM CARRINHO
			WHERE cd_usuario_fk = :cd");

		$stmt->bindParam(":cd", $_COOKIE['usuario_id']);

		$stmt->execute();

		$produtosCarrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);

	}catch(PDOException $e){
		echo $e->getMessage();
	}

?>