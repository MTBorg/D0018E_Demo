<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    $dbconn = dbConnect();

    # Get all the products which are not archived
    $query = "SELECT id, name, price, stock, cat_name FROM Products WHERE archived = 0;";
    $fetchProducts = mysqli_query($dbconn, $query);

    //Create table on the admin page and fill with entries for each product not archived
    while($row = mysqli_fetch_array($fetchProducts)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['stock'] . "</td>";
        echo "<td>" . $row['cat_name'] . "</td>";
        echo "<td> <button id='".$row['id']."' type='button' value='Modify' onclick='modifyProduct(this.id)'>Modify</button> </td>";
        echo "<td> <button id='".$row['id']."' type='button' value='Archive' onclick='archiveProduct(this.id)'>Archive</button> </td>";
        echo "</tr>";
    }

    mysqli_close($dbconn);
?>