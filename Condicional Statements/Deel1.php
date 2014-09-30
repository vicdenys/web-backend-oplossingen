<?php
	$getal = 3;
	$dag = "dagdag";
	
	if ($getal == 1)
	{
		$dag = maandag;
	}
	else if ($getal == 2)
	{
		$dag = dinsdag;
	}
	else if ($getal == 3)
	{
		$dag = woensdag;
	}
	else if ($getal == 4)
	{
		$dag = donderdag;
	}
	else if ($getal == 5)
	{
		$dag = vrijdag;
	}
	else if ($getal == 6)
	{
		$dag = zaterdag;
	}
	else if ($getal == 7)
	{
		$dag = zondag;
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing Condicional Statements Deel 1</h1>
		<p><?= $dag ?></p>
	</body>
</html>