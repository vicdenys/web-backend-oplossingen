<?php
	$text = explode(",", file_get_contents("haha.txt"));
	$ingeloged = false;
	$fout = "";
	
	if (isset($_POST["paswoord"]) && isset($_POST["gbrnaam"])){
		if($_POST["paswoord"] == $text[1] && $_POST["gbrnaam"] == $text[0]){
			setcookie("loggedin"," ", time() + 360);
			header("location: Deel1.php");
		}
		else{
			$fout = "Gebruikersnaam en/of paswoord is niet correct!";
		}
	}
	
	if (isset($_COOKIE["loggedin"])){
		$ingeloged = true;
	}
	
	if (isset($_GET["uitloggen"])) {
		if ($_GET["uitloggen"] == "ja") {
			setcookie("loggedin"," ", time() - 360);
			header("location: Deel1.php");
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
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
		<h1>Oplossing Cookies Deel 1</h1>
		<?php if($ingeloged == true): ?>
			<p>U bent ingelogd.</p>
			<a href="?uitloggen=ja">Uitloggen</a>
		<?php else: ?>
		<form action="Deel1.php" method="post" >
			<ul>
				<li>
					<p>Gebruikersnaam: </p>
					<input type="text" name="gbrnaam" id="gbrnaam"/> 
				</li>
				<li>
					<p>Paswoord: </p>
					<input  type="text" name="paswoord" id="paswoord"/>
				</li>
			</ul>
			
			<input type="submit" id="submit"/> 
		</form>
		<p><?=$fout?></p>
		<?php endif ?>
	</body>
</html>