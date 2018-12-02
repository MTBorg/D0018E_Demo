

<?php

    function loadProducts() {
        include_once 'isAdmin.php';
        include_once 'isLoggedIn.php';
        include_once 'dbConnect.php';
        $dbconn = dbConnect();
        
        if(!isset($_SESSION["user_id"])) {
            @session_start();
        }
        
        $query = "SELECT * FROM Products";

        $products = mysqli_query($dbconn, $query);
        
        if($products) {
            // Fetch associated array
            while ($row = mysqli_fetch_array($products)) {
                // Hence we do not need to know the url only the name
                echo '<div id="'.$row['id'].'" class="item">';
                echo '<img src="'. $row['img_url'] .'">';
                echo '<p id="namePos">' . $row['name'] . '</p>';
                echo '<p id="pricePos">' . $row['price'] . '$</p>';
                echo '<p id="stockPos"> <b>stock</b>: ' . $row['stock'] . '</p>';
                // echo '<p id="ratingPos"> <b>rating</b>: ' . $row['rating'] . '</p>';

                if(isAdmin()) {
                    echo '<button id="'.$row['id'].'" class="addToCartButton" type="button">Add to cart <i class="fa fa-shopping-cart"></i></button>';
                } else {
                    echo '<a href="../php/productPage.php?product_id='.$row['id'].'"><button>Review</button></a>';
                    echo '<button id="'.$row['id'].'" class="addToCartButton" type="button" onclick="addToCartOnClick(this.id)">Add to Cart<i class="fa fa-shopping-cart"></i></button>';
                }
                echo '</div>';
                
            }
         } else {
            echo '<p> No products ... </p>';
        }
                
    }

?>


