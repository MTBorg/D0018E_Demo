

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
                echo '<p id="namePos"> <b>name</b>: ' . $row['name'] . '</p>';
                echo '<p id="pricePos"> <b>price</b>: ' . $row['price'] . '</p>';
                echo '<p id="stockPos"> <b>stock</b>: ' . $row['stock'] . '</p>';
                // echo '<p id="ratingPos"> <b>rating</b>: ' . $row['rating'] . '</p>';
                
                if(isAdmin()) {
                    echo '<button id="'.$row['id'].'" type="button">Add to cart</button>';
                } else {
                    echo '<button id="'.$row['id'].'" type="button" onclick="addToCartOnClick(this.id)">Add to user</button>';
                }
                echo '</div>';
                
            }
         } else {
            echo '<p> No products ... </p>';
        }
                
    }

?>


