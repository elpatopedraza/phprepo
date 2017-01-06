<?php
	interface ICubeService {
		
		public function createCube($size);
		
		public function update($coordinate, $value);
		
		public function query($initialCoordinate, $finalCoordinate);
	}
?>