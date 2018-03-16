<?php 
/**
* UnsortedIntegers Class, generates array, and calculate the sum of the 2 longest items on array.
*/
class UnsortedIntegers {
	
	private $array; 

	function __construct() {
       $this->array = $this->fillArray(rand(5, 20), rand(0, 100), rand(0, 100));
   	}

	/**
	*
	* Return random array with random values.
	*
	* @param    	int  	$size 	the size of the array to generate.
	* @param    	int  	$minNumber the minum value that rand function takes
	* @param    	int  	$maxNumber the max value that rand function takes
	* @return      	array
	*
	*/
   	private function fillArray($size, $minNumber, $maxNumber) {
   		$array = [];
   		for($x = 0; $x <= $size; $x++ ) {
   			$array[] = rand($minNumber, $maxNumber);
   		}
   		
   		return $array;
   	}

   	/**
	*
	* Call functions getMaximumNumbers and sum to get the necessary variables and return them.
	*
	* @return      	array
	*
	*/
   	public function exec() {
   		$maxNumbers = $this->getMaximumNumbers($this->array);
   		$sumNumbers = $this->sum($maxNumbers[0], $maxNumbers[1]);
   		$listNumbers = $this->array;

   		return array('maxNumbers' => $maxNumbers, 
   					 'sumNumbers' => $sumNumbers, 
   					 'listNumbers' => $listNumbers);
   	}

   	/**
	*
	* Gets the 2 longest items in array.
	* @param   		array $array the array previously generated.
	* @return      	array
	*
	*/
   	private function getMaximumNumbers($array) {
   		$firstMaxNumber = 0;
   		$secondMaxNumber = 0;
   		foreach ($array as $key => $value) {
   			if($value > $firstMaxNumber) {
   				$secondMaxNumber = $firstMaxNumber;
      			$firstMaxNumber = $value;
   			}
   			else if( $value > $secondMaxNumber ){
   				$secondMaxNumber = $value;
   			}
   		}
   		return array($firstMaxNumber, $secondMaxNumber);
   	}

   	/**
	*
	* Sums 2 variables a and b.
	*
	* @return      	int
	*
	*/
   	public function sum($a, $b) {
   		return ($a + $b);
   	}
}