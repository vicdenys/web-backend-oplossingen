<?php	
	session_start();
	
	if (isset($_POST["submit"])){
		$_SESSION["registratiegeg"]["email"] = $_POST["email"];
		$_SESSION["registratiegeg"]["nickname"] = $_POST["nickname"];
	}
	
	(isset($_SESSION["Adres"]["straat"])) ? $straat = $_SESSION["Adres"]["straat"] : $straat = ""; 
	(isset($_SESSION["Adres"]["nummer"])) ? $nummer = $_SESSION["Adres"]["nummer"] : $nummer = "";
	(isset($_SESSION["Adres"]["gemeente"])) ? $gemeente = $_SESSION["Adres"]["gemeente"] : $gemeente = ""; 
	(isset($_SESSION["Adres"]["postcode"])) ? $postcode = $_SESSION["Adres"]["postcode"] : $postcode = "";
	
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
		<h1>Registratiegegevens</h1>
		<ul>
		<?php foreach($_SESSION["registratiegeg"] as $key => $value) :?>
				<li><?= $key . ": " . $value?> </li>
		<?php endforeach?>
		</ul>
		
		<h2>Adres</h2>
		
		<form method="POST" action="overzicht.php">
			<ul>
				<li>
					<p>Straat</p>
					<input type="text" name="straat" <?=(isset($_GET["focus"]) && $_GET["focus"] == "straat") ? 'autofocus' :'';?> value=<?=$nummer?> >
				</li>
				<li>
					<p>Nummer</p>
					<input type="number" name="nummer" <?=(isset($_GET["focus"]) && $_GET["focus"] == "nummer") ? 'autofocus' :'';?> value=<?=$nummer?>>
				</li>
				<li>
					<p>Gemeente</p>
					<input type="text" name="gemeente" <?=(isset($_GET["focus"]) && $_GET["focus"] == "gemeente") ? 'autofocus' :'';?> value=<?=$gemeente?> >
				</li>
				<li>
					<p>Postcode</p>
					<input type="text" name="postcode" <?=(isset($_GET["focus"]) && $_GET["focus"] == "postcode") ? 'autofocus' :'';?> value=<?=$postcode?> >
				</li>
			</ul>
			<input type="submit" name="submit" value="Volgende">
		</form>
		
	</body>
</html>