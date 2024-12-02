<?php
	require_once "inserir_carrinho.php";
	require "buscar_produtos_carrinho.php";

	if (!isset($_COOKIE['usuario_id'])) {
		echo "<script>
			alert('você deve estar logado para ter acesso ao carrinho!');
			window.location.href = 'index.php';
		</script>";
	}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Meu Carrinho</title>
	<link rel="stylesheet" type="text/css" href="src/reset.css">
	<link rel="stylesheet" type="text/css" href="src/style.css">
	<link rel="stylesheet" type="text/css" href="src/style_carrinho.css">
</head>
<body>
	<?php
		require "header.php";
	?>
	<h1 class="title">Carrinho de Compras</h1>
	<main class="containerCart">
		<div class="containerCart-products">
			<?php
				foreach ($produtos as $produto) {
					echo "<div class='containerCart-products-card'>
						<img class='containerCart-products-card-img' src='".$produto['caminho_imagem']."'>
						<section class='containerCart-products-info'>
							<h3 class='nmProduto'>
								".$produto['nm_produto']."
							</h3>
							<span class='precoProduto'>".
								$produto['vl_produto']
							."</span>
						</section>
						<section class='containerCart-products-action'>
							<form action='' method='GET'>
								<input id='".$produto["cd_produto"]."' onchange='calcularPreco(this)' class='qtdProduto' value='1' type='number' step='1' min='1' max='".$produto["qt_estoque_produto"]."'>
							</form>		
							<a href='remover_produto_carrinho.php?".$produto["cd_produto"]."'>
								Remover
							</a>
						</section>
						</div>";
				}
			?>
		</div>
		<div class="containerCart-data">
			<?php
				foreach ($produtos as $produto) {
					echo "<p id='".$produto["cd_produto"]."' class='precoAtualizado'>".$produto['vl_produto']."</p>";
				}
			?>
		</div>
	</main>
	<script type="text/javascript" defer>
		let qtdProduto = document.querySelectorAll(".qtdProduto");
		let nmProduto = document.querySelectorAll(".nmProduto");
		   

		function calcularPreco(elemento){
			let valor = Number(elemento.value);
			let max = Number(elemento.max);
			let precoAtualizado = document.querySelectorAll(".precoAtualizado");
			let precoProduto = document.querySelectorAll(".precoProduto");

			if(valor > max){
				alert("A quantidade não pode ser maior do que o que temos disponível no estoque");
				elemento.value = 1;
			}else if(valor < 1){
				alert("A quantidade não pode ser menor que 1");
				elemento.value = 1;
			}else{
				for(let i = 0; i < precoAtualizado.length; i++){
					if(elemento.id == precoAtualizado[i].id){
						precoAtualizado[i].innerText = Number(precoProduto[i].innerText) * Number(valor);
					}
				}
			}
		}
	</script>
</body>
</html>