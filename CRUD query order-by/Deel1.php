<?php

	$queryconc = false;
	
	try{
	
			$db = new PDO( "mysql:host=localhost;dbname=bieren" , "root" , "" );
			
			
			
			if(isset($_GET["name"])){
				$array = explode("-", $_GET["name"]);
				$elementToOrder = $array[0];
				$howToOrder = $array[1];
				$howToOrderUP = strtoupper($howToOrder);
				
				$queryconc = "ORDER BY bieren." . $elementToOrder . " " . $howToOrderUP . "";
			}
			
			
			
			$query = "SELECT *
							FROM bieren ";
							
							
			$query = $query . $queryconc;				
							
			$statement = $db->prepare($query);
			$statement->execute();
					
			$fetched = array();
					
			while ( $row = $statement->fetch( PDO::FETCH_ASSOC ))
			{
				$fetched[]	=	$row;
			}
	}
	
	catch(PDOException $e){
		
		$message = "Fout: " . $e->getMessage();
		
	}
	
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Order-by</title>
		<meta charset="utf-8"/>
		
		<link rel="stylesheet" type="style/css" href="style.css"/>
		
	</head>
	<body>
		
		<h1>Overzicht van bieren</h1>
		
		
		<table>
			
			<thead>
					<tr>
						<?php foreach($fetched[0] as $title => $value):?>
							<th>
								<?php
									
									if(isset($_GET["name"]) && $elementToOrder == $title){
										if($howToOrder == "desc"){
											$order = "-asc";
										}
										else{
											$order = "-desc";
										}
									}
									else{
										$order = "-asc";
									}
									
								?>
								<a href="Deel1.php?name=<?= $title . $order ?>">
									<?php echo $title ?> 
									<img src="icon<?= $order?>.png"/>
								</a>
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


















