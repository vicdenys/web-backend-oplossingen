<?php
	session_start();

	(isset($_SESSION["registratiegeg"]["email"])) ? $email = $_SESSION["registratiegeg"]["email"] : $email = ""; 
	(isset($_SESSION["registratiegeg"]["nickname"])) ? $nickname = $_SESSION["registratiegeg"]["nickname"] : $nickname = "";
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing Sessions</title>
		<meta charset="utf-8"/>
		
		<style>
			body{
				font-family: "Helvetica Neue";
				font-weight: 300;
			}
		
			li{
				list-style: none;
				margin-left: -40px;;
			}
		</style>
	</head>
	<body>
		<h1>Oplossing Sessions Deel 1</h1>
		
		<form method="POST" action="Adres.php">
			<ul>
				<li>
					<p>e-mail:</p>
					<input type="text" name="email" value=<?=$email?> <?=(isset($_GET["focus"]) && $_GET["focus"] == "email") ? 'autofocus' :'';?>>
				</li>
				<li>
					<p>nickname:</p>
					<input type="text" name="nickname" value=<?=$nickname?> <?=(isset($_GET["focus"]) && $_GET["focus"] == "nickname") ? 'autofocus' :'';?>>
				</li>
			</ul>
			<input type="submit" name="submit" value="Volgende">
		</form>

	</body>
</html>