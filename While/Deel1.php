<?php
	$getallen = array();
	
	for ($i = 0; $i <= 100; $i++){
		$getallen[] = $i;
	}
	$reeks = implode(", ", $getallen);
	

	$getallen2 = array();
	for ($i = 0; $i <= 80; $i++){
		if ($i % 3 == 0 && $i > 40 && $i < 80){
			$getallen2[] = $i;
		}
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
		<h1>Oplossing while Deel 1</h1>
		<p>reeks 1 = <?=$reeks?></p>
		<p>reeks 2 = <?=$reeks2?></p>
	</body>
</html>