<?php
function dbConnect(){
	$username = "admin";
	$servername = "localhost";
	$password = "adminpass";
	$database = "maindb";
	$connection = mysqli_connect($servername, $username, $password, $database);
	
	if(mysqli_connect_errno()){
		echo mysqli_connect_error();
	} else{
		//echo "Successfully connected to database";
		return $connection;
	}
}
?>
