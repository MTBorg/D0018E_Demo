<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/php/account/isAdmin.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/php/account/isLoggedIn.php';

$dbconn = dbConnect();

$search = $_POST["search"];

$query = "SELECT * FROM Products WHERE name LIKE '%$search%';";

$searchResult = mysqli_query($dbconn, $query);

if($searchResult) {
    while ($row = mysqli_fetch_array($searchResult)) {

        // This is really stupid...     //aron
        //if(isAdmin()) {
            echo '<div id="'.$row['id'].'" class="item">';
            // echo '<button id="'.$row['id'].'" class="addToCartButton" type="button">Add to cart <i class="fa fa-shopping-cart"></i></button>';
            echo '<img src="'. $row['img_url'] .'">';
            echo '<p id="namePos">' . $row['name'] . '</p>';
            echo '<p id="pricePos">' . $row['price'] . '$</p>';
            echo '<p id="stockPos"> <b>stock</b>: ' . $row['stock'] . '</p>';
            // echo '<p id="ratingPos"> <b>rating</b>: ' . $row['rating'] . '</p>';
            echo '<p><a class="div-click" href="/php/pages/adminProductPage.php?product_id='.$row['id'].'"></a></p>';

        /*} else {
            echo '<div id="'.$row['id'].'" class="item">';
            echo '<img src="'. $row['img_url'] .'">';
            echo '<p id="namePos">' . $row['name'] . '</p>';
            echo '<p id="pricePos">' . $row['price'] . '$</p>';
            echo '<p id="stockPos"> <b>stock</b>: ' . $row['stock'] . '</p>';
            // echo '<p id="ratingPos"> <b>rating</b>: ' . $row['rating'] . '</p>';
            echo '<div class="button-top"><button id="'.$row['id'].'" class="addToCartButton" type="button" onclick="addToCartOnClick(this.id)">Add to Cart<i class="fa fa-shopping-cart"></i></button></div>';
            echo '<p><a class="div-click" href="/php/pages/productPage.php?product_id='.$row['id'].'"></a></p>';
        }*/

        echo '</div>';
    }

} else {
    echo '<p> No products </p>';
}

/*
while($row = mysqli_fetch_array($searchResult)) {
    echo $row['name'];
}
*/

?>