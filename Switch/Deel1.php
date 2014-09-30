<?php
	$getalDag = rand(1,7);
	
	switch ($getalDag)
	{
		case 1:
			$dag = "maandag";
			break;
		case 2:
			$dag = "dinsdag";
			break;
		case 3:
			$dag = "woensdag";
			break;
		case 4:
			$dag = "donderdag";
			break;
		case 5:
			$dag = "vrijdag";
			break;
		case 6:
			$dag = "zaterdag";
			break;
		case 7:
			$dag = "zondag";
			break;
		default:
			$dag = "geen dag";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing Switch Deel 1</h1>
		<p>Vandaag is het <?=$dag?>.</p>
	</body>
</html>