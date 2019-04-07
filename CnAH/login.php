<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>CnAH [Certification aNd Accreditation Helper]</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center><image src="Images/School of Business.png"></image></center>
	<div class="header" title ="Certification aNd Accreditation Helper">
		<h2>CnAH - Login</h2>
	</div>

	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Forgot username? <a href="forgot_username.php">Click here</a>
		</p>
		<p>	Forgot password? <a href="forgot_password.php">Click here</a>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>

</body>
</html>
