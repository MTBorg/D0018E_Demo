<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    
    $prod_id = $_POST["id"];

    $query = "UPDATE Products SET archived = 1 WHERE id = $prod_id;";
    $dbconn = dbConnect();
    $result = mysqli_query($dbconn, $query);

    if(!$result) {
        echo mysqli_error($dbconn);
    }

    mysqli_close($dbconn);
?>