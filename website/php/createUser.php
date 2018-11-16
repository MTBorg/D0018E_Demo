<?php
    //We still need to implement role_id but that has to be added in later.

    include_once 'dbConnect.php';
    $dbconn = dbConnect();

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query_values = '(NULL, 0, "'.$first_name.'","'.$last_name.'","'.$email.'","'.$password.'");'; 

    $query = 'INSERT INTO Users VALUES '.$query_values;
?>