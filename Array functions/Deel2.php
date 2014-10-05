<?php
	$dieren = array("schaap","koe","kat","hond","muis");
	$aantaldieren = count($dieren);
	
	$tezoekendier = "rat";
	
	if(!in_array($tezoekendier, $dieren)){
		$antwoord = "niet";
	}
	else{
		$antwoord = "";
	}
	
	sort($dieren);
	
	$zoogdieren = array("leeuw", "ezel", "paard");
	
	$alledieren = array_merge($dieren,$zoogdieren);	
?>


<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
	<h1>Oplossing Array functions Deel 2</h1>
	<p>In de array $dieren zitten in totaal <?=$aantaldieren?> dieren.</p>
	<p>Het dier <?=$tezoekendier?> zit <?=$antwoord?> in $dieren</p>
	<pre><?=var_dump($alledieren)?></pre>
	</body>
</html>