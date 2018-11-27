<?php
    

    include 'dbConnect.php';
    include_once 'isLoggedIn.php';
    
    // TODO Check if user bought the product!


    // Make sure we get the integer value since we sending it to the database
    $rating = $_POST['rating'];
    $product_id = $_POST['product_id'];
    $dbconn = dbConnect();
    // Handle is user logged in
    if(isLoggedIn()) {
        // Get logged in user
        $user_id = $_SESSION["user_id"];

        $query = "INSERT INTO Reviews VALUES (NULL, $product_id, $user_id, $rating, NULL)";

        $rate = mysqli_query($dbconn, $query);
        if($rate) {
            echo true;
        }


    } else {
        echo false;
    }
        
        
       

?>
    