<?php

function getReview($product_id)
{
    include_once 'dbConnect.php';


    $dbconn = dbConnect();



    $query = "SELECT comment FROM Reviews WHERE Reviews.product_id = $product_id";

    $review = mysqli_query($dbconn, $query);



    if ($row = mysqli_fetch_array($review)) {
        // Hence we do not need to know the url only the name


        echo '<p> <b>comment</b>: ' . $row['comment'] . '</p>';



    } else {
        echo 'No product review exist...';
    }
}

?>