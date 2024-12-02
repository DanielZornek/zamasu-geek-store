<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sobre Nós</title>
	<link rel="stylesheet" type="text/css" href="src/reset.css">
	<link rel="stylesheet" type="text/css" href="src/sobre.css">
</head>
<body>
	<?php
		require "header.php";
	?>
	<h1>Sobre</h1>
	<main class="main">

		<p class="main-text">Somos dois alunos da FATEC PG, este projeto é um trabalho que tem por objetivo acadêmico substituir uma Avaliação Bimestra</p>

		<div class="main-container">
			<section class="main-container-characters">
				<div onclick="mostraPersonagem(this, 'danny')" class="main-container-character danny deselected">
					
				</div>
				<div onclick="mostraPersonagem(this, 'paulo')" class="main-container-character paulo deselected">
					
				</div>
			</section>

			<section class="main-container-characters-body">
			</section>

		</div>

		<div class="info">
			<h2 class="info-title"></h2>
			<p class="info-text">
				
			</p>
		</div>

	</main>

	<script type="text/javascript">
		let img = document.createElement("img");
		let characterBody = document.querySelector(".main-container-characters-body");
		img.classList.add("main-container-characters-body-gif");

		function mostraPersonagem(element, pers){
			
			if(pers == "danny"){
				document.querySelector(".paulo").classList.remove("selected");
				element.classList.remove("deselected");
				element.classList.add("selected");
				img.src = "src/images/danny.gif";
				characterBody.appendChild(img);
				document.querySelector(".info-title").textContent = "Daniel Zornek";
				document.querySelector(".info-text").textContent = "Responsável pelo Sistema de cadastro de produtos, admin, sistema de filtro(busca), carrinho e recibo";
			}else{
				document.querySelector(".info-title").textContent = "Paulo Katsuya";
				document.querySelector(".danny").classList.remove("selected");
				element.classList.remove("deselected");
				element.classList.add("selected");
				img.src = "src/images/pk.gif";
				characterBody.appendChild(img);
				document.querySelector(".info-text").textContent = "Responsável pelo Sistema de cadastro de produtos, admin, sistema de filtro(busca), carrinho e recibo";
			}
		}
	</script>
</body>
</html> 