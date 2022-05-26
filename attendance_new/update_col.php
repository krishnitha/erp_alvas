

<?php
require_once "../config.php";
$date = $_POST['date'];
$sem = $_SESSION['sem'];
$sec =  $_SESSION['sec'];
$branch = $_SESSION['branch'];
$sub = $_SESSION['sub'];

$arr = ltrim($_POST['arr'],'[');
$arr = rtrim($arr,']');
$arr_att = explode(',',$arr);
$q = 'select * from attendance_new where sub="' . $sub . '" and sem="' . $sem . '" and sec="' . $sec . '" and branch="' . $branch . '" order by usn;';
$result = $link->query($q);
// echo $q;
$r = mysqli_fetch_assoc($result);
$entire_date = explode(';', $r['att']);
foreach ($entire_date as $n) {
    $display_dates[] = explode(':', $n)[0] . ':' . explode(':', $n)[1];
}
// print_r($display_dates);
// if($arr_att[0] == "true");
// {
//     echo "1";
// }
// echo count($arr_att);
for($i = 0; $i < count($arr_att); $i++){
    if($arr_att[$i] == "true"){
        $arr_att[$i] = '1';
    }
    else{
        $arr_att[$i] = '0';
    }
}
// print_r($arr_att);
$result = $link->query($q);
for ($i = 0; $i < count($arr_att); $i++) {
    $k = array_search($date, $display_dates);
    $r = mysqli_fetch_assoc($result);
    $entire_date = explode(';', $r['att']);
    $entire_date[$k] =  $date . ':' . $arr_att[$i];
    $arr = implode(';',$entire_date);
    // print_r($arr);
    $q_up = 'update attendance_new set att = "' . $arr . '" where sub="' . $sub . '" and sem="' . $sem . '" and sec="' . $sec . '" and branch="' . $branch . '" and usn = "' . $r['usn'] . '";';
    // echo $q_up;
    // echo '<br>'; 
    
    $link->query($q_up);
    


}
header("Location: View_or_Edit_Attendence.php");




?>