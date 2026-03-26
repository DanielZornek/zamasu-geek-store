<?php
	$host = "mysql_zamasu";
	$dbname = "bancoZamasuStore";
	$username = "root";
	$senha = "zamasu123"; 

	try{
		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $senha);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}catch(PDOException $e){
		echo "erro na conexão com o banco!" . $e->getMessage();
	}
?>