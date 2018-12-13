<?php
    $prod_name = $_POST["name"];
    $prod_price = $_POST["price"];
    $prod_stock = $_POST["stock"];
    $prod_img_url = $_POST["img_url"];
    $prod_cat_name = $_POST["cat_name"];

    if(empty($prod_name) || empty($prod_price) || empty($prod_stock) ||  empty($prod_img_url) || empty($prod_cat_name)) {
        echo "Please fill all fields";
        return;
    }

    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    $dbconn = dbConnect();

    //Table fields: (id, name, price, stock, img_url, cat_name, archived)
    $query = 'INSERT INTO Products VALUES (NULL, "'.$prod_name.'","'.$prod_price.'","'.$prod_stock.'", "'.$prod_img_url.'", "'.$prod_cat_name.'", 0);';
    
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