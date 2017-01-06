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
		
		public function updateCube($cube) {
			$this->cube = $cube;
		}
	}
?>