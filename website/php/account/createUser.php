<?php
    //We still need to implement role_id but that has to be added in later.

    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    $dbconn = dbConnect();

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    if(empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        echo "Please fill all fields";
        mysqli_close($dbconn);
        return;

    } elseif(strlen($first_name) > 20) {
        echo "Max 20 characters as first name";
        mysqli_close($dbconn);
        return;

    } elseif(strlen($last_name) > 20) {
        echo "Max 20 characters as last name";
        mysqli_close($dbconn);
        return;
    
    } elseif(strlen($email) > 40) {
        echo "Max 25 characters as email";
        mysqli_close($dbconn);
        return;
    
    } elseif(strlen($password) > 30) {
        echo "Max 18 characters as password";
        mysqli_close($dbconn);
        return;
    }

    //echo strlen($first_name);

    $query_values = '(NULL, 0, "'.$first_name.'","'.$last_name.'","'.$email.'","'.$password.'");'; 

    $query_findEmail = 'SELECT email FROM Users WHERE email = "'.$email.'";';

    $search = mysqli_query($dbconn, $query_findEmail);

    if(mysqli_num_rows($search) > 0) {

        echo "Email already exists!";
        
    } else {
        $query = 'INSERT INTO Users VALUES '.$query_values;
        mysqli_query($dbconn, $query);
        echo "Success!";
    }

    mysqli_close($dbconn);
?>