<?php
	require_once(__DIR__ . '/../controllers/InputController.php');
	
	//Creates an input controller and shows the main view in the client.
	$inputController = new InputController();
	$inputController->showView();
?>