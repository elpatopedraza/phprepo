<?php
	interface ICubeDao {
		
		public function createCube($size);
		
		public function getCube();
		
		public function update($coordinate, $value);
		
		public function query($initialCoordinate, $finalCoordinate);
	}
?>