<!DOCTYPE html>
<html>
<head>
<title>Upload Resume</title>
</head>
<body>

<form action="Resume_upload.php" method="post" enctype="multipart/form-data">
    <h2><font color="blue">Select a PDF file to upload:</font></h2>
	
    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
    <input type="submit" value="Upload" name="submit">
</form>

  <center>
    <a href="../index.php" class=btn button id='back'>Back</a>
    <id="logout"><a href="../ardFiles/logout.php">Logout</a>
  </center>

</body>
</html>
