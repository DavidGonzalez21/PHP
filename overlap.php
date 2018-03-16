<?php

class Overlap {
	private $firstString;
	private $secondString;
	
	function __construct() {
   		$this->firstString = isset($_POST['firstString']) ? $_POST['firstString'] : null;
        $this->secondString = isset($_POST['secondString']) ? $_POST['secondString'] : null;

       
   	}

   	/**
	*
	* function to make compare and validate strings, aslo returning results.
	*
	* @return      	array
	*
	*/
   	public function exec() {
   		
   		if($this->validate()) {
   			return array("success" => $this->compare($this->firstString, $this->secondString));
   		}else {
   			return array( "error" => 'Invalid Strings' );
   		}
   	}

   	/**
	*
	* Compare overlaps on the given strings.
	* @param 		string 	$str1 		the first string to be evaluated
	* @param 		string 	$str2 		the second string to be evaluated
	* @return      	string
	*
	*/

   	private function compare($str1, $str2) {
   		$longestCommonSubstringIndexInFirst = 0;
	    $store = array();
	    $largestFound = 0;

	    $firstLength = strlen($str1);
	    $secondLength = strlen($str2);
	    
	    for ($i = 0; $i < $firstLength; $i++) {
	        for ($j = 0; $j < $secondLength; $j++) {
	            if ($str1[$i] === $str2[$j]) {
	                if (!isset($store[$i])) {
	                    $store[$i] = array();
	                }
	                if ($i > 0 && $j > 0 && isset($store[$i-1][$j-1])) {
	                    $store[$i][$j] = $store[$i-1][$j-1] + 1;
	                }
	                else {
	                    $store[$i][$j] = 1;
	                }
	                if ($store[$i][$j] > $largestFound) {
	                    $largestFound = $store[$i][$j];
	                    $longestCommonSubstringIndexInFirst = $i - $largestFound + 1;
	                }
	            }
	        }
	    }
	    if ($largestFound === 0) {
	        return "";
	    }
	    else {
	        return substr($str1, $longestCommonSubstringIndexInFirst, $largestFound);
	    }
	}

	/**
	*
	* Validates the 2 given strings.
	* @return      	boolean
	*
	*/
   	private function validate() {
   		if( $this->firstString == '' || $this->firstString == NULL || $this->secondString == '' || $this->secondString == NULL ) {
   			return false;
   		}else {
   			return true;
   		}

   	}  	
}


