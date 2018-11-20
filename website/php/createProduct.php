<?php
    //We still need to implement role_id but that has to be added in later.

    include_once 'dbConnect.php';
    $dbconn = dbConnect();

    $prod_name = $_POST["name"];
    $prod_price = $_POST["price"];
    $prod_stock = $_POST["stock"];
    $prod_img_url = $_POST["img_url"];


    if(empty($prod_name) || empty($prod_price) || empty($prod_stock) || empty($prod_img_url)) {
        echo "Please fill all fields";
        mysqli_close($dbconn);
        return;
    }


    $query_values = '(NULL, "'.$prod_name.'","'.$prod_price.'","'.$prod_stock.'", 0, NULL, "'.$prod_img_url.'");'; 

    // Check if product name already exists
    $query_findProduct = 'SELECT name FROM Products WHERE name = "'.$prod_name.'";';

    $search = mysqli_query($dbconn, $query_findProduct);

    if(mysqli_num_rows($search) > 0) {

        echo "Product already exists!";
    // Product name those not exist   
    } else {
        $query = 'INSERT INTO Products VALUES '.$query_values;
        mysqli_query($dbconn, $query);
        echo true;
    }


    mysqli_close($dbconn);
    


    
?>