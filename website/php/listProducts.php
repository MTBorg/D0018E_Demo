<?php



function listProducts() {
    include 'dbConnect.php';
    $dbconn = dbConnect();

    echo '<tr>';
        echo '<th>id</th>';
        echo '<th>name</th>';
        echo '<th>price</th>';
        echo '<th>stock</th>';
        echo '<th>MODIFY</th>';
    echo ' </tr>';
    
    // echo '<form action="" method="POST" target="_self">';
    echo '<tr>';
        echo '<th></th>';
        echo '<th><input type="text" name="name" size="5"></th>';
        echo '<th><input type="text" name="price" size="5"></th>';
        echo '<th><input type="text" name="stock" size="5"></th>';
    echo ' </tr>';


    $query = "SELECT id, name, price, stock FROM Products;";
    $fetchProducts = mysqli_query($dbconn, $query);

    while($row = mysqli_fetch_array($fetchProducts)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['stock'] . "</td>";
        echo "<td> <input id='".$row['id']."' type='Button' value='Modify' onclick='modifyProduct(this.id)'> </td>";
        echo "</tr>";
    }

    // echo '</form>'

    mysqli_close($dbconn);
     

}



?>