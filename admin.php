<?php
	require "conexao.php";

	session_start();

	if($_SERVER['REQUEST_METHOD'] === "POST"){
		$usuario = $_POST["usuarioAdmin"];
		$senha = $_POST["senhaAdmin"];

		if(!empty($usuario) && !empty($senha) && isset($_POST['entrar'])){
			try{
			$stmt = $pdo->prepare("SELECT usuario, senha FROM ADMIN");

			$stmt->execute();

			$adminDados = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($adminDados as $registro) {
				if($usuario == $registro["usuario"] && $senha == $registro["senha"]){
					$_SESSION["logadoAdmin"] = true;
					echo "<script>
							alert('Logado com Sucesso!');
							window.location.href = 'cadastro_produtos.php';

						</script>";
				}else{
					echo "<script>
						alert('Credenciais inválidas');
					</script>";
				}
			}
			
			}catch(PDOExecption $e){
				echo "Erro ao entrar<br>" . $e->getMessage();
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="src/style_forms.css">
	<link rel="stylesheet" type="text/css" href="src/componentes.css">
</head>
<body>
	<main>
		<h1>Área Restrita!</h1>

		<form class="form" action="#" method="POST">
			<section class="form-inputs">
				<label for="usuarioAdmin">Usuário: </label>
				<input type="text" name="usuarioAdmin" id="usuarioAdmin" required>
			</section>

			<section class="form-inputs">
				<label for="senhaAdmin">Senha: </label>
				<input type="password" name="senhaAdmin" id="senhaAdmin" required>	
			</section>

			<button class="botao botao2" name="entrar">
				Entrar
			</button>

		</form>
	</main>
</body>
</html>