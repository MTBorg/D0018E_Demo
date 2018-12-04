<!DOCTYPE html>
<html>
<head>
    <title> Order </title>

    <link  href="/css/styles.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/js/initNavButtons.js" type="text/javascript"></script>
</head>
<body onload="initNavButtons()">

    <?php
        echo include_once $_SERVER['DOCUMENT_ROOT'].'/php/init/initHeader.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
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
        echo '<th></th><th>Product ID</th><th>Product name</th><th>Quantity</th>';
        echo '<th>Price</th><th>Sum</th>';
        echo '</tr>';
  
        $query = 'SELECT * FROM OrderLines WHERE order_id='.$order_id.';';
        $orderLines = mysqli_query($dbconn, $query);
        $totalSum = 0;
        if($orderLines){
            while($line = mysqli_fetch_array($orderLines)){
                $product_id = $line["product_id"];
                $quantity = $line["quantity"];
                $price = $line["price"];

                $sum = $quantity * $price;
                $totalSum += $sum;

                //Get the name and image url
                $query = 'SELECT name, img_url FROM Products WHERE id='.$product_id.';';
                $result = mysqli_query($dbconn, $query);
                $obj = mysqli_fetch_object($result);
                $name = $obj->name;
                $img_url = $obj->img_url;

                echo '<tr>';
                echo '<td><img src="../img/'.$img_url.'" alt="Product image" style="width:64px;height:64px"></img></td>';
                echo '<td>'.$product_id.'</td>';
                echo '<td>'.$name.'</td>';
                echo '<td>'.$quantity.'</td>';
                echo '<td>'.$price.'</td>';
                echo '<td>'.$sum.'</td>';
                echo '</tr>';
            }
            echo '<tr> <td><td><td><td><td><td>'.$totalSum.'</td></td></td></td></td></td> </tr>';
        }else{
            echo '<p>Failed to get orderlines</p>';
            return;
        }

        echo '</table>';
    ?>
    <div style="text-align:center; margin-top:10px">
        <button onClick='window.location="/php/pages/adminPage.php"'>Go back</button>
    </div>
</body>
</html>