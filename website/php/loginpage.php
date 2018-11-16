<!DOCTYPE html>
<html>
<head>
	<link href="../css/styles.css" rel="stylesheet"> 

	<title>Log in</title>
	<script src="../js/LogInSubmit.js" type="text/javascript">
	</script>
</head>	
<body>

	<div class="LogInBox">
		<form action="javascript:LogInSubmit()" method="post" style="text-align:center" target="_self">
			<table style="width:50%; margin:auto;">
				<tr>
					<td align="right"><p style="font-family:Helvetica">Email</td>
					<td align="left"><input type="text" placeholder="email" name="email" class="LogInForm" /></td>
				</tr>
				<tr>
					<td align="right"><p style="font-family:Helvetica">Password</td>
					<td align="left"><input type="password" placeholder="password" name="password" class="LogInForm"/></td>
				</tr>
			</table>
			<input type="submit" class="ButtonLogIn" value="Log in"  />
		</form>
	</div>

</body>
</html>
