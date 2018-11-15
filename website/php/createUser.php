<html>
    <head>
        <title>Create user</title>
    </head>
    <body>
        <h1>Sign up</h1>
        
        <p>
            <label for = "first_name">First Name</label>
            <input type = "text" id = "first_name">
        </p>

        <p>
            <label>Last Name</label>
            <input type = "text" id = "last_name">
        </p>

        <p>
            <label>Email</label>
            <input type = "text" id = "email">
        </p>

        <p>
            <label>Password</label>
            <input type = "text" id = "password">
        </p>

        <button name="confirm" type="button" onClick="return getInput()">Confirm</button>

    </body>
</html>

<script>
    function getInput() {
        echo "script";

        var first_name = document.getElementById('first_name').value;
        var last_name = document.getElementById('first_name').value;
        var email = document.getElementById('first_name').value;
        var password = document.getElementById('first_name').value;

        echo "script";
    }
</script>

<?php
    function createUser() {
        require_once 'dbConnect.php';
        $dbconn = dbConnect();

        echo "php";
    }
?>
