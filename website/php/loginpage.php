<!DOCTYPE html>
<html>
<head>
	<link href="../css/LogInStyles.css" rel="stylesheet"> 

	<title>Log in</title>
	<script src="../js/LogInSubmit.js" type="text/javascript">
	</script>
</head>	
<body>

	<div class="LogInBox">
		<form action="javascript:LogInSubmit()" method="post" style="text-align:center" target="_self">
			<p>Username
			<input type="text" name="email" class="LogInForm" />
			<p>Password
			<input type="text" name="password" class="LogInForm" />
			<br>
			<input type="submit" class="ButtonLogIn" value="Log in"  />
		</form>
	</div>

</body>
</html>
