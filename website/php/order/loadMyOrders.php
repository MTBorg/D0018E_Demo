<?php
    function loadMyOrders(){
        $user_id;
        session_start();
        if(isset($_SESSION["user_id"])){
            $user_id=$_SESSION["user_id"];
        }else{
            echo '<p>Not logged in</p>';
            return;
        }

        include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
        $dbConn = dbConnect(); 

        if($dbConn == false){
            echo '<p>Failed to connect to database</p>';
            return;
        }

        $query = 'SELECT id FROM Orders WHERE user_id='.$user_id.';';
        $orders = mysqli_query($dbConn, $query);
        if($orders){
            echo '<table class="ordersTable">';
            echo '<tr class="ordersTableHeader"> <th> Order ID </th> </tr>';
            while($row = mysqli_fetch_object($orders)){
                $order_id = $row->id;

                $href = '\'location.href="\/php/pages/orderPage.php?order_id='.$order_id.'"\'';
                echo '<tr><td><button style="padding-right:10px;padding-left:10px" type="button" onclick='.$href.'>'.$order_id.'</button></td></tr>';
            }
            echo '</table>';
        }
    }
?>