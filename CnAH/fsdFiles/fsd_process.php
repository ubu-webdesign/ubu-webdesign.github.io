<?php
  require 'connect.php';
  session_start();

  // MAIN
  $first_name    = $_POST['first_name'];
  $middle_name   = $_POST['middle_name'];
  $last_name     = $_POST['last_name'];
  $status        = $_POST['status'];
  $title         = $_POST['title'];
  $teaching_dept = $_POST['teaching_dept'];
  $fac_id       = $_SESSION['fac_id'];
     
  // Attempt insert query execution
  $sql = "UPDATE faculty 
          SET firstname     = '$first_name',
              middlename    = '$middle_name',
              lastname      = '$last_name',
              status        = '$status',
              title         = '$title',
              teaching_dept = '$teaching_dept'
          WHERE id = '$fac_id';";
    
  if(!mysqli_query($conn, $sql)){ echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . "<br>"; }
  //else { echo "<br>Name updated successfully.<br> $sql <br>"; } 

  $ed_id1       = $_SESSION['ed_id1'];
  $degree1      = $_POST['degree1'];  
  $institution1 = $_POST['institution1'];

  $ed_id2       = $_SESSION['ed_id2'];
  $degree2      = $_POST['degree2'];  
  $institution2 = $_POST['institution2'];

  $ed_id3       = $_SESSION['ed_id3'];
  $degree3      = $_POST['degree3'];  
  $institution3 = $_POST['institution3'];

  // Check if default value is sent.
  if ($degree1 != 'Degree') {
    if ($ed_id1 != 0) {
      $sql = "UPDATE faculty_education
              SET degree = '$degree1',
                  institution = '$institution1'
              WHERE id = 'ed_id1';";
    } else {
      $sql = "INSERT INTO faculty_education
              SET fac_id = '$fac_id',
                  degree = '$degree1',
                  institution = '$institution1';";
    }
    if(mysqli_query($conn, $sql)){ echo "<br>Education1 updated successfully.<br> $sql <br>"; } 
    else{ echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . "<br>"; }
  }

  // Check if default value is sent.
  if ($degree2 != 'Degree') {
    if ($ed_id2 != 0) {
      $sql = "UPDATE faculty_education
              SET degree = '$degree2',
                  institution = '$institution2'
              WHERE id = 'ed_id2';";
    } else { 
      $sql = "INSERT INTO faculty_education
              SET fac_id = '$fac_id',
                  degree = '$degree2',
                  institution = '$institution2';";
    }
    if(mysqli_query($conn, $sql)){ echo "<br>Education2 updated successfully.<br> $sql <br>"; } 
    else{ echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . "<br>"; }
  }

  // Check if default value is sent.
  if ($degree3 != 'Degree') {
    if ($ed_id3 != 0) {
      $sql = "UPDATE faculty_education
              SET degree = '$degree3',
                  institution = '$institution3'
              WHERE id = 'ed_id3';";
    } else {
      $sql = "INSERT INTO faculty_education
              SET fac_id = '$fac_id',
                  degree = '$degree3',
                  institution = '$institution3';";
    }
    if(mysqli_query($conn, $sql)){ echo "<br>Education3 updated successfully.<br> $sql <br>"; } 
    else{ echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . "<br>"; }
  }


  $date_array      = $_POST['date'];
  $objective_array = $_POST['objective[]'];
  $category_array  = $_POST['category[]'];
  $details_array   = $_POST['details[]'];

    $contrib_id = $_SESSION['contrib_id'];    
    $date       = $_POST['date'];
    $type       = $_POST['type'];
    $category   = $_POST['category'];
    $specifics  = $_POST['specifics'];
    $text       = $_POST['text'];

    $contrib_rows = count($type);
    for ($x = 0; $x < $contrib_rows; $x++) {
      if ($date[$x] != '') {
        if ($contrib_id[$x] == '') {
          $sql = "INSERT INTO contributions
                  SET fac_id    = '$fac_id',
                      date      = '$date[$x]',
                      type      = '$type[$x]',
                      category  = '$category[$x]',
                      specifics = '$specifics[$x]',
                      text      = '$text[$x]';";
        } else {
          $sql = "UPDATE contributions
                  SET fac_id    = '$fac_id',
                      date      = '$date[$x]',
                      type      = '$type[$x]',
                      category  = '$category[$x]',
                      specifics = '$specifics[$x]',
                      text      = '$text[$x]'
                  WHERE id = '$contrib_id[$x]';";
        }
          if(!mysqli_query($conn, $sql)){ echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . "<br>"; }
          else { echo 'Contribution added successfully.<br> ' . $sql . '<br>'; } 
      }
    }  

?>
