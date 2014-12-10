<?php

	session_start();
	
	function __autoload($class) {
		require_once($class . '.php');
	}
	
	if(isset($_POST["toevoegen"])){
		
		try{
		
			$time = strtotime($_POST["datum"]);

			$newFormatDate = date('Y-m-d', $time);
			
			$connection = new PDO("mysql:host=localhost;dbname=OEF_CRUD_CMS", "root", "");
			$db = new Database($connection);
			$fetched = $db->query(	"INSERT INTO artikels ( titel, artikel, kernwoorden, datum) 
									 VALUES ( :titel, :artikel, :kernwoorden, :datum)",
									 array(":titel" => $_POST["titel"],":artikel" => $_POST["artikel"],":kernwoorden" => $_POST["kernwoorden"],
									 		":datum" => $newFormatDate));
									 		
			if($fetched["isexexuted"]){
				
				$_SESSION["artikel"]["notification"] = "Het artikel werd succesvol toegevoegd";
				
				header("Location: artikels-overzicht.php");
				
			}
			else{
				
				$_SESSION["artikel"]["notification"] = "Het artikel kon niet toegevoegd worden";
				
				header("Location: artikel-toevoegen-form.php");
				
			}
			
		}
		catch(PDOException $e){
		
			$_SESSION["artikel"]["notification"] = "Fout bij connectie database:". $e->getMessage();
			header("Location: artikel-toevoegen-form.php");
			
		}
		
	}
	
	
?>