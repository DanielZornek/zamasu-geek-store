<?php
	require "conexao.php";

	if($_SERVER["REQUEST_METHOD"] === "POST"){
		$codigo = $_POST["codigoProduto"];

		try{
			$stmt = $pdo->prepare("DELETE FROM PRODUTO
				WHERE cd_produto = :cd");

			$stmt->bindParam(":cd", $codigo);

			$stmt->execute();

			echo "<script>
					alert('Exclusão feita com sucesso');
					window.location.href = 'deleta_produto.php';
				</script>";
		}catch(PDOExecption $e){
			echo "Erro ao excluir produto! <br>" . $e->getMessage();
		}
	}
?>