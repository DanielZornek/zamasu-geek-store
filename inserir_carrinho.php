<?php
	require_once "conexao.php"; 
	require "seleciona_produto_carrinho.php";

	if(isset($_GET["cd_produto"]) && isset($_GET["quantidade_maxima"]))	 {

		$cd_produto = $_GET["cd_produto"];
	    $qtd = $_GET["quantidade_maxima"];

	    try {

	    	if(isset($_SESSION['produtoCarrinho'])){
	    		$stmt = $pdo->prepare("INSERT INTO CARRINHO (cd_usuario_fk, cd_produto_fk, quantidade) 
	    		VALUES (:cd_usuario, :cd_produto, :qtd)");

		    	$stmt->bindParam(":cd_usuario", $_COOKIE['usuario_id']);
		    	$stmt->bindParam(":cd_produto", $_SESSION["produtoCarrinho"][0]["cd_produto"]);
		    	$stmt->bindParam(":qtd", $qtd);

		    	$stmt->execute();

		    	echo "<script>
		    		alert('produto inserido no carrinho!');
		    		window.location.href = 'produtos.php';
		    	</script>";
	    	}

	    } catch(PDOException $e) {
	        echo "Erro ao puxar produto: " . $e->getMessage();
	    }
	}
?>
