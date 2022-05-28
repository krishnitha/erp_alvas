<?php 

require_once "../config.php";
$date = $_POST['date'];
$sem = $_SESSION['sem'];
$sec =  $_SESSION['sec'];
$branch = $_SESSION['branch'];
$sub = $_SESSION['sub'];
$q = 'select * from attendance_new where sub="' . $sub . '" and sem="' . $sem . '" and sec="' . $sec . '" and branch="' . $branch . '" order by usn;';
$result = $link->query($q);
$r = mysqli_fetch_assoc($result);
$entire_date = explode(';', $r['att']);
foreach ($entire_date as $n) {
    $display_dates[] = explode(':', $n)[0] . ':' . explode(':', $n)[1];
}
$k = array_search($date, $display_dates);
foreach($result as $r){
    $entire_date = explode(';', $r['att']);
    unset($entire_date[$k]);
    $arr = implode(';', $entire_date);
    // print_r($arr);
    // echo '<br>';
    $q_up = 'update attendance_new set att = "' . $arr . '" where sub="' . $sub . '" and sem="' . $sem . '" and sec="' . $sec . '" and branch="' . $branch . '" and usn = "' . $r['usn'] . '";';
      
    $link->query($q_up);

}
header("Location: View_or_Edit_Attendence.php");