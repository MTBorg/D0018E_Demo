<?php
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
        echo "Max 40 characters as email";
        mysqli_close($dbconn);
        return;
    
    } elseif(strlen($password) > 30) {
        echo "Max 30 characters as password";
        mysqli_close($dbconn);
        return;
    }

    //Table fields: (user_id, role_id, firstname, lastname, email, password)
    $query = 'INSERT INTO Users VALUES (NULL, 0, "'.$first_name.'","'.$last_name.'","'.$email.'","'.$password.'");';

    if (!mysqli_query($dbconn, $query)) {
        if (mysqli_errno($dbconn) == 1062) { # Error number for email not unique
            echo "Email already exists!";
        } else {
            echo "Something went wrong, please try again.";
        }
    } else {
        echo "Success!";
    }

    mysqli_close($dbconn);
?>