<?php
	session_start();
	
	
	if(isset($_COOKIE["login"])){
		
		header("Location: dashboard.php");
		
	}
	
	function __autoload($class) {
		require_once($class . '.php');
	}
	
	
	// EMAIL ERROR TERUG LEEG MAKEN
	$_SESSION["registration"]["notification"] = null;

	
	if(isset($_POST["genPas"])){
		$password = generatePassword(8);
	
		$_SESSION["registration"]["password"] = $password;
		$_SESSION["registration"]["email"] = $_POST["email"];
			
		header("Location: registratie-form.php");
	}
	
	if(isset($_POST["registreer"])){
	
	
		$_SESSION["registration"]["email"] = $_POST["email"];
		$_SESSION["registration"]["password"] = $_POST["password"];
		
		$email = $_POST["email"];
		$password = $_POST["paswoord"];
		
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			
			try{
			
				$connection = new PDO("mysql:host=localhost;dbname=OEF_CRUD_CMS", "root", "");
				$db = new Database($connection);
				$fetched = $db->query("SELECT * FROM users WHERE email = :email", array(":email" => $email));
				
				if($fetched["data"]){
					
					$_SESSION["registration"]["notification"]["EMAIL_EXISTS"] = "Dit email adres bestaat al.";
					
					header("Location: registratie-form.php");	
					
				}
				else{
				
					$salt = uniqid(mt_rand(), true);
					$hashed_password = hash("SHA512", $salt . $password);
					$hashed_email = hash("SHA512", $salt . $email);
					
					try{
						
						$fetched = $db->query("INSERT INTO users ( email, salt, hashed_password, last_login_time)
									VALUES ( :email, :salt, :hashed_password, NOW())",
									array(":email"=> $email,":salt"=> $salt,":hashed_password"=> $hashed_password));
									
						if($fetched["isexexuted"]){
							
							setcookie("login", $email . "," . $hashed_email, time() + 60*60*24*30);
							
							header("Location: dashboard.php");
							
						}
						
					}
					
					catch(PDOException $e){
						
						$_SESSION["registration"]["notification"]["CONNECTION"] = "Fout bij connectie database:". $e->getMessage();
						header("Location: registratie-form.php");
						
					}
					
				}
				
			}
			
			catch(PDOException $e){
				
				$_SESSION["registration"]["notification"]["CONNECTION"] = "Fout bij connectie database:". $e->getMessage();
				header("Location: registratie-form.php");
				
			}
			
			
		}
		else{
			$_SESSION["registration"]["notification"]["EMAIL_ERROR"]  = "Geen geldig paswoord";
			
			header("Location: registratie-form.php");
		}
	}
	
	
	
	
	
	function generatePassword($length){
		$char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTuvWXYZ1234567890";
		$password = "";
		
		for($i = 0; $i < $length; $i++){
			$randomnr = rand(0,61);
			$password = $password . substr($char, $randomnr,1);
		}
		
		return $password;
	}
	
	
?>