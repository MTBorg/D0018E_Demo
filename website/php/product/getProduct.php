<?php
function getProduct($product_id)
{
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/account/isAdmin.php';
    $dbconn = dbConnect();
    session_start();
    $query = "SELECT * FROM Products WHERE Products.id = $product_id";
    $product = mysqli_query($dbconn, $query);

    if ($row = mysqli_fetch_array($product)) {
        echo '<img src="' . $row['img_url'] . '">';
        echo '<p>' . $row['name'] . '</p>';
        echo '<p>' . $row['price'] . '$</p>';
        echo '<p> <b>stock</b>: ' . $row['stock'] . '</p>';
        
        if(!isAdmin()) {
            echo '<button class="addToCartButton" type="button" onclick="addToCartOnClick('.$product_id.')">Add to Cart<i class="fa fa-shopping-cart"></i></button>';
        }
    } else {
        echo 'Product does not exist...';
    }

    mysqli_close($dbconn);
}
?>