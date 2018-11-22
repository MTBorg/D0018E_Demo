<?php
    

    include 'dbConnect.php';
    include_once 'isLoggedIn.php';



    
    $prodID = intval($_GET['id']);
    $dbconn = dbConnect();

    // Handle is user logged in
    if(isLoggedIn()) {
    $queryProduct = "SELECT * FROM Products WHERE Products.id = $prodID";

    $product = mysqli_query($dbconn, $queryProduct);
    

    # Create an array of the query result
    $prodInfo = mysqli_fetch_array($product);
    
    # The product is in stock
    if ($prodInfo['stock'] > 0) {
        $newStock = $prodInfo['stock'] - 1;
        $queryOrder = "UPDATE Products SET stock=".$newStock." WHERE id=".$prodInfo['id'].";";
        mysqli_query($dbconn, $queryOrder);

        echo $newStock;

        # Insert the order into Orders (store user_id and status)
        # OBS: status is coded as temp since we havent fixed any status handling yet.
        $user_id = $_SESSION["user_id"];
        $queryInsertOrder = 'INSERT INTO Orders VALUES (NULL, '.$user_id.', "temp");';
        mysqli_query($dbconn, $queryInsertOrder);

        # The function INSERT_ID() returns the ID that was generated latest by this connection ($dbconn)
        # In other words, it's unaffected by other queries from other users etc.
        $orderID = mysqli_insert_id($dbconn);

        # Create a order line for the product
        $queryAddOrderLine = 'INSERT INTO OrderLines VALUES ('.$orderID.', '.$prodInfo['id'].', 1, '.$prodInfo['price'].');';
        mysqli_query($dbconn, $queryAddOrderLine);

    } else {
        echo $prodInfo['stock'];
    }
        

// If user not logged in
} else {
    // Only solution I found
    echo -1; 
}
?>
    