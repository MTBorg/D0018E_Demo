<?php
	include_once 'dbConnect.php';

	$email = $_POST["email"];
	$password = $_POST["password"];	
	
	$connection = dbConnect();
	$query_result = mysqli_query($connection, "SELECT * FROM Users WHERE email=".$email.";");
	$row =  mysqli_fetch_array($query_result);
	#echo $row['Hello world' + 'first_name'];
	
	echo $email, $password; #DEBUG
?>
