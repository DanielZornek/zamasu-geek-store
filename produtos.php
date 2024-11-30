<?php
	require "buscar_produtos.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Produtos</title>
	<link rel="stylesheet" type="text/css" href="src/style_produtos.css">
</head>
<body>
	<main>
		<h1 class="mainTitle">Produtos</h1>
		<!-- <form action="#" method="GET">
			<button type="send">Pesquisar</button>
		</form> -->
		<div class="products">
			<?php
				foreach ($produtos as $produto) {

					echo "<div class='products-card'>
							<img class='products-card-img' src='". $produto["caminho_imagem"]."' alt='Imagem de ".$produto["nm_produto"]."'>
							<section class='products-card-info'>
								<h3>".$produto["nm_produto"]."</h3>
								<span class='products-card-info-price'>R$ ".
									$produto["vl_produto"]
								."</span>
								<p class='products-card-info-description'>".
									$produto["ds_produto"]
								."</p>
								<p class='products-card-info-storage'>
									Em estoque: <span class='storage-product'>".
									$produto["qt_estoque_produto"]
								."</span>
								</p>

							</section>
								<a onmouseenter='mouseDentro(this)' onmouseleave='mouseFora(this)' class='products-card-info-cart' href='produtos.php?".$produto['cd_produto']."'>
									<img class='products-card-info-cart-img' src='src/images/cart.png'>
								</a>
							</div>"; 
				}
			?>
		</div>
	</main>
	<script type="text/javascript">
		let estoque_produto = document.getElementsByClassName("storage-product");
		let cart_product = document.querySelectorAll(".products-card-info-cart");

		for(let i = 0; i < estoque_produto.length; i++){
			if(Number(estoque_produto[i].innerText) < 6){
				estoque_produto[i].style.color = "var(--cor5)";
			}else if(Number(estoque_produto[i].innerText) > 50){
				estoque_produto[i].style.color = "var(--cor2)";
			}
		}

		function mouseDentro(elemento){
			elemento.style.background = "transparent";
		}

		function mouseFora(elemento){
			console.log("fora");
		}

		// for(let i = 0; i < cart_product.length; i++){
		// 	cart_product[i].addEventListener("mouseover", ()=>{
		// 		console.log();
		// 		cart_product[i].childNodes[1].src = "src/images/cart-blue.png";
		// 	});

		// 	cart_product[i].addEventListener("mouseout", ()=>{
		// 		console.log();
		// 		cart_product[i].childNodes[1].src = "src/images/cart.png";
		// 	});
		// }

	</script>
</body>
</html>