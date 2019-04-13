<?php
	//make connection with database
	$link = mysqli_connect("localhost","root","sudipta@2000","credit");
	// Check connection
	if($link === false) {
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	}
?>
