<?php
function loadShoppingCart(){
    session_start();

    //Get user id
    $user_id;
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }else{
        echo "Warning: Could not get user id";
        return;
    }
    
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    $dbconn = dbConnect();

    //Get shopping cart contents of a user
    $query = 'SELECT * FROM ShoppingCartLines WHERE user_id="'.$user_id.'";';
    $lines = mysqli_query($dbconn, $query);

    if($lines){
        //Create table for displaying contents of shopping cart
        echo '<table class="shoppingCartTable">';
        echo '<tr id="shoppingCartTableHeader">';
        echo '<th></th><th>ID</th><th>Product name</th><th>Quantity</th><th>Price</th><th>Sum</th><th></th>';
        $total_sum = 0;

        //Go through shopping cart and display products on shopping cart page
        while($row = mysqli_fetch_array($lines)){
            $product_id = $row["product_id"];
            $query = 'SELECT name, price, img_url FROM Products WHERE id="'.$product_id.'";';
            $result = mysqli_query($dbconn, $query);
            $obj = mysqli_fetch_object($result);

            //Assign requested values and calculate total sum of order
            $product_name = $obj->name;
            $price = $obj->price;
            $quantity = $row["quantity"];
            $sum = $price * $quantity;
            $total_sum += $sum;

            echo '<tr onClick="goToProduct('.$product_id.')">';
            echo '<td><img src="'.$obj->img_url.'" alt="Product image" style="width:64px;height:64px"></src></td>';
            echo "<td><p>$product_id</p></td> ";
            echo "<td><p>$product_name</p></td>";
            
            //Create + and - for quantity to allow users to increase/decrease quantity of a product
            echo '<td> 
                    <span id="quantity'.$product_id.'">'.$quantity.'</span>
                    <a href="#" onClick="cancelEvent(event); shopCartAlterQuantitySubmit('.$user_id.','.$product_id.', 1,'.$price.')"><i class="fa fa-plus shopCartQuantityIcon"></i></a>
                    <a href="#" onClick="cancelEvent(event); shopCartAlterQuantitySubmit('.$user_id.','.$product_id.', 0,'.$price.')"><i class="fa fa-minus shopCartQuantityIcon"></i></a>
                    </td>';
            echo "<td>$price</td>";
            echo '<td id="sum'.$product_id.'">'.$sum.'</td>';

            $arg = $user_id . "," . $product_id;
            echo '<td><button class="shoppingCartRemoveItemButton" onClick="cancelEvent(event); removeShoppingCartItemSubmit(' . $arg . ')">Remove<i class="fa fa-trash-o" style="font-size:18px"></i></button></td>';
            echo '</tr>';
         
        }

        echo '<tr id="shoppingCartSum"> <td><td><td><td><td><td id="totalSum">'. $total_sum .'</td></td></td></td></td></td> </tr>';

        echo '</table>';

    }else{
        echo "<p> No items in shopping cart </p>";
    }
    mysqli_close($dbconn);
}
?>