<!DOCTYPE html>
<html>
<head>
	<link href="../css/styles.css" rel="stylesheet"> 

	<title>Log in</title>
	<script src="../js/LogInSubmit.js" type="text/javascript">
	</script>
</head>	
<body>
	<header role="banner">

		<h1 id="logoText"> StarTrader </h1>
		<h3 id="logoSlogan"> The biggest market in the universe </h3>

        <!-- ARIA: the landmark role "navigation" is added here as the element contains site navigation
        NOTE: The <nav> element does not have to be contained within a <header> element, even though the two examples on this page are. -->
        <nav role="navigation">
            <!-- This can contain your site navigation either in an unordered list or even a paragraph that contains links that allow users to navigate your site -->

			<a href="php/createUserPage.php" id="signUpMain" class="Button">Sign up</a>
        </nav>
    </header>
	<div class="LogInBox">
		<form action="javascript:LogInSubmit()" method="post" style="text-align:center" target="_self">
			<table style="width:50%; margin:auto;">
				<tr>
					<td align="right"><p class="submitText" style="font-family:Helvetica">Email</td>
					<td align="left"><input type="text" placeholder="email" name="email" class="LogInForm" /></td>
				</tr>
				<tr>
					<td align="right"><p class="submitText" style="font-family:Helvetica">Password</td>
					<td align="left"><input type="password" placeholder="password" name="password" class="LogInForm"/></td>
				</tr>
			</table>
			<input type="submit" class="Button" value="Log in"  />
		</form>
	</div>

</body>
</html>
