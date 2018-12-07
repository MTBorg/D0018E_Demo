<?php
    if(isset($_POST["user_id"]) && isset($_POST["product_id"])){
        $user_id = $_POST["user_id"];
        $product_id = $_POST["product_id"];
        
        include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
        $dbconn = dbConnect();

        $query = 'DELETE FROM ShoppingCartLines WHERE
        user_id='.$user_id.' AND product_id='.$product_id.';';

        $result = mysqli_query($dbconn, $query);
        if($result == false){
            echo "Failed to remove item from shopping cart";
        }

        mysqli_close($dbconn);
        echo true;
    }else{
        echo false;
    }
?>
