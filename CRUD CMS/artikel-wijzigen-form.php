<?php 
	
	$message = false;

	session_start();
	
	$isauthenticated = false;
	
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
	
	
	$artikel = $db->query("SELECT * FROM artikels WHERE id = :id", array(":id" => $_GET["artikel"]));
	
	$artikel = $artikel["data"][0];
	
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
	        
	        #wijzigen{
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
 			</header>
		
			<h1>Artikel Wijzigen</h1>
			
			<p><?= $message ?></p>
			
			
			<form action="artikel-wijzigen.php" method="post">
				
				<label for="titel">Titel</label>
				<input id="titel" name="titel" type="text" value="<?= $artikel["titel"] ?>"/>
				
				<label for="artikel">Artikel</label>
				<textarea id="artikel" name="artikel" ><?= $artikel["artikel"] ?></textarea>
				
				<label for="kernwoorden">Kernwoorden</label>
				<input id="kernwoorden" name="kernwoorden" type="text" value="<?= $artikel["kernwoorden"] ?>"/>
				
				<label for="datum">Datum (dd-mm-jjj)</label>
				<input id="datum" name="datum" type="text" value="<?= $artikel["datum"] ?>"/>
				
				<input type="hidden" name="id" value="<?= $artikel["id"] ?>"/>
				
				<input type="submit" id="wijzigen" value="Wijzigen" name="wijzigen" />
				
			</form>
			
		<?php endif; ?>		

	</body>
</html>




















