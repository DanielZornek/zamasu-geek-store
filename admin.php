<?php
    // 1. A PRIMEIRA COISA SEMPRE
    session_start();

    // 2. IMPORTAÇÕES
    require "conexao.php";
    require "sair_admin.php"; // Certifique-se que este arquivo NÃO tem o session_start dentro dele

    // 3. LÓGICA DE LOGIN
    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['entrar'])) {
        $usuario = $_POST["usuarioAdmin"];
        $senha = $_POST["senhaAdmin"];

        if (!empty($usuario) && !empty($senha)) {
            try {
                $stmt = $pdo->prepare("SELECT usuario, senha FROM ADMIN WHERE usuario = :u AND senha = :s");
                $stmt->execute(['u' => $usuario, 's' => $senha]);
                $admin = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($admin) {
                    $_SESSION["logadoAdmin"] = true;
                    setcookie("logadoAdmin", "true", time() + 3600, "/");
                    echo "<script>
                            alert('Logado com Sucesso!');
                            window.location.href = 'admin.php';
                          </script>";
                    exit;
                } else {
                    echo "<script>alert('Credenciais inválidas');</script>";
                }
            } catch (PDOException $e) {
                echo "Erro ao entrar: " . $e->getMessage();
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