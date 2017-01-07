<?php
	/**
	 * Class that represents a controller for input view.
	 * 
	 * @author Andrés F. Pedraza
	 * @version 0.0.1
	 */
	class InputController {
		
		/**
		 * The view to show in the client.
		 */
		private $viewToShow;
		
		/**
		 * The constructor controller. Generates the main view.
		 */
		public function __construct() {
			$this->viewToShow = $this->generateMainView();
		}
		
		/**
		 * Shows the view in the client.
		 */
		public function showView() {
			echo $this->viewToShow;
		}
		
		/**
		 * Generates the main view and returns the HTML code for it.
		 *
		 * @return String the HTML code for the main view.
		 */
		private function generateMainView() {
			$mainView = '
				<html>
					<head>
						<title>Prueba 1</title>
					</head>
					<body>
						<h1>Ingresa el input en el siguiente espacio de texto</h1>
						<form action="api/controllers/Test1Api.php" id="inputForm" method="post">
							<textarea id="txtInput" name="txtInput" rows="20" cols="50"></textarea>
							<br/>
							<input type="submit">
						</form>
					</body>
				</html>
			';
			
			return $mainView;
		}
	}
?>