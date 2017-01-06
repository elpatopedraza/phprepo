<?php
	/**
	 * Class that represents a enumeration for operation types.
	 * 
	 * @author Andrés F. Pedraza
	 * @version 0.0.1
	 */
	abstract class OperationType {
		
		/**
		 * The query operation type.
		 */
		const QUERY = 'QUERY';
		
		/**
		 * The update operation type.
		 */
		const UPDATE = 'UPDATE';
	}
?>