<?php
	function __autoload($class){
		include "class/" . $class . ".php";
	}

	$perc = new Percent(150,100);
	//var_dump($perc);
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<p>Hoeveel procent is 150 van 100?</p>
		<table>
			<tr>
				<td><p>Absoluut</p></td>
				<td><?= $perc->absolute?></td>
			</tr>
			<tr>
				<td><p>Relatief</p></td>
				<td><?= $perc->relative?></td>
			</tr>
			<tr>
				<td><p>Geheel getal</p></td>
				<td><?= $perc->hundred?></td>
			</tr>
			<tr>
				<td><p>Nominaal</p></td>
				<td><?= $perc->nominal?></td>
			</tr>
		</table>
	</body>
</html>