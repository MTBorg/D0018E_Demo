<?php
    
    function orderProduct() {
        include 'dbConnect.php';
       
        $prodID = intval($_GET['id']);
        $dbconn = dbConnect();

        $queryProduct = "SELECT * FROM Products WHERE Products.id = $prodID";

        $product = mysqli_query($dbconn, $queryProduct);
        
        // If the product exists
        if ($product) {
            // Create an array of the query result
            $prodInfo = mysqli_fetch_array($product);
            
            // The product is in stock
            if ($prodInfo['stock'] > 0) {
                $newStock = $prodInfo['stock'] - 1;
                $queryOrder = "UPDATE Products SET stock=".$newStock." WHERE id=".$prodInfo['id'];
                mysqli_query($dbconn, $queryOrder);

                echo $newStock;
            } else {
                echo $prodInfo['stock'];
            }
            
        }

    }

?>
    