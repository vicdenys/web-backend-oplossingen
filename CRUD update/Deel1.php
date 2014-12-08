<?php
	
	$Message = "";
	$vraagDelete = false;
	$vraagEdit = false;
	$deleted = false;
	$edited = false;
	$nrDelete = false;

	try{
	
		$db = new PDO("mysql:host=localhost;dbname=bieren", "root", "");
		
		$fetched = fetchFromDB($db);
		
		
		/****************
		*	  EDIT		*
		****************/

		if(isset($_POST["edit"])){
			$vraagEdit = true;
			foreach($fetched as $array){
				if($array["brouwernr"] == $_POST["edit"]){
					$brouwerToEdit = $array;
				}
			}
		}
		
		if(isset($_POST["wijzigen"])){
			
			$query = "UPDATE `brouwers` 
							SET `brnaam`= :brnaam,
						        `adres`= :adres,
						        `postcode`= :postcode,
						        `gemeente`= :gemeente,
						        `omzet`= :omzet 
							WHERE brouwernr = :brouwernr";
			$statement = $db->prepare($query);
			$statement->bindParam(	":brnaam" ,$_POST["brnaam"]);
			$statement->bindParam(	":adres" ,$_POST["adres"]);
			$statement->bindParam(	":postcode" ,$_POST["postcode"]);
			$statement->bindParam(	":gemeente" ,$_POST["gemeente"]);
			$statement->bindParam(	":omzet" ,$_POST["omzet"]);
			$statement->bindParam(	":brouwernr" ,$_POST["brouwernr"]);
									
			$isEdit = $statement->execute();
			
			if($isEdit){
				$Message = "Aanpassing succesvol doorgevoerd."; 
				$fetched = fetchFromDB($db);
			}	
			else{
				$Message = "Aanpassing is niet gelukt. Probeer opnieuw of neem contact op met de systeembeheerder wanneer deze fout blijft aanhouden.";
			}
			
			$edited = true;			
			
		}
		
		
		/****************
		*	VERWIJDER	*
		****************/
				
		if(isset($_POST["confirm"])){
			$nrDelete = $_POST["confirm"];
			$vraagDelete = true;
		}
	
		if(isset($_POST["delete"])){
		
			$query = "DELETE FROM brouwers
							 WHERE brouwernr  = :brouwernr";
			
			$statement = $db->prepare($query);
			$statement->bindParam(":brouwernr", $_POST["delete"]);
			$isDelete = $statement->execute();
			
			if($isDelete){
				$Message = "De datarij werd goed verwijderd."; 
			}
			else{
				$Message = "Kon niet verwijdert worden.";
			}
			
			$fetched = fetchFromDB($db);
			$deleted = true;
		}
		
	}
	
	catch(PDOException $e){
		$errorMessage = "Fout: " . $e->getMessage();
	}
	
	
	function fetchFromDB($db){
		$query = "SELECT *
							FROM brouwers";
		
		$statement = $db->prepare($query);
		$statement->execute();
				
		$fetched = array();
				
		while ( $row = $statement->fetch( PDO::FETCH_ASSOC ))
		{
			$fetched[]	=	$row;
		}
		return $fetched;
	}
	
?>


<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
		<link href="style.css" rel="stylesheet" type="style/css"/>
	</head>
	<body>
	
		<?php if($vraagEdit): ?>
		
			<form action="<?= $_SERVER["PHP_SELF"]?>" method="post">
				
				<h1>Brouwerij <?= $brouwerToEdit["brnaam"] ?> (<?= $_POST["edit"]?>) wijzigen</h1>
				
				
				<?php foreach($brouwerToEdit as $key => $value): ?>
				
					<?php if($key != "brouwernr"): ?>
					
						<p><?= $key ?></p>
						<input type="text" name="<?= $key ?>" value="<?= $value?>" />
					
					<?php endif; ?>
				
				<?php endforeach; ?>
				
				<input type="hidden" name="brouwernr" value="<?= $_POST["edit"]?>"/>
				
				<input id="Zoeken" type="submit" name="wijzigen" value="wijzigen"/>
				
			</form>
		
		<? endif; ?>
		
		
		<h1>Overzicht van Bieren</h1>
		
		
		<?php if( $deleted || $edited): ?>
			<h3 id="message"><?= $Message?></h3>
		<?php endif; ?>
		
		<?php if($vraagDelete): ?>
		
			<form action="<?= $_SERVER["PHP_SELF"]?>" method="post" class="delete" >
			
				<h4>Weet u het zeker?</h4>
				<button type="submit" name="delete" value="<?= $nrDelete?>">JA</button>
				<button type="submit">NEE</button>
				
			</form>
		
		<?php endif; ?>
		
		
		<table class="tabel">
			<thead>
					<tr>
						<?php foreach($fetched[0] as $title => $value):?>
							<th>
								<?php echo $title ?>
							</th>
						<?php endforeach;?>
						
						<th></th>
						<th></th>
					</tr>
					
			</thead>
			<tbody>
				<?php foreach($fetched as $array):?>
					<tr class="<?= (isset($_POST["confirm"]) && $_POST["confirm"] == $array["brouwernr"])?  "rowToDelete" : "" ; ?>">
						<?php foreach($array as $key):?>
							<td>
								<?php echo $key ?>
							</td>
						<?php endforeach;?>
							<td>
								<form action="<?= $_SERVER["PHP_SELF"]?>" method="post">
									<input id="delete" type="submit" name="confirm" value=<?= $array["brouwernr"]?>>
								</form>
							</td>
							<td>
								<form action="<?= $_SERVER["PHP_SELF"]?>" method="post">
									<input id="edit" type="submit" name="edit" value=<?= $array["brouwernr"]?>>
								</form>
							</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</body>
</html>