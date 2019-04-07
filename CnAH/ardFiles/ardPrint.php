<!DOCTYPE html>

<html lang=en>
  <?php include('../loginCheck.php');
        require "../connect.php";
        session_start();
  ?>

  <link rel="stylesheet" type="text/css" href="ardstyle.css">

<br>ANNUAL REPORT OF FACULTY MEMBER AT FRANCIS MARION UNIVERSITY
<br>2009-2010 Academic Year
<br>
<br>Note: Submit your Annual Report to your School or Department Chair for subsequent submission to
<br>your Dean. Use addition pages as needed.
<br>
<br>
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
  </table>

<br>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
  <?php
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM faculty WHERE username='$username'";
    if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
    $row = $result->fetch_assoc();
    if ($row["firstname"] != "") {
      $_SESSION['fac_id'] = $row["id"];
      $fac_id = $row["id"];
      $first_name = $row["firstname"];
      $middle_name = $row["middlename"];
      $last_name = $row["lastname"];
      $teaching_dept = $row["teaching_dept"];
      $fac_title = $row["title"];
    } //else {     NTM: SHOULD THIS BE REMOVED OR REPLACED WITH AN ERROR?
      //$firstname = "First Name";
      //$middlename = "Middle Name";
      //$lastname = "Last Name";
      //$teaching_dept = "Department";
      //$fac_title = "Title";			
      //}
    $full_name = $first_name . ' ' . $middle_name . ' ' . $last_name;
  ?>

<table>
<tr>
  <td>Name</label></td>
  <td><?php echo $full_name; ?></td>
</tr>
<tr>
  <td> Title</td>
  <td><?php echo $fac_title; ?></td>
</tr>
<tr>
  <td>Department/School</td>
  <td><?php echo $teaching_dept; ?></td>
</tr>
</table>

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<br>
<br>I. Courses Taught
<br>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<?php $year = date('Y') - 1; ?>
<br>Late Spring/Summer Session I/II <?php echo $year; ?>
<br>
<?php
  class CoursesTaught {
    public $course_id; //Needed?
    public $year;
    public $session;
    public $department;
    public $course;
    public $title;
    public $enrollment;
    public $class_type;
  }
  
  $fac_id = $_SESSION['fac_id'];
  $sql = "SELECT * 
          FROM courses_taught 
          WHERE fac_id  = '$fac_id' 
            AND session = 'SpSum'
            AND year    = '$year';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $num_rows = $result->num_rows;

  for ($x = 0; $x < $num_rows; $x++) {
    $rows = $result->fetch_assoc();
    $row[$x]               = new CoursesTaught();
//    $row[$x]->course_id  = $rows["course_id"];
    $row[$x]->year       = $rows["year"];
    $row[$x]->session    = $rows["session"];
    $row[$x]->department = $rows["department"];
    $row[$x]->course     = $rows["course"];
    $row[$x]->title      = $rows["title"];
    $row[$x]->enrollment = $rows["enrollment"];
    $row[$x]->class_type = $rows["class_type"];
  }
?>

  <table>
    <tr>
      <th>Department</th>
      <th>Course</th>
      <th>Title</th>
      <th>Entrollment</th>
      <th>Lab</th>
      <th>Lecture</th>
    </tr>

    <?php
      for ($x = 0; $x < $num_rows; $x++) {
    ?>
      <tr>
        <td><?php echo $row[$x]->department; ?></td>
        <td><?php echo $row[$x]->course; ?></td>
        <td><?php echo $row[$x]->title; ?></td>
        <td><?php echo $row[$x]->enrollment; ?></td>

        <?php if ($row[$x]->class_type == '1') {
          echo '<td></td>';
          echo '<td>X</td>';
        } else { echo '<td>X</td>';
                 echo '<td></td>';
        } ?>

      </tr>
    <?php } ?>

  </table>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- --><br>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<?php $year = date('Y') - 1; ?>
<br>Fall, <?php echo $year; ?>
<br>
<?php
  $sql = "SELECT * 
          FROM courses_taught 
          WHERE fac_id  = '$fac_id' 
            AND session = 'Fall'
            AND year    = '$year';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $num_rows = $result->num_rows;

  for ($x = 0; $x < $num_rows; $x++) {
    $rows = $result->fetch_assoc();
    $row[$x]               = new CoursesTaught();
//    $row[$x]->course_id  = $rows["course_id"];
    $row[$x]->year       = $rows["year"];
    $row[$x]->session    = $rows["session"];
    $row[$x]->department = $rows["department"];
    $row[$x]->course     = $rows["course"];
    $row[$x]->title      = $rows["title"];
    $row[$x]->enrollment = $rows["enrollment"];
    $row[$x]->class_type = $rows["class_type"];
  }
?>

  <table>
    <tr>
      <th>Department</th>
      <th>Course</th>
      <th>Title</th>
      <th>Entrollment</th>
      <th>Lab</th>
      <th>Lecture</th>
    </tr>

    <?php
      for ($x = 0; $x < $num_rows; $x++) {
    ?>
      <tr>
        <td><?php echo $row[$x]->department; ?></td>
        <td><?php echo $row[$x]->course; ?></td>
        <td><?php echo $row[$x]->title; ?></td>
        <td><?php echo $row[$x]->enrollment; ?></td>

        <?php if ($row[$x]->class_type == '1') {
          echo '<td></td>';
          echo '<td>X</td>';
        } else { echo '<td>X</td>';
                 echo '<td></td>';
        } ?>

      </tr>
    <?php } ?>

  </table>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<br>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<?php $year = date('Y'); ?>
<br>Spring, <?php echo $year ?>
<br>
<?php
  $sql = "SELECT * 
          FROM courses_taught 
          WHERE fac_id  = '$fac_id' 
            AND session = 'Spring'
            and year    = '$year';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $num_rows = $result->num_rows;

  for ($x = 0; $x < $num_rows; $x++) {
    $rows = $result->fetch_assoc();
    $row[$x]               = new CoursesTaught();
//    $row[$x]->course_id  = $rows["course_id"];
    $row[$x]->year       = $rows["year"];
    $row[$x]->session    = $rows["session"];
    $row[$x]->department = $rows["department"];
    $row[$x]->course     = $rows["course"];
    $row[$x]->title      = $rows["title"];
    $row[$x]->enrollment = $rows["enrollment"];
    $row[$x]->class_type = $rows["class_type"];
  }
?>

  <table>
    <tr>
      <th>Department</th>
      <th>Course</th>
      <th>Title</th>
      <th>Entrollment</th>
      <th>Lab</th>
      <th>Lecture</th>
    </tr>

    <?php
      for ($x = 0; $x < $num_rows; $x++) {
    ?>
      <tr>
        <td><?php echo $row[$x]->department; ?></td>
        <td><?php echo $row[$x]->course; ?></td>
        <td><?php echo $row[$x]->title; ?></td>
        <td><?php echo $row[$x]->enrollment; ?></td>

        <?php if ($row[$x]->class_type == '1') {
          echo '<td></td>';
          echo '<td>X</td>';
        } else { echo '<td>X</td>';
                 echo '<td></td>';
        } ?>

      </tr>
    <?php } ?>

  </table>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- --><br>
<br>II. Teaching Development
<br>
<br>	A. Course Development
<br>	B. Program Development
<br>	C. Class Support by Internet
<br>	D. Class Support by Multi-media
<br>	E. Student Resources
<br>	F. Course Revision
<br>	G. Professional Development
<br>	H. Other
<br>
<br>III. Scholarly Activities
<br>
<br>	A. Articles and/or Books Published or Accepted for Publication
<br>	B. Papers/Scholarly Addresses at Profession Meetings
<br>	C. Recitals or Art Shows
<br>	D. Scholarly Work Completed (Source, if published)
<br>	E. Scholarly Work in Progress
<br>	F. Other Writing in Progress
<br>	G. Membership in Scholarly Societies
<br>	H. Participation in Scholarly Societies
<br>	I. Honors Received
<br>	J. Other
<br>
<br>IV. Professional Service
<br>
<br>	A. Involvement in Student Activies
<br>	B. Participation in Shared Governance
<br>		1. Departmental or Institutional Committees
<br>		2. Administractive Duties
<br>		3. Workgroup and Ad hoc Committees
<br>		4. Departmental or Institutional Duties
<br>	C. Membership in Professional Organizations
<br>	D. Participation in Professional Organizations
<br>	E. Discipline Related Service to the Community
<br>	F. Consulting
<br>	G. Honros Received
<br>	H. Other
<br>
<br>V. Professional Advancement
<br>
<br>	A. Course Title, Credit, College/University/Organization, Date
<br>	   (Provide transcript or documentation of all course work for professional advancement
<br>	   consideration.)
<br>	B. Seminar(s) or Institute(s)
<br>	C. Other
<br>
<br>Please denote all scholarly work in which undergraduate or graduate students were active participants.
<br>
<br>Possible Examples for Use in Annual Report
<br>
<br>Please remember you are not expected to list everything you have done during an academic year, list only those things you feel
<br>are important to your teaching, scholarship and service to the community.
