<?php
	require_once "inserir_carrinho.php";
	require "buscar_produtos_carrinho.php";

	if($_SERVER["REQUEST_METHOD"] === "POST"){

	}

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
							<span " . $produto["cd_produto"] . " class='precoProduto'>".
								$produto['vl_produto']
							."</span>
						</section>
						<section class='containerCart-products-action'>
							<form action='' method='GET'>
								<input id='".$produto["cd_produto"]."' oninput='calcularPreco(this)' class='qtdProduto' value='1' type='number' step='1' min='1' max='".$produto["qt_estoque_produto"]."'>
							</form>		
							<a href='remover_produto_carrinho.php?cd=".$produto["cd_produto"]."'>
								Remover
							</a>
						</section>
						</div>";
				}
			?>
		</div>
		<div class="containerCart-data">
			<form action="checkout.php" method="POST">
			<?php
				$total = 0;
				foreach ($produtos as $produto) {
					$total += $produto["vl_produto"];
					echo "<section class='containerCart-data-section'>
					    <span>R$</span>
					    <input name='precoProduto' type='number' step='0.01' id='" . $produto["cd_produto"] . "' class='precoAtualizado' value='" . $produto['vl_produto'] . "' disabled>
					</section>";
					
				}
				if(!empty($produto)){

					echo "<input id='precoTotal' name='precoTotal' disabled>";

					echo "<button type='send'>
						Finalizar
					</button>";
				}
			?>
			</form>
		</div>
	</main>
	<script type="text/javascript" defer>
		let qtdProduto = document.querySelectorAll(".qtdProduto");
		let nmProduto = document.querySelectorAll(".nmProduto");
		let precoAtualizado = document.querySelectorAll(".precoAtualizado");
		let precoTotal = document.querySelector("#precoTotal");
		let total;
		
		setInterval(() => {
		    total = 0;

		    for (let i = 0; i < precoAtualizado.length; i++) {
		        let input = precoAtualizado[i];

		        if (input.disabled && input.value) {
		            total += parseFloat(input.value);
		            precoTotal.value = total.toFixed(2);;
		        }
		    }

		}, 1000);

		function calcularPreco(elemento){
			let valor = Number(elemento.value);
			let max = Number(elemento.max);
			
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
						
						precoAtualizado[i].value = (Number(precoProduto[i].innerText) * Number(valor)).toFixed(2);
					}
				}
			}
		}
	</script>
</body>
</html>