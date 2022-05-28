<?php
// session_start();
// print_r($_POST['a']);
// print_r($_POST['b']);
require_once "../config.php";
$sub = $_SESSION['sub'];
$sem = $_SESSION['sem'];
$sec = $_SESSION['sec'];
$branch = $_SESSION['branch'];
$att = $_SESSION['att'];
$date = $_SESSION['date'];
$period = $_SESSION['period'];
$search = $date . ":" . $period . ":0";
$q = 'select * from attendance_new where sub="' . $sub . '" and sem="' . $sem . '" and sec="' . $sec . '" and branch="' . $branch . '" order by usn;';
$result = $link->query($q);
// echo $q;
$studs = array();
foreach($result as $r){
    $studs[] = $r['usn'];
}
// print_r($studs);
$stud_abs = array_diff($studs,$_POST["a"]);
// print_r($stud_abs);

foreach($stud_abs as $s){
    $q2 = 'select * from attendance_new where sub="' . $sub . '" and sem="' . $sem . '" and sec="' . $sec . '" and branch="' . $branch . '" and usn = "' . $s . '";';
    $result1 = $link->query($q2);
    $r = mysqli_fetch_assoc($result1);
    $p = strstr($r['att'], $att);
    $q = explode(';', $r['att']);
    $p = explode(':', $p);
    if(strstr($r['att'], $search) != false)
    {
        continue;
    }
    $p[2] = '0';
    $p = implode(':', $p);
    $q[count($q) - 1] = $p;
    $q = implode(';', $q);
    $q_up = 'update attendance_new set att = "' . $q . '" where sub="' . $sub . '" and sem="' . $sem . '" and sec="' . $sec . '" and branch="' . $branch . '" and usn = "' . $s . '";';
    $link->query($q_up);
    // echo $q_up . '<br>';
}
if($_POST['b'] ?? 0){
foreach($_POST['b'] as $b){
    $q2 = 'select * from attendance_new where sub="' . $sub . '" and sem="' . $sem . '" and sec="' . $sec . '" and branch="' . $branch . '" and usn = "' . $b . '";';
    $result1 = $link->query($q2);
    $r = mysqli_fetch_assoc($result1);
    $p = strstr($r['att'], $search);
    $q = explode(';', $r['att']);
    $p = explode(':', $p);
    
    $p[2] = '1';
    $p = implode(':', $p);
    $q[count($q) - 1] = $p;
    $q = implode(';', $q);
    $q_up = 'update attendance_new set att = "' . $q . '" where sub="' . $sub . '" and sem="' . $sem . '" and sec="' . $sec . '" and branch="' . $branch . '" and usn = "' . $b . '";';
    $link->query($q_up);
}
}
header("Location: mark_attendance.php");

?>