<?php
    require_once "../config.php";
    $con=$link;
    session_start();
    if(isset($_POST["Submit"]))
    {
        $s='select * from students where usn="' . $_SESSION["username"] . '"';
        $res = $link->query($s);
        $res = mysqli_fetch_assoc($res);
        $ename = $_POST["Ename"];
        $edate = $_POST["Edate"];
        $date = date('Y-m-d');
        $from = $_POST["start"];
        $to = $_POST["end"];
        $que = "insert into student_event_leave(usn,sem,event_name,event_date,applied_date,from_time,to_time) values (\"" . $_SESSION['username'] . "\",
        \"" . $res["semester"] . "\",\"" . $ename . "\",\"" . $edate . "\",\"" . $date . "\",\"" . $from . "\",\"" . $to . "\")";
        echo $que;
        $result = $con->query($que);
        header("Location: ../leave_management/event.php");
    }
?>