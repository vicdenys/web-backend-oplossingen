<?php
	
	$Message = "";
	
	try{
	
		$db = new PDO("mysql:host=localhost;dbname=bieren", "root", "");
	
		if(isset($_POST["delete"])){
			
		
			$query = "DELETE FROM bieren.brouwers
							 WHERE brouwers.brouwernr  = :brouwernr";
			
			$statement = $db->prepare($query);
			$statement->bindParam(":brouwernr", $_POST["delete"]);
			$isDelete = $statement->execute();
			
			if($isDelete){
				$Message = "De datarij werd goed verwijderd."; 
			}
			else{
				$Message = "Kon niet verwijdert worden.";
			}
		}
		
		$query = "SELECT *
							FROM brouwers";
		
		$statement = $db->prepare($query);
		$statement->execute();
		
		$fetched = array();
		
		while ( $row = $statement->fetch( PDO::FETCH_ASSOC ))
		{
			$fetched[]	=	$row;
		}
		
		

	}
	
	catch(PDOException $e){
		$errorMessage = "Fout: " . $e->getMessage();
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
		<h1>Overzicht van Bieren</h1>
		
		<h3><?= $Message?></h3>
		
		<table class="tabel">
			<thead>
					<tr>
						<?php foreach($fetched[0] as $title => $value):?>
							<th>
								<?php echo $title ?>
							</th>
						<?php endforeach;?>
						
						<th></th>
					</tr>
					
			</thead>
			<tbody>
				<?php foreach($fetched as $array):?>
					<tr>
						<?php foreach($array as $key):?>
							<td>
								<?php echo $key ?>
							</td>
						<?php endforeach;?>
							<td>
								<form action="Deel1.php" method="post">
									<input type="submit" name="delete" value=<?= $array["brouwernr"]?>>
								</form>
							</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</body>
</html>