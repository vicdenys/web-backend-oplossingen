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
?>


<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
	<h1>Oplossing Array functions Deel 1</h1>
	<p>In de array $dieren zitten in totaal <?=$aantaldieren?> dieren.</p>
	<p>Het dier <?=$tezoekendier?> zit <?=$antwoord?> in $dieren</p>

	</body>
</html>