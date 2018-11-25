<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>

    <link rel="stylesheet" href="../css/styles.css" media="all">
</head>
<body>
    <header>
        <a href="../index.php" style = "text-decoration:none"> </a>
		<h1 id="logoText"> StarTrader </h1>
        <h3 id="logoSlogan"> The biggest market in the universe </h3>
    </header>
    
    <?php
        include_once 'loadMyOrders.php';
        loadMyOrders();
    ?>

    <div style="text-align:center; margin-top:10px">
        <button onClick="window.location='../index.php'"> Go back</button>
    </div>
</body>
</html>