<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Shopping Cart</title>
    <link rel="shortcut icon" href="/fa-rocket.ico">
    <link href="/css/styles.css" rel="stylesheet" media="all">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/js/cart/checkoutSubmit.js" type="text/javascript"></script>
    <script src="/js/init/initNavButtons.js" type="text/javascript"></script>
    <script src="/js/cart/shopCartAlterQuantitySubmit.js" type="text/javascript"></script>
    <script src="/js/cart/removeShoppingCartItemSubmit.js" type="text/javascript"></script>
    <script src="/js/cart/goToProduct.js" type="text/javascript"></script>
    <script src="/js/cart/cancelEvent.js" type="text/javascript"></script>
    <script src="/js/product/searchRequest.js" type="text/javascript"></script>
</head>
    
<body onload="initNavButtons();">

    <!-- Load a users shopping cart -->
    <?php
        echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initHeader.php';
        include $_SERVER['DOCUMENT_ROOT'].'/php/cart/loadShoppingCart.php';
        loadShoppingCart();
    ?>

    <!-- Create checkout button -->
    <div style="text-align:center">
        <button  id="checkoutButton" onClick="checkoutSubmit()">Checkout</button>
        <button onClick='window.location = "/index.php"'>Go back</button>
    </div>
</body>

<?php
    echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initFooter.php';
?>

</html>