<?php
	class Coordinate {
		
		private $x;
		private $y;
		private $z;
		
		public function __construct($x, $y, $z) {
			$this->x = $x;
			$this->y = $y;
			$this->z = $z;
		}
		
		public function __get($property) {
			if (property_exists($this, $property)) {
				return $this->$property;
			}
		}
		
		public function __set($property, $value) {
			if (property_exists($this, $property)) {
				$this->$property = $value;
			}
			
			return $this;
		}
	}
?>