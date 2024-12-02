<style type="text/css">
	header{
	width: 100%;
	padding: 1em 4em;
	display: flex;
	flex-direction: row;	
	justify-content: space-between;
	align-items: center;
	background-color: var(--cor1);
}

.logo h2{
	font-family: var(--font-jaro);
	font-weight: 500;
	color: var(--cor3);
}

.nav{
	width: 45%;
	padding: .5em;
}

.nav-list{
	display: flex;
	flex-direction: row;
	list-style: none;
	justify-content: space-evenly;
}

.nav-list-item-link{
	text-decoration: none;
	color: #fff;
	transition: .2s ease-in-out;
	font-size: 1.3em;
	padding: 1em;
	border-radius: .8em;
	transition: .2s ease-in-out;
}

.nav-list-item-link:hover{
	text-decoration: underline;
	background-color: var(--cor3);
	color: var(--cor1);
}

.userInfo{
	display: flex;
	flex-direction: row;
	justify-content: space-between;
}

.userInfo-link{
	max-width: 40%;
}

.userInfo-link img{
	max-width: 85%;
	transition: .2s ease-in-out;
}

.userInfo-link img:hover{
	opacity: 65%;
}

@media screen and (max-width: 968px){
	header,
	.nav-list{
		flex-direction: column;
		align-items: center;
		gap: 2.5em;
	}
}
</style>
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
				<a class="nav-list-item-link" href="index.php">Home</a>
			</li>
			<li class="nav-list-item">
				<a class="nav-list-item-link" href="sobre.php">Sobre Nós</a>
			</li>
			<li class="nav-list-item">
				<a class="nav-list-item-link" href="produtos.php">Produtos</a>
			</li>
			<li class="nav-list-item">
				<a class="nav-list-item-link" href="contato.php">Contato</a>
			</li>
		</ul>
	</nav>
	<!-- Nav end -->
	<section class="userInfo">
		<a href="carrinho.php" class="userInfo-link">
			<img src="src/images/cart-blue.png" alt="cart image">
		</a>
		<a href="<?php echo isset($_COOKIE["usuario_email"]) ? "dados.php" : "cadastro.php"; ?>" class="userInfo-link">
			<img src="src/images/user-colored.png" alt="cart image">
		</a>
	</section>
</header>
<!-- Header -->