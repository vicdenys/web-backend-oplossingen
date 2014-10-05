<?php
	$getallen = array(8, 7, 8, 7, 3, 2, 1, 2, 4);
	
	$result = array_unique($getallen);
	
	arsort($result);
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing Array functions Deel 3</h1>
		<pre><?=var_dump($result)?>
	</body>
</html>