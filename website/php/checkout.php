<?php
    session_start();
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }else{
        echo "Not logged in";
        return;
    } 

    include_once 'dbConnect.php';
    $dbconn = dbConnect();

    if($dbconn == false){
        echo "Failed to connect to database";
        return;
    }

    //Create an order
    $query = 'INSERT INTO Orders VALUES (NULL, '.$user_id.', "temp");';
    mysqli_query($dbconn, $query);
    $order_id = mysqli_insert_id($dbconn);

    //Get all items in the shopping cart
    $query = 'SELECT * FROM ShoppingCartLines WHERE user_id='.$user_id;
    $lines = mysqli_query($dbconn, $query);
    if($lines){
        while($row = mysqli_fetch_array($lines)){
            $product_id=$row["product_id"];
            $quantity = $row["quantity"];

            //Get the price of the product
            $query = 'SELECT price FROM Products WHERE id='.$product_id.';';
            $price = mysqli_fetch_object(mysqli_query($dbconn, $query))->price;

            $query = 'INSERT INTO OrderLines VALUES('.$order_id.','.$product_id.','.$quantity.','.$price.');';
            mysqli_query($dbconn, $query);
        }
    }else{
        echo "Empty shopping cart";
        return;
    }

    //Remove the shopping cart
    $query = 'DELETE FROM ShoppingCartLines WHERE user_id='.$user_id.';';
    if(mysqli_query($dbconn, $query) == false){
        echo false;
    }else{
        echo true;
    }

?>