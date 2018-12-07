    <?php
    

    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/account/isLoggedIn.php';



    
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
            $user_id = $_SESSION["user_id"];

            # Check if the user have already added the product to his shopping cart
            $queryCheckLines = 'SELECT * FROM ShoppingCartLines WHERE user_id = '.$user_id.' AND product_id = '.$prodInfo['id'].';';
            $cartLine = mysqli_fetch_array(mysqli_query($dbconn, $queryCheckLines));
            
            if ($cartLine) {# If the product already is in the shopping cart, only increase the quantity
                if($cartLine["quantity"] < $prodInfo['stock']){
                    $queryIncreaseQuantity = 'UPDATE ShoppingCartLines SET quantity = '.($cartLine['quantity'] + 1).' WHERE user_id = '.$user_id.' AND product_id = '.$prodInfo['id'].';';
                    mysqli_query($dbconn, $queryIncreaseQuantity);
                } else{
                    echo "Shopping cart already contains the entire stock";
                }
            } else { # If not, create a new shopping cart line for the product
                $queryCreateLine = 'INSERT INTO ShoppingCartLines VALUES ('.$user_id.', '.$prodInfo['id'].', 1);';
                mysqli_query($dbconn, $queryCreateLine);
            }

        }else{
            echo "Product is out of stock";
        } 
        
    // If user not logged in
    } else {
        // Only solution I found
        echo -1; 
    }

    mysqli_close($dbconn);
?>
    