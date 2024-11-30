<style type="text/css">
	header{
	width: 100%;
	padding: 1em 4em;
	display: flex;
	flex-direction: row;	
	justify-content: space-between;
	align-items: center;
	background-color: transparent;
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
}

.nav-list-item-link:hover{
	text-decoration: underline;
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