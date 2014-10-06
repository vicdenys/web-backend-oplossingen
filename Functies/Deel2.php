<?php
	function drukArrayaf($array)
	{
		$contain = array();
		foreach($array as $key => $value)
		{
			$contain[] = $array . "[".$key."]" . " heeft waarde " . $value;
		}
		
		foreach($contain as $value){
			?> <p> <?php echo $value; ?> </p> <?php
		}   
		return $contain;
	}
	$dieren = array("muis","kat");
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$Tester = "<html>hey</html>";
	
	function validateHtmlTag($html) {
		if (strpos($html, '<html>') !== false && strpos($html, '</html>') !== false) {
			return true;
		}
		else{
			return false;
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing functies deel 2</h1>
		<p><?php drukArrayaf($dieren) ?></p>
		<p><?php echo $Tester . ' is '; echo validateHtmlTag($Tester) ? 'valid': 'niet valid'; ?></p>
	</body>
</html>