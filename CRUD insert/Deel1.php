<?php
	
	$Message = "";
	
	if (isset($_POST) && $_POST != null){
		
		try{
			
			$db = new PDO("mysql:host=localhost;dbname=bieren", "root", "");
			
			$query = "INSERT INTO brouwers ( brnaam, adres, postcode, gemeente, omzet)
						VALUES ( :brnaam, :adres, :postcode, :gemeente, :omzet)";
						
			$statement = $db->prepare($query);
			
			$statement->bindValue(":brnaam", $_POST["brnaam"]);
			$statement->bindValue(":adres", $_POST["adres"]);
			$statement->bindValue(":postcode", $_POST["postcode"]);
			$statement->bindValue(":gemeente", $_POST["gemeente"]);
			$statement->bindValue(":omzet", $_POST["omzet"]);
			
			$statement->execute();
			
			$number = $db->lastInsertId();
			
			$Message = "Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is " . $number;
		}
		
		catch(PDOException $e){
			
			$Message = "Fout: " . $e->getMessage();
			
		}
		
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
		<style>
			input{
				display: block;
				margin-top: -15px;
			}
			input:nth-child(11){
				margin-top: 20px;
			}
			
		</style>
		
	</head>
	<body>
		
		<h1>Voeg een brouwer toe!</h1>
		
		<form action="Deel1.php" method="post">
			
			<p>Brouwernaam</p>
			<input type="text" name="brnaam"/>
			
			<p>adres</p>
			<input type="text" name="adres"/>
			
			<p>postcode</p>
			<input type="text" name="postcode"/>
			
			<p>gemeente</p>
			<input type="text" name="gemeente"/>
			
			<p>omzet</p>
			<input type="text" name="omzet"/>
			
			<input type="submit" name="submit" value="Zoeken"/>
			
			
			<p><?= $Message?></p>
		</form>

	</body>
</html>