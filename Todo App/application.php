<?php
	session_start();
		
	$TakenBestaan = false;
	
	if(isset($_POST) && $_POST["beschrijving"] != "")
	{	
		($_SESSION["taken"]["nietAf"][] =  $_POST["beschrijving"]);	
	}
	
	if (isset($_SESSION["taken"]) && $_SESSION["taken"] != null){
		$TakenBestaan = true;
	}
	
	if (isset($_POST["verwijder"])){
		unset($_SESSION["taken"]["nietAf"][$_POST["verwijder"]]);
	}
	
	//var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Todo App</title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Todo App</h1>
		
		<?php if($TakenBestaan): ?>
		
		
			<h3>Nog te doen<h3>
				<ul>
					<?php foreach($_SESSION["taken"]["nietAf"] as $index => $taak): ?>
					<li>
						<form action="application.php" method="post">
							<button title="Status wijzigen" name="toggleTodo" value="<?= $index?>" class="status not-done"><?= $taak?></button>
							<button title="Verwijderen" name="verwijder" value="<?= $index?>">Verwijder</button>
						</form>
					</li>
					<?php endforeach; ?>
				</ul>
				
				
			<h3>Done!</h3>
		
		<?php endif; ?>
		
		<h1>Todo Toevoegen</h1>
		
		<form action="application.php" method="post">
			<ul>
				<li>
					<label for="beschrijving">Beschrijving: </label>
					<input type="text" id="beschrijving" name="beschrijving">
				</li>
			</ul>
			<input type="submit" name="voegToe" value="toevoegen">
		</form>
		
	</body>
</html>