<?php
    $dbhost = 'localhost';
    $dbuser = 'admin';
    $dbpass = 'adminpass';
    
    $dbconn=mysqli_connect($dbhost,$dbuser,$dbpass);

    if($dbconn->connect_error){
        die("Database connection failed: " . $dbconn->connect_error);
    }
    
    echo "connected... \n";

    $query = "CREATE DATABASE maindb;";
        
    mysqli_query($dbconn, $query);

    

    echo "table addHEEed\n";
?>