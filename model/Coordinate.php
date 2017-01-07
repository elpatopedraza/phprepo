<?php
	/**
	 * Class that represents a 3D-coordinate.
	 * 
	 * @author Andrés F. Pedraza
	 * @version 0.0.1
	 */
	class Coordinate {
		
		/**
		 * The x value.
		 */
		private $x;
		
		/**
		 * The y value.
		 */
		private $y;
		
		/**
		 * The z value.
		 */
		private $z;
		
		/**
		 * Constructs a new coordinate.
		 *
		 * @param Integer x the x value.
		 * @param Integer y the y value.
		 * @param Integer z the z value.
		 */
		public function __construct($x, $y, $z) {
			$this->x = $x;
			$this->y = $y;
			$this->z = $z;
		}
		
		/**
		 * Gets a property value.
		 */
		public function __get($property) {
			if (property_exists($this, $property)) {
				return $this->$property;
			}
		}
		
		/**
		 * Sets a property.
		 */
		public function __set($property, $value) {
			if (property_exists($this, $property)) {
				$this->$property = $value;
			}
			
			return $this;
		}
	}
?>