<?php

	function __autoload($class){
		include "classes/" . $class . ".php";
	}
	
	$page = new HTMLBuilder("header.partial.php","body.partial.php","footer.partial.php");
	
	$page->buildAll();
?>