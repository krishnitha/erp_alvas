<?php

require_once "../config.php";
error_reporting(0);
session_start();
// include "../template/fac-auth.php";
// include "../template/sidebar-fac.php";
$a = $_POST['semester'];
$_SESSION['feedback_name']=$_POST['feedback_name'];
$_SESSION['from_date']=$_POST['from_date'];
$_SESSION['to_date']=$_POST['to_date'];

$q_not='select sem from feedback_notification where feedback_name="'.$_SESSION['feedback_name'].'"';
$e_qnot=$link->query($q_not);
$arr=array();
$arr1=array();
$i=0;
if(mysqli_num_rows($e_qnot))
{
foreach($e_qnot as $r)
{
    print_r($r);
    foreach($r as $s)
    {
        $arr[$i]=$s;
        $i++;
    }
}
}
$i=0;
foreach($a as $t)
{
    $k=in_array($t,$arr);
    echo $k;
    if($k)
    {
        $arr1[$i++]=$t;
        $_SESSION['flag']=1;
    }
}
$a=array_diff($a,$arr1);

$q_dept='select faculty_dept from faculty_details where faculty_name="'.$_SESSION['username'].'"';
$r_dept=mysqli_fetch_assoc($link->query($q_dept));
$a=join(",",$a);
$arr1=join(",",$arr1);
if(!empty($a))
{
    
    $q='insert into feedback_notification(`feedback_name`, `sem`, `branch`, `notification`, `from_date`, `to_date`) values("' . $_SESSION['feedback_name'] . '","'.$a.'","'.$r_dept['faculty_dept'] . '" , "yes","'. $_SESSION['from_date'] . '","'. $_SESSION['to_date'] . '" )';
    $link->query($q);
    
}
$_SESSION['repsem']=$arr1;
// $r='select * from feedback_all where feedback_name="'.$_SESSION['feedback_name'].'" and sem="'.$_SESSION['sem'].'" and 
 header('Location: enable.php');
?>









