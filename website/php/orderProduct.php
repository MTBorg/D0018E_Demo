<?php
    
    function orderProduct($prodID) {
        require_once 'dbConnect.php'
        $dbconn = dbConnect();

        $queryProduct = "SELECT * FROM Products WHERE Products.id == $prodID";

        $product = mysqli_query($dbconn, $queryProduct);
        
        

    }

?>