<?php
	$pigHealth = 5;
	$maximumThrows = 8;
	$spel = array();
	
	function CalculateHit(){
		$raakKans = rand(1,10);
		global $pigHealth;
		
		if ($raakKans <= 4){
			$pigHealth--;
			if($pigHealth == 0){return  'Raak! Er zijn geen varkens over.';}
			else if($pigHealth ==1){return  'Raak! Er is nog maar '. $pigHealth .' varken over.';}
			else{return  'Raak! Er zijn nog maar '. $pigHealth .' varkens over.';}
		}
		else{
			if($pigHealth ==1){return  'Mis! Nog '. $pigHealth .' varken in het team.';}
			else{return  'Mis! Nog '. $pigHealth .' varkens in het team.';}
		}
	}
	
	function launchAngryBird(){
		static $timesCalled = 0;
		global $pigHealth;
		global $maximumThrows;
		global $spel;
		
		if($timesCalled < $maximumThrows && $pigHealth !== 0){
			$spel[] = CalculateHit();
			$maximumThrows--;
			launchAngryBird();
		}
		else{
			if($pigHealth == 0){
				$spel[] = "Gewonnen";
			}
			else{
				$spel[] = "Verloren";
			}
		}
	}
	
	launchAngryBird();
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing Functies gevorderd deel 2</h1>
		<?php foreach($spel as $value): ?>
			<p><?= $value?></p>
		<?php endforeach;?>
	</body>
</html>