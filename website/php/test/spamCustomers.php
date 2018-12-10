<?php
    //Make sure the GET request parameter is set
    if(!isset($_GET["amount"])){
        echo '<script> alert("Please set the amount in the url (spamCustomers.php?amount=<amount>)"); </script>';
        return;
    }

    //Connect to database
    include_once $_SERVER["DOCUMENT_ROOT"].'/php/db/dbConnect.php';
    $dbConn = dbConnect();
    if(!$dbConn){
        echo '<script> alert("Failed to connect to database"); </script>';
        return;
    }

    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXY'; //String holding all characters possible to generate
    $email_length_max = 15;
    
    $customer_amount = $_GET["amount"];
    $customers_inserted = $customer_amount;
    for($i = 0; $i < $customer_amount; $i++){

        //Generate random email
        $email_length = rand(1, $email_length_max);
        $email = '"';
        for($j = 0; $j < $email_length; $j++){
            $email = $email.$chars[rand(0, strlen($chars) - 1)];
        }
        $email = $email.'.com"';


        $query = 'INSERT INTO Users VALUES(NULL, 
                                                0,' //role_id (customer=0)
                                                .$i.',' //first name
                                                .$i.',' //last name
                                                .$email.',' //email
                                                .$i.');'; //password
        if(!mysqli_query($dbConn, $query)){
            echo "<p>Failed to insert customer</p>";
            $customers_inserted--;
        }
    }
    echo '<p> Done! Added '.$customers_inserted.' customers</p>';
?>