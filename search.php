<style type="text/css">
	.form{
		width: 100%;
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
		padding: .4em;
		cursor: pointer;
		outline: none;
		border: none;
		border: 1px solid var(--cor1);
		background-color: #fff;
		border-radius: 1.2em;
	}
	.form-button:hover{
		border: 1px solid var(--cor1);
		background-color: var(--cor3);
	}
	.form-button img{
		max-width: 100%;
		object-fit: cover;
	}
	@media screen and (max-width: 968px){
		.form{
			width: 100%;
			flex-direction: column;
			align-items: center;
			gap: 1.6em;
		}
		.form-input{
			width: 100%;
		}
		.form-select{
			width: 55%;
		}
		.form-button{
			width: 15%;
			padding: .8em;
		}
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
		<img src="src/images/loupe.png">
	</button>
</form>