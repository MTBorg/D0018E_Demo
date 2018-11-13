<?php
    $dbhost = 'localhost';
    $dbuser = 'user1';
    $dbpass = 'qwerty';
    $db = 'mainDB';
    
    $dbconn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);

    if($dbconn->connect_error){
        die("Database connection failed: " . $dbconn->connect_error);
    }
    
    echo "connected... \n";

    $query = "CREATE TABLE IF NOT EXISTS testing(
            
            id INT NOT NULL AUTO_INCREMENT,
            prodname VARCHAR(20) NOT NULL,
            price INT NOT NULL,
            catergory VARCHAR(15),
            stock INT NOT NULL,
            primary key(id))";

    mysqli_query($dbconn, $query);
    
    echo "table added\n";
?>