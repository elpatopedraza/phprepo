<?php
	/**
	 * Interface that defines all methods for a cube DAO.
	 * 
	 * @author Andrés F. Pedraza
	 * @version 0.0.1
	 */
	interface ICubeDao {
		
		/**
		 * Creates a 3D-array (cube) and returns it.
		 *
		 * @param Integer size the cube size.
		 * @return array a 3D-array filled with zeros.
		 */
		public function createCube($size);
		
		/**
		 * Gets the current cube.
		 *
		 * @return array the current cube.
		 */
		public function getCube();
		
		/**
		 * Updates the current cube with a new one.
		 *
		 * @param array cube the new cube to set.
		 * @return array the updated cube.
		 */
		public function updateCube($cube);
	}
?>