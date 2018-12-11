<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/account/isLoggedIn.php';
    
    // TODO Check if user bought the product!

    // Make sure we get the integer value since we sending it to the database
    $product_id = $_POST['product_id'];
    $rating = $_POST['rating'];
  
    // Handle is user logged in
    if(isLoggedIn()) {
        $dbconn = dbConnect();

        // Get logged in user
        $user_id = $_SESSION["user_id"];
        
        //Get status of the order that belongs to the user and contains the product (if such exists)
        $query = "SELECT user_id, status FROM Orders WHERE id IN (SELECT order_id FROM OrderLines WHERE product_id = $product_id AND user_id = $user_id)";
        $result = mysqli_query($dbconn, $query);
        if(!$result){
            echo "Failed to query database";
            return;
        }
        if(mysqli_num_rows($result) == 0){ //If the user hasn't bought the product
            echo 'Only users who have bought the product can rate!';
            return;
        }else if(mysqli_fetch_object($result)->status != "Delivered"){ //If the user hasn't received the product
            echo 'Only users who have received their product can rate!';
            return;
        }

        // Check if user already stared this product
        $query = "SELECT rating FROM Reviews WHERE product_id = $product_id AND user_id = $user_id";
        $checkRated = mysqli_query($dbconn, $query);

        // Returns true if it holds data
        if(mysqli_fetch_assoc($checkRated)) {
            $query = "UPDATE Reviews SET rating = $rating WHERE product_id = $product_id AND user_id = $user_id";
            mysqli_query($dbconn, $query);
            echo true;
        } else {

        // Otherwise we insert the star rating
            $query = "INSERT INTO Reviews VALUES (NULL, $product_id, $user_id, $rating, NULL)";

            $rate = mysqli_query($dbconn, $query);
            
            if($rate) {
                echo true;
            } else {
                echo false;
            }
        }

        mysqli_close($dbconn);
    }
?>
    