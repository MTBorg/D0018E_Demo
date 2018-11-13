<?php
$username = "root";
$servername = "localhost";

$connection = mysqli_connect($servername, $username, "pass", "test");


if(mysqli_connect_errno()){
	echo mysqli_connect_error();
} else{
	echo "Success";
}
?>
