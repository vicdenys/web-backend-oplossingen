<?php
	$password = "12345";
	$username = "bart";
	$antwoord = "rarara";
	
	//var_dump($_POST);
	
	if (isset($_POST["submit"])){
		if($_POST["paswoord"] == $password && $_POST["naam"] == $username){
			$antwoord = "das just maat";
		}
		else{
			$antwoord = "neje, das ni just!";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing</title>
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
		<h1>Oplossing Post</h1>
		
		<form action="home.php" method="post">
			<ul>
				<li>
					<p>Name:</p>
					<input type="text" name="naam">
				</li>
				<li>
					<p>Paswoord:</p>
					<input type="text" name="paswoord">
				</li>
			</ul>
			
			<input type="submit" name="submit" value="Verzend">
			
		</form>
		
		<p><?=$antwoord?></p>
	</body>
</html>