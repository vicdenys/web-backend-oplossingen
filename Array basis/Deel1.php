<?php
	$dieren = array("Kat","Hond","Paard","Varken","Vogel");
	$dieren[] = "Arend";
	$dieren[] = "Muis";
	$dieren[] = "Uil";
	$dieren[] = "Rat";
	$dieren[] = "Meelworm";
	
	$voertuigen = array("Landvoertuigen" => array("Fiets", "Auto"),"Watervoertuigen" => array("Zeilboot","surfplank"), "Luchtvoertuigen" => array("Zweefvliegtuig"));
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing Array Basis Deel1</h1>
		<pre><?php var_dump($dieren)?></pre>
		<pre><?php var_dump($voertuigen)?></pre>

	</body>
</html>