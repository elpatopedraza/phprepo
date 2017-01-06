<?php
	include_once(__DIR__ . '/../ICubeDao.php');
	include_once(__DIR__ . '/../../model/Coordinate.php');
	
	class CubeDao implements ICubeDao {
		
		private $cube;
		
		public function createCube($size) {
			$this->cube = array();
			for($x = 0; $x < $size; $x++) {
				$yArray = array();
				for($y = 0; $y < $size; $y++) {
					array_push($yArray, array_fill(0, $size, 0));
				}
				array_push($this->cube, $yArray);
			}
			
			return $this->cube;
		}
		
		public function getCube() {
			return $this->cube;
		}
		
		public function update($coordinate, $value) {
			$this->cube[$coordinate->x][$coordinate->y][$coordinate->z] = $value;
			return $this->cube;
		}
		
		public function query($initialCoordinate, $finalCoordinate) {
			$queryResult = 0;
			$currentCoordinate = $initialCoordinate;
			do {
				$queryResult = $queryResult + $this->cube[$currentCoordinate->x][$currentCoordinate->y][$currentCoordinate->z];
				$currentCoordinate = $this->getNextCoordinate($initialCoordinate, $currentCoordinate, $finalCoordinate);
			} while ($currentCoordinate->x <= $finalCoordinate->x && $currentCoordinate->y <= $finalCoordinate->y &&
					$currentCoordinate->z <= $finalCoordinate->z);
					
			return $queryResult;
		}
		
		private function getNextCoordinate($initialCoordinate, $currentCoordinate, $finalCoordinate) {			
			$newCoordinate = new Coordinate($currentCoordinate->x, $currentCoordinate->y, $currentCoordinate->z);
			$newCoordinate->z = $currentCoordinate->z + 1;
			if($newCoordinate->z > $finalCoordinate->z) {
				$newCoordinate->z = $initialCoordinate->z;
				$newCoordinate->y = $currentCoordinate->y + 1;
				if($newCoordinate->y > $finalCoordinate->y) {
					$newCoordinate->y = $initialCoordinate->y;
					$newCoordinate->x = $currentCoordinate->x + 1;
				}
			}
			
			return $newCoordinate;
		}
	}
?>