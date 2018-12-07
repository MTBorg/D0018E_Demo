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

        // Check if user bought the product
        $query = "SELECT user_id FROM Orders WHERE id IN (SELECT order_id FROM OrderLines WHERE product_id = $product_id AND user_id = $user_id)";
        $checkBought = mysqli_query($dbconn, $query);
        if(mysqli_fetch_assoc($checkBought) == false) {
            echo false;
            mysqli_close($dbconn);
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
    