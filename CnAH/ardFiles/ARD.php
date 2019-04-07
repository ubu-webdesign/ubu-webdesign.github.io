<!DOCTYPE html>

<?php include('../loginCheck.php') ?>

<html lang=en>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=2">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>Annual Review Document</title>

  <meta name="viewport" content="width=device-width, initial-scale=2">
  <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="buttonHide.css"> -->
  <link rel="stylesheet" type="text/css" href="ardstyle.css">
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script language="javascript" type="text/javascript" src="CoursesDD.js"></script>
  <!-- <script language="javascript" type="text/javascript" src="ardNotEmpty.js"></script> -->
</head>

<body>
	<center><image src="../Images/School of Business.png"></image></center>
	<small><center>Annual Report of Faculty Member at Francis Marion University<br>
	<script>document.write(new Date().getFullYear()-1)</script>-<script>document.write(new Date().getFullYear())</script> Academic Year</center></small>

  <br>

  Note:  Submit your Annual Report to your School or Department Chair for subsequent submission to your Dean.
  <br><br>

  <!-- This should be on the print page, not the ARD page 
  <table>
    <tr>
	<td width="40%"></td><td width="30%"><center>Initials</center> </td><td width="30%"><center>Date</center></td>
    </tr>
    <tr>
	<td>Faculty Member</td><td></td><td></td>
    </tr>
	<td>Department Chair/Dean</td><td></td><td></td>
    </tr>
	<td>Provost	</td><td> </td><td></td>
    </tr>
  </table> -->

  <br>

<form action="ardSubmit.php" method="post">
<h3><font color="#C8102E">Personal Information</font></h3>
<table id="personal_information">
<tr>
  <!----Name field----->
  <div class="form-group"> 
  <td>
    <label for="name_id" class="control-label">Name:</label>
  </td>

  <td>
  <?php
    session_start();
    require '../fsdFiles/connect.php';

    $username = $_SESSION['username'];
    $sql = "SELECT * FROM faculty WHERE username='$username'";
    if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
    $row = $result->fetch_assoc();
    if ($row["firstname"] != "") {
      $_SESSION['fac_id'] = $row["id"];
      $fac_id = $row["id"];
      $firstname = $row["firstname"];
      $middlename = $row["middlename"];
      $lastname = $row["lastname"];
      $teaching_dept = $row["teaching_dept"];
      $fac_title = $row["title"];
    } else {
      $firstname = "First Name";
      $middlename = "Middle Name";
      $lastname = "Last Name";
      $teaching_dept = "Department";
      $fac_title = "Title";			
      }
  ?>

    <input size=7 type="name" class="form-control" id="name_id" name="first_name" value="<?php echo $firstname ?>" >
    <input size=7 type="name" class="form-control" id="mid_name_id" name="middle_name" value="<?php echo $middlename ?>" >
    <input size=8 type="name" class="form-control" id="last_name_id" name="last_name" value="<?php echo $lastname ?>" >
  </td>

  </div>
</tr>
<tr>
  <!-----Title field---->
  <div class="form-group">
  <td>
    <label for="title_id" class="control-label">Title:</label>
  </td>
  <td>
    <input type="title" class="form-control" id="title" name="fac_title" value= "<?php echo $fac_title ?>" >
  </td>
  </div>
</tr>
<tr>
  <!----Faculty's Department field----->
  <div class="form-group"> 
  <td>
    <label for="department_school_id" class="control-label">Department/School:</label>
  </td>
  <td>
    <input type="department_school" class="form-control" id="department_school_id" name="teaching_dept" value= "<?php echo $teaching_dept ?>" >
  </td>
  </div>
</tr>
</table>

<h3><font color="#C8102E">Courses Taught</font></h3>

<b>Late Spring/Summer Session I/II, <script>document.write(new Date().getFullYear()-1)</script></b>

<br><br>

<!----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- Start Get Record From Database ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----->
  <?php	
    class course {
      public $id;
      public $fac_id;
      public $year;
      public $session;
      public $department;
      public $course;
      public $title;
      public $enrollment;
      public $class_type;
    }

    // Set the default for the course table.
    for ($x = 0; $x < 13; $x++) {
      $course[$x]->id = 0;
      $course[$x]->fac_id = 0;
      $course[$x]->year=0;
      $course[$x]->session = 0;
      $course[$x]->department = "Select Department";
      $course[$x]->course = "Select Course";
      $course[$x]->title = "Select Title";
      $course[$x]->enrollment = 0;
      $course[$x]->class_type = "Lecture";
    }

    // Load the courses from the database. SpSum - Fall - Sprint
    // Can and should this be changed into a function called 3 times?
    $year = date("Y") - 1;
    $sql = "SELECT * FROM courses_taught WHERE fac_id='$fac_id' and year='$year' and session='SpSum'";
    if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
    $rows = $result->num_rows;
    for ($x = 0; $x < $rows; $x++) {
      $row = $result->fetch_assoc();
      $course[$x]->id = $row["id"];
      $course[$x]->department = $row["department"];
      $course[$x]->course = $row["course"];
      $course[$x]->title = $row["title"];
      $course[$x]->enrollment = $row["enrollment"];
      if ($row["class_type"] == 1) { $course[$x]->class_type = "Lab"; }
    }

    $sql = "SELECT id, department, course, title, enrollment, class_type FROM courses_taught WHERE fac_id='$fac_id' and year='$year' and session='Fall'";
    if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
    $rows = $result->num_rows;
    for ($x = 0+3; $x < $rows+3; $x++) {
      $row = $result->fetch_assoc();
      $course[$x]->id = $row["id"];
      $course[$x]->department = $row["department"];
      $course[$x]->course = $row["course"];
      $course[$x]->title = $row["title"];
      $course[$x]->enrollment = $row["enrollment"];
      if ($row["class_type"] == 1) { $course[$x]->class_type = "Lab"; }
    }

    $year++;
    $sql = "SELECT id, department, course, title, enrollment, class_type FROM courses_taught WHERE fac_id='$fac_id' and year='$year' and session='Spring'";
    if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
    $result = mysqli_query($conn, $sql);
    for ($x = 0+8; $x < $rows+8; $x++) {
      $row = $result->fetch_assoc();
      $course[$x]->id = $row["id"];
      $course[$x]->department = $row["department"];
      $course[$x]->course = $row["course"];
      $course[$x]->title = $row["title"];
      $course[$x]->enrollment = $row["enrollment"];
      if ($row["class_type"] == 1) { $course[$x]->class_type = "Lab"; }
    }
  ?>
<!----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- End Get Records From Database ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----->

<table id="summer">
  <tr>
    <th>Department</th><th>Course</th><th>Title</th><th>Enrollment</th><th>Lecture/Lab</th>
  </tr>
<!----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- Start Sp/Sum 1st Row -----  ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----->
  <!-----Department Data----->
  <?php
    $course_id_array = array($course[0]->id);
    $session_array   = array('SpSum');
    $title_array     = array($course[0]->title);
    $course_array    = array($course[0]->course);
    $years_array     = array(date("Y") - 1);
  ?>

  <tr>
    <td>
    <div class="category_div01" id="category_div01" name="course01">
    <select id="department" name="department[]" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value, 'course01');">
      <option value='<?php echo $course[0]->department; ?>' selected='selected'><?php echo $course[0]->department; ?></option>
      <option value="actg">ACTG</option>
      <option value="bus">BUS</option>
      <option value="econ">ECON</option>
      <option value="fin">FIN</option>
      <option value="mgt">MGT</option>
      <option value="mis">MIS</option>
      <option value="mkt">MKT</option>
      <option value="npm">NPM</option>
      <option value="cs">CS</option>
    </select>
    </div>
  </td>
  <!----End Department Data----->

  <!----Course Data----->
  <td> 
    <div class="courseno_div1" id="courseno_div1" name="test01">
    <script>
    // title01 makes the current title goto post.  course01 allows the course title change.
    document.write('<select name="title[]" id="course01" onchange="(this.options[this.selectedIndex].value);"><option value=""><?php echo $course[0]->course; ?></option></select>');
    </script>
    </div>
  </td>
  
  <!----Title Field----->
  <td>
  <div class="title" id="title">
    <script> document.write(""); </script>
    <label class="form_field"><span id="aggregator_name01"><span></label>
  </div>
  </td>

  <script>
    // course01 needs to match the drop down so the title will load in the title cell.
    function notEmpty1(){
      var test = "course01";
      var e = document.getElementById(test);
      var strUser = e.options[e.selectedIndex].value;
      document.getElementById('aggregator_name01').innerHTML = strUser;
    }
    notEmpty1();
    document.getElementById("course01").onchange = notEmpty1;
  </script>

  <!----End Title Field----->

  <td><input type="number" min="0" max="99" id="enrollment_01" value='<?php echo $course[0]->enrollment; ?>' name="enrollment[]"/></td>

  <?php $_SESSION['class_type01'] = $course[0]->class_type; ?>
  <td> <select id="class_type" name="class_type[]">
    <option value='<?php echo $course[0]->class_type; ?>' selected='selected'><?php echo $course[0]->class_type; ?></option>
    <option value="Lab">Lab</option>
  </td>

</tr>
<!----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- End Sp/Sum 1st Row -----  ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----->

<!----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- Start Sp/Sum 2nd Row -----  ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----->
  <!-----Department Data----->
  <?php 
    array_push($course_id_array, $course[1]->id);
    array_push($session_array, 'SpSum');
    array_push($title_array, $course[1]->title);
    array_push($course_array, $course[1]->course);
    //$year = date("Y") - 1;
    array_push($years_array, date('Y') - 1);
  ?>

<tr>
  <td>
    <div class="category_div" id="category_div">
    <select id="department" name="department[]" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value, 'summer2');">
    <option value='<?php echo $course[1]->department?>' selected='selected'><?php echo $course[1]->department; ?></option>
    <option value="actg">ACTG</option>
    <option value="bus">BUS</option>
    <option value="econ">ECON</option>
    <option value="fin">FIN</option>
    <option value="mgt">MGT</option>
    <option value="mis">MIS</option>
    <option value="mkt">MKT</option>
    <option value="npm">NPM</option>
    <option value="cs">CS</option>
    </select>
    </div>
  </td>

  <!----Course Data----->
  <td>
    <div class="courseno_div1" id="courseno_div1">
    <script>
      document.write('<select name="title[]" id="summer2" onchange="(this.options[this.selectedIndex].value);"><option value=""><?php echo $course[1]->course; ?></option></select>');
    </script>
    </div>
  </td>
  <!----End Course Data----->

<!----Title Field----->
  <td>
  <div class="title" id="title">
  <script> document.write(""); </script>

  <label class="form_field"> <span id="aggregator_name_ss2"></span> </label>
  </div>
  </td>
  <script>
    function notEmpty02(){
      var e = document.getElementById("summer2");
      var strUser = e.options[e.selectedIndex].value;
      document.getElementById('aggregator_name_ss2').innerHTML = strUser;
    }
    notEmpty02()
    document.getElementById("summer2").onchange = notEmpty02;
  </script>
<!----End Title Field----->

  <td><input type="number" min="0" max="99" id="enrollment02" value='<?php echo $course[1]->enrollment; ?>' name="enrollment[]"/></td>
  <td> <select id="class_type02" name="class_type[]">
    <option value='<?php echo $course[1]->class_type?>' selected='selected'><?php echo $course[1]->class_type?></option>
    <option value="Lab">Lab</option>
  </td>
</tr>
<!-------------------------- End Sp/Sum 2nd Row ------------------------------>

<!-------------------------- Start Sp/Sum 3rd Row ---------------------------->
  <!-----Department Data----->
  <?php 
    array_push($course_id_array, $course[2]->id);
    array_push($session_array, 'SpSum');
    array_push($title_array, $course[2]->title);
    array_push($course_array, $course[2]->course);
    array_push($years_array, date('Y') - 1);
  ?>
			
<tr>

<!----Department Data----->
  <td>
  <div class="category_div" id="category_div">
  <select id="department" name="department[]" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value, 'summer3');">
    <option value='<?php echo $course[2]->department?>' selected='selected'><?php echo $course[2]->department; ?></option>
    <option value="actg">ACTG</option>
    <option value="bus">BUS</option>
    <option value="econ">ECON</option>
    <option value="fin">FIN</option>
    <option value="mgt">MGT</option>
    <option value="mis">MIS</option>
    <option value="mkt">MKT</option>
    <option value="npm">NPM</option>
    <option value="cs">CS</option>
  </select>
  </div>
  </td>
<!----End Department Data----->

  <!----Course Data----->
  <td>
  <div class="courseno_div1" id="courseno_div1">
  <script>
  document.write('<select name="title[]" id="summer3" onchange="(this.options[this.selectedIndex].value);"><option value=""><?php echo $course[2]->course; ?></option></select>');
  </script>
  </div>
</td>

<!----Course Title Field----->
<td>
  <div class="title" id="title">
  <script> document.write(""); </script>
  <label class="form_field"> <span id="aggregator_name_ss3"></span> </label>
  </div>
</td>
<script>
  function notEmpty1(){
    var e = document.getElementById("summer3");
    var strUser = e.options[e.selectedIndex].value;
    document.getElementById('aggregator_name_ss3').innerHTML = strUser;
  }
  notEmpty1()
  document.getElementById("summer3").onchange = notEmpty1;
</script>

  <td><input type="number" min="0" max="99" id="enrollment_ss3" value='<?php echo $course[2]->enrollment; ?>' name="enrollment[]"/></td>
  <td> <select id="class_type03" name="class_type[]">
    <option value='<?php echo $course[2]->class_type?>' selected='selected'><?php echo $course[2]->class_type; ?></option>
    <option value="Lab">Lab</option>
  </td>
</tr>
<!-------------------------- End Sp/Sum 3rd Row ------------------------------>
</table>
<br>

<b>Fall, <script>document.write(new Date().getFullYear()-1)</script> </b>
<br><br>

<table id="fall">

<!-------------------------- Start Fall 1st Row ------------------------------>	
  <!-----Department Data----->
  <?php 
    array_push($course_id_array, $course[3]->id);
    array_push($session_array, 'Fall');
    array_push($title_array, $course[3]->title);
    array_push($course_array, $course[3]->course);
//    $year = date("Y") - 1;
    array_push($years_array, date("Y") - 1);
  ?>

<tr>
  <th>Department</th><th>Course</th><th>Title</th><th>Enrollment</th><th>Lecture/Lab</th>
</tr>

<!----Department Data----->
<tr>
  <td>
    <div class="category_div" id="category_div">
      <select id="department" name="department[]" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value, 'fall1');">
        <option value='<?php echo $course[3]->department?>' selected='selected'><?php echo $course[3]->department; ?></option>
	<option value="actg">ACTG</option>
	<option value="bus">BUS</option>
	<option value="econ">ECON</option>
	<option value="fin">FIN</option>
	<option value="mgt">MGT</option>
	<option value="mis">MIS</option>
	<option value="mkt">MKT</option>
	<option value="npm">NPM</option>
	<option value="cs">CS</option>
      </select>
    </div>
  </td>
<!----End Department Data----->

  <!----Course Data----->
  <td>
  <div class="courseno_div2" id="courseno_div2">
  <script>
  document.write('<select name="title[]" id="fall1" onchange="(this.options[this.selectedIndex].value);"><option value=""><?php echo $course[3]->course; ?></option></select>');
  </script>
  </div>
</td>
<!----End Course Data----->

<!----Title Field----->
<td>
  <div class="title" id="title">
  <script> document.write(""); </script>
  <label class="form_field"> <span id="aggregator_name_fa1"></span> </label>
  </div>
</td>
  <script>
    function notEmpty2(){
      var e = document.getElementById("fall1");
      var strUser = e.options[e.selectedIndex].value;
      document.getElementById('aggregator_name_fa1').innerHTML = strUser;
    }
    notEmpty2()
    document.getElementById("fall1").onchange = notEmpty2;
  </script>

  <td><input type="number" min="0" max="99" id="enrollment_fa1" value='<?php echo $course[3]->enrollment; ?>' name="enrollment[]"/></td>
  <td> <select id="class_type11" name="class_type[]">
    <option value='<?php echo $course[3]->class_type?>' selected='selected'><?php echo $course[3]->class_type; ?></option>
    <option value="Lab">Lab</option>
  </td>
</tr>
<!-------------------------- End Fall 1st Row -------------------------------->

<!-------------------------- Start Fall 2nd Row ------------------------------>			
  <!-----Department Data----->
  <?php 
    array_push($course_id_array, $course[4]->id);
    array_push($session_array, 'Fall');
    array_push($title_array, $course[4]->title);
    array_push($course_array, $course[4]->course);
//    $year = date("Y") - 1;
    array_push($years_array, date("Y") - 1);
  ?>

<tr>
  <td>
  <div class="category_div" id="category_div">
  <select id="department" name="department[]" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value, 'fall2');">
    <option value='<?php echo $course[4]->department?>' selected='selected'><?php echo $course[4]->department?></option>
    <option value="actg">ACTG</option>
    <option value="bus">BUS</option>
    <option value="econ">ECON</option>
    <option value="fin">FIN</option>
    <option value="mgt">MGT</option>
    <option value="mis">MIS</option>
    <option value="mkt">MKT</option>
    <option value="npm">NPM</option>
    <option value="cs">CS</option>
  </select>
  </div>
  </td>

  <!----Course Data----->
  <td>
    <div class="courseno_div2" id="courseno_div2">
    <script>
      document.write('<select name="title[]" id="fall2" onchange="(this.options[this.selectedIndex].value);"><option value=""><?php echo $course[4]->course?></option></select>');
    </script>
    </div>
  </td>

  <!-- Course Title Field -->
  <td>
    <div class="title05" id="title05">
      <script> document.write(""); </script>
      <label class="form_field"> <span id="aggregator_name_fa2"></span> </label>
    </div>
  </td>

  <script>
  function notEmpty2(){
    var e = document.getElementById("fall2");
    var strUser = e.options[e.selectedIndex].value;
    document.getElementById('aggregator_name_fa2').innerHTML = strUser;
  }
  notEmpty2()
  document.getElementById("fall2").onchange = notEmpty2;
  </script>

  <td><input type="number" min="0" max="99" id="enrollment_fa2" value='<?php echo $course[4]->enrollment; ?>' name="enrollment[]"/></td>
  <td> <select id="class_type12" name="class_type[]">
    <option value='<?php echo $course[4]->class_type?>' selected='selected'><?php echo $course[4]->class_type?></option>
    <option value="Lab">Lab</option>
  </td>
</tr>
<!-------------------------- End Fall 2nd Row -------------------------------->		

<!-------------------------- Start Fall 3nd Row ------------------------------>	
  <!-----Department Data----->
  <?php 
    array_push($course_id_array, $course[5]->id);
    array_push($session_array, 'Fall');
    array_push($title_array, $course[5]->title);
    array_push($course_array, $course[5]->course);
//    $year = date("Y") - 1;
    array_push($years_array, date("Y") - 1);
  ?>

<!----Department Field----->
<tr>
  <td>
  <div class="category_div" id="category_div">
  <select id="department" name="department[]" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value, 'fall3');">
    <option value='<?php echo $course[5]->department?>' selected='selected'><?php echo $course[5]->department?></option>
    <option value="actg">ACTG</option>
    <option value="bus">BUS</option>
    <option value="econ">ECON</option>
    <option value="fin">FIN</option>
    <option value="mgt">MGT</option>
    <option value="mis">MIS</option>
    <option value="mkt">MKT</option>
    <option value="npm">NPM</option>
    <option value="cs">CS</option>
  </select>
  </div>
  </td>
<!----End Department Field----->

  <!----Course Data----->
  <td>
<div class="courseno_div2" id="courseno_div2">
<script>
  document.write('<select name="title[]" id="fall3" onchange="(this.options[this.selectedIndex].value);"><option value=""><?php echo $course[5]->course; ?></option></select>');
</script>
  </div>
</td>
<!----End Course Field----->

<!----Course Title Field----->
<td>
  <div class="title" id="title">
  <script> document.write(""); </script>
  <label class="form_field"> <span id="aggregator_name_fa3"></span> </label>
  </div>
</td>

<script>
  function notEmpty2(){
    var e = document.getElementById("fall3");
    var strUser = e.options[e.selectedIndex].value;
    document.getElementById('aggregator_name_fa3').innerHTML = strUser;
  }
  notEmpty2()
  document.getElementById("fall3").onchange = notEmpty2;
</script>
<!----End Title Field---->

  <td><input type="number" min="0" max="99" id="enrollment_fa3" value='<?php echo $course[5]->enrollment; ?>' name="enrollment[]"/></td>
  <td> <select id="class_type13" name="class_type[]">
    <option value='<?php echo $course[5]->class_type?>' selected='selected'><?php echo $course[5]->class_type?></option>
    <option value="Lab">Lab</option>
  </td>
</tr>
<!-------------------------- End Fall 3rd Row -------------------------------->		

<!-------------------------- Start Fall 4th Row ------------------------------>			
  <!-----Department Data----->
  <?php 
    array_push($course_id_array, $course[6]->id);
    array_push($session_array, 'Fall');
    array_push($title_array, $course[6]->title);
    array_push($course_array, $course[6]->course);
//    $year = date("Y") - 1;
    array_push($years_array, date('Y') - 1);
  ?>

<tr>
  <td>
    <div class="category_div" id="category_div">
    <select id="department" name="department[]" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value, 'fall4');">
      <option value='<?php echo $course[6]->department?>' selected='selected'><?php echo $course[6]->department; ?></option>
      <option value="actg">ACTG</option>
      <option value="bus">BUS</option>
      <option value="econ">ECON</option>
      <option value="fin">FIN</option>
      <option value="mgt">MGT</option>
      <option value="mis">MIS</option>
      <option value="mkt">MKT</option>
      <option value="npm">NPM</option>
      <option value="cs">CS</option>
    </select>
    </div>
  </td>

  <!----Course Data----->
  <td>
    <div class="courseno_div2" id="courseno_div2">
    <script>
      document.write('<select name="title[]" id="fall4" onchange="(this.options[this.selectedIndex].value);"><option value=""><?php echo $course[6]->course; ?></option></select>');
    </script>
    </div>
  </td>

  <!-- Course Title Field -->
  <td>
    <div class="title" id="title">
    <script> document.write(""); </script>
      <label class="form_field"> <span id="aggregator_name_fa4"></span> </label>
    </div>
  </td>
  <script>
  function notEmpty2(){
    var e = document.getElementById("fall4");
    var strUser = e.options[e.selectedIndex].value;
    document.getElementById('aggregator_name_fa4').innerHTML = strUser;
  }
  notEmpty2()
  document.getElementById("fall4").onchange = notEmpty2;
  </script>

  <td><input type="number" min="0" max="99" id="enrollment_fa4" value='<?php echo $course[6]->enrollment; ?>' name="enrollment[]"/></td>
  <td> <select id="class_type14" name="class_type[]">
    <option value='<?php echo $course[6]->class_type?>' selected='selected'><?php echo $course[6]->class_type?></option>
    <option value="Lab">Lab</option>
  </td>
</tr>
<!-------------------------- End Fall 4th Row -------------------------------->		

<!-------------------------- Start Fall 5th Row ------------------------------>	
  <!-----Department Data----->
  <?php 
    array_push($course_id_array, $course[7]->id);
    array_push($session_array, 'Fall');
    array_push($title_array, $course[7]->title);
    array_push($course_array, $course[7]->course);
//    $year = date("Y") - 1;
    array_push($years_array, date('Y') - 1);
  ?>

<tr>
  <td>
    <div class="category_div" id="category_div">
    <select id="department" name="department[]" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value, 'fall5');">
      <option value='<?php echo $course[7]->department?>' selected='selected'><?php echo $course[7]->department; ?></option>
      <option value="actg">ACTG</option>
      <option value="bus">BUS</option>
      <option value="econ">ECON</option>
      <option value="fin">FIN</option>
      <option value="mgt">MGT</option>
      <option value="mis">MIS</option>
      <option value="mkt">MKT</option>
      <option value="npm">NPM</option>
      <option value="cs">CS</option>
    </select>
    </div>
  </td>

  <!----Course Data----->
  <td>
		<div class="courseno_div2" id="courseno_div2">
		<script>
		document.write('<select name="title[]" id="fall5" onchange="(this.options[this.selectedIndex].value);"><option value=""><?php echo $course[7]->course; ?></option></select>');
		</script>
		</div>
	</td>

			<!-- Course Title Field -->
	<td>
		<div class="title" id="title">
		<script> document.write(""); </script>
		<label class="form_field"> <span id="aggregator_name_fa5"></span> </label>
		</div>
	</td>

	<script>
		function notEmpty2(){
			var e = document.getElementById("fall5");
			var strUser = e.options[e.selectedIndex].value;
			document.getElementById('aggregator_name_fa5').innerHTML = strUser;
		}
		notEmpty2()
		document.getElementById("fall5").onchange = notEmpty2;
	</script>
  <td><input type="number" min="0" max="99" id="enrollment_fa5" value='<?php echo $course[7]->enrollment; ?>' name="enrollment[]"/></td>
  <td> <select id="class_type15" name="class_type[]">
    <option value='<?php echo $course[7]->class_type?>' selected='selected'><?php echo $course[7]->class_type?></option>
    <option value="Lab">Lab</option>
  </td>
</tr>
<!-------------------------- End Fall 5th Row -------------------------------->		

<!-- <input type="button" value="Add Row" onclick="addRow('fall')" />
<input type="button" value="Delete Row" onclick="deleteRow('fall')" /> -->
</table>

<br>

<b>Spring, <script>document.write(new Date().getFullYear())</script></b>

<br><br>

<table id="spring">

<!-------------------------- Start Spring 1st Row ---------------------------->
  <!-----Department Data----->
  <?php 
    array_push($course_id_array, $course[8]->id);
    array_push($session_array, 'Spring');
    array_push($title_array, $course[8]->title);
    array_push($course_array, $course[8]->course);
//    $year = date('Y');
    array_push($years_array, date('Y'));
  ?>

<tr>
  <th>Department</th><th>Course</th><th>Title</th><th>Enrollment</th><th>Lecture/Lab</th>
</tr>
<tr>
  <td>
    <div class="category_div" id="category_div">
    <select id="department" name="department[]" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value, 'spring1' );">
      <option value='<?php echo $course[8]->department?>' selected='selected'><?php echo $course[8]->department; ?></option>
      <option value="actg">ACTG</option>
      <option value="bus">BUS</option>
      <option value="econ">ECON</option>
      <option value="fin">FIN</option>
      <option value="mgt">MGT</option>
      <option value="mis">MIS</option>
      <option value="mkt">MKT</option>
      <option value="npm">NPM</option>
      <option value="cs">CS</option>
    </select>
    </div>
  </td>

  <!----Course Data----->
  <td>
    <div class="courseno_div" id="courseno_div">
    <script>
      document.write('<select name="title[]" id="spring1" onchange="javascript: dynamicdropdownone(this.options[this.selectedIndex].value);"><option value=""><?php echo $course[8]->course; ?></option></select>');
    </script>
    </div>
  </td>

<!-- Class Title Field -->
  <td>
    <div class="title" id="title">
    <script> document.write(""); </script>
      <label class="form_field"> <span id="aggregator_name_sp1"></span> </label>
    </div>
  </td>

  <script>
  function notEmpty3(){
    var e = document.getElementById("spring1");
    var strUser = e.options[e.selectedIndex].value;
    document.getElementById('aggregator_name_sp1').innerHTML = strUser;
  }
  notEmpty3()
  document.getElementById("spring1").onchange = notEmpty3;
  </script>

  <td><input type="number" min="0" max="99" id="enrollment_sp1" value='<?php echo $course[8]->enrollment; ?>' name="enrollment[]"/></td>
  <td> <select id="class_type21" name="class_type[]">
    <option value='<?php echo $course[8]->class_type?>' selected='selected'><?php echo $course[8]->class_type?></option>
    <option value="Lab">Lab</option>
  </td>
</tr>
<!-------------------------- End Spring 1st Row ------------------------------>

<!-------------------------- Start Spring 2nd Row ---------------------------->
  <!-----Department Data----->
  <?php 
    array_push($course_id_array, $course[9]->id);
    array_push($session_array, 'Spring');
    array_push($title_array, $course[9]->title);
    array_push($course_array, $course[9]->course);
//    $year = date("Y");
    array_push($years_array, date('Y'));
  ?>

<tr>
  <td>
    <div class="category_div" id="category_div">
    <select id="department" name="department[]" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value, 'spring2' );">
      <option value='<?php echo $course[9]->department?>' selected='selected'><?php echo $course[9]->department?></option>
      <option value="actg">ACTG</option>
      <option value="bus">BUS</option>
      <option value="econ">ECON</option>
      <option value="fin">FIN</option>
      <option value="mgt">MGT</option>
      <option value="mis">MIS</option>
      <option value="mkt">MKT</option>
      <option value="npm">NPM</option>
      <option value="cs">CS</option>
    </select>
    </div>
  </td>

  <!----Course Data----->
  <td>
    <div class="courseno_div" id="courseno_div">
    <script>
      document.write('<select name="title[]" id="spring2" onchange="javascript: dynamicdropdownone(this.options[this.selectedIndex].value);"><option value=""><?php echo $course[9]->course; ?></option></select>');
    </script>
    </div>
  </td>

<!-- Class Title Field -->
  <td>
    <div class="title" id="title">
    <script> document.write(""); </script>
      <label class="form_field"> <span id="aggregator_name_sp2"></span> </label>
    </div>
  </td>

  <script>
  function notEmpty4(){
    var e = document.getElementById("spring2");
    var strUser = e.options[e.selectedIndex].value;
    document.getElementById("aggregator_name_sp2").innerHTML = strUser;
  }
  notEmpty4();
  document.getElementById("spring2").onchange = notEmpty4;
  </script>

  <td><input type="number" min="0" max="99" id="enrollment_sp2" value='<?php echo $course[9]->enrollment; ?>' name="enrollment[]"/></td>
  <td> <select id="class_type22" name="class_type[]">
    <option value='<?php echo $course[9]->class_type?>' selected='selected'><?php echo $course[9]->class_type?></option>
    <option value="Lab">Lab</option>
  </td>
</tr>
<!-------------------------- End Spring 2nd Row ------------------------------>

<!-------------------------- Start Spring 3rd Row ---------------------------->
  <!-----Department Data----->
  <?php 
    array_push($course_id_array, $course[10]->id);
    array_push($session_array, 'Spring');
    array_push($title_array, $course[10]->title);
    array_push($course_array, $course[10]->course);
//    $year = date("Y");
    array_push($years_array, date('Y'));
  ?>

<tr>
  <td>
    <div class="category_div" id="category_div">
    <select id="department" name="department[]" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value, 'spring3');">
      <option value='<?php echo $course[10]->department?>' selected='selected'><?php echo $course[10]->department?></option>
      <option value="actg">ACTG</option>
      <option value="bus">BUS</option>
      <option value="econ">ECON</option>
      <option value="fin">FIN</option>
      <option value="mgt">MGT</option>
      <option value="mis">MIS</option>
      <option value="mkt">MKT</option>
      <option value="npm">NPM</option>
      <option value="cs">CS</option>
    </select>
    </div>
  </td>

  <!----Course Data----->
  <?php $_SESSION['title11'] = $course[10]->title; ?>
  <td>
    <?php $_SESSION['course11'] = $course[10]->course; ?>
    <div class="courseno_div" id="courseno_div">
    <script>
      document.write('<select name="title[]" id="spring3" onchange="javascript: dynamicdropdownone(this.options[this.selectedIndex].value);"><option value=""><?php echo $course[10]->course?></option></select>');
    </script>
    </div>
  </td>

  <!-- Class Title Field -->
  <td>
    <div class="title" id="title">
      <script> document.write(""); </script>
      <label class="form_field"> <span id="aggregator_name_sp3"></span> </label>
    </div>
  </td>

  <script>
  function notEmpty4(){
    var e = document.getElementById("spring3");
    var strUser = e.options[e.selectedIndex].value;
    document.getElementById("aggregator_name_sp3").innerHTML = strUser;
  }
  notEmpty4();
  document.getElementById("spring3").onchange = notEmpty4;
  </script>

  <td><input type="number" min="0" max="99" id="enrollment_sp3" value='<?php echo $course[10]->enrollment; ?>' name="enrollment[]"/></td>
  <td> <select id="class_type23" name="class_type[]">
    <option value='<?php echo $course[10]->class_type?>' selected='selected'><?php echo $course[10]->class_type?></option>
    <option value="Lab">Lab</option>
  </td>
</tr>
<!-------------------------------------End Sprint 3rd Row -------------------->

<!---------------------------Spring 4th Row ---------------------------------->
  <!-----Department Data----->
  <?php 
    array_push($course_id_array, $course[11]->id);
    array_push($session_array, 'Spring');
    array_push($title_array, $course[11]->title);
    array_push($course_array, $course[11]->course);
//    $year = date("Y");
    array_push($years_array, date('Y'));
  ?>

<tr>
	<td>
		<div class="category_div" id="category_div">
		<select id="department" name="department[]" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value, 'spring4');">
			<option value='<?php echo $course[11]->department?>' selected='selected'><?php echo $course[11]->department?></option>
			<option value="actg">ACTG</option>
			<option value="bus">BUS</option>
			<option value="econ">ECON</option>
			<option value="fin">FIN</option>
			<option value="mgt">MGT</option>
			<option value="mis">MIS</option>
			<option value="mkt">MKT</option>
			<option value="npm">NPM</option>
			<option value="cs">CS</option>
		</select>
		</div>
	</td>

  <!----Course Data----->
  <td>
    <div class="courseno_div" id="courseno_div">
    <script>
      document.write('<select name="title[]" id="spring4" onchange="javascript: dynamicdropdownone(this.options[this.selectedIndex].value);"><option value=""><?php echo $course[11]->course; ?></option></select>');
    </script>
    </div>
  </td>

  <!-- Class Title Field -->
  <td>
    <div class="title" id="title">
      <script> document.write(""); </script>
      <label class="form_field"> <span id="aggregator_name_sp4"></span> </label>
    </div>
  </td>

  <script>
  function notEmpty4(){
    var e = document.getElementById("spring4");
    var strUser = e.options[e.selectedIndex].value;
    document.getElementById("aggregator_name_sp4").innerHTML = strUser;
  }
  notEmpty4();
  document.getElementById("spring4").onchange = notEmpty4;
  </script>

  <td><input type="number" min="0" max="99" id="enrollment_sp4" value='<?php echo $course[11]->enrollment; ?>' name="enrollment[]"/></td>
  <td> <select id="class_type24" name="class_type[]">
    <option value='<?php echo $course[11]->class_type?>' selected='selected'><?php echo $course[11]->class_type?></option>
    <option value="Lab">Lab</option>
  </td>
</tr>
<!------------------------------------ End Spring 4th Row -------------------->

<!------------------------------------ Spring 5th Row ------------------------>
  <!-----Department Data----->
  <?php 
    array_push($course_id_array, $course[12]->id);
    array_push($session_array, 'Spring');
    array_push($title_array, $course[12]->title);
    array_push($course_array, $course[12]->course);
//    $year = date("Y");
    array_push($years_array, date('Y'));
  ?>

<tr>
  <td>
    <div class="category_div" id="category_div">
    <select id="department" name="department[]" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value, 'spring5');">
    <option value='<?php echo $course[12]->department?>' selected='selected'><?php echo $course[12]->department; ?></option>
      <option value="actg">ACTG</option>
      <option value="bus">BUS</option>
      <option value="econ">ECON</option>
      <option value="fin">FIN</option>
      <option value="mgt">MGT</option>
      <option value="mis">MIS</option>
      <option value="mkt">MKT</option>
      <option value="npm">NPM</option>
      <option value="cs">CS</option>
    </select>
    </div>
  </td>

  <!----Course Data----->
  <td>
    <div class="courseno_div" id="courseno_div">
    <script>
      document.write('<select name="title[]" id="spring5" onchange="javascript: dynamicdropdownone(this.options[this.selectedIndex].value);"><option value=""><?php echo $course[12]->course; ?></option></select>');
    </script>
    </div>
  </td>

  <!-- Class Title Field -->
  <td>
    <div class="title" id="title">
    <script> document.write(""); </script>
    <label class="form_field"> <span id="aggregator_name_sp5"></span> </label>
    </div>
  </td>

  <script>
    function notEmpty4(){
      var e = document.getElementById("spring5");
      var strUser = e.options[e.selectedIndex].value;
      document.getElementById("aggregator_name_sp5").innerHTML = strUser;
    }
    notEmpty4();
    document.getElementById("spring5").onchange = notEmpty4;
  </script>

  <td><input type="number" min="0" max="99" id="enrollment_sp5" value='<?php echo $course[12]->enrollment; ?>' name="enrollment[]"/></td>
  <td> <select id="class_type25" name="class_type[]">
    <option value='<?php echo $course[12]->class_type?>' selected='selected'><?php echo $course[12]->class_type?></option>
    <option value="Lab">Lab</option>
  </td>
</tr>
<!------------------------------------ End Spring 5th Row -------------------->
</table>
<br>
<?php 
  $_SESSION['course_id'] = $course_id_array;
  $_SESSION['session']   = $session_array;
  $_SESSION['title']     = $title_array;
  $_SESSION['course']    = $course_array;
  $_SESSION['years']     = $years_array;
?>

<!--  <div data-role="collapsible" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u"> -->

<!--------------------------------------------------------------------------- Begin Contributions ----------------------------------------------------------------------------->
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

<!-- ------------------------------------------------------------------------ Contributions Table -------------------------------------------------------------------------- -->
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
  $('#myTable').append("<tr><td><input type='text' id='date'      Placeholder='Date'      name='date[]'></td>"  +
                           "<td><input type='text' id='type'      Placeholder='Type'      name='type[]'></td>"      +
                           "<td><input type='text' id='category'  Placeholder='Category'  name='category[]'></td>"  +
                           "<td><input type='text' id='specifics' Placeholder='Specifics' name='specifics[]'></td>" +
                           "<td><input type='text' id='text'      Placeholder='Text'      name='text[]'></td>"      +
                           "<td><?php echo 'Testing' ?></td><td><?php echo 'Testing' ?></td><td><input type='button' value='Delete' /></td></tr>")

});
</script>
<!-- ---------------------------------------------------------------------- End Contributions Table ------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------- End Contributions --------------------------------------------------------------------------- -->

<!-- -------------------------------------------------------------------------- Bottom Buttons ----------------------------------------------------------------------------- -->
  <center>
    <input type="submit" value="Submit">
    <button id="printButton" onclick="window.print()">Print</button>
  </center>
  <center>
    <a href="../index.php" class=btn button id='back'>Back</a>
    <id="logout"><a href="../ardFiles/logout.php">Logout</a>
    <a href="ardPrint.php" class=btn button id='print'>Print</a>
  </center>
<!-- ----------------------------------------------------------------------- Start Bottom Buttons -------------------------------------------------------------------------- -->

<br>
<sup>Please remember you are not expected to list everything you have done during an academic year, list only those things you feel are important to your teaching, scholarship and service to the community.</sup></small>


<!-- ------------------------------------------------------------------------ Load Default Titles -------------------------------------------------------------------------- -->
  <body onload="loadTitles()">
  <script>
    function defaultTitle(aggregator, strUser) {
      document.getElementById(aggregator).innerHTML = strUser;
    }

    function loadTitles() {
      //SpSum
      defaultTitle('aggregator_name01'  , "<?php echo $course[0]->title; ?>");
      defaultTitle('aggregator_name_ss2', "<?php echo $course[1]->title; ?>");
      defaultTitle('aggregator_name_ss3', "<?php echo $course[2]->title; ?>");
      //Fall
      defaultTitle('aggregator_name_fa1', "<?php echo $course[3]->title; ?>");
      defaultTitle('aggregator_name_fa2', "<?php echo $course[4]->title; ?>");
      defaultTitle('aggregator_name_fa3', "<?php echo $course[5]->title; ?>");
      defaultTitle('aggregator_name_fa4', "<?php echo $course[6]->title; ?>");
      defaultTitle('aggregator_name_fa5', "<?php echo $course[7]->title; ?>");
      //Spring
      defaultTitle('aggregator_name_sp1', "<?php echo $course[8]->title; ?>");
      defaultTitle('aggregator_name_sp2', "<?php echo $course[9]->title; ?>");
      defaultTitle('aggregator_name_sp3', "<?php echo $course[10]->title; ?>");
      defaultTitle('aggregator_name_sp4', "<?php echo $course[11]->title; ?>");
      defaultTitle('aggregator_name_sp5', "<?php echo $course[12]->title; ?>");
    }
  </script>
<!-- -------------------------------------------------------------------------------- End LDT ------------------------------------------------------------------------------ -->

</form>
</body>
</html>
