

<?php

    function loadProducts() {
        include_once $_SERVER['DOCUMENT_ROOT'].'/php/account/isAdmin.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/php/account/isLoggedIn.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
        $dbconn = dbConnect();
        
        if(!isset($_SESSION["user_id"])) {
            @session_start();
        }
        
        $query = "SELECT * FROM Products";

        $products = mysqli_query($dbconn, $query);
        
        if($products) {
            // Fetch associated array
            while ($row = mysqli_fetch_array($products)) {
                
                
                // This is really stupid...
                if(isAdmin()) {
                    echo '<div id="'.$row['id'].'" class="item">';
                    // echo '<button id="'.$row['id'].'" class="addToCartButton" type="button">Add to cart <i class="fa fa-shopping-cart"></i></button>';
                    echo '<img src="'. $row['img_url'] .'">';
                    echo '<p id="namePos">' . $row['name'] . '</p>';
                    echo '<p id="pricePos">' . $row['price'] . '$</p>';
                    echo '<p id="stockPos"> <b>stock</b>: ' . $row['stock'] . '</p>';
                    // echo '<p id="ratingPos"> <b>rating</b>: ' . $row['rating'] . '</p>';
                    echo '<p><a class="div-click" href="/php/pages/adminProductPage.php?product_id='.$row['id'].'"></a></p>';


                } else {
                    echo '<div id="'.$row['id'].'" class="item">';
                    echo '<img src="'. $row['img_url'] .'">';
                    echo '<p id="namePos">' . $row['name'] . '</p>';
                    echo '<p id="pricePos">' . $row['price'] . '$</p>';
                    echo '<p id="stockPos"> <b>stock</b>: ' . $row['stock'] . '</p>';
                    // echo '<p id="ratingPos"> <b>rating</b>: ' . $row['rating'] . '</p>';
                    echo '<button id="'.$row['id'].'" class="addToCartButton" type="button" onclick="addToCartOnClick(this.id)">Add to Cart<i class="fa fa-shopping-cart"></i></button>';
                    echo '<p><a class="div-click" href="/php/pages/productPage.php?product_id='.$row['id'].'"></a></p>';

                }

                echo '</div>';

            }
         } else {
            echo '<p> No products ... </p>';
        }
                
    }

?>


