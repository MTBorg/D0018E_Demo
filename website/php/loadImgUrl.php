

<?php

    function loadProducts() {
        include 'dbConnect.php';
        $dbconn = dbConnect();


        $query = "SELECT img_url FROM Products";

        $products = mysqli_query($dbconn, $query);

        if($products) {
            // Fetch associated array
            while ($row = mysqli_fetch_array($products)) {
                // Hence we do not need to know the url only the name
                echo '<div class="item">';
                echo '<img src="'. $row['img_url'] .'">';
                echo '</div>';
            
                

            }
         } else {
            echo '<p> No products ... </p>';
        }
                
    }

?>


