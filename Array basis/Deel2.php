<?php
	$getallen = array(1,2,3,4,5);
	$product = array_product($getallen);
	
	$onevenGetallen = array_filter($getallen, function ($input) {return $input & 1;});
	
	$getallen2 = array(5,4,3,2,1);
	$somGetallen;
	
	for ($i = 0; $i< 5; $i++)
	{
		$somGetallen[$i] = $getallen[$i] + $getallen2[$i];
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing Array Basis Deel 2</h1>
		<p>Som van values in $getallen <?= $product?></p>
		<h3>oneven getallen in $getal</h3>
		<pre><?=var_dump($onevenGetallen)?></pre>
		<h3>som van $getallen en $getallen2</h3>
		<pre><?=var_dump($somGetallen)?></pre>
	</body>
</html>