<?php

//includes 
include('numbers.php');
include('unsortedintegers.php');
include('overlap.php');

//initialize OddNumbers class
$OddNumbers = new OddNumbers();
//call to exec's OddNumbers function 
$numbers = $OddNumbers->Exec();
//set the size of array numbers for validate last number under iteration on index.php file exercise1.
$totalNumbers = count($numbers) - 1;

//initialize UnsortedIntegers Class
$UnsortedIntegers = new UnsortedIntegers();
//call to exec function.
$dataUnsortedIntegers = $UnsortedIntegers->exec();

//instance of variables needed on the #excercice2
$sumUnsortedNumbers  = 	$dataUnsortedIntegers['sumNumbers'];
$maxUnsortedNumbers  = 	$dataUnsortedIntegers['maxNumbers'];
$listUnsortedNumbers = 	$dataUnsortedIntegers['listNumbers'];


//initialize class overlap
$Overlap = new Overlap;
//checks if is a post request
if(!empty($_POST))
{	
	//print the result of the exec's overlap function on json format for the ajax request.
    echo json_encode($Overlap->exec());
}

?>