

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
                echo '<div class="item">';
                echo '<img src="'. $row['img_url'] .'">';
                echo '<p id="namePos">' . $row['name'] . '</p>';
                echo '<p id="pricePos">' . $row['price'] . '</p>';
                echo '<p id="stockPos">' . $row['stock'] . '</p>';
                echo '<p id="ratingPos">' . $row['rating'] . '</p>';
                echo '<button name="'.$row['name'].'" type="button">Order</button>';
                echo '</div>';
                
            }
         } else {
            echo '<p> No products ... </p>';
        }
                
    }

?>


