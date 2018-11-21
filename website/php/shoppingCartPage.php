<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>

    <link href="../css/styles.css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header role="banner">
        <nav role="navigation">

		    <h1 id="logoText"> StarTrader </h1>
		    <h3 id="logoSlogan"> The biggest market in the universe </h3>

            <i id="navIcon" class="fa fa-align-justify" style="font-size:36px; color:white"></i>
        </nav>
    </header>

    <?php
        include 'loadShoppingCart.php';
        loadShoppingCart();
    ?>
</body>
</html>