

<?php

    function loadProducts() {
        include 'dbConnect.php';
        $dbconn = dbConnect();


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
                echo '<a href="../php/productPage.php?product_id='.$row['id'].'"><button>Review</button></a>';
                echo '<button id="'.$row['id'].'" type="button" onclick="addToCartOnClick(this.id)">Add to cart</button>';
                echo '</div>';
                
            }
         } else {
            echo '<p> No products ... </p>';
        }
                
    }

?>


