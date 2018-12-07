<?php
    //Make sure all POST arguments have been set
    if(!isset($_POST["order_id"]) or !isset($_POST["status"])){
        echo "Missing POST argument";
        return;
    }
    $order_id = $_POST["order_id"];
    $status = $_POST["status"];

    //Connect to the database
    include_once $_SERVER["DOCUMENT_ROOT"].'/php/db/dbConnect.php';
    $dbConn = dbConnect();
    if(!$dbConn){
        echo "Failed to connect to database";
        return;
    }

    //Query the database
    $query = 'UPDATE Orders SET
               status="'.$status.'"
                WHERE id='.$order_id.' ;';
    $result  = mysqli_query($dbConn, $query);
    if(!$result){
        echo "Error quering database: ".mysqli_error($dbConn);
    }else{
        echo 1;
    }

    mysqli_close($dbConn);
?>