<?php
    //Make sure the GET request parameters is set
    if(!isset($_GET["customer_id"])){
        echo '<script> alert("Missing GET request parameter (spamShoppingCart.php?customer_id=<customer_id>)"); </script>';
        return;
    }

    //Connect to database
    include_once $_SERVER["DOCUMENT_ROOT"].'/php/db/dbConnect.php';
    $dbConn = dbConnect();
    if(!$dbConn){
        echo '<script> alert("Failed to connect to database"); </script>';
        return;
    }

    //Get all non archived products
    $query = 'SELECT id FROM Products WHERE archived=0;';
    $result = mysqli_query($dbConn, $query);
    if(!$result){
        echo '<script> alert("Failed to query database"); </script>';
        return;
    }

    $quantity_max = 5;
    $customer_id = $_GET["customer_id"];
    echo '<h1>'.mysqli_num_rows($result).'</h1>';//DEBUG
    while($row = mysqli_fetch_object($result)){
        $quantity = rand(0, $quantity_max);
        if($quantity != 0){ //Only add non-empty shopping cart lines
            $query = 'INSERT INTO ShoppingCartLines VALUES('.$customer_id.','
                                                        .$row->id.','
                                                        .$quantity.');';
        }

        if(!mysqli_query($dbConn, $query)){
            echo '<p> Failed to insert shopping cart lines: '.mysqli_error($dbConn).' </p>';
        }
    }
?>