<?php 
	
	session_start();
	
	if(isset($_COOKIE["login"])){
	
		setcookie("login", "", time() -3600);
		$_SESSION["registration"]["notification"]["LOGOUT"] = "U bent uitgelogd. Tot de volgende keer";
		header("Location: login-form.php");
		
	}
	else{
	
		header("Location: login-form.php");
		
	}
	
?>