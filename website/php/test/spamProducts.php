<?php
    //Make sure the GET request parameter is set
    if(!isset($_GET["amount"])){
        echo '<script> alert("Please set the amount in the url (spamProducts.php?amount=<amount>)"); </script>';
        return;
    }

    //Connect to database
    include_once $_SERVER["DOCUMENT_ROOT"].'/php/db/dbConnect.php';
    $dbConn = dbConnect();
    if(!$dbConn){
        echo '<script> alert("Failed to connect to database"); </script>';
        return;
    }

    //Get the maximum category id so we know what
    //range to generate random category id's from
    $query = 'SELECT MAX(id) AS cat_id_max FROM Categories'; 
    $result = mysqli_query($dbConn, $query);
    if(!$result){
        echo '<script> alert("Failed to get max category id from database"); </script>';
        return;
    }
    $cat_id_max = mysqli_fetch_object($result)->cat_id_max;

    $price_rand_max = 10000;
    $stock_rand_max = 50;
    $item_amount = $_GET["amount"];
    $items_inserted = $item_amount;
    for($i = 0; $i < $item_amount; $i++){
        $price = rand(1, $price_rand_max);
        $stock = rand(0, $stock_rand_max);
        $cat_id = rand(1, $category);
        $img_url = '"/img/test/'.rand(1,3).'.jpg"';
        $query = 'INSERT INTO Products VALUES(NULL, 
                                                '.$i.',' //name
                                                .$price.',' //price
                                                .$stock.',' //stock
                                                .$img_url.',' //img_url
                                                .$cat_id.',0);'; //cat_id + archived(false)
        if(!mysqli_query($dbConn, $query)){
            echo "<p>Failed to insert product</p>";
            $items_inserted--;
        }
    }
    echo '<p> Done! Added '.$items_inserted.' items</p>';
?>