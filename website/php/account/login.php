<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
	
	$email = $_POST["email"];
	$password = $_POST["password"];	

	if($email == "" or $password == ""){
		echo "Please fill all fields";
		return;
	}

	$connection = dbConnect();
	$query_result = mysqli_query($connection, 'SELECT password FROM Users WHERE email="'.$email.'";');
	
	if($query_result == FALSE){
		echo "Failed to query user";
	}else{
		$row = $query_result->fetch_assoc();
		if($password == $row["password"]){
			# Since log in was successful the session is started and user id and role is stored in the session vars.
			$query_user = mysqli_query($connection, 'SELECT id, role_id FROM Users WHERE email="'.$email.'";');
			$userInfo = $query_user->fetch_assoc();
			$session = session_start();
			
			if ($session) {
				$_SESSION["user_id"] = $userInfo["id"];
				$_SESSION["user_role"] = $userInfo["role_id"];
				echo true;	
			} else {
				echo "Error: Session for this log in could not be started.";
			}

		}else{
			echo "Login failure";
		}
	}
	mysqli_close($connection);
?>