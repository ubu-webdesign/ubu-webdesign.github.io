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
		<h2>CnAH - Create New Account</h2>
	</div>

	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
		<p>
			Forgot username? <a href="forgot_username.php">Click here</a>
		</p>
		<p>
			Forgot password? <a href="forgot_password.php">Click here</a>
		</p>
	</form>
</body>
</html>
