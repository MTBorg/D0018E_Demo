<?php
function loadShoppingCart(){
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
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
        echo '<tr id="shoppingCartTableHeader">';
        echo '<th></th><th>ID</th><th>Product name</th><th>Quantity</th><th>Price</th><th>Sum</th><th></th>';
        $total_sum = 0;
        while($row = mysqli_fetch_array($lines)){
            $product_id = $row["product_id"];
            $query = 'SELECT name, price, img_url FROM Products WHERE id="'.$product_id.'";';
            $result = mysqli_query($dbconn, $query);
            $obj = mysqli_fetch_object($result);

            $product_name = $obj->name;
            $price = $obj->price;
            $quantity = $row["quantity"];
            $sum = $price * $quantity;
            $total_sum += $sum;
                        
            echo '<tr>';
            echo '<td><img src="'.$obj->img_url.'" alt="Product image" style="width:64px;height:64px"></src></td>';
            echo "<td><p>$product_id</p></td> ";
            echo "<td><p>$product_name</p></td>";
            echo '<td><p>
            '.$quantity.'
            <a href="#" onClick="shopCartAlterQuantitySubmit('.$user_id.','.$product_id.','.true.')"><i class="fa fa-plus shopCartQuantityIcon"></i></a>
            <a href="#" onClick="shopCartAlterQuantitySubmit('.$user_id.','.$product_id.','.false.')"><i class="fa fa-minus shopCartQuantityIcon"></i></a>
            </p></td>';
            echo "<td></p>$price</p></td>";
            echo "<td></p>$sum </p></td>";
            $arg = $user_id . "," . $product_id;
            echo '<td><button class="shoppingCartRemoveItemButton" onClick="removeShoppingCartItemSubmit(' . $arg . ')">Remove<i class="fa fa-trash-o" style="font-size:18px"></i></button></td>';
            echo '</tr>';
        }

        echo '<tr> <td><td><td><td><td><td>'. $total_sum .'</td></td></td></td></td></td> </tr>';
        

        echo '</table>';

    }else{
        echo "<p> No items in shopping cart </p>";
    }
}
?>