<?php
    

    include 'dbConnect.php';
    include_once 'isLoggedIn.php';
    
    // TODO Check if user bought the product!


    // Make sure we get the integer value since we sending it to the database
    $product_id = $_POST['product_id'];
    $rating = $_POST['rating'];
  
    $dbconn = dbConnect();
    // Handle is user logged in
    if(isLoggedIn()) {
        // Get logged in user
        $user_id = $_SESSION["user_id"];

        // Check if user bought the product
        // $query = "SELECT id FROM Orders WHERE (SELECT product_id FROM OrderLines WHERE order_id = id) WHERE user_id = $user_id ();"


        // Check if user already stared this product
        $query = "SELECT rating FROM Reviews WHERE user_id = $user_id";
        $checkRated = mysqli_query($dbconn, $query);

        // Returns true if it holds data
        if(mysqli_fetch_array($checkRated)) {
            $query = "UPDATE Reviews SET rating = $rating WHERE user_id = $user_id";
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
    