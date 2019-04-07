TABLE 15-2 DEPLOYMENT OF PARTICIPATING AND SUPPORTING FACULTY BY QUALICATION STATUS IN SUPPORT OF DEGREE PROGRAMS FOR THE MOST RECENTLY COMPLETED NORMAL ACADEMIC YEAR <br>

<?php
  require '../connect.php';
  $sql = "SELECT * FROM faculty WHERE teaching_dept = 'Accounting';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $acc = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE teaching_dept = 'Business Admin';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $bus = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE teaching_dept = 'Computer Science';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $cs = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE teaching_dept = 'Economics';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $eco = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE teaching_dept = 'Finance';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $fin = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE teaching_dept = 'Management';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $mgt = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE teaching_dept = 'Management Information Systems';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $mis = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE teaching_dept = 'Marketing';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $mkt = $result->num_rows;

  $total = $acc + $bus + $cs + $eco + $fin + $mgt + $mis + $mkt;
?>

<br><br>
    Percent of teaching (whether measured by credit hours, contact hours,
    or another metric appropriate to the school

<table border = 1>
  <tr>
    <td>
    </td>
    <td align="center">
      Accounting
    </td>
    <td align="center">
      Business Admin
    </td align="center">
    <td>
      Computer Science
    </td>
    <td align="center">
      Economics
    </td>
    <td align="center">
      Finance
    </td>
    <td align="center">
      Management
    </td>
    <td align="center">
      Management Information Systems
    </td>
    <td align="center">
      Marketing
    </td>
    <td align="center">
      Total
    </td>
  </tr>

</tr>
    <td>
      Faculty
    </td>
    <td align="center">
      <?php echo $acc ?>
    </td>
    <td align="center">
      <?php echo $bus ?>
    </td>
    <td align="center">
      <?php echo $cs ?>
    </td>
    <td align="center">
      <?php echo $eco ?>
    </td>
    <td align="center">
      <?php echo $fin ?>
    </td>
    <td align="center">
      <?php echo $mgt ?>
    </td>
    <td align="center">
      <?php echo $mis ?>
    </td>
    <td align="center">
      <?php echo $mkt ?>
    </td>
    <td align="center">
      <?php echo $total ?>
    </td>
  </tr>
</table>
