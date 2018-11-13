<?php
    /*Below are entries added into the products table */
    echo "connected.. \n";

    $query = "INSERT INTO Products VALUES (NULL, 'Prada sko', 5000, 9, 99, 'x', 'xxx');";

    mysqli_query($dbconn, $query);

    echo "added new entry into database \n";

    $query = "INSERT INTO Products VALUES (NULL, 'Raket', 1000000, 1, 101, 'x', 'xxx');";

    mysqli_query($dbconn, $query);

    echo "added new entry into database \n";   

    $query = "INSERT INTO Products VALUES (NULL, 'Snobb glas', 1, 700000000, 1337, 'x', 'xxx');";

    mysqli_query($dbconn, $query);

    echo "added new entry into database \n";

    $query = "INSERT INTO Products VALUES (NULL, 'Vad ska vi sälja?', 1, 1, 1, 'x', 'xxx');";

    mysqli_query($dbconn, $query);

    echo "added new entry into database \n";

    $query = "INSERT INTO Products VALUES (NULL, 'Jeans', 670, 99, 80, 'x', 'xxx');";

    mysqli_query($dbconn, $query);

    echo "added new entry into database \n";


    /* Below are entries added into the Users table */



    /* Below are entries added into the Orders table */



    /* Below are entries added into the ShoppingCart table */

?>