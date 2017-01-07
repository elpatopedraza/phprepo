<?php
	/**
	 * Interface that defines all methods for a cube service.
	 * 
	 * @author Andrés F. Pedraza
	 * @version 0.0.1
	 */
	interface ICubeService {
		
		/**
		 * Creates a new cube.
		 *
		 * @param Integer size the cube size.
		 * @return array the created cube.
		 */
		public function createCube($size);
		
		/**
		 * Performs an update operation on the current cube.
		 *
		 * @param Coordinate coordinate the cube coordinate to update.
		 * @param Integer value the new value to set in given coordinate.
		 * @return array the updated cube.
		 */
		public function update($coordinate, $value);
		
		/**
		 * Performs an query operation on the current cube. It takes all the values between a coordinates range
		 * and return the sum of all values that are part of the range.
		 *
		 * @param Coordinate initialCoordinate the initial coordinate.
		 * @param Coordinate finalCoordinate the final coordinate.
		 * @return Integer the sum of all values that are part of the coordinates range.
		 */
		public function query($initialCoordinate, $finalCoordinate);
	}
?>