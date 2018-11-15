<?php
	/*
	There is a bug: If you put a space in the username field after entering your username
	and then enter your password in the same field it will succeed"*/


	include_once 'dbConnect.php';
	
	$email = $_POST["email"];
	$password = $_POST["password"];	
	$connection = dbConnect();
	$query_result = mysqli_query($connection, 'SELECT password FROM Users WHERE email="'.$email.'";');
	if($query_result == FALSE){
		echo "Failed to query user";
	}else{
		$row = $query_result->fetch_assoc();
		if($password == $row["password"]){
			echo "Login success";
		}else{
			echo "Login failure";
		}
	}
	
?>
