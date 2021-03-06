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

        include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
        $dbConn = dbConnect(); 

        if($dbConn == false){
            echo '<p>Failed to connect to database</p>';
            return;
        }

        $query = 'SELECT id, user_id, status FROM Orders ORDER BY id';
        $orders = mysqli_query($dbConn, $query);
        if($orders){
            //Create table to display orders
            echo '<table class="ordersTable">';
            echo '<tr class="ordersTableHeader"> <th> Order ID </th> <th> User ID </th> <th> Email </th> <th> Status </th> <th> New status </th> <th> </th> </tr>';
            
            //Go through existing orders
            while($row = mysqli_fetch_object($orders)){
                $order_id = $row->id;
                $user_id = $row->user_id;
                $order_status = $row->status;
                
                # Get the users email
                $query_user = mysqli_query($dbConn, 'SELECT email FROM Users WHERE id = '.$user_id);
                $user = mysqli_fetch_object($query_user);
                $user_email = $user->email;
                
                //Add table entries for each order
                echo '<tr>
                    <td>'.$order_id.' </td>
                    <td>'.$user_id.' </td>
                    <td>'.$user_email.'</td>
                    <td id="orderStatus'.$order_id.'">'.$order_status.'</td>
                    <td>
                        <select id="newStatus'.$order_id.'">';
                            include $_SERVER["DOCUMENT_ROOT"].'/php/order/createOrderStatusDropdown.php';
                        echo '</select>
                    <button onClick="SetOrderStatus('.$order_id.')"> Set status </button>
                    </form> </td>
                    <td><button  onclick=\'location.href="/php/pages/adminOrderPage.php?order_id='.$order_id.'"\'>View </button></td>
                </tr>';
                
            }
            echo '</table>';
        }
        mysqli_close($dbConn);
    }
?>