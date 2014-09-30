<?php
	$jaartal = 1914;
	if ($jaartal%4 == 0){
		if ($jaartal % 400 == 0){
			$soortJaar = "een schrikkeljaar";
		}
		else if($jaartal %100 == 0){
			$soortJaar = "geen schrikkeljaar";
		}
		else{
			$soortJaar = "een schrikkeljaar";
		}
	}
	else{
		$soortJaar = "geen schrikkeljaar";
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing If-Else Deel 1</h1>
		<p>het jaar <?=$jaartal?> is <?=$soortJaar?></p>
	</body>
</html>