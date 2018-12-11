<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    $dbconn = dbConnect();

    $catName = $_POST["catName"];
    
    $insertCat = 'INSERT INTO Categories VALUES ("'.$catName.'");';
    
    if (!mysqli_query($dbconn, $insertCat)) {   # Check if the category already exists
        if (mysqli_errno($dbconn) == 1062) { # Error number for UNIQUE restraint on category name broken
            echo "Error: the category you tried to create already exists.\n\nPlease try again with a different name.";
        } else {
            echo "Something went wrong, please try again!";
        }
    } else {
        echo true;
    }

    mysqli_close($dbconn);
?>
