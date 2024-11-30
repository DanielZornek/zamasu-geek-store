<?php
	require "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Zamasu Store</title>
	<link rel="stylesheet" type="text/css" href="src/style.css">
	<link rel="stylesheet" type="text/css" href="src/reset.css">
	<link rel="stylesheet" type="text/css" href="src/componentes.css">
</head>
<body>
	<!-- Header -->
	<header>
		<!-- Logo -->
		<section class="logo">
			<h2>Zamasu GeekStore</h2>
		</section>
		<!-- Nav -->
		<nav class="nav">
			<ul class="nav-list">
				<li class="nav-list-item">
					<a class="nav-list-item-link" href="#">Home</a>
				</li>
				<li class="nav-list-item">
					<a class="nav-list-item-link" href="#">Sobre Nós</a>
				</li>
				<li class="nav-list-item">
					<a class="nav-list-item-link" href="produtos.php">Produtos</a>
				</li>
				<li class="nav-list-item">
					<a class="nav-list-item-link" href="#">Contato</a>
				</li>
			</ul>
		</nav>
		<!-- Nav end -->
		<section class="userInfo">
			<a href="#" class="userInfo-link">
				<img src="src/images/cart-blue.png" alt="cart image">
			</a>
			<a href="#" class="userInfo-link">
				<img src="src/images/user-colored.png" alt="cart image">
			</a>
		</section>
	</header>
	<!-- Header -->

	<!-- Main -->
	<main>
		<div class="bannerMain">
			<section class="bannerMain-text">
				<h2 class="bannerMain-text-title">A melhor loja Geek do brasil</h2>
				<p class="bannerMain-text-paragraph">
					Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim at ipsum ex vel molestiae eos delectus ratione, debitis nostrum nisi! Nemo natus facere id cum eius obcaecati aliquam ea in!
				</p>
				<div class="bannerMain-text-buttons">
					<button class="botao botao1">
						botao
					</button>
					<button class="botao botao2">
						botao
					</button>
				</div>
			</section>
			<section class="bannerMain-img">
				<img id="black" src="https://i.pinimg.com/originals/e6/5c/e2/e65ce26235487d594dfffb3a6688dd92.png" alt="">
			</section>
		</div>

		<div class="sponsors">
			<img src="src/images/bandai-logo.svg" alt="Bandai Namco logo" title="Bandai Namco logo">
			<img src="src/images/dbsuper-logo.png" alt="Dragon Ball Super logo" title="Dragon Ball Super logo">
			<img src="src/images/toei-logo.png" alt="Toei Animation logo" title="Toei Animation logo">
			<img src="src/images/ns-logo.png" alt="Naruto Shippuden logo" title="Naruto Shippuden logo">
		</div>
	</main>
	<!-- Main end -->

	<!-- Footer -->
	<footer>
		
	</footer>
	<!-- Footer end -->
	 <script>
        let black = document.getElementById("black");

	// Função para alternar a imagem de Goku Black para SSJ Rose
	function toggleTransformation() {
		black.src = "src/images/black-rose.png"; // Mudando para SSJ Rose
		setTimeout(() => {
			black.src = "https://i.pinimg.com/originals/e6/5c/e2/e65ce26235487d594dfffb3a6688dd92.png"; // Voltando para Goku Black
		}, 7000); // 7.8 segundos depois, volta para a forma normal
	}

	// Inicia a transformação a cada 14 segundos
	setInterval(toggleTransformation, 14000+7000);
		
	 </script>
</body>
</html>