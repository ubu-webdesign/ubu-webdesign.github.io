<!DOCTYPE html>

<?php include('../loginCheck.php') ?>

<html lang=en>
<head>

<?php
  session_start();
  require 'connect.php';
  $username = $_SESSION["username"];
  $sql = "SELECT id, firstname, middlename, lastname, status, title, teaching_dept FROM faculty WHERE username='$username'";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  if ($row = $result->fetch_assoc()) {
    $_SESSION['fac_id'] = $row["id"];
    $fac_id = $row["id"];
    $first_name = $row["firstname"];
    $middle_name = $row["middlename"];
    $last_name = $row["lastname"];
    //SAVE THESE APPENDINGS FOR THE PRINT SCREEN!!!
    //How can we break this up afterwards?
    //How can we tell if it's a middle name or last name?
    //Who thought of this!!!
    //$fullname = $firstname . " " . $middlename . " " . $lastname;
    $status = $row["status"];
    $teaching_dept = $row["teaching_dept"];
    $title = $row["title"];
    //Same here.  If we append these then they are uneditable.
    //$fulltitle = $title . " of " . $teaching_dept;

  } else {
    $first_name = "First Name";
    $middle_name = "Middle Name";
    $last_name = "Last Name";
    $status = 'Status';
    $teaching_dept = "Department";
    $title = "Title";			
    }
  //What about empty values?
  if ($status == '') {$status = 'Status';}
  if ($title == '')  {$title = 'Title';}
  if ($teaching_dept == '') {$teaching_dept = 'Department';}
?>

<title>Faculty Sufficiency Form</title>

<meta name="viewport" content="width=device-width, initial-scale=2">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" type="text/css" href="fsdprintbuttonhide.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  
<style>
  table, th, td {
    border: 1px solid black;
    border-collapsecollapse;
    width:50%;
  }
		
  th, td {
    padding: 5px;
    text-align: left;
  }
	
</style>

</head>

<body bgcolor="#E6E6FA">

<center><image src="../Images/School of Business.png"></image></center>
<center>Faculty Sufficiency Form of Faculty Member at Francis Marion University</center>
<center><p>Academic Year :<select id="selectElementId" name="academic_year" ></select></center>

<script>
  var max = new Date().getFullYear();
  min = max - 5;
  select = document.getElementById('selectElementId');
  
  for (var i = min; i<=max; i++) {
    var opt = document.createElement('option');
    opt.value = i;
    opt.innerHTML = i;
    select.appendChild(opt);
  }

</script>
 </p>
 
  <form action="fsd_process.php" method="post">
  
  <h3><font color="#C8102E"><b>Personal Information</b></font></h3>
  <table id="faculty_info">
    <tr>
      <th>Name</th>
      <td><input type="text" id="faculty_name" name="first_name" size="<?php echo strlen($first_name)+1; ?>"  value="<?php echo $first_name ?>">
          <input type="text" id="faculty_name" name="middle_name" size="<?php echo strlen($middle_name)+1; ?>"  value="<?php echo $middle_name ?>">
          <input type="text" id="faculty_name" name="last_name" size="<?php echo strlen($last_name)+1; ?>"  value="<?php echo $last_name ?>"></td>
    </tr>
    <tr>
      <th> Faculty Status</th>
      <?php if ($status == 'Status') {
        echo "<td><input type='text' id='status' name='status' size='<?php echo strlen($status)+1; ?>'  PLaceholder='$status'></td>";
      } else {
        echo "<td><input type='text' id='status' name='status' size='<?php echo strlen($status)+1; ?>'  value='$status'></td>";
      } ?>
    </tr>
    <tr>
      <th>Title</th>
      <!-- <td><input type="text" id="title" name="title" size="<?php echo strlen($title)+1; ?>" value="<?php echo $title ?>"> -->
      <?php if ($title == 'Title') {
        echo "<td><input type='text' id='title' name='title' size='<?php echo strlen($title)+1; ?>'  PLaceholder='$title'>";
      } else {
        echo "<td><input type='text' id='title' name='title' size='<?php echo strlen($title)+1; ?>'  value='$title'>";
      } ?> 
      of
<!--      <input type="text" id="title" name="teaching_dept" size="<?php echo strlen($teaching_dept)+1; ?>" value="<?php echo $teaching_dept ?>"></td> -->
      <?php if ($teaching_dept == 'Department') {
        echo "<input type='text' id='teaching_dept' name='teaching_dept' size='<?php echo strlen($teaching_dept)+1; ?>'  PLaceholder='$teaching_dept'></td>";
      } else {
        echo "<input type='text' id='teaching_dept' name='teaching_dept' size='<?php echo strlen($teaching_dept)+1; ?>'  value='$teaching_dept'></td>";
      } ?> 
    </tr>
  </table>

<?php
  $sql = "SELECT * FROM faculty_education WHERE fac_id='$fac_id'";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }

  if ($row = $result->fetch_assoc()) {
    $_SESSION['ed_id1'] = $row['id'];
    $degree1 = $row["degree"];
    $institution1 = $row["institution"];
  } else {
    $_SESSION['ed_id1'] = 0;
    $degree1 = "Degree";
    $institution1 = "Educational Institution";
  }      
  if ($row = $result->fetch_assoc()) {
    $_SESSION['ed_id2'] = $row['id'];
    $degree2 = $row["degree"];
    $institution2 = $row["institution"];
  } else {
    $_SESSION['ed_id2'] = 0;
    $degree2 = "Degree";
    $institution2 = "Educational Institution";
  }  
  if ($row = $result->fetch_assoc()) {
    $_SESSION['ed_id3'] = $row['id'];
    $degree3 = $row["degree"];
    $institution3 = $row["institution"];
  } else {
    $_SESSION['ed_id3'] = 0;
    $degree3 = "Degree";
    $institution3 = "Educational Institution";
  }
?>

<h3><font color="#C8102E"><b>Education</b></font></h3>

  <table id="education">
    <tr>
      <th>Degree Title</th><th>Name of University</th>
    </tr>
    <tr>
      <td>
<!--      <td><input type="text" id="degree1" name="degree1" size="15" value="<?php echo $degree1 ?>"></td> -->
      <?php if ($degree1 == 'Degree') {
        echo "<input type='text' id='degree' name='degree1' size='<?php echo strlen($degree1)+1; ?>'  PLaceholder='$degree1'></td>";
      } else {
        echo "<input type='text' id='degree' name='degree1' size='<?php echo strlen($degree1)+1; ?>'  value='$degree1'></td>";
      } ?>
      </td>
      <td> 
<!--      <td><input type="text" id="university1" name="institution1" size="52" value="<?php echo $institution1 ?>"></td> -->
      <?php if ($institution1 == 'Educational Institution') {
        echo "<input type='text' id='institution' name='institution1' size='<?php echo strlen($institution1)+1; ?>'  PLaceholder='$institution1'></td>";
      } else {
        echo "<input type='text' id='institution' name='institution1' size='<?php echo strlen($institution1)+1; ?>'  value='$institution1'></td>";
      } ?>
      </td> 
    <tr>
      <td>
      <?php if ($degree2 == 'Degree') {
        echo "<input type='text' id='degree' name='degree2' size='<?php echo strlen($degree2)+1; ?>'  PLaceholder='$degree2'></td>";
      } else {
        echo "<input type='text' id='degree' name='degree2' size='<?php echo strlen($degree2)+1; ?>'  value='$degree2'></td>";
      } ?>
<!--      <input type="text" id="degree2" name="degree2" size="15" value="<?php echo $degree2 ?>"> -->
      </td>
      <td>
      <?php if ($institution2 == 'Educational Institution') {
        echo "<input type='text' id='institution' name='institution2' size='<?php echo strlen($institution2)+1; ?>'  PLaceholder='$institution2'></td>";
      } else {
        echo "<input type='text' id='institution' name='institution2' size='<?php echo strlen($institution2)+1; ?>'  value='$institution2'></td>";
      } ?>
      <!-- <input type="text" id="university2" name="institution2" size="52" value="<?php echo $institution2 ?>"> -->
      </td>
    </tr>
    <tr>
      <td>
      <?php if ($degree2 == 'Degree') {
        echo "<input type='text' id='degree' name='degree3' size='<?php echo strlen($degree3)+1; ?>'  PLaceholder='$degree3'></td>";
      } else {
        echo "<input type='text' id='degree' name='degree3' size='<?php echo strlen($degree3)+1; ?>'  value='$degree3'></td>";
      } ?>
      <!-- <input type="text" id="degree3" name="degree3" size="15" value="<?php echo $degree3 ?>"> -->
      </td>
      <td>
      <?php if ($institution3 == 'Educational Institution') {
        echo "<input type='text' id='institution' name='institution3' size='<?php echo strlen($institution3)+1; ?>'  PLaceholder='$institution3'></td>";
      } else {
        echo "<input type='text' id='institution' name='institution3' size='<?php echo strlen($institution3)+1; ?>'  value='$institution3'></td>";
      } ?>
      <!-- <input type="text" id="university3" name="institution3" size="52" value="<?php echo $institution3 ?>"> -->
      </td>
    </tr>
  </table>

<?php
  $sql = "SELECT * from contributions WHERE fac_id='$fac_id'";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
//  $result = mysqli_query($conn, $sql);

  if ($row = $result->fetch_assoc()) {
    $_SESSION['contrib_id1'] = $row['id'];
    $year1      = $row['year'];
    $type1      = $row["type"];
    $category1  = $row["category"];
    $specifics1 = $row["specifics"];
    $text1      = $row['text'];
  } else {
    $_SESSION['contrib_id1'] = 0;
    $year1      = 'year';
    $type1      = "type";
    $category1  = "category";
    $specifics1 = "specifics";
    $text1      = 'text';
  }      
  if ($row = $result->fetch_assoc()) {
    $_SESSION['contrib_id2'] = $row['id'];
    $degree2 = $row["degree_title"];
    $institution2 = $row["university_name"];
  } else {
    $_SESSION['contrib_id2'] = 0;
    $degree2 = "Degree";
    $institution2 = "Educational Institution";
  }  
  if ($row = $result->fetch_assoc()) {
    $_SESSION['contrib_id3'] = $row['id'];
    $degree3 = $row["degree_title"];
    $institution3 = $row["university_name"];
  } else {
    $_SESSION['contrib_id3'] = 0;
    $degree3 = "Degree";
    $institution3 = "Educational Institution";
  }
?>
  
<h3><font color="#C8102E">Contributions</font></h3>
<?php
  require "../connect.php";
 
  class RowReview {
    public $fac_id;
    public $date;
    public $type;
    public $category;
    public $specifics;
    public $text;
    public $reviewed;
    public $reviewed_notes;
  }
  
  $sql = "SELECT * FROM contributions WHERE fac_id='$fac_id'";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $num_rows = $result->num_rows;

  for ($x = 0; $x < $num_rows; $x++) {
    $row = $result->fetch_assoc();
    $myRow[$x] = new RowReview();
    $myRow[$x]->contrib_id     = $row["id"];
    $myRow[$x]->date           = $row["date"];
    $myRow[$x]->type           = $row["type"];
    $myRow[$x]->category       = $row["category"];
    $myRow[$x]->specifics      = $row["specifics"];
    $myRow[$x]->text           = $row["text"];
    $myRow[$x]->reviewed       = $row["reviewed"];
    $myRow[$x]->reviewed_notes = $row["reviewed_notes"];
  }
  if ($num_rows > 0) {
    $contrib_id_array = array($myRow[0]->contrib_id);
    for ($x = 1; $x < $num_rows; $x++) {
      array_push($contrib_id_array, $myRow[$x]->contrib_id);
    }
  }
  $_SESSION['contrib_id'] = $contrib_id_array;
?>

<!----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- Contributions Table ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<table id="myTable" style="border: 1px solid black">
    <tr>
      <th>Date</th>
      <th>type</th>
      <th>category</th>
      <th>specifics</th>
      <th>text</th>
      <th>reviewed</th>
      <th>reviewed_notes</th>
    </tr>

<!----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- Existing Contributions ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----->
    <?php for ($x = 0; $x < $num_rows; $x++) { ?>
      <tr>
        <td><input type="text" id='date'      value='<?php echo $myRow[$x]->date; ?>'      name='date[$x]'></td>
        <td><input type='text' id='type'      value='<?php echo $myRow[$x]->type; ?>'      name='type[$x]'></td>
        <td><input type='text' id='category'  value='<?php echo $myRow[$x]->category; ?>'  name='category[$x]'></td>
        <td><input type='text' id='specifics' value='<?php echo $myRow[$x]->specifics; ?>' name='specifics[$x]'></td>
        <td><input type='text' id='text'      value='<?php echo $myRow[$x]->text; ?>'      name='text[$x]'></td>
        <td><?php echo $myRow[$x]->reviewed; ?></td>
        <td><?php echo $myRow[$x]->reviewed_notes; ?></td>
        <td><input type="button" value="Delete" /></td>
      </tr>
    <?php } ?>

<!----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- First blank contribution ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----->
      <tr>
        <td><input type='text' id='date'      Placeholder='MM/DD/YYYY' name='date[]'></td>
        <td><input type='text' id='type'      Placeholder='Type'       name='type[]'></td>
        <td><input type='text' id='category'  Placeholder='Category'   name='category[]'></td>
        <td><input type='text' id='specifics' Placeholder='Specifics'  name='specifics[]'></td>
        <td><input type='text' id='text'      Placeholder='Text'       name='text[]'></td>
        <td><?php echo 'Testing' ?></td>
        <td><?php echo 'Testing' ?></td>
        <td><input type="button" value="Delete" /></td>
      </tr>

</table>
<p>
    <input type="button" value="Insert row">
</p>

<!----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- Insert blank contribution ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----->
<script>
$('#myTable').on('click', 'input[type="button"]', function () {
    $(this).closest('tr').remove();
})
$('p input[type="button"]').click(function () {
  $('#myTable').append("<tr><td><input type='text' id='date'      Placeholder='MM/DD/YYYY' name='date[]'></td>"  +
                           "<td><input type='text' id='type'      Placeholder='Type'       name='type[]'></td>"      +
                           "<td><input type='text' id='category'  Placeholder='Category'   name='category[]'></td>"  +
                           "<td><input type='text' id='specifics' Placeholder='Specifics'  name='specifics[]'></td>" +
                           "<td><input type='text' id='text'      Placeholder='Text'       name='text[]'></td>"      +
                           "<td><?php echo 'Testing' ?></td><td><?php echo 'Testing' ?></td><td><input type='button' value='Delete' /></td></tr>")

});
</script>
<!----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- End Contributions Table ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----->

<br><br>

<!-- <center><input type="submit" value="submit" id="submit" /><button id="printButton" onclick="window.print()"> <b>Print</b> </button></center>
<b id="logout"><a href="../ardFiles/logout.php">Logout</a></b>  -->
  <!----Buttons----->
  <center>
    <input type="submit" value="Submit">
    <button id="printButton" onclick="window.print()">Print</button>
  </center>
  <center>
    <a href="../index.php" class=btn button id='back'>Back</a>
    <id="logout"><a href="../ardFiles/logout.php">Logout</a>
  </center>

</form>
</body>
</html>
