<html>
    <head>
        <title>Create user</title>
        <script src="../js/getUserInput.js" type="text/javascript"></script>
        <link href="../css/styles.css" rel="stylesheet">
    </head>
    <body>
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
