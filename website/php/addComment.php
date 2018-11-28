<?php
    

    include 'dbConnect.php';
    include_once 'isLoggedIn.php';
    
    // TODO Check if user bought the product!


    // Make sure we get the integer value since we sending it to the database
    $product_id = $_POST['product_id'];
    $comment = $_POST['comment'];
    $dbconn = dbConnect();
    // Handle is user logged in
    if(isLoggedIn()) {
        // Get logged in user
        $user_id = $_SESSION["user_id"];

        // Check if user bought the product
        // $query = "SELECT id FROM Orders WHERE (SELECT product_id FROM OrderLines WHERE order_id = id) WHERE user_id = $user_id ();"


        // Check if user already comment this product
        $query = "SELECT comment FROM Reviews WHERE user_id = $user_id";
        $checkCommented = mysqli_query($dbconn, $query);
        
        // Returns true if it holds data
        if(mysqli_fetch_assoc($checkCommented)) {
            $query = "UPDATE Reviews SET comment = '$comment' WHERE user_id = $user_id";
            mysqli_query($dbconn, $query);
            echo true;
        } else {

        // Otherwise we insert the comment
            $query = "INSERT INTO Reviews VALUES (NULL, $product_id, $user_id, NULL, $comment)";

            $comment = mysqli_query($dbconn, $query);
            
            if($comment) {
                echo true;
            } else {
                echo false;
            }


        }

        mysqli_close($dbconn);


    }
   
       

?>
    