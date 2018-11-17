<?php
	include_once 'dbConnect.php';
	
	$email = $_POST["email"];
	$password = $_POST["password"];	

	if($email == "" or $password == ""){
		return; //TODO: Return something useful
	}

	$connection = dbConnect();
	$query_result = mysqli_query($connection, 'SELECT password FROM Users WHERE email="'.$email.'";');
	if($query_result == FALSE){
		echo "Failed to query user";
	}else{
		$row = $query_result->fetch_assoc();
		if($password == $row["password"]){
			echo "Login success";

			# Start the user session
			
		}else{
			echo "Login failure";
		}
	}
	
?>
