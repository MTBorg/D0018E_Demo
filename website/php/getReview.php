<?php

function getReview($product_id)
{
    include_once 'dbConnect.php';
    $dbconn = dbConnect();


    $query = "SELECT comment FROM Reviews WHERE Reviews.product_id = $product_id";
    $review = mysqli_query($dbconn, $query);
    
    // Test if successfull query
    if ($row = mysqli_fetch_array($review)) {
        echo $row['comment'];

    } else {
        echo 'No product review exist...';
    }
}

?>