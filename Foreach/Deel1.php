<?php
	$text	=	file_get_contents( 'text-file.txt' );
	
	$textChars = str_split($text);
	rsort($textChars);
	$reverseChars = array_reverse($textChars);
	
	$aantalkeer = array();
	foreach($reverseChars as $value){
		if (array_key_exists($value, $aantalkeer)){
			$aantalkeer[$value] += 1;
		}
		else
		{
			$aantalkeer[$value] = 1;
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing foreach deel 1</h1>
		<pre><?=var_dump($aantalkeer)?></pre>
	</body>
</html>