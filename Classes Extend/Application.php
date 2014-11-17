<?php

	function __autoload($class){
		include "Class/" . $class . ".php";
	}
	
	$animal1 = new Animal("marsupilami","male", 100);
	$animal2 = new Animal("baloo","male", 150);
	$animal3 = new Animal("guppy","male", 5);
	
	$animal3->changeHealth(50);
	$animal2->changeHealth(-35);
	
	$lion1 = new Lion("mufasa", "male", 0, "springleeuw");
	$lion2 = new Lion("muppa", "male", 20, "slaapleeuw");
	
	$zebra1 = new Zebra("kliklik", "male", 30, "Klokzebra");
	$zebra2 = new Zebra("meeuw", "female", 50, "Meeuwzebra");
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Instanties animals</h1>
		<p><?= $animal1->getName()?> is van het geslacht <?= $animal1->getGender()?> en heeft momenteel <?= $animal1->getHealth()?> levenspunten</p>
		<p><?= $animal2->getName()?> is van het geslacht <?= $animal2->getGender()?> en heeft momenteel <?= $animal2->getHealth()?> levenspunten</p>
		<p><?= $animal3->getName()?> is van het geslacht <?= $animal3->getGender()?> en heeft momenteel <?= $animal3->getHealth()?> levenspunten</p>
		
		<h1>Instanties Lion</h1>
		<p>De speciale move van <?= $lion1->getName()?> (soort: <?= $lion1->getSpecies()?>): <?= $lion1->doSpecialMove()?></p>
		<p>De speciale move van <?= $lion2->getName()?> (soort: <?= $lion2->getSpecies()?>): <?= $lion2->doSpecialMove()?></p>
		
		<h1>Instanties Zebra</h1>
		<p>De speciale move van <?= $zebra1->getName()?> (soort: <?= $zebra1->getSpecies()?>): <?= $zebra1->doSpecialMove()?></p>
		<p>De speciale move van <?= $zebra2->getName()?> (soort: <?= $zebra2->getSpecies()?>): <?= $zebra2->doSpecialMove()?></p>
	</body>
</html>