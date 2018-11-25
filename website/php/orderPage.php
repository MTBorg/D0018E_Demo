<!DOCTYPE html>
<html>
<head>
    <title> Order </title>

    <link  href="../css/styles.css" rel="stylesheet" media="all">
</head>
<body>
    <?php
        include_once 'dbConnect.php';
        $dbconn = dbConnect();

        if(!$dbconn){
            echo '<p>Failed to connect to database</p>';
            return;
        }

        $order_id;
        if(isset($_GET["order_id"])){
            $order_id = $_GET["order_id"];
        }else{
            echo '<p>Order id not set in GET request';
            return;
        }

        echo '<table class="ordersTable">';
        echo '<tr class="ordersTableHeader">';
        echo '<th>Product ID</th><th>Product name</th><th>Quantity</th>';
        echo '<th>Price</th><th>Sum</th>';
        echo '</tr>';
  
        $query = 'SELECT * FROM OrderLines WHERE order_id='.$order_id.';';
        $orderLines = mysqli_query($dbconn, $query);
        if($orderLines){
            while($line = mysqli_fetch_array($orderLines)){
                $product_id = $line["product_id"];
                $quantity = $line["quantity"];
                $price = $line["price"];

                $sum = $quantity * $price;
                $query = 'SELECT name FROM Products WHERE id='.$product_id.';';
                $name = mysqli_fetch_object(mysqli_query($dbconn, $query))->name;

                echo '<tr>';
                echo '<td>'.$product_id.'</td>';
                echo '<td>'.$name.'</td>';
                echo '<td>'.$quantity.'</td>';
                echo '<td>'.$price.'</td>';
                echo '<td>'.$sum.'</td>';
                echo '</tr>';
            }
        }else{
            echo '<p>Failed to get orderlines</p>';
            return;
        }

        echo '</table>';
    ?>
    <div style="text-align:center; margin-top:10px">
        <button onClick='window.location="myOrdersPage.php"'>Go back</button>
    </div>
</body>
</html>