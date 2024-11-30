<?php
	$host = "localhost";
	$dbname = "bancoZamasuStore";
	$username = "root";
	$senha = ""; 

	try{
		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $senha);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}catch(PDOExecption $e){
		echo "erro na conexão com o banco!" . $e->getMessage();
	}
?>