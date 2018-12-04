<?php
    return '<header role="banner">
        <a href="../../index.php" style = "text-decoration:none">
		    <h1 id="logoText"> StarTrader <i id="logoIcon" class="fa fa-rocket"></i> </h1>
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
            <a href="../php/pages/adminPage.php" id="adminMain" class="navButton initHidden">Admin panel</a>
	        <a href="../php/pages/createUserPage.php" id="signUpMain" class="navButton initHidden">Sign up</a>
            <a href="../php/account/logOut.php" id="logOutMain" class="navButton initHidden">Log out</a>
            <a href="../php/pages/myOrdersPage.php" id="myOrders" class="navButton initHidden">My Orders</a>
            <a href="../php/pages/shoppingCartPage.php" id="shoppingCart" class="navButton initHidden"> Shopping Cart <i class="fa fa-shopping-cart"></i></a>
	        <a href="../php/pages/loginPage.php" id="logInMain" class="navButton initHidden">Log In</a>
        </div>
        </nav>
    </header>
    ';
?>