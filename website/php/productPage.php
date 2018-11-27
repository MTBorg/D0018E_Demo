<!DOCTYPE html>
<html>
<head>
	<link href="../css/styles.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Log in</title>
         
    <script src="../js/initReview.js" type="text/javascript"></script>
    <script src="../js/starRate.js" type="text/javascript"></script>




</head>	
<body onload='initReview();'> 
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
                            <span class="fa fa-star" onclick=starRate(5);></span>
                            <span class="fa fa-star" onclick=starRate(4);></span>
                            <span class="fa fa-star" onclick=starRate(3);></span>
                            <span class="fa fa-star" onclick=starRate(2);></span>
                            <span class="fa fa-star" onclick=starRate(1);></span>
</div>

                    </td>
                    </tr>
                    <tr>
                        <td><p class="submitTextBlack">Comment: </p></td>
                        <td><textarea rows="4" cols="50" placeholder="How did you like the product?"></textarea></td>
                    </tr>


                </table>
                <input type="submit" class="Button" value="Submit">
                    </form>

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
