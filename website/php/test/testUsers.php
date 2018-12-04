<?php
    /* 
        This script adds 4 test users to the database with the following information:
        
        Fist name: test"x"
        Last name: user
        Email: t"x"email
        Password: 1

        Where "x" is the test users number 1,2,3 or 4.

        !--THE SCRIPT ASSUMES THE DATABASE IS ALREADY SET UP--!
    */

    require_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';

    $dbconn = dbConnect();

    $users = "INSERT INTO Users VALUES (NULL, 0, 'test1', 'user', 't1email', '1'),
                                       (NULL, 0, 'test2', 'user', 't2email', '1'),
                                       (NULL, 0, 'test3', 'user', 't3email', '1'),
                                       (NULL, 0, 'test4', 'user', 't4email', '1');";

    mysqli_query($dbconn, $users);
    
    echo "Users created.\n";
?>
