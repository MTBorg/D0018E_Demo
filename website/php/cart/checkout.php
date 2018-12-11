<?php
    session_start();
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }else{
        echo "Not logged in";
        return;
    } 

    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    $dbconn = dbConnect();

    if($dbconn == false){
        echo "Failed to connect to database";
        return;
    }
    
    //Get all items in the shopping cart
    $query = 'SELECT * FROM ShoppingCartLines WHERE user_id='.$user_id;
    $lines = mysqli_query($dbconn, $query);
    if($lines){
        if($lines->num_rows == 0){
            echo "Empty shopping cart";
            mysqli_close($dbconn);
            return;
        }

        mysqli_begin_transaction($dbconn, MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);

        //Create an order
        $query = 'INSERT INTO Orders VALUES (NULL, '.$user_id.',"Pending");';
        mysqli_query($dbconn, $query);
        $order_id = mysqli_insert_id($dbconn);

        //Insert the products
        while($row = mysqli_fetch_array($lines)){
            $product_id=$row["product_id"];
            $quantity = $row["quantity"];

            //Get the info of the product
            $query = 'SELECT price, stock, name, archived FROM Products WHERE id='.$product_id.';';
            $result = mysqli_query($dbconn, $query);
            if(!$result){
                echo "Failed to get product, rolling back";
                mysqli_rollback($dbconn);
                mysqli_close($dbconn);
                return;
            }
            $product = mysqli_fetch_object($result);
            $price = $product->price;
            $stock = $product->stock;
            

            // Make sure that the user doesn't order a product which has been archived by the admin
            if($product->archived) {
                $dbconn2 = dbConnect();
                $removeFromCart = 'DELETE FROM ShoppingCartLines WHERE user_id = '.$user_id.' AND product_id = '.$product_id.';';
                
                if(!mysqli_query($dbconn2, $removeFromCart)) {
                    echo "Failed to remove archived product from shopping cart";
                } else {
                    echo "Sorry, the product $product->name in your shopping cart is not sold anymore and has been removed from your shopping cart. \n
                        \nPlease checkout again if you still want to make this order.";
                }
                
                mysqli_close($dbconn2);
                mysqli_rollback($dbconn);
                mysqli_close($dbconn);
                return;
            }

            //Make sure that the quantity does not exceed the stock
            if($quantity > $stock){
                echo 'Quantity exceeds stock for product '. $product->name;
                mysqli_rollback($dbconn);
                mysqli_close($dbconn);
                return;
            }else{
                //Insert the product
                $query = 'INSERT INTO OrderLines VALUES('.$order_id.','.$product_id.','.$quantity.','.$price.');';
                if(!mysqli_query($dbconn, $query)){
                    echo "Failed to insert order item";
                    mysqli_rollback($dbconn);
                    mysqli_close($dbconn);
                    return;
                }

                //Update the stock
                $newStock = $stock - $quantity;
                $query = 'UPDATE Products SET stock='.$newStock. ' WHERE id='.$product_id.';';
                if(!mysqli_query($dbconn, $query)){
                    echo "Failed to update stock";
                    mysqli_rollback($dbconn);
                    mysqli_close($dbconn);
                    return;
                }
            }
        }

        //Remove the shopping cart
        $query = 'DELETE FROM ShoppingCartLines WHERE user_id='.$user_id.';';
        if(mysqli_query($dbconn, $query) == false){
            echo "Failed to delete shopping cart";
            mysqli_rollback($dbconn);
            mysqli_close($dbconn);
            return;
        }else{
            echo true;
            mysqli_commit($dbconn); //If this was reached everything was successfull and the order should now be in the database
        }
    }else{
        echo "Failed to get shopping cart";
        mysqli_close($dbconn);
        return;
    }
?>