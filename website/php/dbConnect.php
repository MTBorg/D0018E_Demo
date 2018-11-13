<?php
$username = "root";
$servername = "localhost";
$password = ""; #Enter your password to root user here
$database = "database";

$connection = mysqli_connect($servername, $username, $password, $database);


if(mysqli_connect_errno()){
	echo mysqli_connect_error();
} else{
	echo "Successfully connected to database";
}
?>
