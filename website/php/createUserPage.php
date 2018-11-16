<html>
    <head>
        <title>Create user</title>
        <script src="../js/getUserInput.js" type="text/javascript"></script>
        <link href="../css/styles.css" rel="stylesheet">
    </head>
    <body>
        <header role="banner">

		    <h1 id="logoText"> StarTrader </h1>
		    <h3 id="logoSlogan"> The biggest market in the universe </h3>

            <!-- ARIA: the landmark role "navigation" is added here as the element contains site navigation
            NOTE: The <nav> element does not have to be contained within a <header> element, even though the two examples on this page are. -->
            <nav role="navigation">
             <!-- This can contain your site navigation either in an unordered list or even a paragraph that contains links that allow users to navigate your site -->

		        <i id="navIcon" class="fa fa-align-justify" style="font-size:36px; color:white"></i>

	            <a href="php/loginpage.php" id="loginmain" class="Button">Log In</a>
            </nav>

    </header>
    <form action="javascript:getUserInput()" method="post" target="_self">

            <h1>Sign up</h1>

            <p>
                <label>First Name</label>
                <input type = "text" id = "first_name" name = "first_name">
                <p id="name-info"></p>
            </p>

            <p>
                <label>Last Name</label>
                <input type = "text" id = "last_name" name = "last_name">
                <p id="lName-info"></p>
            </p>

            <p>
                <label>Email</label>
                <input type = "text" id = "email">
                
            </p>

            <p>
                <label>Password</label>
                <input type = "text" id = "password">
                <p id="password-info"></p>
            </p>
            <div>
            <input type="submit" class="Button" value="Log in" />
            <p id="submit-info"></p>
            </div>
        </form>
    </body>
</html>
