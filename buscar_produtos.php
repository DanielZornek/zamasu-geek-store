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

	$nome_pr = isset($_GET['nomeProduto']) ? $_GET['nomeProduto'] : "";

	try {
 		
		if(trim($nome_pr) != "" && $_GET['categoriaProduto'] != "Tudo"){
			$stmt = $pdo->prepare("SELECT * FROM PRODUTO
				WHERE nm_produto LIKE :nm 
				AND nm_categoria = :cat
				LIMIT :qtd");

			$nome_produto = "%".$nome_pr."%";

			$stmt->bindParam(":qtd", $quantidade, PDO::PARAM_INT);
			$stmt->bindParam(":cat", $_GET['categoriaProduto']);
			$stmt->bindParam(":nm", $nome_produto);

			$stmt->execute();
		}else if(trim($nome_pr) != "" && $_GET['categoriaProduto'] == "Tudo"){
			$stmt = $pdo->prepare("SELECT * FROM PRODUTO
				WHERE nm_produto LIKE :nm
				LIMIT :qtd");

			$nome_produto = "%".$nome_pr."%";

			$stmt->bindParam(":qtd", $quantidade, PDO::PARAM_INT);
			$stmt->bindParam(":nm", $nome_produto);

			$stmt->execute();
		}else if(trim($nome_pr) == "" && isset($_GET['categoriaProduto']) && $_GET['categoriaProduto'] != "Tudo") {
			$stmt = $pdo->prepare("SELECT * FROM PRODUTO
				WHERE nm_categoria LIKE :cat
				LIMIT :qtd");

			$stmt->bindParam(":qtd", $quantidade, PDO::PARAM_INT);
			$stmt->bindParam(":cat", $_GET['categoriaProduto']);

			$stmt->execute();
		}else {
			$stmt = $pdo->prepare("SELECT * FROM PRODUTO
				LIMIT :qtd");

			$stmt->bindParam(":qtd", $quantidade, PDO::PARAM_INT);

			$stmt->execute();
		}

		$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

	} catch(PDOException $e) {
		echo "Erro ao buscar produtos: " . $e->getMessage();
	}
?>
