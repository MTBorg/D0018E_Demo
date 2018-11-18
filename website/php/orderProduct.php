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
        $queryOrder = "UPDATE Products SET stock=".$newStock." WHERE id=".$prodInfo['id'];
        mysqli_query($dbconn, $queryOrder);

        echo $newStock;

        # Store the order in the table Orders
        # NEED IN THE FUTURE: We need to implement a way to get the user_id (See Zube card)
        # The temp value for user_id is 1 right now, THERE NEEDS TO BE A USER WITH ID 1 in your Users database for this to work.
        // session_start(); HUGO VAFAN!!!! JAG SATT OCH FELSÖKTE I TIMMAR!!!!
        $user_id = $_SESSION["user_id"];
        $queryInsertOrder = "INSERT INTO Orders VALUES (NULL, ".$user_id.", ".$prodInfo['id'].")";
        mysqli_query($dbconn, $queryInsertOrder);

    } else {
        echo $prodInfo['stock'];
    }
        

// If user not logged in
} else {
    // Do not change this to false wihoout "" since it will collide with above echo stock
    echo "false";
}
?>
    