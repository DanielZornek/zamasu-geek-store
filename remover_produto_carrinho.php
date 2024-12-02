<?php
	
	require "conexao.php";

	if($_SERVER['REQUEST_METHOD'] === "GET"){
		if(isset($_GET['cd'])){	
			$cd = $_GET['cd'];
			try{

				$stmt = $pdo->prepare("DELETE FROM CARRINHO
					WHERE cd_produto_fk = :cd
					AND cd_usuario_fk = :cd_usuario");

				$stmt->bindParam(":cd", $cd);
				$stmt->bindParam(":cd_usuario", $_COOKIE['usuario_id']);

				$stmt->execute();

				echo "<script>
					alert('Produto removido do carriho!');
					window.location.href = 'carrinho.php';
				</script>";

			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	}
?>