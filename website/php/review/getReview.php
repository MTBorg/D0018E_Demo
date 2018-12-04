<?php


include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
$dbconn = dbConnect();
$product_id = intval($_GET['id']);

$query = "SELECT comment, rating, user_id FROM Reviews WHERE Reviews.product_id = $product_id";
$review = mysqli_query($dbconn, $query);


    
    // Check if review exists
while ($row = mysqli_fetch_object($review)) {
    // $comment_array = array('comment' => $row['comment']);
    // echo $row['comment'] . "|";
    // echo json_encode($comment_array);
    // echo .$row['rating'];
    echo $row->comment . "|";
    echo $row->rating . "|";
 

        // Get first name of the user who made the comment
    $query = 'SELECT first_name FROM Users WHERE Users.id =  ' .$row->user_id. ';';
    $first_name = mysqli_query($dbconn, $query);

    $row = mysqli_fetch_object($first_name);
    // $first_name_array = array('first_name' => $row['first_name']);
    // echo $row['first_name'] . "|";
    // echo json_encode($first_name_array);
    echo $row->first_name . "|";

}





?>