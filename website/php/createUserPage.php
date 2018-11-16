<html>
    <head>
        <title>Create user</title>
        <script src="../js/getUserInput.js" type="text/javascript"></script>
    </head>
    <body>
    <form action="javascript:getUserInput()" method="post" target="_self">
            <h1>Sign up</h1>
            
            <p>
                <label>First Name</label>
                <input type = "text" id = "first_name" name = "first_name">
            </p>

            <p>
                <label>Last Name</label>
                <input type = "text" id = "last_name" name = "last_name">
            </p>

            <p>
                <label>Email</label>
                <input type = "text" id = "email">
            </p>

            <p>
                <label>Password</label>
                <input type = "text" id = "password">
            </p>

            <input type="submit" class="ButtonLogIn" value="Log in" />
        </form>
    </body>
</html>
