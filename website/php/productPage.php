<!DOCTYPE html>
<html>
<head>
	<link href="../css/styles.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Log in</title>
         
    <script src="../js/initReviews.js" type="text/javascript"></script>
    <script src="../js/starRate.js" type="text/javascript"></script>
    <script src="../js/setColor.js" type="text/javascript"></script>
    <script src="../js/addComment.js" type="text/javascript"></script>




</head>	
<body onload='initReviews();'> 
	<header role="banner">
	<a href="../index.php" style = "text-decoration:none">
		<h1 id="logoText"> StarTrader </h1>
		<h3 id="logoSlogan"> The biggest market in the universe </h3>
</a>

        <nav role="navigation">
           

			<a href="createUserPage.php" id="signUpMain" class="Button">Sign up</a>
        </nav>
    </header>



     <div class="wrap">


<main role="main">


<div class="product-background">

<div class="product">

<?php
include 'getProduct.php';

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
                            <span class="fa fa-star" style="color: #0b3d91; display:none;"></span>
                            <span id="4"class="fa fa-star" onclick=setColor(4);starRate(4); style="display:inline;"></span>
                            <span class="fa fa-star" style="color: #0b3d91; display:none;"></span>
                            <span id="3" class="fa fa-star" onclick=setColor(3);starRate(3);  style="display:inline;"></span>
                            <span class="fa fa-star" style="color: #0b3d91; display:none;"></span>
                            <span id="2" class="fa fa-star" onclick=setColor(2);starRate(2); style="display:inline;"></span>
                            <span class="fa fa-star" style="color: #0b3d91; display:none;"></span>
                            <span id="1"class="fa fa-star" onclick=setColor(1);starRate(1); style="display:inline;"></span>
                            <span class="fa fa-star" style="color: #0b3d91; display:none;"></span>
</div>


                    </td>
                    </tr>
                    <tr>
                        <td><p class="submitTextBlack">Comment: </p></td>
                        <td><textarea id="comment" rows="4" cols="50" placeholder="How did you like the product?"></textarea></td>
                    </tr>


                </table>

                    </form>
                    <input type="submit" class="Button" value="Submit" onclick=addComment(); >

                    <input type="reset" class="Button" value="Reset" onclick=resetReview();>


        </div>

        <div class="product-review">

        <p> Product Review </p>
        
        <table class="Reviews">
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

</html>
