<?php
	session_start();
	
	function generatePassword($length){
		$char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTuvWXYZ1234567890";
		$password = "";
		
		for($i = 0; $i < $length; $i++){
			$randomnr = rand(0,61);
			$password = $password . substr($char, $randomnr,1);
		}
		
		return $password;
	}
	
	if(isset($_POST["genPas"])){
		$password = generatePassword(8);
	
		$_SESSION["registration"]["password"] = $password;
		$_SESSION["registration"]["email"] = $_POST["email"];		
		header("Location: registratie-form.php");
	}
	
	
	
?>