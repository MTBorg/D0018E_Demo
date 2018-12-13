<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    $dbconn = dbConnect();

    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $cat_name = $_POST["cat_name"];

    if(empty($name) == false) {
        $query = "UPDATE Products SET name='$name' WHERE Products.id=$id";

        # Check if the new product name is already in use, other wise change it
        if (!mysqli_query($dbconn, $query)) {
            if (mysqli_errno($dbconn) == 1062) {
                echo "0";
                return;
            }
        } else {
            echo "name\n";
        }
        
    }

    if(empty($price) == false || $price == "0") {
        $query = "UPDATE Products SET price='$price' WHERE Products.id=$id";
        $update = mysqli_query($dbconn, $query);
        echo "price\n";
    }

    if(empty($stock) == false || $stock == "0") {
        $query = "UPDATE Products SET stock='$stock' WHERE Products.id=$id";
        $update = mysqli_query($dbconn, $query);
        echo "stock\n";
    }

    if($cat_name != "-1") { # category value of -1 is the unchanged option in the dropdown
        $query = "UPDATE Products SET cat_name='$cat_name' WHERE Products.id=$id";
        $update = mysqli_query($dbconn, $query);
        echo "category";
    }

    mysqli_close($dbconn);
?>