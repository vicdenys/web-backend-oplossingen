<?php
	function berekenSom($getal1, $getal2){
		return $getal1 + $getal2;
	}
	function vermenigvuldig($getal1, $getal2){
		return $getal1 * $getal2;
	}
	function isEven($getal1){
		if($getal1%2>0){
			return false;
		}
		else{
			return true;
		}
	}
	function lengthUpper($string){
		$leUp = array();
		$leUp[] = count($string);
		$leUp[] = strtoupper($string);
		return $leUp;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing functies deel 1</h1>
		<p>234 + 3453 = <?=berekenSom(234, 3453)?></p>
		<p>345 * 345 = <?=vermenigvuldig(345, 345)?></p>
		<p>Is 5 even? <?=(isEven(5)? 'Ja' : 'Nee')?></p>
		<pre><?= var_dump(lengthUpper("ajuinen"))?></pre>
	</body>
</html>