<?php
	require "sair_admin.php";
	session_start();

	if(!isset($_COOKIE['logadoAdmin'])){
		echo "<script>
				alert('Você deve estar logado como admin!');
				window.location.href = 'index.php';
				</script>";
	}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Produtos</title>
	<link rel="stylesheet" type="text/css" href="src/style_forms.css">
	<link rel="stylesheet" type="text/css" href="src/componentes.css">
</head>
<body>
	<?php
		require "header_admin.php";
	?>
	<main>
		<h1>Cadastro de Produtos</h1>
		<form class="form" action="cadastrar_produto.php" method="POST" enctype="multipart/form-data">
			<section class="form-inputs">
				<label for="nomeProduto">Nome: </label>
				<input type="text" name="nomeProduto" id="nomeProduto" required>
			</section>
			<section class="form-inputs">
				<label for="descricaoProduto">Descrição: </label>
				<textarea maxlength="255" name="descricaoProduto" id="descricaoProduto">
					
				</textarea required>
			</section>
			<section class="form-inputs">
				<label for="categoriaProduto">Categoria:</label>
				<select name="categoriaProduto" id="categoriaProduto" required>
					<option value="Camisetas">Camisetas</option>
					<option value="Canecas">Canecas</option>
					<option value="Bonecos">Bonecos</option>
					<option value="Moletons">Moletons</option>
				</select>
			</section>
			<section class="form-inputs">
				<label for="imagemProduto">Imagem: (Apenas jpeg e png)</label>
				<input type="file" name="imagemProduto" id="imagemProduto" accept="image/jpeg, image/png" multiple required>
			</section>
			<section class="form-inputs">
				<label for="precoProduto">Preço:</label>
				<input type="number" name="precoProduto" id="precoProduto" step="0.01" placeholder="2983.87" required>
			</section>
			<section class="form-inputs">
				<label for="quantidadeProduto">Quantidade em estoque:</label>
				<input type="number" name="quantidadeProduto" id="quantidadeProduto" required>
			</section>
			<button class="botao botao2" name="cadastrar">
				Cadastrar
			</button>
		</form>
	</main>
</body>
</html>