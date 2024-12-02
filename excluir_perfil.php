<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

require_once 'conexao.php';

$usuario_id = $_SESSION['usuario_id'];

$stmt = $pdo->prepare("DELETE FROM USUARIO WHERE cd_usuario = :id");
$stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);

if ($stmt->execute()) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
} else {
    echo "Erro ao excluir a conta. Tente novamente mais tarde.";
    exit;
}
?>
