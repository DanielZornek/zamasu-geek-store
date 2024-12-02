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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - <?= $usuario['nm_usuario'] ?></title>
    <link rel="stylesheet" href="src/reset.css">
    <link rel="stylesheet" href="src/style_forms.css">
    <link rel="stylesheet" href="src/perfil.css">
    <link rel="stylesheet" href="src/modal.css">
</head>
<body>

<main>
    <header>
        <h1>Perfil de <?= $usuario['nm_usuario'] ?></h1>
    </header>

    <div class="profile-container">
        <section class="profile-info">
            <div>
                <label for="nome">Nome:</label>
                <div id="nome"><?= $usuario['nm_usuario'] ?></div>
            </div>
            <div>
                <label for="email">E-mail:</label>
                <div id="email"><?= $usuario['nm_email_usuario'] ?></div>
            </div>
            <div>
                <label for="endereco">Endereço:</label>
                <div id="endereco"><?= $usuario['nm_endereco_usuario'] ?></div>
            </div>
        </section>
<br>
        <a href="editar_perfil.php" style="text-decoration: none; color: #fff;"><button class="btn">Editar Perfil</button></a>
<span class="espaco"></span>
        <button class="btn" id="confirmar">Excluir Perfil</button>        
<span class="espaco"></span>
        <a href="logout.php" style="text-decoration: none; color: #fff;"><button class="btn">Sair do Perfil</button></a>
    </div>
</main>

<!-- O Modal -->
<div id="modalconfirmar" class="modal">
  <div class="modal-content">
    <div class="modal-header">
        <h5>Confirmar Exclusão</h5>
    </div>
    <div class="modal-body">
        <p>Você tem certeza que deseja excluir sua conta?</p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" id="fecharModal">Não</button>
        <a href="excluir_perfil.php" style="text-decoration: none; color: #fff;"><button class="btn">Sim</button></a>
    </div>
  </div>
</div>

<script>
    // Obter o modal
    var modal = document.getElementById("modalconfirmar");

    // Obter o botão que abre o modal
    var btn = document.getElementById("confirmar");

    // Obter o botão "Não" para fechar o modal
    var fecharModal = document.getElementById("fecharModal");

    // Quando o usuário clicar no botão "Excluir Perfil", abre o modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Quando o usuário clicar no botão "Não", fecha o modal
    fecharModal.onclick = function() {
        modal.style.display = "none";
    }

    // Quando o usuário clicar fora do modal, fecha-o
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</div>
</body>
</html>
