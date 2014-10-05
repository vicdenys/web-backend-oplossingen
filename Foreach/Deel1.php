<?php
	$text	=	file_get_contents( 'text-file.txt' );
	
	$textChars = str_split($text);
	rsort($textChars);
	$reverseChars = array_reverse($textChars);
	
	$aantal = array();
	foreach($reverseChars as $value)
	{
		if ( isset ( $aantal[ $value ] ) )
		{
			++$aantal[ $value ];
		}
		else
		{
			$aantal[ $value ] = 1;
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
		<pre><?=var_dump($aantal)?></pre>
	</body>
</html>