<?php
	class InputController {
		
		private $viewToShow;
		
		public function __construct() {
			$this->viewToShow = $this->generateMainView();
		}
		
		public function showView() {
			echo $this->viewToShow;
		}
		
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