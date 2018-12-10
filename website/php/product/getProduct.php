

<?php


function getProduct($product_id)
{
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    $dbconn = dbConnect();

    $query = "SELECT * FROM Products WHERE Products.id = $product_id";
    $product = mysqli_query($dbconn, $query);

    if ($row = mysqli_fetch_array($product)) {
        // Hence we do not need to know the url only the name

        echo '<img src="' . $row['img_url'] . '">';
        echo '<p>' . $row['name'] . '</p>';
        echo '<p>' . $row['price'] . '$</p>';
        echo '<p> <b>stock</b>: ' . $row['stock'] . '</p>';
        echo '<button class="addToCartButton" type="button" onclick="addToCartOnClick('.$product_id.')">Add to Cart<i class="fa fa-shopping-cart"></i></button>';

    } else {
        echo 'Product does not exist... How did you get here?';
    }

    mysqli_close($dbconn);
}


?>


