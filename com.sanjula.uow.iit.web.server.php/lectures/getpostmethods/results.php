<?php
	$age = $_GET['age'];

	if($age < 18){
		$diff = 18 - $age;
		echo "Underage. Try in ".$diff." years";
	} else if($age >= 18){
		echo "Eligible to drive";
	}
?>