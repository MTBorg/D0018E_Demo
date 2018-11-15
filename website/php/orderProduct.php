<?php
    

    include 'dbConnect.php';
    
    $prodID = intval($_GET['id']);
    $dbconn = dbConnect();

    $queryProduct = "SELECT * FROM Products WHERE Products.id = $prodID";

    $product = mysqli_query($dbconn, $queryProduct);
    
    # If the product exists
    if ($product) {
        # Create an array of the query result
        $prodInfo = mysqli_fetch_array($product);
        
        # The product is in stock
        if ($prodInfo['stock'] > 0) {
            $newStock = $prodInfo['stock'] - 1;
            $queryOrder = "UPDATE Products SET stock=".$newStock." WHERE id=".$prodInfo['id'];
            mysqli_query($dbconn, $queryOrder);

            echo $newStock;

            # Store the order in the table Orders
            # NEED IN THE FUTURE: We need to implement a way to get the user_id (See Zube card)
            # The temp value for user_id is 1 right now, THERE NEEDS TO BE A USER WITH ID 1 in your Users database for this to work.
            $queryInsertOrder = "INSERT INTO Orders VALUES (NULL, 1, ".$prodInfo['id'].")";
            mysqli_query($dbconn, $queryInsertOrder);
        } else {
            echo $prodInfo['stock'];
        }
        
    }

    

?>
    