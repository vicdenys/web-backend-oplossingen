<?php
	date_default_timezone_set('Europe/Brussels');
	$timeS1 = mktime(22, 35, 25, 1, 21, 1904);
	$time = date("d F o\, h:i:s a",$timeS1)
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing Date</title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing Date Deel 1</h1>
		<p><?= $timeS1?></p>
		<p><?= $time?></p>
	</body>
</html>