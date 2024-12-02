<?php
	require "seleciona_carrinho.php";
	
	try{

		$stmt = $pdo->prepare("SELECT cd_produto, nm_produto, vl_produto, caminho_imagem, qt_estoque_produto FROM PRODUTO p, CARRINHO c
			WHERE c.cd_usuario_fk = :cd_usuario
			AND p.cd_produto = c.cd_produto_fk");

		$stmt->bindParam(":cd_usuario", $_COOKIE["usuario_id"]);

		$stmt->execute();

		$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

	}catch(PDOException $e){
		echo $e->getMessage();
	}
?>