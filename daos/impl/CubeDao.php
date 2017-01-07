<?php
	include_once(__DIR__ . '/../ICubeDao.php');
	include_once(__DIR__ . '/../../model/Coordinate.php');
	
	/**
	 * Class that implements all methods defined in ICubeDao.
	 * 
	 * @author Andrés F. Pedraza
	 * @version 0.0.1
	 */
	class CubeDao implements ICubeDao {
		
		/**
		 * The 3D-array.
		 */
		private $cube;
		
		/**
		 * Creates a 3D-array (cube) and returns it.
		 *
		 * @param Integer size the cube size.
		 * @return array a 3D-array filled with zeros.
		 */
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
		
		/**
		 * Gets the current cube.
		 *
		 * @return array the current cube.
		 */
		public function getCube() {
			return $this->cube;
		}
		
		/**
		 * Updates the current cube with a new one.
		 *
		 * @param array cube the new cube to set.
		 * @return array the updated cube.
		 */
		public function updateCube($cube) {
			$this->cube = $cube;
		}
	}
?>