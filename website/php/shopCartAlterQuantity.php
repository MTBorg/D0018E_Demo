<?php
    include_once 'dbConnect.php';
    $dbConn = dbConnect();

    if(!$dbConn
        or !isset($_POST["user_id"])
        or !isset($_POST["product_id"])
        or !isset($_POST["increase"])){
        echo "Missing argument in POST request";
        return;
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

        //Get the product stock
        $query = 'SELECT stock FROM Products WHERE id='.$product_id.';';
        $result = mysqli_query($dbConn, $query);
        if(!$result){
            echo "Failed to get stock from product";
            return;
        }
        $stock = mysqli_fetch_object($result)->stock;

        if($increase == 1){ //Increase quantity
            if($stock){
                if($quantity < $stock){
                    $quantity += 1;
                }else{
                    echo "No more items in stock";
                    return;
                }
            }else{
                echo "Product out of stock";
                return;
            }
        }else{ //Decrease quantity
            $quantity -= 1;
            if($quantity == 0){
                //Remove the shopping cart line
                $query = 'DELETE FROM ShoppingCartLines WHERE user_id='.$user_id.' AND product_id='.$product_id.';';
                $result = mysqli_query($dbConn, $query);
                if(!$result){
                    echo "Failed to remove shopping cart line";
                    return;
                }
            }
        }

        //Update the shopping cart line
        $query = 'UPDATE ShoppingCartLines
        Set quantity='.$quantity.'
        WHERE user_id='.$user_id.' AND product_id='.$product_id.';';
        $result = mysqli_query($dbConn, $query);
        if(!$result){
            echo "Failed to update database (UPDATE)";
        }else{
           echo true; //Everything was successfull if this is reached
        }
    }else{
        echo "Failed to query database (SELECT)";
    }
?>