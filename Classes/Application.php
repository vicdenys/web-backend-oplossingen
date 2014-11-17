<?php
	function __autoload($class){
		include "class/" . $class . ".php";
	}
	
	$perc = new Percent(150,100);
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<p>Hoeveel procent is 150 van 100?</p>
		<table>
			<tr>
				<td><p>Absoluut</p></td>
			</tr>
			<tr>
				<td><p>Relatief</p></td>
			</tr>
			<tr>
				<td><p>Geheel getal</p></td>
			</tr>
			<tr>
				<td><p>Nominaal</p></td>
			</tr>
		</table>
	</body>
</html>