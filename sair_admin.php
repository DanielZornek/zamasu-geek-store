<?php		
	if(isset($_POST["sair"])){
		unset($_SESSION['logadoAdmin']);
		setcookie("logadoAdmin", "", time() - 3600, "/");
		echo "<script>
					alert('saiu');
					window.location.href = 'index.php';
				</script>";
	}
?>