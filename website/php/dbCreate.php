<?php
    $dbhost = 'localhost';
    $dbuser = 'admin';
    $dbpass = 'qwerty';
    
    $dbconn=mysqli_connect($dbhost,$dbuser,$dbpass);

    if($dbconn->connect_error){
        die("Database connection failed: " . $dbconn->connect_error);
    }
    
    echo "connected... \n";

    $query = "CREATE DATABASE schabing;";
        
    mysqli_query($dbconn, $query);

    

    echo "table addHEEed\n";
?>