<?php
session_start();

session_unset();

session_destroy();

setcookie("usuario_id", "", time() - 3600, "/");

header("Location: login.php");
exit;
?>
