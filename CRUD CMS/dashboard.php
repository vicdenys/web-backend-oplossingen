<?php
	
	$isauthenticated = false;
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
	        
        </style>
		
	</head>
	<body>
		<?php if($isauthenticated): ?>
		
			<header>
				<a href="dashboard.php">Terug naar Dashboard</a>
				<p> | Ingelogd als <?= $C_email?> | </p>
				<a href="logout.php">Uitloggen</a>
 			</header>
		
			<h1>Dashboard</h1>
			
			
			<a href="artikels-overzicht.php">Artikels</a>
			
		<?php endif; ?>	
	</body>
</html>









