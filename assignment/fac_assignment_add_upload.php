<?php

session_start();
require_once '../config.php';

$str = rand();
$result = hash("sha256", $str);

$date = date('Y-m-d-H-i-s');
$flle = $result . $date;
$c = $result . $date;
$f = $c . ".pdf";


$target_path = "../upload/";
$target_path = $target_path . basename("$f");

if (move_uploaded_file($_FILES['pdf']['tmp_name'], $target_path)) {
    $doc_file = $_FILES['pdf']['name'];
} else {
    echo "error";
}



$co =  implode(',', $_POST["co_no"]);


$q3 = "insert into add_assignment(`sub_name`,`branch`,`semester`, `section`,`assignment_no`, `fac_name`,`co_no`,`max_marks`, `last_date`,`file_name`) values (\"" . $_POST["sub_name"] . "\",\"" . $_POST["branch"] . "\",\"" . $_POST["semester"] . "\",\"" . $_POST["section"] . "\",\"" . $_POST["assignment_no"] . "\",\"" . $_SESSION["username"] . "\",\"$co\",10,\"" . $_POST["last_date"] . "\",\"" . $f . "\")";

// echo $q3;    

$assignment_no = "a" . $_POST["assignment_no"];
$marks_update = "update assignment_marks set $assignment_no = 0 where semester = \"" . $_POST["semester"] . "\" and section = \"" . $_POST["section"] . "\" and branch = \"" . $_POST["branch"] . "\" and sub_name = \"" . $_POST["sub_name"] . "\" and fac_name = \"" . $_SESSION['username'] . "\"";

if ($link->query($q3)) {

    if ($link->query($marks_update)) {
        echo "success";
    }

    $q5 = "select * from students where branch=\"" . $_POST["branch"] . "\" and semester=\"" . $_POST["semester"] . "\" and section=\"" . $_POST["section"] . "\"";
    // echo $q5;
    $res5 = $link->query($q5);
    $end_date = strtotime("1 day", strtotime($_POST["last_date"]));
    $end_date = date("Y-m-d", $end_date);

    foreach ($res5 as $row5) {
        $assignment = $_POST['sub_name'] . " :\nAssignment " .  $_POST["assignment_no"]  . " is added please check!!";
        $redirect = "../assignment/student_assignment_view.php";
        $q = "INSERT INTO `notification`(`usn`,`assignment_no`, `branch`, `section`, `subject`, `content`, `redirect`, `end_date`,`sem`) 
       values(\"" . $row5['usn'] . "\"," . $_POST["assignment_no"] . ",\"" . $_POST["branch"] . "\",\"" . $_POST["section"] . "\",\"" . $_POST["sub_name"] . "\",\"" . $assignment . "\",\"" .  $redirect . "\",\"" . $end_date . "\",\"" . $_POST['semester'] . "\")";
        $res = $link->query($q);
        // echo $q;
    }
    $_SESSION['add_assignment'] = "success";
    header("Location: ../assignment/fac_assignment.php");
} else {
    echo "<h1>Assignment alredy exist</h1>";
    $_SESSION['add_assignment'] = "failed";
    header("Location: ../assignment/fac_assignment.php");
    // echo $q3;
}
