<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

require_once 'conexao.php';

$usuario_id = $_SESSION['usuario_id'];
$stmt = $pdo->prepare("SELECT nm_usuario, nm_email_usuario, nm_endereco_usuario FROM USUARIO WHERE cd_usuario = :id");
$stmt->bindParam(':id', $usuario_id);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "Erro: usuário não encontrado!";
    exit;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novo_nome = $_POST['nome'];
    $novo_email = $_POST['email'];
    $novo_endereco = $_POST['endereco'];

    try {
        $update_stmt = $pdo->prepare("
            UPDATE USUARIO 
            SET nm_usuario = :nome, 
                nm_email_usuario = :email, 
                nm_endereco_usuario = :endereco 
            WHERE cd_usuario = :id
        ");
        $update_stmt->bindParam(':nome', $novo_nome);
        $update_stmt->bindParam(':email', $novo_email);
        $update_stmt->bindParam(':endereco', $novo_endereco);
        $update_stmt->bindParam(':id', $usuario_id);
        $update_stmt->execute();

        $_SESSION['usuario_nome'] = $novo_nome;
        $_SESSION['usuario_email'] = $novo_email;

        header("Location: dados.php");
        exit;
    } catch (PDOException $e) {
        echo "Erro ao atualizar perfil: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="src/reset.css">
    <link rel="stylesheet" href="src/style_forms.css">
    <link rel="stylesheet" href="src/perfil.css">
</head>
<body>
<main>
    <header>
        <h1>Editar Perfil</h1>
    </header>
    <form class="form" action="editar_perfil.php" method="post">
        <div class="form-inputs">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($usuario['nm_usuario']) ?>" required>
        </div>
        <div class="form-inputs">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario['nm_email_usuario']) ?>" required>
        </div>
        <div class="form-inputs">
            <label for="endereco">Endereço</label>
            <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($usuario['nm_endereco_usuario']) ?>" required>
        </div>
        <div style="display: flex; gap: 1em; margin-top: 1em;">
            <button type="submit" class="btn">Salvar Alterações</button>
            <a href="dados.php" class="btn-link"><button type="button" class="btn">Cancelar</button></a>
        </div>
    </form>
</main>
</body>
</html>
