<!DOCTYPE html>
<html>
<head>
	<link href="/css/styles.css" rel="stylesheet"> 

	<title>Log In</title>
	<link rel="shortcut icon" href="/fa-rocket.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="/js/account/LogInSubmit.js" type="text/javascript"></script>
	<script src="/js/init/initNavButtons.js" type="text/javascript"></script>
</head>	

<body onload="initNavButtons()">
	<?php
		 echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initHeader.php';	
	?>
	<div class="submitBox">
		<form action="javascript:LogInSubmit()" method="post" target="_self">
			<table style="width:50%; margin:auto;">
				<tr>
					<td align="right">Email</td>
					<td align="left"><input type="text" name="email" class="submitField" /></td>
				</tr>
				<tr>
					<td align="right">Password</td>
					<td align="left"><input type="password" name="password" class="submitField"/></td>
				</tr>
			</table>
			<button type="submit" class="button" value="Log in">Log In</button>
		</form>
	</div>
<?php
echo include $_SERVER['DOCUMENT_ROOT'].'/php/init/initFooter.php';

?>
</body>

</html>
