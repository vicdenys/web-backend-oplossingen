<?php
	$artikels = array(
		array(	'titel'=>'Mogelijke eerste besmetting met ebola in Spanje',
				'datum'=>'6/10/14',
				'inhoud'=>'Een verpleegster in een Madrileens ziekenhuis, die een ebolapatiënte had verzorgd, is mogelijk met het virus besmet. Een eerste test heeft een positieve diagnose gegeven. Dat is vandaag in kringen van het Spaanse ministerie van Gezondheid vernomen. Een tweede test moet de infectie bevestigen. Het zou het eerste geval van een besmetting met ebola binnen Spanje zijn -en ook in Europa. De Spaanse gezondheidszorg richtte onmiddellijk een crisiscel op. De epidemie in West-Afrika was eind vorig jaar begonnen, intussen zijn al ruim 3.000 doden geteld.
De verpleegster had de Spaanse geestelijke Manuel García Viejo verzorgd, die in Sierra Leona met ebola was besmet geraakt en met een vliegtuig van de Spaanse luchtmacht naar zijn geboorteland werd overgebracht. De 69-jarige patiënt overleed op 25 september in Madrid. Eerder was al een andere Spaanse missionaris in Madrid aan ebola gestorven. Hij raakte in Liberia besmet en werd toen eveneens overgebracht naar eigen land.',
				'afbeelding'=> 'Ebola.jpg',
				'afbeeldingBeschrijving'=>'Dokters en verpleegsters in het ziekenhuis La Paz-Carlos III bereidden zich voor op de behandeling van de intussen overleden geestelijke Manuel Garcia Viejo vorige maand.'),
		array(	'titel'=>'"Onderhandelingen in laatste rechte lijn"',
				'datum'=>'6/10/14', 
				'inhoud'=>'De voorzitters van N-VA, MR, CD&V en Open Vld zitten sinds 14.30 uur opnieuw met de twee coformateurs Charles Michel en Kris Peeters samen in het voorzitterschap van de Kamer voor de opmaak van de begroting. Michel en Peeters maakten zich sterk dat men in de laatste recht lijn zit en dat het bedoeling is de begrotingsbesprekingen deze avond, nacht of dinsdagochtend af te ronden.
"Dit is de laatste rechte lijn", zei Charles Michel bij zijn aankomst aan de RTBF. Afgelopen weekend waren er heel wat contacten waarbij Michel een centrale rol speelde. "Bij alle partners is er een sterke wil om een regeerakkoord te sluiten, zo is me dit weekend bevestigd", voegde hij eraan toe. 
Het is de eerste maal dat de coformateurs en de partijvoorzitters opnieuw officieel rond tafel zitten na de aanvaring tussen CD&V-voorzitter Wouter Beke en zijn Open Vld-collega Gwendolyn Rutten vorige dinsdagavond. Bij hun aankomst wilden geen van de partijvoorzitters iets kwijt. Didier Reynders, die namens MR aan tafel zit, was voorzichtiger dan zijn partijvoorzitter/coformateur en sloot niet uit dat er twee dagen nodig zijn om de begroting op te maken. "Ik wil geen snel akkoord, maar een goed akkoord", zei hij.
Uitzonderlijk kreeg de wachtende pers toch Bart De Wever te zien. De N-VA-voorzitter komt meestal via de achterkant van de Kamer binnen, maar kwam toch naar buiten om een "overlevingspakket" voor de lange onderhandelingsnacht op te pikken die een ploeg van De Ideale Wereld (Vier) uitdeelde aan alle partijvoorzitters. Enig commentaar voor de wachtende journalisten kon er evenwel niet af.', 
				'afbeelding'=>'Regering.jpg', 
				'afbeeldingBeschrijving'=>'photo news.'),
		array(	'titel'=>'Hairgate: wie heeft er nog scheermachine nodig met iPhone 6?',
				'datum'=>'6/10/14', 
				'inhoud'=>'Aan "gates" geen gebrek bij de nieuwe iPhone. Na de fameuze bendgate maken nu de hashtags #hairgate en #beardgate furore. Wat er aan de hand is? Blijkbaar blijven de haren van de gebruikers nogal vaak plakken tussen de spleten in het frame, voornamelijk waar het aluminium het glas raakt. Resultaat: een gratis epileersessie, niet zo handig dus voor al die hippe vogels die wel eens met een trendy baardje durven rondlopen.
"Ik maak me zorgen om mijn Iphone 6 Plus, die blijft maar haren uitrukken als ik ermee bel", klinkt het onder meer. Of nog: "Al die grapjes over #hairgate zijn wel leuk, maar dit is echt wel een probleem. Ik ben enkele haren van mijn sik kwijt. En dat doet pijn!"', 
				'afbeelding'=>'Scheren.jpg', 
				'afbeeldingBeschrijving'=>'Twitter.')
				
	);
	
	$individueelArtikel		=	false;
	$nietBestaandArtikel	=	false;
	
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		
		if ( array_key_exists($id , $artikels)){
			$artikels 			= 	array( $artikels[$id] );
			$individueelArtikel	=	true;
		}
		else{
			$nietBestaandArtikel	=	true;
		}	
	}
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<?php if ( !$individueelArtikel ): ?>
			<title>Oplossing get: deel1</title>
		<?php elseif ( $nietBestaandArtikel ): ?>
			<title>Oplossing get: deel1 - Het artikel met id <?php echo $id ?> bestaat niet</title>
		<?php else: ?>
			<title>Oplossing get: deel1. Artikel: <?php echo $artikels[0]['titel'] ?></title>
		<?php endif ?>
			
		<meta charset="utf-8"/>
		
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>Oplossing Get</h1>
		
		
		<?php if ( !$nietBestaandArtikel ): ?>
			<div id="container">
			<?php foreach($artikels as $key => $artikel):?>
			<article class="<?php echo ( !$individueelArtikel ) ? 'meer': 'een' ; ?>">
				<h3><?= $artikel['titel'] ?></h3>
				<p class="datum"><?= $artikel['datum'] ?></p>
				<img src="img/<?=$artikel['afbeelding']?>"/>
				<p class="tekst"><?php echo ( !$individueelArtikel ) ? str_replace ( "\r\n", "</p><p>", substr( $artikel['inhoud'], 0, 50 ) ) . '...': str_replace ( "\r\n", "</p><p>",$artikel['inhoud'] ) ; ?></p>
				
				<?php if ( !$individueelArtikel ): ?>
					<a href="home.php?id=<?php echo $key ?>">lees meer</a>
				<?php endif ?>
			</article>
			<?php endforeach; ?>
			</div>
		<?php else: ?>
		<p>Het artikel met id <?php echo $key ?> bestaat niet. Probeer een ander artikel.</p>
		<?php endif ?>
			
	</body>
</html>





























