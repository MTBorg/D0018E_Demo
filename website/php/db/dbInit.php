<?php
    function dbInit() {
        // Setup connection
        require_once 'dbConnect.php';
        $dbconn = dbConnect();
        
        try {
            $query = "CREATE TABLE IF NOT EXISTS OrderStatuses(
                        name VARCHAR(20) NOT NULL,
                        PRIMARY KEY(name));";
            mysqli_query($dbconn, $query);

            $query = "CREATE TABLE IF NOT EXISTS Categories(
                name VARCHAR(30) NOT NULL UNIQUE,
                PRIMARY KEY (name)
            );";

            mysqli_query($dbconn, $query);

            $query = "CREATE TABLE IF NOT EXISTS Products(
                        id INT NOT NULL AUTO_INCREMENT,
                        name VARCHAR(20) NOT NULL UNIQUE,
                        price INT NOT NULL CHECK (price>=0),
                        stock INT NOT NULL CHECK (stock>=0), 
                        img_url VARCHAR(255),
                        cat_name VARCHAR(30) NOT NULL,
                        archived BOOLEAN NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY (cat_name) REFERENCES Categories(name),
                        INDEX (archived)    # Make archived an index since it's used a lot in WHERE clauses when querying the Products table
                                            # e.g don't want to show archived products on the front page. Products should also not be archived too often, so not much updating.
                    );";
                
            mysqli_query($dbconn, $query);

            $query = "CREATE TABLE IF NOT EXISTS Users(
                        id INT NOT NULL AUTO_INCREMENT,
                        role_id INT NOT NULL,
                        first_name VARCHAR(20) NOT NULL,
                        last_name VARCHAR(20) NOT NULL,
                        email VARCHAR(40) NOT NULL, 
                        password VARCHAR(30) NOT NULL,
                        PRIMARY KEY(id),
                        UNIQUE (email)  # Make email an unique index since it's used a lot for log in/sign up and supposed to be unique. 
                                        # Email will also never be updated, which makes it a good index.
                    );";

            mysqli_query($dbconn, $query);

            $query = "CREATE TABLE IF NOT EXISTS Orders(
                        id INT NOT NULL AUTO_INCREMENT,
                        user_id INT NOT NULL,
                        status VARCHAR(20) NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY(user_id) REFERENCES Users(id),
                        FOREIGN KEY(status) REFERENCES OrderStatuses(name)
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
        mysqli_close($dbconn);
    }
?>
