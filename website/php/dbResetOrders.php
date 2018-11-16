<?php
    require_once 'dbConnect.php';

    $dbconn = dbConnect();

    $resetOrders = "DELETE FROM Orders;";
    $resetOrdersID = " ALTER TABLE Orders AUTO_INCREMENT = 1;";

    mysqli_query($dbconn, $resetOrders);
    mysqli_query($dbconn, $resetOrdersID);

    mysqli_close($dbconn);

?>
