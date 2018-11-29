<?php
    
   
    include_once 'dbConnect.php';
    $dbconn = dbConnect();

    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $cat_id = $_POST["cat_id"];



    if(empty($name) == false) {
        # Check if the new product name is already in use
        $queryName = "SELECT name FROM Products WHERE name = '$name';";
        $checkName = mysqli_query($dbconn, $queryName);
        if (mysqli_num_rows($checkName) == 0) {
            $query = "UPDATE Products SET name='$name' WHERE Products.id=$id";
            $update = mysqli_query($dbconn, $query);
            echo "name\n";
        } else {
            echo "0";
            return;
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

    if(empty($cat_id) == false) {
        $query = "UPDATE Products SET cat_id='$cat_id' WHERE Products.id=$id";
        $update = mysqli_query($dbconn, $query);
        echo "category";
    }

    mysqli_close($dbconn);


    
    






?>
    