<?php
session_start();
$_SESSION['assignment_no'] = $_POST['assignment_no'];
$_SESSION['semester'] = $_POST['semester'];
$_SESSION['section'] = $_POST['section'];

// echo $_POST['semester'];
// echo $_POST['section'];
header("Location: ../assignment/fac_assign_marks_lastpage.php");
 

?>
