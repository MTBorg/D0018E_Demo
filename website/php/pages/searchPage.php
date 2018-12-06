<!DOCTYPE html>
<html lang="en">
    
<head>
    <title> Order </title>
    <link rel="shortcut icon" href="/fa-rocket.ico">
    <link  href="/css/styles.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/js/init/initNavButtons.js" type="text/javascript"></script>
    <script src="/js/product/searchRequest.js" type="text/javascript"></script>
</head>

<body onload="initNavButtons();">
    <?php
        echo include_once $_SERVER['DOCUMENT_ROOT'].'/php/init/initHeader.php';
    ?>

    <!-- If you want to use an element as a wrapper, i.e. for styling only, then <div> is still the element to use -->
    <div class="wrap">

        <!-- The <main> element is used to enclose the main content, i.e. that which contains the central topic of a document -->
        <!-- ARIA: the landmark role "main" is added here as it contains the main content of the document, and it is recommended to add it to the
        <main> element until user agents implement the required role mapping. -->
        <main role="main">


            <!-- PROTOTYPE. This is the grid for the shop, each item is a square and inside the
            item you can add images, buttons etc. -->
            <div class="shop">

            </div>
        </main>
    </div>
</body>
    <?php
        echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initFooter.php';
    ?>
</html>