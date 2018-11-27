<?php
    return '<header role="banner">
        <a href="../index.php" style = "text-decoration:none">
		    <h1 id="logoText"> StarTrader </h1>
            <h3 id="logoSlogan"> The biggest market in the universe </h3>
        </a>

        <nav role="navigation">
        <div>
            <div class="dropdown">
                <button class="dropbutton fa fa-align-justify" style="font-size: 36px;
                color: white;"></button>
                <div class="dropdown-content">
                    <a href="../index.php">Home</a>
                    <a href="#">Category</a>
                    <a href="#">Contact</a>
                    <a href="#">About</a>   
                </div>
            </div>
            <a href="/php/adminpage.php" id="adminMain" class="Button">Admin panel</a>
	        <a href="/php/createUserPage.php" id="signUpMain" class="Button initHidden">Sign up</a>
            <a href="/php/logOut.php" id="logOutMain" class="Button initHidden">Log out</a>
            <a href="/php/myOrdersPage.php" id="myOrders" class="Button initHidden">My Orders</a>
            <a href="/php/shoppingCartPage.php"> <i class="fa fa-shopping-cart initHidden" style="display:none" id="shoppingCart"></i></a>
	        <a href="/php/loginpage.php" id="logInMain" class="Button initHidden">Log In</a>
        </div>
        </nav>
    </header>
    ';
?>