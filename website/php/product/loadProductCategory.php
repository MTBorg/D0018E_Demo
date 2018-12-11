<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/account/isAdmin.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/account/isLoggedIn.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    $dbconn = dbConnect();

    $query = 'SELECT * FROM Products WHERE cat_id='.$cat_id.' AND archived = 0;';

    $products = mysqli_query($dbconn, $query);
        
    if($products) {
        while ($row = mysqli_fetch_array($products)) {
            if(isAdmin()) {
                echo '<div id="'.$row['id'].'" class="item">';
                echo '<img src="'. $row['img_url'] .'">';
                echo '<p id="namePos">' . $row['name'] . '</p>';
                echo '<p id="pricePos">' . $row['price'] . '$</p>';
                echo '<p id="stockPos"> <b>stock</b>: ' . $row['stock'] . '</p>';
                echo '<p><a class="div-click" href="/php/pages/adminProductPage.php?product_id='.$row['id'].'"></a></p>';
            } else {
                echo '<div id="'.$row['id'].'" class="item">';
                echo '<img src="'. $row['img_url'] .'">';
                echo '<p id="namePos">' . $row['name'] . '</p>';
                echo '<p id="pricePos">' . $row['price'] . '$</p>';
                echo '<p id="stockPos"> <b>stock</b>: ' . $row['stock'] . '</p>';
                echo '<div class="button-top"><button id="'.$row['id'].'" class="addToCartButton" type="button" onclick="addToCartOnClick(this.id)">Add to Cart<i class="fa fa-shopping-cart"></i></button></div>';
                echo '<p><a class="div-click" href="/php/pages/productPage.php?product_id='.$row['id'].'"></a></p>';
            }
            echo '</div>';
        }
    } else {
        echo '<p> No products ... </p>';
    }
    
    mysqli_close($dbconn);
?>