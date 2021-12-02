<?php
    require_once "../config.php";
    $con = $link;
    
    if(isset($_POST["Submit"])){
        $reason = $_POST["reason"];
        $date = date('d-m-Y');
        $from = $_POST["from_date"];
        $to = $_POST["to_date"];
        $que = "insert into student_medical_leave('reason','applied_date','from_date','to_date') values (\"" . $reason . "\",\"" . $date . "\",\"" . $from . "\",\"" . $to . "\",)";
        $result = $con->query($que);
        header("Location: ../leave_management/medical.php");
    }
?>