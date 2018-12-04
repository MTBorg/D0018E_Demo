<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>

    <link href="/css/styles.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/js/checkoutSubmit.js" type="text/javascript"></script>
    <script src="/js/initNavButtons.js" type="text/javascript"></script>
    <script src="/js/shopCartAlterQuantitySubmit.js" type="text/javascript"></script>
</head>
<body onload="initNavButtons()">
    <?php
        echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initHeader.php';
        include $_SERVER['DOCUMENT_ROOT'].'/php/cart/loadShoppingCart.php';
        loadShoppingCart();
    ?>

    <div style="text-align:center">
        <button  id="checkoutButton" onClick="checkoutSubmit()">Checkout</button>
        <button onClick='window.location = "/index.php"'>Go back</button>
    </div>
</body>
<?php
echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initFooter.php';

?>
</html>