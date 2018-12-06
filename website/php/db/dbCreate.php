<?php
    function dbCreate() {

        // Setup connection, we do not use dbConnect.php since 3 parameters and not 4
        $dbhost = 'localhost';
        $dbuser = 'admin';
        $dbpass = 'adminpass';
        $dbconn=mysqli_connect($dbhost,$dbuser,$dbpass);

        $query = "DROP DATABASE IF EXISTS maindb;";
            
        mysqli_query($dbconn, $query);    

        $query = "CREATE DATABASE IF NOT EXISTS maindb;";
            
        mysqli_query($dbconn, $query);

        # Close the connection  to the DB.
        mysqli_close($dbconn);
    }
?>
