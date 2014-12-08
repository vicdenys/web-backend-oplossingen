<?php

	session_start();
	
	if(isset($_SESSION["registration"])){
		$password = $_SESSION["registration"]["password"];
		$email = $_SESSION["registration"]["email"];
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Registratie</title>
		<meta charset="utf-8"/>
		
		<link rel="stylesheet" href="http://oplossingen.web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://oplossingen.web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://oplossingen.web-backend.local/css/directory.css">
		
		<style>
			
			#registreer{
				display: block;
				margin-top: 30px;
			}
			
		</style>
		
	</head>
	<body>
	
		<h1>Registratie</h1>
		
		<form action="registratie-process.php" method="post">
			
			<label for="email">e-mail</label>
			<input type="text" name="email" id="email" value="<?= $email?>"/>
			
			<label for="paswoord">paswoord</label>
			<input type="text" name="paswoord" id="paswoord" value="<?= $password?>"/>
			<input type="submit" name="genPas" value="Genereer een paswoord"/>
			
			<input id="registreer" type="submit" name="registreer" value="Registreer"/>
			
		</form>
		
		
	</body>
</html>