<?php
	include_once(__DIR__ . '/../ICubeService.php');
	include_once(__DIR__ . '/../../daos/impl/CubeDao.php');
	
	/**
	 * Class that implements all methods defined in ICubeService.
	 * 
	 * @author Andrés F. Pedraza
	 * @version 0.0.1
	 */
	class CubeService implements ICubeService {
		
		/**
		 * The cube DAO.
		 */
		private $cubeDao;
		
		/**
		 * Constructs a new cube service instance.
		 */
		public function __construct() {
            $this->cubeDao = new CubeDao();
        }
		
		/**
		 * Creates a new cube.
		 *
		 * @param Integer size the cube size.
		 * @return array the created cube.
		 */
		public function createCube($size) {
			return $this->cubeDao->createCube($size);
		}
		
		/**
		 * Performs an update operation on the current cube.
		 *
		 * @param Coordinate coordinate the cube coordinate to update.
		 * @param Integer value the new value to set in given coordinate.
		 * @return array the updated cube.
		 */
		public function update($coordinate, $value) {
			$cube = $this->cubeDao->getCube();
			$cube[$coordinate->x][$coordinate->y][$coordinate->z] = $value;
			return $this->cubeDao->updateCube($cube);
		}
		
		/**
		 * Performs an query operation on the current cube. It takes all the values between a coordinates range
		 * and return the sum of all values that are part of the range.
		 *
		 * @param Coordinate initialCoordinate the initial coordinate.
		 * @param Coordinate finalCoordinate the final coordinate.
		 * @return Integer the sum of all values that are part of the coordinates range.
		 */
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
		
		/**
		 * Gets the next coordinate given the initial, the current and the final one.
		 *
		 * @param Coordinate initialCoordinate the initial coordinate.
		 * @param Coordinate currentCoordinate the current coordinate.
		 * @param Coordinate finalCoordinate the final coordinate.
		 * @return Coordinate the next coordinate to use.
		 */
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