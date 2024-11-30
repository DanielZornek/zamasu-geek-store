<?php
	require "conexao.php";

	if($_SERVER["REQUEST_METHOD"] === "POST"){
		$codigo = $_POST["codigoProduto"];
		$nome = $_POST["nomeProduto"];
		$descricao = $_POST["descricaoProduto"];
		$categoria = $_POST["categoriaProduto"];
		$preco = $_POST["precoProduto"];
		$quantidade = $_POST["quantidadeProduto"];

		try{
			$stmt = $pdo->prepare("UPDATE PRODUTO SET 
				nm_produto = :nm, 
				ds_produto = :ds, 
				nm_categoria = :cat, 
				vl_produto = :prc, 
				qt_estoque_produto = :qtd
				WHERE cd_produto = :cd");

			$stmt->bindParam(':cd', $codigo);
			$stmt->bindParam(':nm', $nome);
			$stmt->bindParam(':ds', $descricao);
			$stmt->bindParam(':cat', $categoria);
			$stmt->bindParam(':prc', $preco);
			$stmt->bindParam(':qtd', $quantidade);

			$stmt->execute();

			echo "Atualização feita com sucesso!";
		}catch(PDOExecption $e){
			echo "Erro ao atualizar produto: <br>".$e->getMessage();
		}
	}
?>