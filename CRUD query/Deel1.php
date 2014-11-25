<?php
	
	$errorMessage = "";
	
	try{
		$db = new PDO("mysql:host=localhost;dbname=bieren", "root", "");
		
		$query = "SELECT *
							FROM bieren
							INNER JOIN brouwers
							ON bieren.brouwernr = brouwers.brouwernr
							WHERE bieren.naam LIKE 'du%'
							AND brouwers.brnaam LIKE '%a%'";
		
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
		
		<table class="tabel">
			<thead>
					<tr>
						<?php foreach($fetched[0] as $title => $value):?>
							<th>
								<?php echo $title ?>
							</th>
						<?php endforeach;?>
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
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</body>
</html>