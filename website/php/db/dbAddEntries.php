<?php
    function dbAddEntries() {
        require_once 'dbConnect.php';
        $dbconn = dbConnect();

        /*Below are entries added into the products table */
        try {

            // Create default categories
            $query = "INSERT INTO Categories VALUES ('Misc'),
                                                    ('Cars'),
                                                    ('Boats'),
                                                    ('Animals'),
                                                    ('Rockets'),
                                                    ('Rovers');";

            mysqli_query($dbconn, $query);

            //Create order statuses
            $query = 'INSERT INTO OrderStatuses VALUES ("Pending"),
                                                        ("Canceled"),
                                                        ("Shipping"),
                                                        ("Delivered"),
                                                        ("Returned");';
            mysqli_query($dbconn, $query);
                                        
            // Create default products
            $query = "INSERT INTO Products VALUES (NULL, 'Boat', 10, 3, '/img/boat.png', 'Boats', 0), 
                                                (NULL, 'Car', 50, 5, '/img/car.jpg', 'Cars', 0), 
                                                (NULL, 'Rocket', 70, 5, '/img/rocket.jpg', 'Rockets', 0),
                                                (NULL, 'Dog', 100, 20, '/img/dog.jpg', 'Animals', 0),
                                                (NULL, 'Rover', 50, 30, '/img/rover.jpg', 'Rovers', 0),
                                                (NULL, 'Movie Set', 1000, 1, '/img/Moon-Landing.jpg', 'Misc', 0),
                                                (NULL, 'Space Monkey', 200, 5, '/img/spacemonkey.jpg', 'Animals', 0);";

            mysqli_query($dbconn, $query);

            // Create default admin user
            $query = "INSERT INTO Users VALUES (NULL, 1, 'auto', 'admin', 'admin', 'admin');";

            mysqli_query($dbconn, $query);
        
        } catch (Exception $e) {
            echo 'Exception: ', $e -> getMessage(), "\n";
        }

        # Close the connection to the DB
        mysqli_close($dbconn);
    }
?>



