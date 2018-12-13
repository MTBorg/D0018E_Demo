<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/account/isLoggedIn.php';
    
    // TODO Check if user bought the product!

    // Make sure we get the integer value since we sending it to the database
    $product_id = $_POST['product_id'];
    $comment = $_POST['comment'];
    $dbconn = dbConnect();
    // Handle is user logged in
    if(isLoggedIn()) {
        // Get logged in user
        $user_id = $_SESSION["user_id"];

        //Get status of the order that belongs to the user and contains the product (if such exists)
        $query = '  SELECT status
                    FROM Orders 
                    WHERE (status="Delivered" OR status="Returned") AND EXISTS(
                        SELECT order_id
                        FROM OrderLines
                        WHERE product_id='.$product_id.' AND user_id='.$user_id.');';
        $result = mysqli_query($dbconn, $query);
        if(!$result){
            echo "Failed to query database";
            return;
        }
        if(mysqli_num_rows($result) == 0){ //If the user hasn't bought the product
            echo 'Only users who have bought and received the product can review!';
            return;
        }

        // Check if user already comment this product
        $query = "SELECT rating FROM Reviews WHERE product_id = $product_id AND user_id = $user_id";
        $checkRated = mysqli_query($dbconn, $query);
        
        // Returns true if it holds data
        if(mysqli_fetch_assoc($checkRated)) {
            $query = "UPDATE Reviews SET comment = '$comment' WHERE product_id = $product_id AND user_id = $user_id";
            mysqli_query($dbconn, $query);
            echo true;
        } else {
            echo "Please rate the product before you comment!";
        }
    } else {
        echo "Only logged in users can review!";
    }

    mysqli_close($dbconn);
?>
    