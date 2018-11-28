<!DOCTYPE html>
<html>
<head>
	<link href="../css/styles.css" rel="stylesheet"> 

	<title>Log in</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="../js/LogInSubmit.js" type="text/javascript">
	</script>

	<script src="/js/initNavButtons.js" type="text/javascript"></script>
</head>	
<body onload="initNavButtons()">
	<?php
		 echo include 'initHeader.php';	
	?>
	<div class="logInBox">
		<form action="javascript:LogInSubmit()" method="post" style="text-align:center" target="_self">
			<table style="width:50%; margin:auto;">
				<tr>
					<td align="right">Email</td>
					<td align="left"><input type="text" name="email" class="LogInForm" /></td>
				</tr>
				<tr>
					<td align="right">Password</td>
					<td align="left"><input type="password" name="password" class="LogInForm"/></td>
				</tr>
			</table>
			<button type="submit" class="button" value="Log in">Log In</button>
		</form>
	</div>

</body>
</html>
