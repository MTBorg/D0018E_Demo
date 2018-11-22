<html>
    <head>
        <title>Create user</title>
        <script src="../js/getUserInput.js" type="text/javascript"></script>
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
            <form action="javascript:getUserInput()" method="post" target="_self">
                <table>
                    <tr>
                        <td align="left"><p class="submitText" style="font-family:Helvetica">First name</p></td>
                        <td align="right"><input type="text"></td>
                    </tr>
                    <tr>
                        <td align="left"><p class="submitText" style="font-family:Helvetica">Last name</p></td>
                        <td align="right"><input type="text"></td>
                    </tr>
                    <tr>
                        <td align="left"><p class="submitText" style="font-family:Helvetica">Email</p></td>
                        <td align="right"><input type="text"></td>
                    </tr>
                    <tr>
                        <td align="left"><p class="submitText" style="font-family:Helvetica">Password</p></td>
                        <td align="right"><input type="password"></td>
                    </tr>
                </table>
                <input type="submit" class="Button" value="Submit">
                <p id="submit-info"></p>
            </form>
        </div>
    </body>
</html>
