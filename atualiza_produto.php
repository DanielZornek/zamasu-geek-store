<?php
	require "sair_admin.php";
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
	<title>Atualizar Produtos</title>
	<link rel="stylesheet" type="text/css" href="src/style_forms.css">
	<link rel="stylesheet" type="text/css" href="src/componentes.css">
	<style type="text/css">
		.info{
			color: var(--cor3);
			font-weight: bold;
		}
	</style>
</head>
<body>
	<?php
		require "header_admin.php";
	?>
	<main>
		<h1>Atualização de Produtos</h1>
		<form class="form" action="atualizar_produto.php" method="POST" enctype="multipart/form-data">
			<section class="form-inputs">
				<label for="codigoProduto">Código do Produto: </label>
				<input type="number" name="codigoProduto" id="codigoProduto" step="1" min="1" required>
			</section>
			<section class="form-inputs">
				<label for="nomeProduto">Novo Nome: </label>
				<input type="text" name="nomeProduto" id="nomeProduto" required>
			</section>
			<section class="form-inputs">
				<label for="descricaoProduto"> Nova Descrição: </label>
				<textarea maxlength="255" name="descricaoProduto" id="descricaoProduto">
					
				</textarea required>
			</section>
			<section class="form-inputs">
				<label for="categoriaProduto">Nova Categoria:</label>
				<select name="categoriaProduto" id="categoriaProduto" required>
					<option value="Camisetas">Camisetas</option>
					<option value="Canecas">Canecas</option>
					<option value="Bonecos">Bonecos</option>
					<option value="Moletons">Moletons</option>
				</select>
			</section>
			<section class="form-inputs">
				<p class="info">Para não sobrecarregar o servidor optamos por não colocar a opção de atualizar imagens</p>
			</section>
			<section class="form-inputs">
				<label for="precoProduto">Novo Preço:</label>
				<input type="number" name="precoProduto" id="precoProduto" step="0.01" placeholder="2983.87" required>
			</section>
			<section class="form-inputs">
				<label for="quantidadeProduto">Quantidade em estoque:</label>
				<input type="number" name="quantidadeProduto" id="quantidadeProduto" required>
			</section>
			<button class="botao botao1" name="atualizar">
				Atualizar
			</button>
		</form>
	</main>
</body>
</html>