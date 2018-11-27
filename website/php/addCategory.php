<?php
    include_once 'dbConnect.php';
    $dbconn = dbConnect();

    $catName = $_POST["catName"];
    
    
    $checkCat = 'SELECT cat_name FROM Categories WHERE cat_name = "'.$catName.'";';
    $queryCheckCat = mysqli_query($dbconn, $checkCat);
    
    # Check if the category already exists
    if ($result = mysqli_fetch_array($queryCheckCat)) {
        echo "Error: the category you tried to create already exists.\n\nPlease try again with a different name.";
    } else {
        $insertCat = 'INSERT INTO Categories VALUES (NULL, "'.$catName.'");';
        mysqli_query($dbconn, $insertCat);
        echo true;
    }

?>
