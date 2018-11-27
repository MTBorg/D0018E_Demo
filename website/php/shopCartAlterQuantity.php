<?php
    include_once 'dbConnect.php';
    $dbConn = dbConnect();

    if(!$dbConn){
        echo "Failed to connect to database";
    }

    if(!isset($_POST["user_id"])){
        echo "Missing user id in POST request";
    }

    if(!isset($_POST["product_id"])){
        echo "Missing product id in POST request";
    }

    if(!isset($_POST["increase"])){
        echo "Missing operator in POST request";
    }

    $user_id = $_POST["user_id"];
    $product_id = $_POST["product_id"];
    $increase = $_POST["increase"];

    echo $user_id.' '. $product_id. ' '; //DEBUG

    //Get the current quantity
    $query = 'SELECT quantity 
    FROM ShoppingCartLines
    WHERE user_id='.$user_id.' AND product_id='.$product_id.';';

    $result = mysqli_query($dbConn, $query);

    if($result){
        $obj = mysqli_fetch_object($result);
        $quantity = $obj->quantity; 

        echo $quantity; //DEBUG;

        if($increase == 1){
            $quantity += 1;
        }else{
            $quantity -= 1;
        }

        $query = 'UPDATE ShoppingCartLines
        Set quantity='.$quantity.'
        WHERE user_id='.$user_id.' AND product_id='.$product_id.';';

        $result = mysqli_query($dbConn, $query);
        if(!$result){
            echo "Failed to update database (UPDATE)";
        }else{
            echo true;
        }

    }else{
        echo "Failed to query database (SELECT)";
    }
?>