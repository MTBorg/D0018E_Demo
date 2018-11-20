<html>
    <head>
        <title>Admin panel</title>
        <script src="../js/CreateProductSubmit.js" type="text/javascript"></script>
        <link href="../css/styles.css" rel="stylesheet">
    </head>
    <body>
        <header role="banner">
        <a href="../index.php" style = "text-decoration:none">
		    <h1 id="logoText"> StarTrader </h1>
		    <h3 id="logoSlogan"> The biggest market in the universe </h3>
</a>
            <!-- ARIA: the landmark role "navigation" is added here as the element contains site navigation
            NOTE: The <nav> element does not have to be contained within a <header> element, even though the two examples on this page are. -->
            <nav role="navigation">
             <!-- This can contain your site navigation either in an unordered list or even a paragraph that contains links that allow users to navigate your site -->


	            <a href="loginpage.php" id="loginmain" class="Button">Log In</a>
            </nav>

        </header>
 
        <div class="SubmitBox">
            <!-- <form action="javascript:CreateProductSubmit()" method="post" target="_self">
                <table class="tableBox">
                <p style="color:white">ADD PRODUCT</p>
                    <tr>
                        <td><p class="submitText" style="font-family:Helvetica">name</p></td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td><p class="submitText" style="font-family:Helvetica">price</p></td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td><p class="submitText" style="font-family:Helvetica">stock</p></td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td><p class="submitText" style="font-family:Helvetica">img_url</p></td>
                        <td><input type="text"></td>
                    </tr>
                    <!-- <tr>
                        <td><p class="submitText" style="font-family:Helvetica">Password</p></td>
                        <td><input type="password"></td>
                    </tr> -->
                </table> -->
            <!-- Upload image -->
                <form action="uploadimg.php" method = "post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" name="submit" class="Button" value="Submit">
                <p id="submit-info"></p>
                </form>
                
            </form>
        </div>
        
    </body>
</html>
