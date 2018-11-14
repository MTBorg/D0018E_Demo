<?php
    require_once 'dbConnect.php';
    $dbconn = dbConnect();
    /*Below are entries added into the products table */
    try {

        $query = "INSERT INTO Products VALUES (NULL, 'boat', 5000, 9, 99, 'x', 'img/boat.png');";

        mysqli_query($dbconn, $query);

        //echo "added new entry into database \n";

        $query = "INSERT INTO Products VALUES (NULL, 'car', 1000000, 1, 101, 'x', 'img/car.jpg');";

        mysqli_query($dbconn, $query);

        //echo "added new entry into database \n";   

        $query = "INSERT INTO Products VALUES (NULL, 'rocket', 1, 700000000, 1337, 'x', 'img/rocket.jpg');";

        mysqli_query($dbconn, $query);

        //echo "added new entry into database \n";

    } catch (Exception $e) {
        echo 'Exception: ', $e -> getMessage(), "\n";
    }


    /* Below are entries added into the ShoppingCart table */
        # Close the connection to the DB
        mysqli_close($dbconn);

?>



