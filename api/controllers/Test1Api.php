<?php
	require_once(__DIR__ . '/../../services/impl/CubeService.php');
	require_once(__DIR__ . '/../../model/Coordinate.php');

	$cubeService = new CubeService();

	if(isset($_POST['txtInput'])) {
		$input = nl2br($_POST['txtInput']);
		$splittedInput = explode("\n", $input);
		$lineNo = 0;
		
		$testCases = $splittedInput[$lineNo];
		for($i = 0; $i < $testCases; $i++) {
			$lineNo++;
			$cubeSizeAndQueriesQuantity = $splittedInput[$lineNo];
			$splittedCubeSizeAndQueriesQuantity = explode(" ", $cubeSizeAndQueriesQuantity);
			
			$cubeSize = $splittedCubeSizeAndQueriesQuantity[0];
			$queriesQuantity = $splittedCubeSizeAndQueriesQuantity[1];
			$cubeService->createCube($cubeSize);
			
			for($j = 0; $j < $queriesQuantity; $j++) {
				$lineNo++;
				$splittedQueryLine = explode(" ", $splittedInput[$lineNo]);
				if($splittedQueryLine[0] == 'UPDATE') {
					$coordinate = new Coordinate($splittedQueryLine[1] - 1, $splittedQueryLine[2] - 1, $splittedQueryLine[3] - 1);
					$cubeService->update($coordinate, $splittedQueryLine[4]);
				}
				else if($splittedQueryLine[0] == 'QUERY') {
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
	
	function printInputError() {
		echo 'There is an error with the input.';
	}
?>