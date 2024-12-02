<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'conexao.php'; 

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        $stmt = $pdo->prepare("SELECT cd_usuario, nm_email_usuario, nm_senha_usuario, nm_usuario FROM USUARIO WHERE nm_email_usuario = :email AND nm_senha_usuario = :senha");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Configurar sessões
            $_SESSION['usuario_id'] = $usuario['cd_usuario'];
            $_SESSION['usuario_email'] = $usuario['nm_email_usuario'];
            $_SESSION['usuario_nome'] = $usuario['nm_usuario']; 
            $_SESSION['usuario_senha'] = $usuario['nm_senha_usuario'];

            // Configurar cookies
            $cookie_time = time() + 3600; 
            setcookie('usuario_id', $usuario['cd_usuario'], $cookie_time, "/");
            setcookie('usuario_email', $usuario['nm_email_usuario'], $cookie_time, "/");
            setcookie('usuario_senha', $usuario['nm_senha_usuario'], $cookie_time, "/");

            header("Location: dados.php");
            exit;
        } else {
            echo "E-mail ou senha inválidos.";
        }
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="src/reset.css">
    <link rel="stylesheet" href="src/style_forms.css">
</head>
<body>
    <main>
        <h1>Login</h1>
        <form class="form" action="login.php" method="post">
            <div class="form-inputs">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="form-inputs">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>
            <div style="color: #fff;">Não possui conta? <a href="cadastro.php" style="color: var(--cor2);">Cadastre-se</a> Ou <a href="#" style="color: var(--cor4);">Entrar sem conta</a></div>
            <button type="submit" id="enviar">Entrar</button>
        </form>
    </main>
</body>
</html>
