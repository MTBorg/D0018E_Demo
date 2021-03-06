<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <script src="/js/account/userSignUp.js" type="text/javascript"></script>
        <link rel="shortcut icon" href="/fa-rocket.ico">
        <link href="/css/styles.css" rel="stylesheet">
        <script src="/js/init/initNavButtons.js" type="text/javascript"></script>
        <script src="/js/product/searchRequest.js" type="text/javascript"></script>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    </head>
    <body onload="initNavButtons()">
        <?php
            echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initHeader.php'; 
        ?>
        
        <div class="submitBox">
            <form action="javascript:userSignUp()" method="post" target="_self">
                <!-- Create submit fields for users to submit their information -->
                <table>
                    <tr>
                        <td align="left">First name</td>
                        <td align="right"><input class="submitField" type="text" id="fname"></td>
                    </tr>
                    <tr>
                        <td align="left">Last name</td>
                        <td align="right"><input class="submitField" type="text" id="lname"></td>
                    </tr>
                    <tr>
                        <td align="left">Email</td>
                        <td align="right"><input class="submitField" type="text" id="email"></td>
                    </tr>
                    <tr>
                        <td align="left">Password</td>
                        <td align="right"><input class="submitField" type="password" id="password"></td>
                    </tr>
                </table>
                <button type="submit" value="Submit">Sign up</button>
                <p id="submit-info"></p>
            </form>
        </div>

        <?php
            echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initFooter.php';
        ?>
    </body>
</html>
