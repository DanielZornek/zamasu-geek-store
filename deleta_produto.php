<?php
	require "sair_admin.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Deletar Produtos</title>
	<link rel="stylesheet" type="text/css" href="src/style_forms.css">
	<link rel="stylesheet" type="text/css" href="src/componentes.css">
</head>
<body>
	<?php
		require "header_admin.php";
	?>
	<main>
		<h1>Deletar Produtos</h1>
		<form class="form" action="deletar_produto.php" method="POST">
			<section class="form-inputs">
				<label for="codigoProduto">Código do Produto: </label>
				<input type="number" name="codigoProduto" id="codigoProduto" required placeholder="8">
			</section>
			<button class="botao botao2" name="deletar">
				Deletar
			</button>
		</form>
	</main>
</body>
</html>