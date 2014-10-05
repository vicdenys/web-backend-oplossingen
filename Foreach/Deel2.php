<?php
	$text	=	file_get_contents( 'text-file.txt' );
	
	$textChars = str_split($text);
	asort($textChars);
	$textChars = array_map('strtolower', $textChars);	
	
	$aantal = array_count_values(array_intersect($textChars, range('a', 'z')));
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing foreach deel 2</h1>
		<pre><?=var_dump($aantal)?></pre>
	</body>
</html>