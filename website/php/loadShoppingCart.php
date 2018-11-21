<?php
function loadShoppingCart(){
    include 'dbConnect.php';
    $dbconn = dbConnect();

    session_start();

    $user_id;
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }else{
        echo "Warning: Could not get user id";
        return;
    }

    $query = 'SELECT * FROM ShoppingCartLines WHERE user_id="'.$user_id.'";';
    $lines = mysqli_query($dbconn, $query);

    if($lines){
        echo '<table class="shoppingCartTable">';
        echo '<tr>';
        echo '<th>ID</th><th>Product name</th><th>Quantity</th><th>Price</th><th>Sum</th>';
        while($row = mysqli_fetch_array($lines)){
            echo '<tr>';

            //Product id
            $product_id = $row["product_id"];
            echo "<td><p>$product_id</p></td> ";

            //Product name
            $query = 'SELECT name FROM Products WHERE id="'.$product_id.'";';
            $result = mysqli_query($dbconn, $query);
            $product_name = mysqli_fetch_object($result)->name;
            echo "<td><p>$product_name</p></td>";

            //Quantity
            $quantity = $row["quantity"];
            echo "<td></p>$quantity</p></td>";

            //Price
            $price = $row["price"];
            echo "<td></p>$price</p></td>";

            //Sum
            $sum = $price * $quantity;
            echo "<td></p>$sum </p></td>";

            echo '</tr>';
        }
        echo '</table>';
    }else{
        echo "<p> No items in shopping cart </p>";
    }
}
?>