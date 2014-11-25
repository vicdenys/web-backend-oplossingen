<?php
	
	$errorMessage = "";
	
	try{
		$db = new PDO("mysql:host=localhost;dbname=bieren", "root", "");
		
		$query = "SELECT `brouwers`.`brouwernr`, `brouwers`.`brnaam` 
						FROM `brouwers`";
		
		$statement = $db->prepare($query);
		$statement->execute();
		
		$fetched = array();
		
		while ( $row = $statement->fetch( PDO::FETCH_ASSOC ))
		{
			$fetched[]	=	$row;
		}
		
		if (isset($_GET["brouwerNr"]) && $_GET["brouwerNr"] != ""){
			
			$db = new PDO("mysql:host=localhost;dbname=bieren", "root", "");
		
			$query = "SELECT bieren.naam 
						FROM bieren 
						WHERE bieren.brouwernr = :brouwernr";
			
			$statement = $db->prepare($query);
			$statement->bindParam(':brouwernr', $_GET['brouwerNr']);
			$statement->execute();
			
			$fetchedbier = array();
			
			while ( $row = $statement->fetch( PDO::FETCH_ASSOC ))
			{
				$fetchedbier[]	=	$row;
			}
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
		<form action="Deel2.php" method="get">
			<select name="brouwerNr">
				<?php foreach($fetched as $key => $brouwer):?>
					<option
							<?php if(isset($_GET["brouwerNr"])): 
									if($brouwer["brouwernr"] == $_GET["brouwerNr"]):?>
										selected 
							<?php 	endif;
								  endif?>
					 	value="<?= $brouwer["brouwernr"]?>">
					 	<? echo $brouwer["brnaam"]?>
					</option>
				<?php endforeach;?>
			</select>
			<input type="submit" value="Zoek Bieren"/>
		</form>
		
		<?php if (isset($_GET["brouwerNr"]) && $_GET["brouwerNr"] != ""): ?>
		
		<table class="tabel">
			<thead>
					<tr>
						<?php foreach($fetchedbier[0] as $title => $value):?>
							<th>
								<?php echo $title ?>
							</th>
						<?php endforeach;?>
					</tr>
			</thead>
			<tbody>
				<?php foreach($fetchedbier as $array):?>
					<tr>
						<?php foreach($array as $key):?>
							<td>
								<?php echo $key ?>
							</td>
						<?php endforeach;?>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
		
		<?php endif; ?>
	</body>
</html>