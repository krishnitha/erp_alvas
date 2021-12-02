<?php
    require_once "../config.php";
    $con=$link;
    session_start();
    if(isset($_POST["Submit"]))
    {
        $s='select * from students where usn="' . $_SESSION["username"] . '"';
        $res = $link->query($s);
        $res = mysqli_fetch_assoc($res);
        $Cname = $_POST["cname"];
        $Cdate = $_POST["cdate"];
        $date = date('Y-m-d');
        $round = $_POST["r_clear"];
        $from = $_POST["start"];
        $to = $_POST["end"];
        $que = "insert into student_placement_leave(usn,sem,company_name,rounds,place_date,applied_date,from_time,to_time) values (\"" . $_SESSION['username'] . "\",
        \"" . $res["semester"] . "\",\"" . $Cname . "\",\"" . $round . "\",\"" . $Cdate . "\",\"" . $date . "\",\"" . $from . "\",\"" . $to . "\")";
        echo $que;
        $result = $con->query($que);
        header("Location: ../leave_management/placement.php");
    }
?>