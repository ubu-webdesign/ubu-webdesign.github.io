<html>
<head>
  <title>CnAH - Review Open Contributions</title>

  <meta name="viewport" content="width=device-width, initial-scale=2">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=2">
  <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" type="text/css" href="../ardFiles/buttonHide.css">
  <link rel="stylesheet" type="text/css" href="../ardFiles/ardstyle.css">
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
  <!-- <style>
	table, th, td {
		border: 1px solid black;
		border-collapsecollapse;
		width:50%
	}
		
	th, td {
		padding: 5px;
		text-align: left;    
	}
	
  </style> -->

</head>

<body>
  <center><image src="../Images/School of Business.png"></image></center>
<?php
  require "../connect.php";
 
  class RowReview {
    public $fac_id;
    public $year;
    public $type;
    public $category;
    public $specifics;
    public $text;
    public $reviewed;
    public $reviewed_notes;
  }
  
  $sql = "SELECT * FROM contributions WHERE reviewed IS NULL";
  if (!($result = mysqli_query($conn, $sql))) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
  $num_rows = $result->num_rows;

  for ($x = 0; $x < $num_rows; $x++) {
    $row = $result->fetch_assoc();
    $myRow[$x] = new RowReview();
    $myRow[$x]->fac_id = $row["fac_id"];
    $myRow[$x]->year = $row["year"];
    $myRow[$x]->type = $row["type"];
    $myRow[$x]->category = $row["category"];
    $myRow[$x]->specifics = $row["specifics"];
    $myRow[$x]->text = $row["text"];
    $myRow[$x]->reviewed = $row["reviewed"];
    $myRow[$x]->reviewed_notes = $row["reviewed_notes"];
  }
?>

  <table>
    <tr>
      <th>fac_id</th>
      <th>year</th>
      <th>type</th>
      <th>category</th>
      <th>specifics</th>
      <th>text</th>
      <th>reviewed</th>
      <th>reviewed_notes</th>
    </tr>

    <?php
      for ($x = 0; $x < $num_rows; $x++) {
    ?>
      <tr>
        <td><?php echo $myRow[$x]->fac_id; ?></td>
        <td><?php echo $myRow[$x]->year; ?></td>
        <td><?php echo $myRow[$x]->type; ?></td>
        <td><?php echo $myRow[$x]->category; ?></td>
        <td><?php echo $myRow[$x]->specifics; ?></td>
        <td><?php echo $myRow[$x]->text; ?></td>
        <td><?php echo $myRow[$x]->reviewed; ?></td>
        <td><?php echo $myRow[$x]->reviewed_notes; ?></td>
      </tr>
    <?php
      }
    ?>

  </table>

  <center>
    <a href="../index.php" class=btn button id='back'>Back</a>
    <id="logout"><a href="../ardFiles/logout.php">Logout</a>
  </center>


</body>
</html>

