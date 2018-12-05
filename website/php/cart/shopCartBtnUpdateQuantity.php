<?php
    include_once '../db/dbConnect.php'; //TODO: This maybe should use the include below, but that produces an error
    //include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php'
    $dbConn = dbConnect();

    
    //Get user id
    $user_id;
    session_start();
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }else{
        echo "Not logged in";
    }

    //Get the sum of the item quantities
    $query = 'SELECT SUM(quantity) AS quantity_sum FROM ShoppingCartLines WHERE user_id='.$user_id.';';
    $result = mysqli_query($dbConn, $query);

    if(!$result){
        echo "Failed to query database";
    }else{
        $quantity_sum = mysqli_fetch_object($result)->quantity_sum;
        echo $quantity_sum == NULL ? 0 : $quantity_sum; //Note: Select SUM... returns null if sum=0, but we need integers in the ajax request so return 0 if NULL
    }
?>