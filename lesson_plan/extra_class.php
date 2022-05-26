<?php
include("../config.php");
    session_start();
    $sem = $_POST["sem"];
    $sec = $_POST["sec"];
    $sub = $_POST["subid"];
    $module = $_POST["module"];
    $doe = $_POST["doe"];
    $completed = $_POST["completed"];

    $q = "INSERT INTO `lessonpanl`( `sem`, `subid`, `section`, `module`,  `dop_exe`, `complet`, `dop_Plan`, `pending` , `branch`) VALUES (\"" . $sem . "\", \"" . $sub . "\",\"" . $sec . "\", \"" . $module . "\",\"" . $doe . "\",\"" . $completed . "\",\"" . $doe . "\",\"" . $completed . "\",\"" . $_SESSION['branch'] . "\")";
    echo $q;
    // $con = mysqli_connect("localhost", "root", "", "erp_alvas");

    $r = $link->query($q);

    header("Location: lesson_plan.php");

?>