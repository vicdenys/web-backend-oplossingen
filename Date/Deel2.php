<?php
	setlocale(LC_ALL, 'nl_NL');

	date_default_timezone_set('Europe/Brussels');
	$timeS1 = mktime(22, 35, 25, 1, 21, 1904);
	$time = strftime("%e %B %Y, %r", $timeS1);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing Date</title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing Date Deel 2</h1>
		<p><?= $timeS1?></p>
		<p><?= $time?></p>
	</body>
</html>