<?php

session_start();
require_once '../config.php';

$str = rand();
$result = hash("sha256", $str);

$date = date('Y-m-d-H-i-s');
$flle = $result.$date;
$c = $result.$date;
$f = $c.".pdf";


$target_path = "../upload/assignment/";
$target_path = $target_path.basename("$f");

if(move_uploaded_file($_FILES['pdf']['tmp_name'],$target_path)){
    $doc_file = $_FILES['pdf']['name'];
   
}
else{
    echo "error";
}


$q3 = "insert into add_assignment(`sub_name`,`semester`, `section`,`assignment_no`, `fac_name`,`co_no`, `last_date`,`file_name`) values (\"" . $_POST["sub_name"] . "\",\"" . $_POST["semester"] . "\",\"" . $_POST["section"] . "\",\"" . $_POST["assignment_no"] . "\",\"" . $_SESSION["username"] . "\",\"" . $_POST["co_no"] . "\",\"" . $_POST["last_date"] . "\",\"" . $f . "\")";

// echo $q3;

if ($link->query($q3)) {
         header("Location: ../assignment/fac_assignment.php");
      
    } else {
            echo "<h1>Assignment alredy exist</h1>";
            // echo $q3;
        }
        

?>