<?php

class OddNumbers{

	/**
	*
	* calculates and store the Odd numbers from 1 to 100.
	*
	* @return      	int
	*
	*/
	public function Exec() {
		$numbers = [];
		for($number = 1; $number < 100; $number++) {
			if ($number % 2 !== 0) 
				$numbers[] = $number;
			
		}
		return $numbers;
	}

}

?>