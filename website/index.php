<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>StarTrader</title>
    <!-- Enter a brief description of your page -->
    <meta name="a e-commerce website with relation database" content="not yet decided">
    <!-- Define a viewport to mobile devices to use - telling the browser to assume that the page is as wide as the device (width=device-width,
    and setting the initial page zoom level to be 1 (initial-scale=1.0), and fixing width=device-width for iOS9 (shtink-to-fit=no) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="shortcut icon" href="fa-rocket.ico">
    <!-- Include the site stylesheet -->
    <link href="/css/styles.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <script src="/js/cart/addToCartOnClick.js" type="text/javascript"></script>
    <script src="/js/init/initNavButtons.js" type="text/javascript"></script> 
    <script src="/js/cart/shopCartBtnUpdateQuantitySubmit.js" type="text/javascript"></script>
    <script src="/js/product/searchRequest.js" type="text/javascript"></script>
</head>

<body onload ='initNavButtons();'>

    <?php
        echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initHeader.php';
    ?>

    <!-- If you want to use an element as a wrapper, i.e. for styling only, then <div> is still the element to use -->
    <div class="wrap">

        <!-- The <main> element is used to enclose the main content, i.e. that which contains the central topic of a document -->
        <!-- ARIA: the landmark role "main" is added here as it contains the main content of the document, and it is recommended to add it to the
        <main> element until user agents implement the required role mapping. -->
        
        
        <main role="main">
            <!-- PROTOTYPE. This is the grid for the shop, each item is a square and inside the
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
