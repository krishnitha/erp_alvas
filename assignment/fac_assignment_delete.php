<?php
require_once '../config.php';
session_start();
// echo $_POST['semester'];
// echo $_POST['section'];
$q_del = "delete from add_assignment where sub_name = \"" . $_POST["sub_name"] . "\" and assignment_no = \"" . $_POST["assignment_no"] . "\" and semester = \"" . $_POST["semester"] . "\"and section = \"" . $_POST["section"] . "\" and branch = \"" . $_POST["branch"] . "\"";
$notification_del = "delete from notification where subject = \"" . $_POST["sub_name"] . "\" and  sem = \"" . $_POST["semester"] . "\"and section = \"" . $_POST["section"] . "\" and branch = \"" . $_POST["branch"] . "\" and assignment_no =  \"" . $_POST["assignment_no"] . "\"";
// echo $q_del;
// $f_n = $_POST['file_name'];
// echo $f_n;
// echo '../upload/assignment'  . $_POST['file_name'];

$assignment_no = "a" . $_POST["assignment_no"];
$marks_update = "update assignment_marks set $assignment_no = 0 where semester = \"" . $_POST["semester"] . "\" and section = \"" . $_POST["section"] . "\" and branch = \"" . $_POST["branch"] . "\" and sub_name = \"" . $_POST["sub_name"] . "\" and fac_name = \"" . $_SESSION['username'] . "\"";

// echo $marks_update;
// echo $notification_del;

if ($link->query($q_del)) {

    $link->query($notification_del);


    if($link->query($marks_update)){
        echo "success";
    }

    if(file_exists('../upload/'  . $_POST['file_name'])){
        unlink('../upload/'  . $_POST['file_name']);
    }
    
    header("Location: ../assignment/fac_assignment.php");
    
} else {
        echo $q3;
            echo "<h1>Assignment deletion failed</h1>";
        }
