<?php       
    if(isset($_POST["sair"])){
        // Limpa a sessão com segurança
        $_SESSION = array(); 
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();

        // Limpa o seu cookie personalizado
        setcookie("logadoAdmin", "", time() - 3600, "/");

        echo "<script>
                alert('Saiu com sucesso!');
                window.location.href = 'index.php';
              </script>";
        exit(); // IMPORTANTE: Para o script aqui!
    }
?>