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
			return $this->cubeDao->update($coordinate, $value);
		}
		
		public function query($initialCoordinate, $finalCoordinate) {
			return $this->cubeDao->query($initialCoordinate, $finalCoordinate);
		}
	}
?>