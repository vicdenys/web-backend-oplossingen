<?php
	$tafel = 0;
	$product = 1;
?>

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
		<h1>Oplossing while Deel 2</h1>
		<h3>Tabel</h3>
		
		<table>
			<?php while($tafel <= 10): ?>
			<tr>
				<?php $product = 1?>
				<?php while ($product <= 10): ?>
					<td class="<?= ( ( $tafel * $product ) % 2 > 0 ) ? : 'even' ?>"><?=$product * $tafel?></td>
					<?php $product++;?>
				<?php endwhile?>
			</tr>
			<?php $tafel ++; ?>
			<?php endwhile ?>
		</table>
		
	</body>
</html>