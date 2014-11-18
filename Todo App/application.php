<?php
	session_start();
		
	$TakenBestaan = false;
	
	/****************
	*	Toevoegen	*
	****************/
	if(isset($_POST["beschrijving"]) && $_POST["beschrijving"] != "")
	{	
		$_SESSION["taken"]["toDo"][] = $_POST["beschrijving"];
		$TakenBestaan = CheckTaken();
		
	}
	if(isset($_POST["beschrijving"]) && $_POST["beschrijving"] == ""){
		echo "<script type='text/javascript'>alert('Je moet wel iets invullen!');</script>";
		$TakenBestaan = CheckTaken();
	}

	/****************
	*	Verwijder1	*
	****************/
	
	if (isset($_POST["verwijderToDo"])){
		unset($_SESSION["taken"]["toDo"][$_POST["verwijderToDo"]]);
		$TakenBestaan = CheckTaken();
	}
	
	/****************
	*	Verwijder2	*
	****************/
	
	if (isset($_POST["verwijderDone"])){
		unset($_SESSION["taken"]["done"][$_POST["verwijderDone"]]);
		$TakenBestaan = CheckTaken();
	}
	
	/********************
	*	Taak naar ToDo	*
	********************/
	
	if (isset($_POST["doneOn"])){
		$_SESSION["taken"]["done"][] = $_SESSION["taken"]["toDo"][$_POST["doneOn"]];
		unset($_SESSION["taken"]["toDo"][$_POST["doneOn"]]);
		$TakenBestaan = CheckTaken();
	}
	
	/********************
	*	Taak naar Done	*
	********************/
	
	if (isset($_POST["doneOff"])){
		$_SESSION["taken"]["toDo"][] = $_SESSION["taken"]["done"][$_POST["doneOff"]] ;
		unset($_SESSION["taken"]["done"][$_POST["doneOff"]]);
		$TakenBestaan = CheckTaken();
	}
	
	/****************
	*	Functies	*
	*****************/
	
	function CheckTaken(){
		if (isset($_SESSION["taken"]["toDo"]) && $_SESSION["taken"]["toDo"] != null){
			return true;
		}
		else if (isset($_SESSION["taken"]["done"]) && $_SESSION["taken"]["done"] != null){
			return true;
		}
	}
	
	

	
	$toDo= (isset($_SESSION["taken"]["toDo"])) ?$_SESSION["taken"]["toDo"] :"";
	$done = (isset($_SESSION["taken"]["done"])) ?$_SESSION["taken"]["done"] :"";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Todo App</title>
		<meta charset="utf-8"/>
		
		
		<link rel="stylesheet" type="style/css" href="style.css"/>
	</head>
	<body>
		<h1>Todo App</h1>
		
		<?php if($TakenBestaan): ?>
		
		
			<h3>Nog te doen</h3>
				<?php if($toDo != null): ?>
				
					<ul>
						<?php foreach($toDo as $index => $taak): ?>
						<li>
							<form action="application.php" method="post">
								<button class="status Not" title="Status" name="doneOn" value="<?= $index?>" class="status not-done"><?= $taak?></button>
								<button class="verwijder" title="Verwijderen" name="verwijderToDo" value="<?= $index?>">X</button>
							</form>
						</li>
						<?php endforeach; ?>
					</ul>
					
				<?php else: ?>
				
					<p>Wééé! alles is gedaan! </p>
					
				<?php endif; ?>
				
			<h3>Done!</h3>
				<?php if($done != null): ?>
				
					<ul>
						<?php foreach($done as $index => $taak): ?>
						<li>
							<form action="application.php" method="post">
								<button class="status Done" title="Status" name="doneOff" value="<?= $index?>" class="status not-done"><?= $taak?></button>
								<button class="verwijder" title="Verwijderen" name="verwijderDone" value="<?= $index?>">X</button>
							</form>
						</li>
						<?php endforeach; ?>
					</ul>
					
				<?php else: ?>
				
					<p>Werk aan de winkel!</p>
					
				<?php endif; ?>
				
		<?php else: ?>
		
			<p>Je hebt nog geen taken toegevoegd! niks te doen ofwa?</p>
				
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