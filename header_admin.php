<style type="text/css">
	@import "src/reset.css";
		header{
			background-color: var(--cor1);
			padding: 2em;
			display: flex;
			justify-content: flex-end;
			align-items: center;
			gap: 2.5em;
		}
		.nav-list{
			display: flex;
			flex-direction: row;
			gap: 1.4em;
			list-style: none;
		}
		.nav-list-item-link{
			color: #fff;
			padding: 1em 2em;
			cursor: pointer;
			border: 1px solid #fff;
			border-radius: .6em;
			transition: .2 ease-in-out;
			font-weight: bolder;
			text-decoration: none;
		}
		.deletar{
			background-color: var(--cor5);
		}
		.atualizar{
			background-color: var(--cor3);
		}
		.deletar:hover{
			background-color: transparent;
			color: var(--cor5);
		}
		.atualizar:hover{
			background-color: transparent;
			color: var(--cor3);
		}
		header button{
			padding: 1em 2em;
			border: none;
			color: #fff;
			border: 2px solid #fff;
			background-color: var(--cor4);
			cursor: pointer;
			border-radius: .6em;
			transition: .2 ease-in-out;
			font-weight: bolder;
		}
		header button:hover{
			color: var(--cor3);
			border: 2px solid var(--cor3);
			background-color: transparent;
		}
</style>

	<header>
		<nav class="nav">
			<ul class="nav-list">
				<li class="nav-list-item">
					<a class="nav-list-item-link atualizar" href="atualiza_produto.php">Atualizar Produtos</a>
				</li>
				<li class="nav-list-item">
					<a class="nav-list-item-link deletar" href="deletar_produto.php">Deletar Produtos</a>
				</li>
			</ul>
		</nav>
		<form action="#" method="POST">
			<button type="send" name="sair">
				Sair
			</button>
		</form>
	</header>