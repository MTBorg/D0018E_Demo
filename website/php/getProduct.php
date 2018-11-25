

<?php

    include 'dbConnect.php';

    $prodID = intval($_GET['id']);
    $dbconn = dbConnect();



    $query = "SELECT * FROM Products WHERE Products.id = $prodID";

    $products = mysqli_query($dbconn, $query);

 

    while ($row = mysqli_fetch_array($products)) {
        // Hence we do not need to know the url only the name
        echo '<div id="'.$row['id'].'" class="product">';
        echo '<img src="'. $row['img_url'] .'">';
        echo '<p id="namePos"> <b>name</b>: ' . $row['name'] . '</p>';
        echo '<p id="pricePos"> <b>price</b>: ' . $row['price'] . '</p>';
        echo '<p id="stockPos"> <b>stock</b>: ' . $row['stock'] . '</p>';
        // echo '<p id="ratingPos"> <b>rating</b>: ' . $row['rating'] . '</p>';
        echo '</div>';
        
}         



?>


