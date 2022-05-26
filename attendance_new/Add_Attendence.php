<?php 

require_once "../config.php";

$branch=$_POST["branch"] ;
$_SESSION['branch'] = $branch;
$sem=$_POST["sem"]; 
$_SESSION['sem'] = $sem;
$sec=$_POST["sec"]; 
$_SESSION['sec'] = $sec;
$sub=$_POST["sub"]; 
$_SESSION['sub'] = $sub;
$date=$_POST["date"]; 
$_SESSION['date'] = $date;
$period=$_POST["period"]; 
$_SESSION['period'] = $period;
$att = $date . ":" . $period . ":" . "1";
$_SESSION['att'] = $att;
$q='select * from attendance_new where sub="' . $sub . '" and sem="' . $sem . '" and sec="' . $sec . '" and branch="' . $branch . '";';
$result = $link->query($q);
// echo mysqli_num_rows($result);
$flag = 0;
if(mysqli_num_rows($result) > 0){
    $flag = 1;
}
// echo $flag;
if($flag == 1){
    $r = mysqli_fetch_assoc($result);
    if(strstr($r['att'], $att) != false){
        // echo $flag;
        $_SESSION['period_error'] = 1;
        // echo '<script>window.location.replace("Select_Attendence_for_Adding_attendence.php");</script>';
        // header("Location: Select_Attendence_for_Adding_attendence.php");
        goto label;
    }
}

if($flag == 0){
    $q1="select adm_no,usn,fname,mname,lname from students where branch=\"" . $branch . "\" and semester=\"" . $sem . "\" and section=\"" . $sec . "\" order by usn;";
    $result1=$link->query($q1);
    foreach($result1 as $r){
        $q2 = 'INSERT INTO `attendance_new`(`adm_no`, `usn`, `name`, `sem`, `sec`, `branch`, `sub`, `att`) VALUES ("' . $r["adm_no"] . '", "' . $r['usn'] . '", "' . $r['fname'] . ' ' . $r['lname'] . '", "' . $sem . '", "' . $sec . '", "' . $branch . '", "'. $sub . '", "' . $att . '")';
        // echo $q2 . '<br>';
        $link->query($q2);
    }
    
}
else{
    foreach($result as $r){
        
        $att1 = $r['att'] . ';' . $att;
        $q2 = 'update attendance_new set att = "' . $att1 . '" where sub="' . $sub . '" and sem="' . $sem . '" and sec="' . $sec . '" and branch="' . $branch . '" and usn="' . $r['usn'] . '";';
        // echo $q2 . '<br>';
        $link->query($q2);
    }
    
}
$_SESSION['period_error'] = 0;
label: header("Location: redirect.php")
?>