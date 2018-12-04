<?php
    require_once 'dbConnect.php';
    // Setup connection, we do not use dbConnect.php since 3 parameters and not 4
    $dbhost = 'localhost';
    $dbuser = 'admin';
    $dbpass = 'adminpass';

    $dbconn=mysqli_connect($dbhost,$dbuser,$dbpass);

    $query = "DROP DATABASE IF EXISTS maindb;";
        
    mysqli_query($dbconn, $query);    

    $query = "CREATE DATABASE IF NOT EXISTS maindb;";
        
    mysqli_query($dbconn, $query);

    # Close the connection  to the DB.
    mysqli_close($dbconn);
    

    $dbconn = dbConnect();
    
    try {

        $query = "CREATE TABLE IF NOT EXISTS Categories(
            id INT NOT NULL AUTO_INCREMENT,
            cat_name VARCHAR(30),
            PRIMARY KEY (id)
        );";

        mysqli_query($dbconn, $query);

        $query = "CREATE TABLE IF NOT EXISTS Products(
                    id INT NOT NULL AUTO_INCREMENT,
                    name VARCHAR(20) NOT NULL,
                    price INT NOT NULL CHECK (price>=0),
                    stock INT NOT NULL CHECK (stock>=0), 
                    img_url VARCHAR(255),
                    cat_id INT NOT NULL,
                    archived BOOLEAN NOT NULL,
                    PRIMARY KEY(id),
                    FOREIGN KEY (cat_id) REFERENCES Categories(id)
                );";
            
        mysqli_query($dbconn, $query);

        $query = "CREATE TABLE IF NOT EXISTS Users(
                    id INT NOT NULL AUTO_INCREMENT,
                    role_id INT NOT NULL,
                    first_name VARCHAR(20) NOT NULL,
                    last_name VARCHAR(20) NOT NULL,
                    email VARCHAR(40) NOT NULL, 
                    password VARCHAR(30) NOT NULL,
                    PRIMARY KEY(id)
                );";

        mysqli_query($dbconn, $query);

        $query = "CREATE TABLE IF NOT EXISTS Orders(
                    id INT NOT NULL AUTO_INCREMENT,
                    user_id INT NOT NULL,
                    PRIMARY KEY(id),
                    FOREIGN KEY(user_id) REFERENCES Users(id)
                );";

        mysqli_query($dbconn, $query);

        $query = "CREATE TABLE IF NOT EXISTS OrderLines(
                    order_id INT NOT NULL,
                    product_id INT NOT NULL,
                    quantity INT NOT NULL,
                    price FLOAT NOT NULL,
                    PRIMARY KEY (order_id, product_id),
                    FOREIGN KEY (order_id) REFERENCES Orders(id), 
                    FOREIGN KEY (product_id) REFERENCES Products(id)
        );";

        mysqli_query($dbconn, $query);

        # New code using only shopping cart lines
        $query = "CREATE TABLE IF NOT EXISTS ShoppingCartLines(
            user_id INT NOT NULL,
            product_id INT NOT NULL,
            quantity INT NOT NULL,
            PRIMARY KEY (user_id, product_id),
            FOREIGN KEY (user_id) REFERENCES Users(id),
            FOREIGN KEY (product_id)  REFERENCES Products(id)
        );";

        mysqli_query($dbconn, $query);

        $query = "CREATE TABLE IF NOT EXISTS Reviews(
                    id INT NOT NULL AUTO_INCREMENT,
                    product_id INT NOT NULL,
                    user_id INT NOT NULL,
                    rating INT NOT NULL,
                    comment VARCHAR(255),
                    PRIMARY KEY(id),
                    FOREIGN KEY (product_id) REFERENCES Products(id),
                    FOREIGN KEY (user_id) REFERENCES Users(id)
        );";

        mysqli_query($dbconn, $query);

        echo "The tables Products, Users, Orders and ShoppingCart created in the maindb database\n";

    } catch (Exception $e) {
        echo 'Exception: ', $e -> getMessage(), "\n";
    }

    /*Below are entries added into the products table */
      try {

        // Create categories 1 2 3
        $query = "INSERT INTO Categories VALUES(1, 'temp');";

        mysqli_query($dbconn, $query);

        $query = "INSERT INTO Products VALUES (NULL, 'Boat', 10, 3, 'img/boat.png', 1, 0), 
                                              (NULL, 'Car', 50, 5, 'img/car.jpg', 1, 0), 
                                              (NULL, 'Rocket', 70, 5, 'img/rocket.jpg', 1, 0),
                                              (NULL, 'Dog', 100, 20, 'img/dog.jpg', 1, 0),
                                              (NULL, 'Rover', 50, 30, 'img/rover.jpg', 1, 0),
                                              (NULL, 'Movie Set', 1000, 1, 'img/Moon-Landing.jpg', 1, 0),
                                              (NULL, 'Space Monkey', 200, 5, 'img/spacemonkey.jpg', 1, 0);";

        mysqli_query($dbconn, $query);

        $query = "INSERT INTO Users VALUES (NULL, 1, 'auto', 'admin', 'admin', 'admin');";

        mysqli_query($dbconn, $query);


    } catch (Exception $e) {
        echo 'Exception: ', $e -> getMessage(), "\n";
    }


    /* Below are entries added into the ShoppingCart table */
        # Close the connection to the DB
            mysqli_close($dbconn);

?>
