    <?php
    

    include 'dbConnect.php';
    include_once 'isLoggedIn.php';



    
    $prodID = intval($_GET['id']);
    $dbconn = dbConnect();

    // Handle is user logged in
    if(isLoggedIn()) {
        $queryProduct = "SELECT * FROM Products WHERE Products.id = $prodID";

        $product = mysqli_query($dbconn, $queryProduct);
        

        # Create an array of the query result
        $prodInfo = mysqli_fetch_array($product);
        
        # The product is in stock
        if ($prodInfo['stock'] > 0) {
            $newStock = $prodInfo['stock'] - 1;
            $queryOrder = "UPDATE Products SET stock=".$newStock." WHERE id=".$prodInfo['id'].";";
            mysqli_query($dbconn, $queryOrder);

            echo $newStock;

            $user_id = $_SESSION["user_id"];

            # Check if the user have already added the product to his shopping cart
            $queryCheckLines = 'SELECT * FROM ShoppingCartLines WHERE user_id = '.$user_id.' AND product_id = '.$prodInfo['id'].';';
            $cartLine = mysqli_fetch_array(mysqli_query($dbconn, $queryCheckLines));
            
            # If the product already is in the shopping cart, only increase the quantity
            if ($cartLine) {
                $queryIncreaseQuantity = 'UPDATE ShoppingCartLines SET quantity = '.($cartLine['quantity'] + 1).' WHERE user_id = '.$user_id.' AND product_id = '.$prodInfo['id'].';';
                mysqli_query($dbconn, $queryIncreaseQuantity);
            } else { # If not, create a new shopping cart line for the product
                # ------------- #
                # ---- OBS ---- #  !!!!!!!!! Price needs to be removed once database is updated to not have price in ShoppingCartLines !!!!!!!
                # ------------- #
                $queryCreateLine = 'INSERT INTO ShoppingCartLines VALUES ('.$user_id.', '.$prodInfo['id'].', 1, '.$prodInfo['price'].');';
                mysqli_query($dbconn, $queryCreateLine);
            }

        } else {
            echo $prodInfo['stock'];
        }
        
    // If user not logged in
    } else {
        // Only solution I found
        echo -1; 
    }

?>
    