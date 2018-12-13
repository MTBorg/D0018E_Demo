<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>StarTrader</title>
    <meta name="a e-commerce website with relation database" content="everything you need for space">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="shortcut icon" href="fa-rocket.ico">
    <!-- site stylesheet -->
    <link href="/css/styles.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <!-- site scripts -->
    <script src="/js/cart/addToCartOnClick.js" type="text/javascript"></script>
    <script src="/js/init/initNavButtons.js" type="text/javascript"></script> 
    <script src="/js/cart/shopCartBtnUpdateQuantitySubmit.js" type="text/javascript"></script>
    <script src="/js/product/searchRequest.js" type="text/javascript"></script>
</head>

<body onload ='initNavButtons();'>

    <?php
        echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initHeader.php';
    ?>
    <div class="wrap">
       
        
        <main role="main">
            <!-- This is the grid for the shop, each item is a square and inside the
            item you can add images, buttons etc. -->
            <div class="shop" id = "shop">

                
                <?php
                if(!isset($_GET["search"])){
                include $_SERVER['DOCUMENT_ROOT'].'/php/product/loadProducts.php';
                loadProducts();
                }else{
                    include $_SERVER["DOCUMENT_ROOT"].'/php/product/searchProduct.php';
                }
                ?>


            </div>
            
        </main>
    </div>

<?php
echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initFooter.php';

?>

</body>

</html>
