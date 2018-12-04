<?php
    require_once 'dbConnect.php';

    $dbconn = dbConnect();

    $resetOrders = "DELETE FROM Orders;";
    $resetOrdersID = " ALTER TABLE Orders AUTO_INCREMENT = 1;";

    mysqli_query($dbconn, $resetOrders);
    mysqli_query($dbconn, $resetOrdersID);

    $resetProducts = "DELETE FROM Products;";
    $resetProductsID = " ALTER TABLE Products AUTO_INCREMENT = 1;";

    mysqli_query($dbconn, $resetProducts);
    mysqli_query($dbconn, $resetProductsID);

    mysqli_close($dbconn);

?>
