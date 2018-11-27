<?php
    require_once 'dbConnect.php';
    $dbconn = dbConnect();
    /*Below are entries added into the products table */
    try {

        // Create categories 1 2 3
        $query = "INSERT INTO Categories VALUES(1, 'temp');";

        mysqli_query($dbconn, $query);

    

        $query = "INSERT INTO Products VALUES (NULL, 'boat', 10, 3, 'img/boat.png', 1);";

        mysqli_query($dbconn, $query);

        //echo "added new entry into database \n";

        $query = "INSERT INTO Products VALUES (NULL, 'car', 50, 5, 'img/car.jpg', 1);";

        mysqli_query($dbconn, $query);

        //echo "added new entry into database \n";   

        $query = "INSERT INTO Products VALUES (NULL, 'rocket', 70, 5, 'img/rocket.jpg', 1);";

        mysqli_query($dbconn, $query);

        //echo "added new entry into database \n";

        $query = "INSERT INTO Products VALUES (NULL, 'Dog', 100, 20, 'img/dog.jpg', 1);";

        mysqli_query($dbconn, $query);

        $query = "INSERT INTO Products VALUES (NULL, 'Rover', 50, 30, 'img/rover.jpg', 1);";

        mysqli_query($dbconn, $query);

        $query = "INSERT INTO Products VALUES (NULL, 'Space Monkey', 200, 5, 'img/spacemonkey.jpg', 1);";

        mysqli_query($dbconn, $query);

    } catch (Exception $e) {
        echo 'Exception: ', $e -> getMessage(), "\n";
    }


    /* Below are entries added into the ShoppingCart table */
        # Close the connection to the DB
        mysqli_close($dbconn);

?>



