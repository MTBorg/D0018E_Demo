<!DOCTYPE html>
<html lang="en">
<!-- Set this to the main language of your site -->

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="/fa-rocket.ico">
    <title>StarTrader</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link href="/css/styles.css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <script src="/js/cart/addToCartOnClick.js" type="text/javascript"></script>
    <script src="/js/init/initNavButtons.js" type="text/javascript"></script> 
    <script src="/js/cart/shopCartBtnUpdateQuantitySubmit.js" type="text/javascript"></script>
    <script src="/js/product/searchRequest.js" type="text/javascript"></script>
</head>

<body onload ='initNavButtons();'>
    <?php
        echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initHeader.php';
    ?>
    <div class="wrap">
        <main role="main">
            <?php
                //Get the GET request arguments
                if(!isset($_GET['cat_name'])){
                    echo '<script> alert("Failed to retrieve the category name in GET request"); </script>';
                    return;
                }
                $cat_name = $_GET["cat_name"];

                //Connect to the database
                include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
                $dbConn = dbConnect();
                if(!$dbConn){
                    echo '<script> alert("Failed to connect to database"); </script>';
                    return;
                }
                
                //Display the category name
                echo '<h1 style=\'color:#0B3D91;font-family:"Helvetica"\'>'.$cat_name.'</h1>';
                
                mysqli_close($dbConn);
            ?>
            <div class="shop">
                <?php
                    include $_SERVER["DOCUMENT_ROOT"].'/php/product/loadProductCategory.php'; 
                ?>
            </div>
        </main>
    </div>
    <?php
        echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initFooter.php';
    ?>
</body>
</html>