<!DOCTYPE html>
<?php include('../connect.php') ?>
<?php include('serverEAP.php') ?>
<?php include('../loginCheck.php') ?>
<?php session_start(); ?>

<html lang=en>

<head>
	<title>CnAH - Edit Faculty Access</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<center><image src="../Images/School of Business.png"></image></center>
	<div class="header" title ="Certification aNd Accreditation Helper">
		<h2>CnAH - Edit Faculty Access</h2>
	</div>

	<form method="post" action="editAccessPage.php">

		<?php include('../errors.php'); ?>

		<div class="input-group">
			<label>Grant Administrative Access</label>
			<input type="text" name="adminAdd" Placeholder="username">
		</div>
		<div class="input-group">
			<label>Remove Administrative Access</label>
			<input type="text" name="adminSub" Placeholder="username">
		</div>
		<div class="input-group">
			<label>Remove Faculty Access</label>
			<input type="text" name="facSub" Placeholder="username">
		</div>
		<div class="input-group">
			<label>Reactivate Faculty Access</label>
			<input type="text" name="facAdd" Placeholder="username">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="edit_user">Submit</button>
			<a href="../index.php" class="btn btn-default">Back</a>
		</div>
	</form>
</body>
</html>
