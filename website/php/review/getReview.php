<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    $dbconn = dbConnect();
    $product_id = intval($_GET['id']);

    $query = "SELECT comment, rating, user_id FROM Reviews WHERE Reviews.product_id = $product_id";
    $review = mysqli_query($dbconn, $query);

    // Default text if now reviews have been made yet
    if (mysqli_num_rows($review) > 0) {
        // Print the reviews
        while ($row = mysqli_fetch_object($review)) {
            echo $row->comment . "|";
            echo $row->rating . "|";

            // Get first name of the user who made the comment
            $query = 'SELECT first_name FROM Users WHERE Users.id =  ' .$row->user_id. ';';
            $first_name = mysqli_query($dbconn, $query);

            $row = mysqli_fetch_object($first_name);
            echo $row->first_name . "|";
        }
    } else {
        echo 0;
    }
?>