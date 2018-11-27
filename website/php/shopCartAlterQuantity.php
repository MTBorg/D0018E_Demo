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

    //Get the current quantity
    $query = 'SELECT quantity 
    FROM ShoppingCartLines
    WHERE user_id='.$user_id.' AND product_id='.$product_id.';';

    $result = mysqli_query($dbConn, $query);

    if($result){
        $obj = mysqli_fetch_object($result);
        $quantity = $obj->quantity; 


        //TODO: Fix so that you cannot increase an item
        //that is out of stock

        if($increase == 1){ //Increase quantity
            $query = 'SELECT stock FROM Products WHERE id='.$product_id.';';
            $result = mysqli_query($dbConn, $query);
            if(!$result){
                echo "Failed to get stock from product";
            }
            else{
                $stock = mysqli_fetch_object($result)->stock;
                if($stock){
                    echo $stock; 
                    $quantity += 1;
                }else{
                    echo "Product out of stock";
                    return;
                }
            }
        }else{ //Decrease quantity
            $quantity -= 1;
            if($quantity == 0){
                $query = 'DELETE FROM ShoppingCartLines WHERE user_id='.$user_id.' AND product_id='.$product_id.';';

                $result = mysqli_query($dbConn, $query);
                if(!$result){
                    echo "Failed to remove shopping cart line";
                    return;
                }
            }
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