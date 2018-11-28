<html>
    <head>
        <title>Create user</title>
        <script src="../js/getUserInput.js" type="text/javascript"></script>
        <link href="../css/styles.css" rel="stylesheet">
        <script src="/js/initNavButtons.js" type="text/javascript"></script>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body onload="initNavButtons()">
        <?php
            echo include 'initHeader.php'; 
        ?>
        <div class="submitBox">
            <form action="javascript:getUserInput()" method="post" target="_self">
                <table>
                    <tr>
                        <td align="left">First name</td>
                        <td align="right"><input type="text"></td>
                    </tr>
                    <tr>
                        <td align="left">Last name</td>
                        <td align="right"><input type="text"></td>
                    </tr>
                    <tr>
                        <td align="left">Email</td>
                        <td align="right"><input type="text"></td>
                    </tr>
                    <tr>
                        <td align="left">Password</td>
                        <td align="right"><input type="password"></td>
                    </tr>
                </table>
                <button type="submit" value="Submit">Sign up</button>
                <p id="submit-info"></p>
            </form>
        </div>
    </body>
</html>
