<?php
	
	session_start();
	
	$isauthenticated = false;
	$message = false;
	$_SESSION["registration"]["password"] = "";
	$_SESSION["registration"]["email"] = "";
	
	function __autoload($class) {
		require_once($class . '.php');
	}
	
	if(isset($_COOKIE["login"])){
		
		
		$explodedCookie = explode(",", $_COOKIE["login"]);
		$C_email = $explodedCookie[0];
		$C_hashedEmail = $explodedCookie[1];
		
		$connection = new PDO("mysql:host=localhost;dbname=OEF_CRUD_CMS", "root", "");
		$db = new Database($connection);
		$fetched = $db->query("SELECT * FROM users WHERE email = :email", array(":email" => $C_email));
		
		$hashedEmail = hash("SHA512", $fetched["data"][0]["salt"] . $C_email);
		
		if($hashedEmail == $C_hashedEmail){
			$isauthenticated = true;
		}
		else{
			setcookie("login", "", time() -3600);
		}
		
		
	}
	else{
	
		header("Location: login-form.php");
		
	}
	
	if(isset($_SESSION["artikel"]["notification"])){
		$message = $_SESSION["artikel"]["notification"];
	}
	
	$_SESSION["artikel"]["notification"] = "";

	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
		<link rel="stylesheet" href="http://oplossingen.web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://oplossingen.web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://oplossingen.web-backend.local/css/directory.css">
        
        <style>
	        
	        header a, header p{
		        display: inline;
	        }
	        
	        #Terug{
		        display: block;
		        margin-top: 30px;
	        }
	        
	        #toevoegen{
		        display: block;
		        margin-top: 40px;
	        }
	        
	        #titel, #artikel, #kernwoorden, #datum{
		        width: 400px;
		        height: 30px;
		        margin-top: 5px;
		        margin-bottom: 10px;
	        }
	        
	        #artikel{
		        height: 60px;
	        }
	        
        </style>
		
	</head>
	<body>
		<?php if($isauthenticated): ?>
		
			<header>
				<a href="dashboard.php">Terug naar Dashboard</a>
				<p> | Ingelogd als <?= $C_email?> | </p>
				<a href="logout.php">Uitloggen</a>
				<a id="Terug" href="artikels-overzicht.php">Terug naar overzicht</a>
 			</header>
		
			<h1>Artikel Toevoegen</h1>
			
			<p><?= $message ?></p>
			
			<form action="artikel-toevoegen-proces.php" method="post">
				
				<label for="titel">Titel</label>
				<input type="text" id="titel" name="titel"/>
				
				<label for="artikel">Artikel</label>
				<textarea id="artikel" name="artikel"></textarea>
				
				<label for="kernwoorden">Kernwoorden</label>
				<input type="text" id="kernwoorden" name="kernwoorden"/>
				
				<label for="datum">Datum (dd-mm-jjjj)</label>
				<input type="text" id="datum" name="datum"/>
				
				<input id="toevoegen" type="submit" value="Artikel toevoegen" name="toevoegen"/>
				
			</form>
			
		<?php endif; ?>	
	</body>
</html>
























