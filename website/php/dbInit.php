<?php
    require_once 'dbConnect.php';

    $dbconn = dbConnect();

    $query = "CREATE TABLE IF NOT EXISTS Products(
                id INT NOT NULL AUTO_INCREMENT,
                name VARCHAR(20) NOT NULL,
                price INT NOT NULL CHECK (price>=0),
                stock INT NOT NULL CHECK (stock>=0),
                rating INT NOT NULL, 
                comment_section VARCHAR(1),
                img_url VARCHAR(90),
                PRIMARY KEY(id)
            )";
        
    mysqli_query($dbconn, $query);

    $query = "CREATE TABLE IF NOT EXISTS Users(
                id INT NOT NULL AUTO_INCREMENT,
                role_id INT NOT NULL,
                first_name VARCHAR(20) NOT NULL,
                last_name VARCHAR(20) NOT NULL,
                email VARCHAR(25) NOT NULL, 
                password VARCHAR(18) NOT NULL,
                PRIMARY KEY(id)
            )";

    mysqli_query($dbconn, $query);

    $query = "CREATE TABLE IF NOT EXISTS Orders(
                id INT NOT NULL AUTO_INCREMENT,
                user_id INT NOT NULL,
                product_id INT NOT NULL,
                PRIMARY KEY(id),
                FOREIGN KEY(user_id) REFERENCES Users(id),
                FOREIGN KEY(product_id) REFERENCES Products(id)
            );";

    mysqli_query($dbconn, $query);

    $query = "CREATE TABLE IF NOT EXISTS ShoppingCart(
                id INT NOT NULL AUTO_INCREMENT,
                cost_sum INT NOT NULL,
                PRIMARY KEY(id)
            );";

    mysqli_query($dbconn, $query);

    echo "The tables Products, Users, Orders and ShoppingCart created in the maindb database\n";
?>