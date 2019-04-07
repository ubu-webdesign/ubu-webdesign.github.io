<?php
  session_start();
  require '../fsdFiles/connect.php';

  function findCourse($title) {
    // I had to reverse code how to find the course number 
    //because I can't find the course variable from the previous page.
    // ACTG
    if ($title == "Financial Accounting")                                         { $course = '201'; }
    if ($title == "Managerial Accounting")                                        { $course = '202'; }
    if ($title == "Accounting Information Systems")                               { $course = '320'; }
    if ($title == "Financial Reporting I")                                        { $course = '323'; }
    if ($title == "Financial Reporting II")                                       { $course = '324'; }
    if ($title == "Cost Accounting")                                              { $course = '325'; }
    if ($title == "Federal Taxation I")                                           { $course = '328'; }
    if ($title == "Concepts of Audting")                                          { $course = '421'; }
    if ($title == "Financial Reporting III")                                      { $course = '422'; }
    if ($title == "Accounting for Governmental for Not-for-Profit Organizations") { $course = '423'; }
    if ($title == "Special Topics in Accounting")                                 { $course = '424'; }
    if ($title == "Federal Taxation II")                                          { $course = '428'; }
    if ($title == "Tax Research")                                                 { $course = '429'; }

   // BUS
    if ($title == "Fundamentals of Business")                   { $course = '429'; }
    if ($title == "Legal and Social Environment of Business")   { $course = '206'; }
    if ($title == "Applied Statics for Economics and Business") { $course = '305'; }
    if ($title == "Business Law")                               { $course = '306'; }
    if ($title == "Strategic Management")                       { $course = '458'; }
    if ($title == "Internship in Business")                     { $course = '475'; }
    if ($title == "Principles of Financial Management")         { $course = '505'; }
    if ($title == "Principles of Information Systems")          { $course = '506'; }
    if ($title == "Principles of Marketing")                    { $course = '509'; }

    // ECON
    if ($title == "Introduction to Microeconomics")                { $course = '203'; }
    if ($title == "Introduction to Macroeconomics")                { $course = '204'; }
    if ($title == "Economic History of the United States")         { $course = '300'; }
    if ($title == "Intermediate Microeconomic Theory")             { $course = '310'; }
    if ($title == "Intermediate macroeconomics")                   { $course = '320'; }
    if ($title == "Money and Banking")                             { $course = '321'; }
    if ($title == "Urban and Regional Economics")                  { $course = '323'; }
    if ($title == "Internation Economics")                         { $course = '325'; }
    if ($title == "Environmental and Natural Resources Economics") { $course = '340'; }
    if ($title == "Special Topics in Economics")                   { $course = '397'; }
    if ($title == "Public Finance")                                { $course = '400'; }
    if ($title == "Development of Economic Thought")               { $course = '405'; }
    if ($title == "Labor Economics")                               { $course = '410'; }
    if ($title == "Senior Seminar in Economics")                   { $course = '450'; }
    if ($title == "Special Studies")                               { $course = '497'; }

    // FIN
    if ($title == "Investiments and Personal Finance") { $course = '246'; }
    if ($title == "Finance Fundamentals")              { $course = '301'; }
    if ($title == "Financial Management")              { $course = '341'; }
    if ($title == "Intro to Real Estate")              { $course = '344'; }
    if ($title == "Investments I")                     { $course = '347'; }
    if ($title == "Investments II")                    { $course = '348'; }
    if ($title == "Real Estate")                       { $course = '366'; }
    if ($title == "Advanced Corporate Finance")        { $course = '442'; }
    if ($title == "Financial Markets")                 { $course = '443'; }
    if ($title == "Cash Management")                   { $course = '450'; }
    if ($title == "Healthcare Finance")                { $course = '451'; }
    if ($title == "Special Studies")                   { $course = '497'; }

    // MGT
    if ($title == "Management of Organizations")                       { $course = '351'; }
    if ($title == "Organizational Behavior")                           { $course = '352'; }
    if ($title == "Human Resource Management")                         { $course = '353'; }
    if ($title == "Production and Operations Management")              { $course = '355'; }
    if ($title == "Process  Improvement  and  Quality  Control")       { $course = '356'; }
    if ($title == "Management of Service Operations")                  { $course = '357'; }
    if ($title == "The  Nonprofit  Sector:  Structure  and  Dynamics") { $course = '358'; }
    if ($title == "Employment Law and Labor Relations")                { $course = '359'; }
    if ($title == "Management Science")                                { $course = '373'; }
    if ($title == "Advanced Human Resource Management")                { $course = '452'; }
    if ($title == "Managing the Nonprofit Organization")               { $course = '453'; }
    if ($title == "Entrepreneurship and Small Business Management")    { $course = '454'; }
    if ($title == "Current Issues in Management")                      { $course = '455'; }
    if ($title == "Leadership in the Healthcare Environment")          { $course = '456'; }
    if ($title == "International Management")                          { $course = '460'; }
    if ($title == "Supply Chain Management")                           { $course = '467'; }
    if ($title == "Production Planning and Control")                   { $course = '468'; }
    if ($title == "Strategic Human Resource Management")               { $course = '469'; }
    if ($title == "Special Studies")                                   { $course = '497'; }

    // MIS
    if ($title == "Modern Programming")                              { $course = '225'; }
    if ($title == "Information Systems Fundamentals")                { $course = '327'; }
    if ($title == "Business Systems Analysis and Design")            { $course = '337'; }
    if ($title == "Business Data Communications")                    { $course = '347'; }
    if ($title == "Management Science")                              { $course = '373'; }
    if ($title == "Business Decision Support Systems")               { $course = '378'; }
    if ($title == "Data Base Management")                            { $course = '447'; }
    if ($title == "Management Information Systems")                  { $course = '457'; }
    if ($title == "E-Commerce – Data Driven Web Application Design") { $course = '467'; }
    if ($title == "Special Topics in Information Systems")           { $course = '477'; }
    if ($title == "Special Studies")                                 { $course = '497'; }

    // MKT
    if ($title == "Principles of Marketing")               { $course = '331'; }
    if ($title == "Marketing Research")                    { $course = '333'; }
    if ($title == "Consumer Behavior")                     { $course = '334'; }
    if ($title == "International Marketing")               { $course = '335'; }
    if ($title == "Personal Selling and Sales Management") { $course = '338'; }
    if ($title == "Marketing Communications")              { $course = '339'; }
    if ($title == "Field Experience in Applied Marketing") { $course = '430'; }
    if ($title == "Marketing Management")                  { $course = '432'; }
    if ($title == "International Marketing Strategy")      { $course = '440'; }
    if ($title == "Special Studies")                       { $course = '497'; }

    // NPM
    if ($title == "The Nonprofit Sector: Structure and Dynamics") { $course = 358; }
    if ($title == "Managing the Nonprofit Organization")          { $course = 453; }

    // CS
    if ($title == "Microcomputers and Software Applications I")     { $course = '150'; }
    if ($title == "Programming Fundamentals")                       { $course = '190'; }
    if ($title == "Laboratory for CS 190 Programming Fundamentals") { $course = '190L'; }
    if ($title == "Introduction to FORTRAN")                        { $course = '212'; }
    if ($title == "Modern Programming")                             { $course = '225'; }
    if ($title == "Programming and Algorithmic Design I")           { $course = '226'; }
    if ($title == "Programming and Algorithmic Design II")          { $course = '227'; }
    if ($title == "Digital Systems Design")                         { $course = '280'; }
    if ($title == "Computer Architecture and Organization")         { $course = '310'; }
    if ($title == "Systems Design and Development")                 { $course = '313'; }
    if ($title == "Data Structures and Algorithm Analysis")         { $course = '318'; }
    if ($title == "Special Topics in Computer Science")             { $course = '330'; }
    if ($title == "Software Design and Development")                { $course = '340'; }
    if ($title == "Theory of Computation")                          { $course = '350'; }
    if ($title == "Introduction to Computer Graphics")              { $course = '360'; }
    if ($title == "Programming Languages")                          { $course = '401'; }
    if ($title == "Operating Systems")                              { $course = '410'; }
    if ($title == "Compiler Construction")                          { $course = '420'; }
    if ($title == "Numerical Analysis")                             { $course = '425'; }
    if ($title == "Data Base Management Systems Design")            { $course = '430'; }
    if ($title == "Artificial Intelligence")                        { $course = '437'; }
    if ($title == "Computer Networks")                              { $course = '440'; }
    if ($title == "Internship in Computer Science")                 { $course = '475'; }
    if ($title == "Capstone I")                                     { $course = '480'; }
    if ($title == "Capstone II")                                    { $course = '482'; }
    if ($title == "Special Studies")                                { $course = '497'; }

    // Testing Courses
    if ($title == 'First Entry - Lec')      { $course = '001'; }
    if ($title == 'First Entry - Lab')      { $course = '001'; }
    if ($title == 'Second Entry - Lec')     { $course = '002'; }
    if ($title == 'Second Entry - Lab')     { $course = '002'; }
    if ($title == 'Third Entry - Lec')      { $course = '003'; }
    if ($title == 'Third Entry - Lab')      { $course = '003'; }
    if ($title == 'Fourth Entry - Lec')     { $course = '004'; }
    if ($title == 'Fourth Entry - Lab')     { $course = '004'; }
    if ($title == 'Fifth Entry - Lec')      { $course = '005'; }
    if ($title == 'Fifth Entry - Lab')      { $course = '005'; }
    if ($title == 'Sixth Entry - Lec')      { $course = '006'; }
    if ($title == 'Sexth Entry - Lab')      { $course = '006'; }
    if ($title == 'Seventh Entry - Lec')    { $course = '007'; }
    if ($title == 'Seventh Entry - Lab')    { $course = '007'; }
    if ($title == 'Eighth Entry - Lec')     { $course = '008'; }
    if ($title == 'Eighth Entry - Lab')     { $course = '008'; }
    if ($title == 'Ninth Entry - Lec')      { $course = '009'; }
    if ($title == 'Ninth Entry - Lab')      { $course = '009'; }
    if ($title == 'Tenth Entry - Lec')      { $course = '010'; }
    if ($title == 'Tenth Entry - Lab')      { $course = '010'; }
    if ($title == 'Eleventh Entry - Lec')   { $course = '011'; }
    if ($title == 'Eleventh Entry - Lab')   { $course = '011'; }
    if ($title == 'Twelveth Entry - Lec')   { $course = '012'; }
    if ($title == 'Twelveth Entry - Lab')   { $course = '012'; }
    if ($title == 'Thirteenth Entry - Lec') { $course = '013'; }
    if ($title == 'Thirteenth Entry - Lab') { $course = '013'; }

    return $course;
  }

  function sendToDb($conn, $fac_id, $department, $course, $title, $enrollment, $class_type, $year, $course_id, $session) {
    // Given the above variables this function will submit record into database.
    // NTM: $year cannot be edited by user, should it be part of update?
      if ($course_id != 0) {
        $sql = "UPDATE courses_taught
	        SET department = '$department',
                    course     = '$course',
                    title      = '$title',
                    enrollment = '$enrollment',
                    class_type = '$class_type',
                    year       = '$year'
                WHERE id = '$course_id';";
      } else {
        $sql = "INSERT INTO courses_taught
	        SET fac_id     = $fac_id,
                    year       = '$year',
                    session    = '$session',
                    department = '$department',
                    course     = '$course',
                    title      = '$title',
                    enrollment = '$enrollment',
                    class_type = '$class_type';";
      }
      if(!mysqli_query($conn, $sql)) { echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . '<br>'; }
      //else { echo "<br>Records added successfully.<br> $sql <br>"; }
  }

  // MAIN
    $first_name=$_POST['first_name'];
    $middle_name=$_POST['middle_name'];
    $last_name=$_POST['last_name'];
    $fac_title=$_POST['fac_title'];
    $teaching_dept=$_POST['teaching_dept'];
    $fac_id = $_SESSION['fac_id'];
     
    // Attempt insert query execution

	$sql = "UPDATE faculty 
		SET firstname     = '$first_name',
                    middlename    = '$middle_name',
		    lastname      = '$last_name',
                    title         = '$fac_title',
                    teaching_dept = '$teaching_dept'
		WHERE id = '$fac_id';";

	if(!mysqli_query($conn, $sql)){ echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . "<br>"; }
        //else { echo "<br>Name updated successfully.<br>"; } 
    // Load course taught row
    $department = $_POST['department'];
    $rows = count($department);
    for ($x = 0; $x < $rows; $x++) {
      if ($department[$x] != 'Select Department') {
        $course_id = $_SESSION['course_id'];
        $department[$x] = strtoupper($department[$x]);
        $course_array = $_SESSION['course'];
        $post_title = $_POST['title'];
        $title = $_SESSION['title'];
        if ($post_title[$x] != '') { 
          $title = $post_title;
          $course = findCourse($title[$x]);
        } else { $course = $course_array[$x]; }
        $enrollment = $_POST['enrollment'];
        $class_type = $_POST['class_type'];
        if ($class_type[$x] == "Lab") { 
          $class_type[$x] = 1; 
        } else { $class_type[$x] = 0; }
        $session = $_SESSION['session'];
        $year = $_SESSION['years'];
        
        sendToDb($conn, $fac_id, $department[$x], $course, $title[$x], $enrollment[$x], $class_type[$x], $year[$x], $course_id[$x], $session[$x]);
      }
    }

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
          if(mysqli_query($conn, $sql)){ echo 'Contribution added successfully.<br> ' . $sql . '<br>'; } 
          else{ echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . "<br>"; }
      }
    }
  
  // Close connection
    mysqli_close($link);
?>
