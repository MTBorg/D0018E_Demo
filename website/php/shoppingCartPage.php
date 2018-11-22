<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>

    <link href="../css/styles.css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header role="banner"> 
        <a href="../index.php" style="text-decoration:none">
            <h1 id="logoText"> StarTrader </h1>
		    <h3 id="logoSlogan"> The biggest market in the universe </h3>
        </a>

        <nav role="navigation">
		    <i id="navIcon" class="fa fa-align-justify" style="font-size:36px; color:white"></i>
        </nav>
    </header>

    <?php
        include 'loadShoppingCart.php';
        loadShoppingCart();
    ?>

    <div style="text-align:center">
        <button id="checkoutButton">Checkout</button>
    </div>
</body>
</html>