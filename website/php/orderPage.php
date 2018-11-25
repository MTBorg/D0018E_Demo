<!DOCTYPE html>
<html>
<head>
    <title> Order </title>

    <link  href="../css/styles.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/initNavButtons.js" type="text/javascript"></script>
</head>
<body onload="initNavButtons()">

    <header role="banner">
        <!-- When you press the header you will be redirect to home -->
        <a href="../index.php" style = "text-decoration:none">
		    <h1 id="logoText"> StarTrader </h1>
            <h3 id="logoSlogan"> The biggest market in the universe </h3>
        </a>

        <!-- ARIA: the landmark role "navigation" is added here as the element contains site navigation
        NOTE: The <nav> element does not have to be contained within a <header> element, even though the two examples on this page are. -->
        <nav role="navigation">
            <!-- This can contain your site navigation either in an unordered list or even a paragraph that contains links that allow users to navigate your site -->
        <div>
            <div class="dropdown">
                <button class="dropbutton fa fa-align-justify" style="font-size: 36px;color: white;"></button>
		<!-- <i id="navIcon" class="fa fa-align-justify" style="font-size:36px; color:white"></i> -->
                <div class="dropdown-content">
                    <a href="../index.php">Home</a>
                    <a href="#">Category</a>
                    <a href="#">Contact</a>
                    <a href="#">About</a>   
                </div>
            </div>
            <a href="../php/adminpage.php" id="adminMain" class="Button">Admin panel</a>
	        <a href="/php/createUserPage.php" id="signUpMain" class="Button initHidden">Sign up</a>
            <a href="/php/logOut.php" id="logOutMain" class="Button initHidden">Log out</a>
            <a href="/php/myOrdersPage.php" id="myOrders" class="Button initHidden">My Orders</a>
            <a href="/php/shoppingCartPage.php"> <i class="fa fa-shopping-cart initHidden" style="display:none" id="shoppingCart"></i></a>
            <a href="/php/loginpage.php" id="logInMain" class="Button initHidden">Log In</a>
        </div>
        </nav>
        

    </header>

    <?php
        include_once 'dbConnect.php';
        $dbconn = dbConnect();

        if(!$dbconn){
            echo '<p>Failed to connect to database</p>';
            return;
        }

        $order_id;
        if(isset($_GET["order_id"])){
            $order_id = $_GET["order_id"];
        }else{
            echo '<p>Order id not set in GET request';
            return;
        }

        echo '<table class="ordersTable">';
        echo '<tr class="ordersTableHeader">';
        echo '<th></th><th>Product ID</th><th>Product name</th><th>Quantity</th>';
        echo '<th>Price</th><th>Sum</th>';
        echo '</tr>';
  
        $query = 'SELECT * FROM OrderLines WHERE order_id='.$order_id.';';
        $orderLines = mysqli_query($dbconn, $query);
        if($orderLines){
            while($line = mysqli_fetch_array($orderLines)){
                $product_id = $line["product_id"];
                $quantity = $line["quantity"];
                $price = $line["price"];

                $sum = $quantity * $price;

                //Get the name and image url
                $query = 'SELECT name, img_url FROM Products WHERE id='.$product_id.';';
                $result = mysqli_query($dbconn, $query);
                $obj = mysqli_fetch_object($result);
                $name = $obj->name;
                $img_url = $obj->img_url;

                echo '<tr>';
                echo '<td><img src="../'.$img_url.'" alt="Product image" style="width:64px;height:64px"></img></td>';
                echo '<td>'.$product_id.'</td>';
                echo '<td>'.$name.'</td>';
                echo '<td>'.$quantity.'</td>';
                echo '<td>'.$price.'</td>';
                echo '<td>'.$sum.'</td>';
                echo '</tr>';
            }
        }else{
            echo '<p>Failed to get orderlines</p>';
            return;
        }

        echo '</table>';
    ?>
    <div style="text-align:center; margin-top:10px">
        <button onClick='window.location="myOrdersPage.php"'>Go back</button>
    </div>
</body>
</html>