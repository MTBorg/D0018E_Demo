<?php



function listProducts() {
    include_once 'dbConnect.php';
    $dbconn = dbConnect();


    $query = "SELECT id, name, price, stock, cat_id FROM Products;";
    $fetchProducts = mysqli_query($dbconn, $query);

    while($row = mysqli_fetch_array($fetchProducts)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['stock'] . "</td>";

        # Get the name of the products cat_id
        $fetchCatName = mysqli_query($dbconn, 'SELECT cat_name FROM Categories WHERE id = '.$row['cat_id'].';');
        $cat_name = mysqli_fetch_array($fetchCatName);

        echo "<td>" . $cat_name['cat_name'] . "</td>";
        echo "<td> <input id='".$row['id']."' type='button' value='Modify' onclick='modifyProduct(this.id)'> </td>";
        echo "</tr>";
    }


    mysqli_close($dbconn);
     

}



?>