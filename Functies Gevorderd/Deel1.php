<?php
	$md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';
	$teZoeken1 = '2';
	$teZoeken2 = '8';
	$teZoeken3 = 'a';
	
	function TelChar1($teZoeken, $string){
		return (substr_count($string, $teZoeken)/strlen($string))*100;	
	}
	
	function TelChar2($teZoeken){
		global $md5HashKey;
		return (substr_count($md5HashKey, $teZoeken)/strlen($md5HashKey)) *100;
	}
	
	function TelChar3($teZoeken){
		$string = $GLOBALS['md5HashKey'];
		return (substr_count($string, $teZoeken)/strlen($string))*100;
	}
	
	$oplossing1 = TelChar1($teZoeken1, $md5HashKey);
	$oplossing2 = TelChar2($teZoeken2);
	$oplossing3 = TelChar3($teZoeken3);
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Oplossing Functies gevorderd deel 1</h1>
		<p><?=$teZoeken1?> komt <?=$oplossing1?>% keer voor in "<?=$md5HashKey?>".</p>
		<p><?=$teZoeken2?> komt <?=$oplossing2?>% keer voor in "<?=$md5HashKey?>".</p>
		<p><?=$teZoeken3?> komt <?=$oplossing3?>% keer voor in "<?=$md5HashKey?>".</p>
	</body>
</html>