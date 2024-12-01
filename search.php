<style type="text/css">
	.form{
		width: 85%;
		margin: 2em auto;
		padding: 1.2em;
		display: flex;
		flex-direction: row;
		justify-content: space-between;
	}
	.form-input{
		width: 60%;
		padding: .8em;
		font-size: 1em;
		outline: none;
		border-radius: .8em;
	}
	.form-select{
		width: 25%;
	}
	.form-select-label{
		font-weight: bold;
		color: #fff;
		font-size: 1.1em;
	}
	.form-select select{
		padding: .8em;
		font-size: 1em;
		outline: none;
		border-radius: .8em;
	}
	.form-button{
		width: 8%;
		padding: .8em;
	}

</style>
<form class="form" action="" method="GET">
	<input class="form-input" type="text" name="nomeProduto">
	<section class="form-select">
		<label class="form-select-label" for="categoriaProduto">Categoria:</label>
		<select name="categoriaProduto" id="categoriaProduto" required>
			<option value="Camisetas">Camisetas</option>
			<option value="Canecas">Canecas</option>
			<option value="Bonecos">Bonecos</option>
			<option value="Moletons">Moletons</option>
			<option value="Tudo">Tudo</option>
		</select>
	</section>
	<button class="form-button" type="send">
		Pesquisar
	</button>
</form>