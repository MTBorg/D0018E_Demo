<!DOCTYPE html>
<html lang="en">
<!-- Set this to the main language of your site -->

<head>
    <meta charset="utf-8">

    <title>E-Commerce</title>

    <!-- Enter a brief description of your page -->
    <meta name="a e-commerce website with relation database" content="not yet decided">

    <!-- Define a viewport to mobile devices to use - telling the browser to assume that the page is as wide as the device (width=device-width,
    and setting the initial page zoom level to be 1 (initial-scale=1.0), and fixing width=device-width for iOS9 (shtink-to-fit=no) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- Add normalize.css which enables browsers to render all elements more consistently and in line with modern standards as it only targets particular styles that need normalizing -->
    <link href="css/normalize.css" rel="stylesheet" media="all">
    <!-- For legacy support (IE 6/7, Firefox < 4, and Safari < 5) use normalize-legacy.css instead -->
    <!--<link href="css/normalize-legacy.css" rel="stylesheet" media="all">-->

    <!-- Include the site stylesheet -->
    <link href="css/styles.css" rel="stylesheet" media="all">

    <!-- Include the HTML5 shiv print polyfill for Internet Explorer browsers 8 and below -->
    <!--[if lt IE 9]><script src="js/html5shiv-printshiv.js" media="all"></script><![endif]-->
    <script src="../js/orderEvent.js" type="text/javascript"></script>
</head>

<body>

    <!-- The page header typically contains items such as your site heading, logo and possibly the main site navigation -->
    <!-- ARIA: the landmark role "banner" is set as it is the prime heading or internal title of the page -->
    <header role="banner">

        <h1>
            E-Commerce
        </h1>

        <!-- ARIA: the landmark role "navigation" is added here as the element contains site navigation
        NOTE: The <nav> element does not have to be contained within a <header> element, even though the two examples on this page are. -->
        <nav role="navigation">
            <!-- This can contain your site navigation either in an unordered list or even a paragraph that contains links that allow users to navigate your site -->

        </nav>

    </header>

    <!-- If you want to use an element as a wrapper, i.e. for styling only, then <div> is still the element to use -->
    <div class="wrap">

        <!-- The <main> element is used to enclose the main content, i.e. that which contains the central topic of a document -->
        <!-- ARIA: the landmark role "main" is added here as it contains the main content of the document, and it is recommended to add it to the
        <main> element until user agents implement the required role mapping. -->
        <main role="main">


            <!-- PROTOTYPE. This is the grid for the shop, each item is a square and inside the
            item you can add images, buttons etc. -->
            <div class="shop">
                    
                <!-- <div id="1" class="item">
                <img src="img/boat.png">
                <p id="namePos">boat</p>
                <p id="pricePos">5000</p>
                <p id="stockpos">9</p>
                <p id="ratingPos">99</p>
                <button id = "1" type="button" onclick="orderEvent(this.id)">Test</button>
                </div> -->

                
                <?php
                    include 'php/loadProducts.php';
                    loadProducts();
                ?>


            </div>
        </main>
    </div>
    <!-- The main page footer can
                        contain items such as copyright and contact information. It can also contain a duplicated
                        navigation of your site which is not usually contained within a <nav> -->
    <footer role="contentinfo">

        <!-- The <address> element contains contact information for the nearest <article> or <body> element. This example is for the <body> -->
        <address>
            <p>This is the footer for the one who might not know.
                Website currently under development</a>.</p>
        </address>

        <!-- Copyright information can be contained within the <small> element. The <time> element is used here to indicate that the '2018' is a date -->
        Copyright &copy; <time>2018</time>

    </footer>

</body>

</html>