<?php
	
	$beginBedrag = 100000;
	$rente = 8;
	$Jaren = 10;

	$antwoord = array();
	
	function berekenRentevoet($bedrag,$procent,$aantalJaren){
		global $antwoord;
		static $jaargang = 1;
	
		if ($aantalJaren == 0){return false;}
		else{
			$winst = $bedrag / 100 * $procent;
			$totaal = $bedrag + $winst;
			$antwoord[] = 'Na ' . $jaargang . ' jaar bedraagt het totaal bedrag  €' . floor($totaal) . ' en is de winst van dat jaar €' . floor($winst);
			$aantalJaren--;
			$jaargang++;
			berekenRentevoet($totaal,$procent,$aantalJaren);
		}
	}

	
	berekenRentevoet($beginBedrag,$rente,$Jaren);
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing Recursive deel 1</h1>
		<?php foreach($antwoord as $value): ?>
			<p><?= $value ?></p>
		<?php endforeach ?>
	</body>
</html>