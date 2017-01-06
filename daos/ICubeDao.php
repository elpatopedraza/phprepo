<?php
	interface ICubeDao {
		
		public function createCube($size);
		
		public function getCube();
		
		public function updateCube($cube);
	}
?>