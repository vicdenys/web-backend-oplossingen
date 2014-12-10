<?php 
	
	session_start();
	
	function __autoload($class) {
		require_once($class . '.php');
	}
	
	if(isset($_GET["artikel"])){
	
		try{
			
			$connection = new PDO("mysql:host=localhost;dbname=OEF_CRUD_CMS", "root", "");
			$db = new Database($connection);
			$fetched = $db->query("UPDATE artikels SET is_active = IF(is_active =1, 0, 1) WHERE `id` = " . $_GET["artikel"]);
			
			if($fetched["isexexuted"]){
				$_SESSION["artikel"]["notification"] = "artikel is succesvol geactiveerd.";
				
				header("Location: artikels-overzicht.php");
			}
			else{
				$_SESSION["artikel"]["notification"] = "Kon artikel niet activeren.";
				
				header("Location: artikels-overzicht.php");
			}
			
		}
		catch(PDOException $e){
		
			$_SESSION["artikel"]["notification"] = "Fout bij connectie database:". $e->getMessage();
			header("Location: artikels-overzicht.php");
			
		}
		
	}
	else{
		
		$_SESSION["artikel"]["notification"] = "Er is een probleem.";
				
		header("Location: artikels-overzicht.php");
		
	}
	
?>