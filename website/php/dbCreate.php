<?php
    require_once 'dbConnect.php';

    $dbconn = dbConnect();

    if($dbconn->connect_error){
        die("Database connection failed: " . $dbconn->connect_error);
    }
    
    echo "connected... \n";

    $query = "CREATE DATABASE maindb;";
        
    mysqli_query($dbconn, $query);

    

    echo "table addHEEed\n";

    # Close the connection  to the DB.
    mysqli_close($dbconn);
?>
