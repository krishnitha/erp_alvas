<?php
require_once '../config.php';
$count = $_POST['count'];


$flag = 0;
session_start();
$a = 'a' . $_SESSION['assignment_no'];
$qr = "select * from assignment_marks where semester = \"" . $_SESSION['semester'] . "\" and section = \"" . $_SESSION['section'] . "\" and branch = \"" . $_SESSION['branch'] . "\" and sub_name = \"" . $_SESSION['sub_name'] . "\" and fac_name = \"" . $_SESSION['username'] . "\" order by usn";
for ($i = 1; $i <= $count; $i++) {


     $u = $_POST['usn' . $i];  
    $stud_name = $_POST['stud_name' . $i];
    $sem = $_SESSION['semester'];
    $sec = $_SESSION['section'];
    $branch = $_SESSION['branch'];
    $sub_na = $_SESSION['sub_name'];
    $uname = $_SESSION['username'];

    $result1 = $link->query($qr);
    foreach ($result1 as $row) {
        if ($row['usn'] == $u && $row['stud_name'] == $stud_name && $row['semester'] == $sem && $row['section'] == $sec && $row['branch'] == $branch && $row['sub_name'] == $sub_na && $row['fac_name'] == $uname) {
            $flag = 1;
            echo "inside for loop";
            echo $row['usn'];
            echo "<br>"; 
            break;
        }
    }
    if ($flag) {
        $up = "update assignment_marks set $a = \"" . $_POST['marks_obt' . $i] . "\" where stud_name = \"" . $_POST['stud_name' . $i] . "\" and usn = \"" . $_POST['usn' . $i] . "\" and semester = \"" . $_SESSION['semester'] . "\" and section = \"" . $_SESSION['section'] . "\" and branch = \"" . $_SESSION['branch'] . "\" and fac_name = \"" . $_SESSION['username'] . "\" and sub_name = \"" . $_SESSION['sub_name'] . "\" ";

        echo $up;
        if ($link->query($up)) {
            header("Location: ../assignment/fac_assign_marks_lastpage.php");
            echo "success";
        } else {

            echo "<h1>Updation Failed</h1>";
        }
    } else {


        $q = "insert into assignment_marks(usn,stud_name,semester,section,branch,$a,max_marks,fac_name,sub_name) values( \"" . $_POST['usn' . $i] . "\",\"" . $_POST['stud_name' . $i] . "\",\"" . $_SESSION['semester'] . "\",\"" . $_SESSION['section'] . "\",\"" . $_SESSION['branch'] . "\",\"" . $_POST['marks_obt' . $i] . "\",10,\"" . $_SESSION['username'] . "\",\"" . $_SESSION['sub_name'] . "\")";

        echo $q;

        if ($link->query($q)) {
            header("Location: ../assignment/fac_assign_marks_lastpage.php");
            echo "success";
        } else {

            echo "<h1>Insertion failed</h1>";
        }
    }
}
