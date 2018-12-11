<!DOCTYPE html>
<html>
<head>
	<link href="/css/styles.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/normalize.css" rel="stylesheet" media="all">
	<title>Product Page</title>
   
    <script src="/js/init/initNavButtons.js" type="text/javascript"></script>
    <script src="/js/review/initReviews.js" type="text/javascript"></script>
    <script src="/js/review/starRate.js" type="text/javascript"></script>
    <script src="/js/review/setColor.js" type="text/javascript"></script>
    <script src="/js/review/addComment.js" type="text/javascript"></script>
    <script src="/js/cart/addToCartOnClick.js" type="text/javascript"></script>
    <script src="/js/cart/shopCartBtnUpdateQuantitySubmit.js" type="text/javascript"></script>
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
        <div class="add-product-review">
        <p> Add review </p>
            <form action="" method="post" target="_self">
                <table class="addReview">
                    <tr>
                        <td><p class="submitTextBlack">Rate: </p></td>
                        <td>
                            <div class="star-rating">
                            <!-- You might think the parameters of function call are wrong BUT they are NOT! Check style.css -> .star-rating they have been reversed for reasons... -->
                            <span id="5" class="fa fa-star" onclick=setColor(5);starRate(5); style="display:inline;"></span>
                            <span class="fa fa-star fa-star-color" style="display:none;"></span>
                            <span id="4"class="fa fa-star" onclick=setColor(4);starRate(4); style="display:inline;"></span>
                            <span class="fa fa-star fa-star-color" style="display:none;"></span>
                            <span id="3" class="fa fa-star" onclick=setColor(3);starRate(3);  style="display:inline;"></span>
                            <span class="fa fa-star fa-star-color" style="display:none;"></span>
                            <span id="2" class="fa fa-star" onclick=setColor(2);starRate(2); style="display:inline;"></span>
                            <span class="fa fa-star fa-star-color" style="display:none;"></span>
                            <span id="1"class="fa fa-star" onclick=setColor(1);starRate(1); style="display:inline;"></span>
                            <span class="fa fa-star fa-star-color" style="display:none;"></span>
                            </div>
                    </td>
                    </tr>
                    <tr>
                        <td><p>Comment: </p></td>
                        <td><textarea id="comment" rows="4" cols="50" placeholder="How did you like the product?"></textarea></td>
                    </tr>
                </table>
                    </form>
                    <button type="submit" value="Submit comment" onclick=addComment();>Submit</button>

                    <button type="reset" value="Reset" onclick=resetReview();>Reset</button>
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
	
<?php
echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initFooter.php';
?>
</body>

</html>
