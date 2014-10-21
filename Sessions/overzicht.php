<?php	
	session_start();
	
	if (isset($_POST["submit"])){
		$_SESSION["Adres"]["straat"] = $_POST["straat"];
		$_SESSION["Adres"]["nummer"] = $_POST["nummer"];
		$_SESSION["Adres"]["gemeente"] = $_POST["gemeente"];
		$_SESSION["Adres"]["postcode"] = $_POST["postcode"];
	}
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
		<h1>Overzichtspagina</h1>
		<ul>
		<?php foreach($_SESSION as $h => $list) :?>
			<?php foreach($list as $key => $value) :?>
				<li><?=$key . ": " . $value . "	| "?><a href="<?=$h?>.php?focus=<?=$key?>">wijzig</a> </li>
			<?php endforeach?>
		<?php endforeach?>
		</ul>
	</body>
</html>