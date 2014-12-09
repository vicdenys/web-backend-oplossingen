<?php 

	if(isset($_COOKIE["login"])){
		
		header("Location: dashboard.php");
		
	}

	function __autoload($class) {
		require_once($class . '.php');
	}

	session_start();
	
	$_SESSION["registration"]["notification"] = null;
	$_SESSION["registration"]["password"] = null;
	$_SESSION["registration"]["email"] = null;
	
	if(isset($_POST["Inloggen"])){
		
		$email = $_POST["email"];
	
		$connection = new PDO("mysql:host=localhost;dbname=OEF_CRUD_CMS", "root", "");
		$db = new Database($connection);
		$fetched = $db->query("SELECT * FROM users WHERE email = :email", array(":email" => $email));
		
		if($fetched["data"]){
						
			$salt = $fetched["data"][0]["salt"];
			$email = $fetched["data"][0]["email"];
			$passwod = $_POST["paswoord"];
			$hashed_password = hash("SHA512", $salt . $passwod);
			$hashed_email = hash("SHA512", $salt . $email);
			
			if($hashed_password == $fetched["data"][0]["hashed_password"]){
			
				setcookie("login", $email . "," . $hashed_email, time() + 60*60*24*30);
							
				header("Location: dashboard.php");
				
			}
			else{
			
				$_SESSION["registration"]["notification"]["NOT"] = "E-mail of wachtwoord onjuist";
				$_SESSION["registration"]["password"] = $_POST["paswoord"];
				$_SESSION["registration"]["email"] = $_POST["email"];
				
				header("Location: login-form.php");
				
			}
			
		}
		else{
			
			$_SESSION["registration"]["notification"]["NOT"] = "E-mail of wachtwoord onjuist";
			
			header("Location: login-form.php");
			
		}
		
	}
?>