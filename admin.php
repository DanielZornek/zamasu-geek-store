<?php
	require "conexao.php";
	require "sair_admin.php";
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
					setcookie("logadoAdmin", $_SESSION["logadoAdmin"], time() + 3600, "/");
					echo "<script>
							alert('Logado com Sucesso!');
							window.location.href = 'admin.php';

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
	<style type="text/css">
		main{
			height: 100vh;
		}p{
			color: #fff;
			text-align: center;
			font-size: 1.4em;
		}
	</style>
</head>
<body>

	<?php
		if(isset($_COOKIE['logadoAdmin'])){
			require "header_admin.php";
		}
	?>

	<main>
		<?php
			if(isset($_COOKIE['logadoAdmin'])){
				echo "<h1>
							Bem-vindo Admin!
						</h1>

						<p>
							Seu login durará cerca de 1 hora, depois disso você terá de logar novamente
						</p>";
			}else{
				require "form_admin.php";
			}
		?>
		
	</main>
</body>
</html>