<?php
    function loadAllOrders(){
        $user_id;
        @session_start();
        if(isset($_SESSION["user_id"])){
            $user_id=$_SESSION["user_id"];
        }else{
            echo '<p>Not logged in</p>';
            return;
        }

        include_once 'dbConnect.php';
        $dbConn = dbConnect(); 

        if($dbConn == false){
            echo '<p>Failed to connect to database</p>';
            return;
        }

        $query = 'SELECT id FROM Orders';
        $orders = mysqli_query($dbConn, $query);
        if($orders){
            echo '<table class="ordersTable">';
            echo '<tr class="ordersTableHeader"> <th> Order ID </th> </tr>';
            while($row = mysqli_fetch_object($orders)){
                $order_id = $row->id;
                echo '<tr><td><a href="adminOrderPage.php?order_id='.$order_id.'">'.$order_id.'</a></td></tr>';
            }
            echo '</table>';
        }
    }
?>