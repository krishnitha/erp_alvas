<?php
    require_once "../config.php";
    $con=$link;
    session_start();
    if(isset($_POST["Submit"]))
    {
        $s='select * from students where usn="' . $_SESSION["username"] . '"';
        $res = $link->query($s);
        $res = mysqli_fetch_assoc($res);
        $reason = $_POST["reason"];
        $date = date('Y-m-d');
        $from = $_POST["from_date"];
        $to = $_POST["to_date"];
        $que = "insert into student_medical_leave(usn,sem,reason,applied_date,from_date,to_date) values (\"" . $_SESSION['username'] . "\",
        \"" . $res["semester"] . "\",\"" . $reason . "\",\"" . $date . "\",\"" . $from . "\",\"" . $to . "\")";
        echo $que;
        $result = $con->query($que);
        header("Location: ../leave_management/medical.php");
    }
?>