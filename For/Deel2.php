<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
		<style>
			.even{
				background-color: green;
			}
		</style>
	</head>
	<body>
		<h1>Oplossing for deel 2</h1>
		<table>
			<?php for($i=0;$i<=10;$i++):?>
				<tr>
					<?php for($e = 0; $e<=10;$e++):?>
						<td class=<?= (($e*$i)%2 > 0) ?:"even"?>><?=$i*$e?></td>
					<?php endfor?>
				</tr>
			<?php endfor?>
		</table>
	</body>
</html>