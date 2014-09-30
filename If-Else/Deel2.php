<?php
	$aantalSeconden = 36000000;
	$aantalMinuten = floor($aantalSeconden / 60);
	$aantalUren = floor($aantalMinuten / 60);
	$aantalDagen = floor($aantalUren / 24);
	$aantalWeken = floor($aantalDagen / 7);
	$aantalMaanden = floor($aantalDagen / 31);
	$aantalJaren = floor($aantalDagen / 365); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		<h1>Oplossing If-Else Deel 2</h1>
		<p><?= $aantalSeconden?> seconden = </p>
		<ul>
			<li><?= $aantalMinuten?> Minuten</li>
			<li><?= $aantalUren?> Uren</li>
			<li><?= $aantalDagen?> Dagen</li>
			<li><?= $aantalWeken?> Weken</li>
			<li><?= $aantalMaanden?> Maanden</li>
			<li><?= $aantalJaren?> Jaren</li>
		</ul>
		
	</head>
	<body>

	</body>
</html>