<?php
	if(isset($_POST['txtInput'])) {
		$input = nl2br($_POST['txtInput']);
		echo($input);
	}
	else {
		printInputError();
	}
	
	function printInputError() {
		echo 'There is an error with the input.';
	}
?>