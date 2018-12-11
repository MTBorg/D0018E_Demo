<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    
    $dbconn = dbConnect();

    $query = "SELECT id, name, price, stock, cat_id FROM Products WHERE archived = 1;";
    $archivedProducts = mysqli_query($dbconn, $query);

    while($row = mysqli_fetch_array($archivedProducts)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['stock'] . "</td>";

        # Get the name of the products cat_id
        $fetchCatName = mysqli_query($dbconn, 'SELECT cat_name FROM Categories WHERE id = '.$row['cat_id'].';');
        $cat_name = mysqli_fetch_array($fetchCatName);
        echo "<td>" . $cat_name['cat_name'] . "</td>";

        # Unarchive button
        echo "<td> <button id='".$row['id']."' type='button' value='Unarchive' onclick='unarchiveProduct(this.id)'>Unarchive</button> </td>";
        echo "</tr>";
    }

    mysqli_close($dbconn);
?>