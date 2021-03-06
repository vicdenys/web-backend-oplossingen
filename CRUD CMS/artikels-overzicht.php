<?php

	$message = false;

	session_start();
	
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
	
	
	$fetchedArtikels = $db->query("SELECT * FROM artikels");
	
	
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
	        
	        article{
		        padding: 10px;
		        margin-top: 5px; 
	        }
	        
	        .notActive{
		        background-color: #c5c5c5;
		        border-radius: 5px;
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
		
			<h1>Overzicht van Artikels</h1>
			
			<p><?= $message ?></p>
			
			<a href="artikel-toevoegen-form.php">Voeg een artikel toe</a>
			
			<?php if($fetchedArtikels["data"]): ?>
			
				<?php foreach($fetchedArtikels["data"] as $artikel): ?>
				
					<?php if($artikel["is_archived"] != 1): ?>
					
						<article class="<?= ($artikel["is_active"])? "" : "notActive" ; ?>">
						
							<h3><?= $artikel["titel"] ?></h3>
							
							<ul>
								<li>Artikel: <?= $artikel["artikel"] ?></li>
								<li>Kernwoorden: <?= $artikel["kernwoorden"] ?></li>
								<li>Datum: <?= $artikel["datum"] ?></li>
							</ul>
							
							<a href="artikel-wijzigen-form.php?artikel=<?= $artikel["id"] ?>">artikel wijzigen</a> | 
							<a href="artikel-activeren.php?artikel=<?= $artikel["id"] ?>"><?= ($artikel["is_active"])? "artikel deactiveren" : "artikel activeren" ; ?></a> |
							<a href="artikel-verwijderen.php?artikel=<?= $artikel["id"] ?>">artikel verwijderen</a>
						</article>
					
					<?php endif; ?>
				
				<?php endforeach; ?>
			
			<?php endif; ?>
			
		<?php endif; ?>	
	</body>
</html>














