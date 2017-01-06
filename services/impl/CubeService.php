<?php
	include_once(__DIR__ . '/../ICubeService.php');
	include_once(__DIR__ . '/../../daos/impl/CubeDao.php');
	
	class CubeService implements ICubeService {
		
		private $cubeDao;
		
		public function __construct() {
            $this->cubeDao = new CubeDao();
        }
		
		public function createCube($size) {
			return $this->cubeDao->createCube($size);
		}
		
		public function update($coordinate, $value) {
			$cube = $this->cubeDao->getCube();
			$cube[$coordinate->x][$coordinate->y][$coordinate->z] = $value;
			return $this->cubeDao->updateCube($cube);
		}
		
		public function query($initialCoordinate, $finalCoordinate) {
			$cube = $this->cubeDao->getCube();
			$queryResult = 0;
			$currentCoordinate = $initialCoordinate;
			do {
				$queryResult = $queryResult + $cube[$currentCoordinate->x][$currentCoordinate->y][$currentCoordinate->z];
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