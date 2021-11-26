<?php
session_start();
require_once '../config.php';


$q3 = "update add_assignment set `semester` = \"" . $_POST["semester"] . "\", `section` =\"" . $_POST["section"] . "\",`co_no` = \"" . $_POST["co_no"] . "\", `last_date` = \"" . $_POST["last_date"] . "\" where `sub_name` = \"" . $_POST["sub_name"] . "\" and `assignment_no` =  \"" . $_POST["assignment_no"] . "\"";


if ($link->query($q3)) {
    header("Location: ../assignment/fac_assignment_view.php");
    
} else {
        echo $q3;
            echo "<h1>Assignment failed</h1>";
        }

?>