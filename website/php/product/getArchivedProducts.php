<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    
    $dbconn = dbConnect();

    $query = "SELECT id, name, price, stock, cat_name FROM Products WHERE archived = 1;";
    $archivedProducts = mysqli_query($dbconn, $query);

    //Go through archived products and create table entries for them
    while($row = mysqli_fetch_array($archivedProducts)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['stock'] . "</td>";
        echo "<td>" . $row['cat_name'] . "</td>";

        # Unarchive button
        echo "<td> <button id='".$row['id']."' type='button' value='Unarchive' onclick='unarchiveProduct(this.id)'>Unarchive</button> </td>";
        echo "</tr>";
    }

    mysqli_close($dbconn);
?>