<?php
    // Setup connection, we do not use dbConnect.php since 3 parameters and not 4
    $dbhost = 'localhost';
    $dbuser = 'admin';
    $dbpass = 'adminpass';

    $dbconn=mysqli_connect($dbhost,$dbuser,$dbpass);

        
    // If already exists we make sure we do not create one
    $query = "CREATE DATABASE IF NOT EXISTS maindb;";
        
    mysqli_query($dbconn, $query);
    
    
    echo "Database created.\n";
        

    # Close the connection  to the DB.
    mysqli_close($dbconn);
?>
