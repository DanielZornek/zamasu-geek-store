<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO USUARIO (nm_usuario, nm_email_usuario, nm_endereco_usuario, nm_senha_usuario) 
            VALUES (:nome, :email, :endereco, :senha)";

    try {
        
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':senha', $senha);

        $stmt->execute();
        header("location: sucessocadastro.php");
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="src/reset.css">
    <link rel="stylesheet" href="src/form.css">
</head>
<body>
    <main>
        <h1>Cadastro</h1>
        <form class="form" action="cadastro.php" method="post">
            <div class="form-inputs">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
            </div>
            <div class="form-inputs">
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereço" required>
            </div>
            <div class="form-inputs">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="form-inputs">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>
            <div style="color: #fff;">Já possui conta? <a href="login.php" style="color: var(--cor2);">Faça login</a> Ou <a href="#" style="color: var(--cor4);">Entrar sem conta</a></div>
            <button type="submit" id="enviar">Cadastrar</button>
        </form>
    </main>
</body>
</html>