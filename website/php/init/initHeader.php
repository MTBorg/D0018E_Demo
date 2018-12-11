<?php
    $quantity_sum = include $_SERVER["DOCUMENT_ROOT"].'/php/cart/getShopCartQuantitySum.php';
    if($quantity_sum == 0){
        $quantity_sum = '';
    }else{
        $quantity_sum = '('.$quantity_sum.')';
    }
    return '<header role="banner">
        <a href="/index.php" style = "text-decoration:none">
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
            
            
            <form action="javascript:searchRequest()" method ="post" target="_self">
                <input class="searchBar" placeholder="Search here..." type ="text" id = "searchInput">
                <button type ="submit" value="Submit" class="searchButton"><i id="searchLogo" class="fas fa-search"></i></button>
            </form>
            
            <a href="/php/pages/adminPage.php" id="adminMain" class="navButton initHidden">Admin panel</a>
	        <a href="/php/pages/createUserPage.php" id="signUpMain" class="navButton initHidden">Sign up</a>
            <a href="/php/account/logOut.php" id="logOutMain" class="navButton initHidden">Log out</a>
            <a href="/php/pages/myOrdersPage.php" id="myOrders" class="navButton initHidden">My Orders</a>
            <a href="/php/pages/shoppingCartPage.php" id="shoppingCart" class="navButton initHidden"> Shopping Cart <span id="shoppingCartBtnQuantity">'.$quantity_sum.'</span> <i class="fa fa-shopping-cart"></i></a>
	        <a href="/php/pages/loginPage.php" id="logInMain" class="navButton initHidden">Log In</a>
        </div>
        </nav>
    </header>
    ';
?>