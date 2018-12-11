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

    $query_values = '(NULL, "'.$prod_name.'","'.$prod_price.'","'.$prod_stock.'", "'.$prod_img_url.'", "'.$prod_cat_name.'", 0);'; 

    // Check if product name already exists
    $query_findProduct = 'SELECT name FROM Products WHERE name = "'.$prod_name.'";';
    $search = mysqli_query($dbconn, $query_findProduct);

    if(mysqli_num_rows($search) > 0) {
        echo "Product already exists!";
    } else if ($prod_cat_name == "-1") {    // Default value of category drop-down
        echo "Please select a category";
    } else {    // Product name does not exist
        $query = 'INSERT INTO Products VALUES '.$query_values;
        mysqli_query($dbconn, $query);
        echo true;
    }

    mysqli_close($dbconn);
?>