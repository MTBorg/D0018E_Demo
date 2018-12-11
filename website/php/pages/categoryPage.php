<!DOCTYPE html>
<html lang="en">
<!-- Set this to the main language of your site -->

<head>
    <meta charset="utf-8">

    <title>StarTrader</title>

    <!-- Enter a brief description of your page -->
    <meta name="a e-commerce website with relation database" content="not yet decided">

    <!-- Define a viewport to mobile devices to use - telling the browser to assume that the page is as wide as the device (width=device-width,
    and setting the initial page zoom level to be 1 (initial-scale=1.0), and fixing width=device-width for iOS9 (shtink-to-fit=no) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- Add normalize.css which enables browsers to render all elements more consistently and in line with modern standards as it only targets particular styles that need normalizing -->
    <link href="/css/normalize.css" rel="stylesheet" media="all">
    <!-- For legacy support (IE 6/7, Firefox < 4, and Safari < 5) use normalize-legacy.css instead -->
    <link rel="shortcut icon" href="fa-rocket.ico">
    <!--<link href="css/normalize-legacy.css" rel="stylesheet" media="all">-->

    <!-- Include the site stylesheet -->
    <link href="/css/styles.css" rel="stylesheet" media="all">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <!-- Include the HTML5 shiv print polyfill for Internet Explorer browsers 8 and below -->
    <!--[if lt IE 9]><script src="js/html5shiv-printshiv.js" media="all"></script><![endif]-->
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
                if(!isset($_GET['cat_id'])){
                    echo '<script> alert("Failed to retrieve the category id in GET request"); </script>';
                    return;
                }
                $cat_id = $_GET["cat_id"];

                //Connect to the database
                include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
                $dbConn = dbConnect();
                if(!$dbConn){
                    echo '<script> alert("Failed to connect to database"); </script>';
                    return;
                }

                //Get the category name from the database
                $query = 'SELECT cat_name FROM Categories WHERE id='.$cat_id.';';
                $result = mysqli_query($dbConn, $query);  
                if(!$result){
                    echo '<script> alert("Failed to query database")</script>';
                }else{
                    $cat_name = mysqli_fetch_object($result)->cat_name;

                    //Display the category name
                    echo '<h1 style=\'color:#0B3D91;font-family:"Helvetica"\'>'.$cat_name.'</h1>';
                }
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