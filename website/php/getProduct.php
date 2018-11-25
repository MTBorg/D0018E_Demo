

<?php


function getProduct($product_id) {
    include_once 'dbConnect.php';

   
    $dbconn = dbConnect();



    $query = "SELECT * FROM Products WHERE Products.id = $product_id";

    $product = mysqli_query($dbconn, $query);

 

    while ($row = mysqli_fetch_array($product)) {
        // Hence we do not need to know the url only the name
        echo '<div id="'.$row['id'].'" class="product">';
        echo '<img src="../'. $row['img_url'] .'">';
        echo '<p id="namePos"> <b>name</b>: ' . $row['name'] . '</p>';
        echo '<p id="pricePos"> <b>price</b>: ' . $row['price'] . '</p>';
        echo '<p id="stockPos"> <b>stock</b>: ' . $row['stock'] . '</p>';
        echo '</div>';
        
}         
}


?>


