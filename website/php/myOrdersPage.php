<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>

    <link rel="stylesheet" href="../css/styles.css" media="all">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="../js/initNavButtons.js" type="text/javascript"></script> 
</head>
<body onload="initNavButtons()">
    <?php
        echo include_once 'initHeader.php';
        include_once 'loadMyOrders.php';
        loadMyOrders();
    ?>

    <div style="text-align:center; margin-top:10px">
        <button onClick="window.location='../index.php'"> Go back</button>
    </div>
</body>
</html>