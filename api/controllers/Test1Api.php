<?php
	require_once(__DIR__ . '/../../services/impl/CubeService.php');
	require_once(__DIR__ . '/../../model/Coordinate.php');
	require_once(__DIR__ . '/../../model/OperationType.php');

	/**
	 * The cube service.
	 */
	$cubeService = new CubeService();

	//Gets the input sent by client.
	if(isset($_POST['txtInput'])) {
		//Splits the input by break lines.
		$input = nl2br($_POST['txtInput']);
		$splittedInput = explode("\n", $input);
		$lineNo = 0;
		
		//Process every test case.
		$testCases = $splittedInput[$lineNo];
		for($i = 0; $i < $testCases; $i++) {
			$lineNo++;
			
			//Gets the cube size and queries quantity.
			$cubeSizeAndQueriesQuantity = $splittedInput[$lineNo];
			$splittedCubeSizeAndQueriesQuantity = explode(" ", $cubeSizeAndQueriesQuantity);
			
			//Creates the cube given its size.
			$cubeSize = $splittedCubeSizeAndQueriesQuantity[0];
			$cubeService->createCube($cubeSize);
			
			//Iterates over every query and tries to execute them.
			$queriesQuantity = $splittedCubeSizeAndQueriesQuantity[1];
			for($j = 0; $j < $queriesQuantity; $j++) {
				$lineNo++;
				
				//Splits the query instruction by white space and calls the respective service function given the operation type.
				$splittedQueryLine = explode(" ", $splittedInput[$lineNo]);
				if($splittedQueryLine[0] == OperationType::UPDATE) {
					$coordinate = new Coordinate($splittedQueryLine[1] - 1, $splittedQueryLine[2] - 1, $splittedQueryLine[3] - 1);
					$cubeService->update($coordinate, $splittedQueryLine[4]);
				}
				else if($splittedQueryLine[0] == OperationType::QUERY) {
					$coordinate1 = new Coordinate($splittedQueryLine[1] - 1, $splittedQueryLine[2] - 1, $splittedQueryLine[3] - 1);
					$coordinate2 = new Coordinate($splittedQueryLine[4] - 1, $splittedQueryLine[5] - 1, $splittedQueryLine[6] - 1);
					echo $cubeService->query($coordinate1, $coordinate2) . '<br>';
				}					
			}
		}
	}
	else {
		printInputError();
	}
	
	/**
	 * Prints a simple error message in case of wrong input.
	 */
	function printInputError() {
		echo 'There is an error with the input.';
	}
?>