<?php
	$getal = rand(1,100);
	
	$ondergrens = floor($getal /10) *10;
	$bovengrens = $ondergrens + 10;
	
	$boodschap = 'Het getal ' . $getal . ' ligt tussen ' . $ondergrens . ' en ' . $bovengrens;
	$boodschapOm = strrev($boodschap);
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing If-Else-If</h1>
		<p><?=$boodschap?></p>
		<p><?=$boodschapOm?></p>
	</body>
</html>