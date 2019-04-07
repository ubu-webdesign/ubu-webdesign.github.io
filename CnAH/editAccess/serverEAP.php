<?php
  session_start();
  
  // variable declaration
  $adminadd = "";
  $adminsub = "";
  $facadd = "";
  $facsub = "";
  $errors = array();
  $_SESSION['success'] = "";
  
  // connect to database
  require "../connect.php";
  
  // REGISTER USER
  if (isset($_POST['edit_user'])) {
    // receive all input values from the form
    $adminadd = mysqli_real_escape_string($conn, $_POST['adminAdd']);
    $adminsub = mysqli_real_escape_string($conn, $_POST['adminSub']);
    $facadd = mysqli_real_escape_string($conn, $_POST['facAdd']);
    $facsub = mysqli_real_escape_string($conn, $_POST['facSub']);
    
    // form validation: ensure that the form is correctly filled
    $inputs = 0;
    if (!empty($adminadd)) { $inputs++; $username = $adminadd;}
    if (!empty($adminsub)) { $inputs++; $username = $adminsub;}
    if (!empty($facadd)) { $inputs++; $username = $facadd;}
    if (!empty($facsub)) { $inputs++; $username = $facsub;}
    if ($inputs > 1) { array_push($errors, "Please use only one field"); }
    
    if ($inputs == 1) {
      if ($_SESSION['username'] == $username) { array_push($errors, "Unable to alter your own access."); $inputs--; }
    }
    
    if ($inputs == 1) {
      $query = "SELECT username FROM faculty WHERE username='$username'";
      $results = mysqli_query($conn, $query);
      if (mysqli_num_rows($results) == 0) { array_push($errors, "Username doesn't exists"); $inputs--; }
      else {
        if (!empty($adminadd)) { $sql = "UPDATE faculty SET admin='1'  WHERE username='$adminadd'"; }
        if (!empty($adminsub)) { $sql = "UPDATE faculty SET admin='0'  WHERE username='$adminsub'"; }
        if (!empty($facadd))   { $sql = "UPDATE faculty SET active='1' WHERE username='$facadd'"; }
        if (!empty($facsub))   { $sql = "UPDATE faculty SET active='0' WHERE username='$facsub'"; }
        
        if ($conn->query($sql) === TRUE) { array_push($errors, "Record updated successfully."); }
        else { array_push($errors, "Error updating record: " . $conn->error); }
      }
      	 
    }
  }
?>
