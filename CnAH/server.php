<?php

session_start();

// variable declaration
$username = "";
$email    = "";
$errors = array();
$_SESSION['success'] = "";

// connect to database
//$db = mysqli_connect('localhost', 'root', 'root', 'CnAH');
$db = mysqli_connect('localhost', 'root', 'fmus2018', 'CnAH');

// check connection
if (!$db) { die("Connection failed: " . mysqli_connect_error()); }
//else { echo "Connected successfully"; }

// REGISTER USER
if (isset($_POST['reg_user'])) {
	// receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }

	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	$query = "SELECT username FROM faculty WHERE username='$username'";
	$results = mysqli_query($db, $query);
	if (mysqli_num_rows($results) != 0) { array_push($errors, "Username already exists"); }

	$query = "SELECT email FROM faculty WHERE email='$email'";
	$results = mysqli_query($db, $query);
	if (mysqli_num_rows($results) != 0) { array_push($errors, "Email already in use"); }

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database
		$query = "INSERT INTO faculty (username, email, password)
				  VALUES('$username', '$email', '$password');";
		mysqli_query($db, $query);

		$_SESSION['username'] = $username;
		$_SESSION['admin'] = 0;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php');
//		header('location: http://198.102.206.38/');
//		header('location: http://174.107.180.251/');
	}
}

// LOGIN USER
if (isset($_POST['login_user'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($password)) { array_push($errors, "Password is required"); }

	if (count($errors) == 0) {
		$password = md5($password);
		$query = "SELECT * FROM faculty WHERE username='$username' AND password='$password'";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			$row = $results->fetch_assoc();
			//$admin = $row["admin"];
			$_SESSION['admin'] = $row["admin"];
			$active = $row["active"];
			if ($active == 0) { array_push($errors, "User isn't active."); }
			else { header('location: index.php'); }
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

// FORGOT USERNAME
if (isset($_POST['forgot_user'])) {
	$email = mysqli_real_escape_string($db, $_POST['email']);

	if (empty($email)) {
		array_push($errors, "Email address is required");
	}

	if (count($errors) == 0) {
		$query = "SELECT username FROM faculty WHERE email='$email'";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_assoc($results);

			// I'm hoping to email this to the user
			// And this shouldn't check for valid email
			//$centered = "Username: " . $row["username"];
			//echo "<p align=center>$centered</p>";

			// the message
			$msg = $row["username"];

			// use wordwrap() if lines are longer than 70 characters
			//$msg = wordwrap($msg,70);

			// send email
			if (mail($email,"Recover",$msg,"From: CnAH Recovery"))
				{ echo "email sent";}
			else {array_push($errors, "No email sent");}
			} else {
			array_push($errors, "Email address not found in system.");
		}
	}
}

// FORGOT PASSWORD
if (isset($_POST['forgot_password'])) {
	$email = mysqli_real_escape_string($db, $_POST['email']);

	if (empty($email)) {
		array_push($errors, "Email address is required");
	}

	if (count($errors) == 0) {
	// This is setup for EMAIL ADDRESS looking up USERNAME.
	// This will have to be fixed later.

		$query = "SELECT username FROM faculty WHERE email='$email'";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_assoc($results);

			// the message
			$msg = $row["username"];

			// use wordwrap() if lines are longer than 70 characters
			//$msg = wordwrap($msg,70);

			// send email
			if (mail($email,"Recover",$msg,"From: CnAH Recovery"))
				{ echo "email sent";}
			else {array_push($errors, "No email sent");}
			} else {
			array_push($errors, "Email address not found in system.");
		}

	}
}
