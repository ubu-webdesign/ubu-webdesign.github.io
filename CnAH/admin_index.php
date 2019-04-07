<!DOCTYPE html>
<?php
  session_start();
  
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

?>

<head>
  <title>CnAH Administrator Main Menu</title>
  <link rel="stylesheet" type="text/css" href="style.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125252650-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125252650-1');
</script>

</head>

<body>
  <center><image src="Images/School of Business.png"></image></center>
  <div class="header" title ="Certification aNd Accreditation Helper">
    <h2>CnAH - Administrator Main Menu</h2>
  </div>
  
  <form method="post" action="index.php">
    <p>
      <a href="./ardFiles/ARD.php">Annual Review Document</a>
    </p>
    <p>
      <a href="./fsdFiles/FSD.php">Faculty Sufficiency Document</a>
    </p>
    <p>
      <a href="./cvFiles/Resume.php">Curriculum Vitae</a>
    </p>
    <p>
      <a href="./reportMenuFiles/reportMenu.php">Generate Reports</a>
    </p>
    <p>
      <a href="./reviewContributionFiles/reviewContributionMenu.php">Review Open Contributions</a>
    </p>
    <p>
      <a href="./editAccess/editAccessPage.php">Edit Faculty Access</a>
    </p>
    <div class="input-group">
      <a href="logout.php" class="btn btn-default">Logout</a>
    </div>
  </form>
</body>
</html>
