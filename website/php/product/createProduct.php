<?php
    //We still need to implement role_id but that has to be added in later.

    $prod_name = $_POST["name"];
    $prod_price = $_POST["price"];
    $prod_stock = $_POST["stock"];
    $prod_img_url = $_POST["img_url"];
    $prod_cat_id = $_POST["cat_id"];

    if(empty($prod_name) || empty($prod_price) || empty($prod_stock) ||  empty($prod_img_url) || empty($prod_cat_id)) {
        echo "Please fill all fields";
        return;
    }

    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    $dbconn = dbConnect();

    $query = 'INSERT INTO Products VALUES (NULL, "'.$prod_name.'","'.$prod_price.'","'.$prod_stock.'", "'.$prod_img_url.'", "'.$prod_cat_id.'", 0);';
    
    if(!mysqli_query($dbconn, $query)) {    # Create product/check for errors
        if (mysqli_errno($dbconn) == 1062) {    # Error number for name not unique
            echo "That product already exists! \n\nPlease modify the existing product instead.";
        } else {    # Other error happened
            echo "Something went wrong, please try again.";
        }
    } else {
        echo true;
    }
    
    mysqli_close($dbconn);
?>