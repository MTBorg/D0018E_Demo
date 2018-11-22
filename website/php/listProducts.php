<?php



function listProducts() {
    include 'dbConnect.php';
    $dbconn = dbConnect();


    $query = "SELECT id, name, price, stock FROM Products;";
    $fetchProducts = mysqli_query($dbconn, $query);

    while($row = mysqli_fetch_array($fetchProducts)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['stock'] . "</td>";
        echo "<td> <input id='".$row['id']."' type='button' value='Modify' onclick='modifyProduct(this.id)'> </td>";
        echo "</tr>";
    }


    mysqli_close($dbconn);
     

}



?>