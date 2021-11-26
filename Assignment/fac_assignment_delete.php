<?php
require_once '../config.php';
// echo $_POST['semester'];
// echo $_POST['section'];
$q_del = "delete from add_assignment where sub_name = \"" . $_POST["sub_name"] . "\" and assignment_no = \"" . $_POST["assignment_no"] . "\" and semester = \"" . $_POST["semester"] . "\"and section = \"" . $_POST["section"] . "\"";
echo $q_del;
if ($link->query($q_del)) {
    header("Location: ../assignment/fac_assignment_view.php");
    
} else {
        echo $q3;
            echo "<h1>Assignment failed</h1>";
        }

?>