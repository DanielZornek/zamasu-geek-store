<?php
	require_once "conexao.php";

	if(isset($_GET["cd_produto"]) && isset($_GET["quantidade_maxima"])){

		try{

			$stmt = $pdo->prepare("SELECT p.cd_produto, p.nm_produto, p.vl_produto, p.qt_estoque_produto
                FROM PRODUTO p
                LEFT JOIN CARRINHO c ON p.cd_produto = c.cd_produto_fk AND c.cd_usuario_fk = :cd_usuario
                WHERE p.cd_produto = :cd
                AND c.cd_produto_fk IS NULL");

			$stmt->bindParam(":cd_usuario", $_COOKIE["usuario_id"]);
			$stmt->bindParam(":cd", $_GET["cd_produto"]);

			$stmt->execute();

			$produto = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(empty($produto)){
				unset($_SESSION['produtoCarrinho']);
				echo "<script>
					alert('O produto já foi adicionado ao carrinho'); 
					window.location.href = 'produtos.php';
				</script>";

			}else{
				$_SESSION['produtoCarrinho'] = $produto;
			}

		}catch(PDOException $e){
			echo "Erro ao puxar produto: " . $e->getMessage();
		}
	}
?>