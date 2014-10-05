<?php
	$getallen = array();
	$getal = 0;
	while ($getal < 101){
		$getallen[] = $getal;
		$getal++;
	}
	$reeks = implode(", ", $getallen);
	
	$getal = 0;
	$getallen2 = array();
	while ($getal <= 80)
	{
		if ($getal % 3 == 0 && $getal > 40 && $getal < 80){
			$getallen2[] = $getal;
		}
		$getal ++;
	}
	$reeks2 = implode(", ", $getallen2);
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing for deel 1</h1>
		<p>reeks 1 = <?=$reeks?></p>
		<p>reeks 2 = <?=$reeks2?></p>
	</body>
</html>