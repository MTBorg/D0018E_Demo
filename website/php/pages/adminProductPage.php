<!DOCTYPE html>
<html>
<head>
    <link href="/css/normalize.css" rel="stylesheet" media="all">
	<link href="/css/styles.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Product Page</title>
    <script src="/js/init/initNavButtons.js" type="text/javascript"></script>
    <script src="/js/review/initReviews.js" type="text/javascript"></script>
    <script src="/js/review/starRate.js" type="text/javascript"></script>
    <script src="/js/review/setColor.js" type="text/javascript"></script>
    <script src="/js/review/addComment.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="/fa-rocket.ico">
</head>	
<body onload='initReviews(); initNavButtons();'> 

<?php
echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initHeader.php';
?>

     <div class="wrap">
<main role="main">
<div class="product-background">
<div class="product">
<?php
include $_SERVER['DOCUMENT_ROOT'].'/php/product/getProduct.php';

if (isset($_GET["product_id"])) {
    $product_id = $_GET["product_id"];

} else {
    echo '<p>Product id not set in GET request</p>';
    return;
}

    // Get product info as name, price and stock
getProduct($product_id);
?>
        </div>
        <div class="product-review">

        <p> Product Reviews </p>
        
        <table class="reviews">
                    <tr>
                        <td>
                        <div id="userBox"></div>
                        
                        </td>
                    </tr>
                </table>
        </div>
</div>
</main>
</div>
</body>
<?php
echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initFooter.php';
?>
</html>
