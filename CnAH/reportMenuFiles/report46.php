<!DOCTYPE html>

    TABLE 15-2 DEPLOYMENT OF PARTICIPATING AND SUPPORTING FACULTY BY QUALICATION STATUS IN SUPPORT OF DEGREE PROGRAMS FOR THE MOST RECENTLY COMPLETED NORMAL ACADEMIC YEAR

<?php
  require '../connect.php';

  $degree = "Bachelor";
  $degree = mysqli_real_escape_string($conn, $degree);
  $sql = "SELECT * FROM faculty WHERE degree='$degree' AND status = 'Scholarly Academic';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $bsa = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='$degree' AND status = 'Practice Academic';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $bpa = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='$degree' AND status = 'Scholarly Practioner';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $bsp = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='$degree' AND status = 'Instructional Practitioner';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $bip = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='$degree' AND status = 'Other';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $bo = $result->num_rows;
  $btotal = $bsa + $bpa + bsp + bip + bo;

  $sql = "SELECT * FROM faculty WHERE degree='MBA' AND status='Scholarly Academic';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $msa = mysqli_num_rows($result);

  $sql = "SELECT * FROM faculty WHERE degree='MBA' AND status='Practice Academic';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $mpa = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='MBA' AND status='Scholarly Practioner';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $msp = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='MBA' AND status='Instructional Practitioner';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $mip = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='MBA' AND status='Other';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $mo = $result->num_rows;
  $mtotal = $msa + $mpa + $msp + $mip + $mo;

  $degree = "Specialized Master";
  $sql = "SELECT * FROM faculty WHERE degree='$degree' AND status='Scholarly Academic';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $smsa = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='$degree' AND status='Practice Academic';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $smpa = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='$degree' AND status='Scholarly Practitioner';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $smsp = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='$degree' AND status='Instructional Practitioner';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $smip = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='$degree' AND status='Other';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $smo = $result->num_rows;
  $smtotal = $smsa + $smpa + $smsp + $smip + $smo;

  $sql = "SELECT * FROM faculty WHERE degree='Doctoral Program' AND status='Scholarly Academic';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $dpsa = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='Doctoral Program' AND status='Practice Academic';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $dppa = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='Doctoral Program' AND status='Scholarly Practitioner';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $dpsp = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='Doctoral Program' AND status='Instructional Practitioner';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $dpip = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='Doctoral Program' AND status='Other';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $dpo = $result->num_rows;
  $dtotal = $dpsa + $dppa + $dpsp + $dpip + $dpo;

  $sql = "SELECT * FROM faculty WHERE degree='Other' AND status='Scholarly Academic';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $osa = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='Other' AND status='Practice Academic';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $opa = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='Other' AND status='Scholarly Practitioner';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $osp = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='Other' AND status='Instructional Practitioner';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $oip = $result->num_rows;

  $sql = "SELECT * FROM faculty WHERE degree='Other' AND status='Other';";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $oo = $result->num_rows;
  $ototal = $osa + $opa + $osp + $oip + $oo;
?>

<br><br>
    Percent of teaching (whether measured by credit hours, contact hours,
    or another metric appropriate to the school

<table border = 1>
  <tr>
    <td>
    </td>
    <td align="center">
      Scholarly Academic (SA)
    </td>
    <td align="center">
      Practice Academic (PA)
    </td align="center">
    <td>
      Scholarly Practitioner (SP)
    </td>
    <td align="center">
      Instructional Practitioner (IP)
    </td>
    <td align="center">
      Other
    </td>
    <td align="center">
      Total
    </td>
  </tr>

  </tr>
    <td>
      Bachelor's
    </td>
    <td align="center">
      <?php echo $bsa ?>
    </td>
    <td align="center">
      <?php echo $bpa ?>
    </td>
    <td align="center">
      <?php echo $bsp ?>
    </td>
    <td align="center">
      <?php echo $bip ?>
    </td>
    <td align="center">
      <?php echo $bo ?>
    </td>
    <td align="center">
      <?php echo $btotal ?>
    </td>
  </tr>

  <tr>
    <td>
      MBA
    </td>
    <td align="center">
      <?php echo $msa ?>
    </td>
    <td align="center">
      <?php echo $mpa ?>
    </td>
    <td align="center">
      <?php echo $msp ?>
    </td>
    <td align="center">
      <?php echo $mip ?>
    </td>
    <td align="center">
      <?php echo $mo ?>
    </td>
    <td align="center">
      <?php echo $mtotal ?>
    </td>
  </tr>

  <tr>
    <td>
      Specialized Master's
    </td>
    <td align="center">
      <?php echo $smsa ?>
    </td>
    <td align="center">
      <?php echo $smpa ?>
    </td>
    <td align="center">
      <?php echo $smsp ?>
    </td>
    <td align="center">
      <?php echo $smip ?>
    </td>
    <td align="center">
      <?php echo $smo ?>
    </td>
    <td align="center">
      <?php echo $smtotal ?>
    </td>
  </tr>

  <tr>
    <td>
      Doctoral Program
    </td>
    <td align="center">
      <?php echo $dpsa ?>
    </td>
    <td align="center">
      <?php echo $dppa ?>
    </td>
    <td align="center">
      <?php echo $dpsp ?>
    </td>
    <td align="center">
      <?php echo $dpip ?>
    </td>
    <td align="center">
      <?php echo $dpo ?>
    </td>
    <td align="center">
      <?php echo $dtotal ?>
    </td>

  <tr>
    <td>
      Other (Specify)
    </td>
    <td align="center">
      <?php echo $osa ?>
    </td>
    <td align="center">
      <?php echo $opa ?>
    </td>
    <td align="center">
      <?php echo $osp ?>
    </td>
    <td align="center">
      <?php echo $oip ?>
    </td>
    <td align="center">
      <?php echo $oo ?>
    </td>
    <td align="center">
      <?php echo $ototal ?>
    </td>
  </tr>
</table>

