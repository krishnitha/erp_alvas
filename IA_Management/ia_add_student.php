<?php

require_once "config1.php";
session_start();
$branch = $_POST["branch"];
$sec = $_POST["sec"];
$sem = $_POST["sem"];
$sub = $_POST["sub"];

$sub_only = explode('- ', $sub);

$q_e = 'select * from subjects where sub_name ="' . $sub_only[1] . '"';
$result_e = $con->query($q_e);
// echo $q_e;

$r_e = mysqli_fetch_assoc($result_e);

if($r_e['elective'] == 0){
    $q = "select * from students where branch = \"" . $branch . "\" and section = \"" . $sec . "\" and semester = \"" . $sem . "\"" ;
}
else{
    $q = "select * from students s, elective_maping e where s.branch =\"" . $branch . "\" and s.section = \"" . $sec . "\" and s.semester = \"" . $sem . "\" and s.usn = e.usn and e.sub_name = \"" . $sub . "\"";
}

// echo $q;
$_SESSION["branch"] = $_POST["branch"];
$_SESSION["sec"] = $_POST["sec"];
$_SESSION["sem"] = $_POST["sem"];
$_SESSION["sub"] = $_POST["sub"];
$q4="select * from ia_marks1 where branch =\"" . $branch . "\" and sec = \"" . $sec . "\" and sem = \"" . $sem . "\" and sub = \"" . $sub . "\"" ;
// echo $q4;
$result = $con->query($q);
$result1=$con->query($q4);



// echo mysqli_num_rows($result);
// print_r($result1);

$count=0;
foreach($result as $r){
    // print_r($r);
    // foreach($result1 as $r1)
    // {
        if(mysqli_num_rows($result1) >= 1)
        {
         $count=1;   
        }
    // }
    // echo "<br>";
    if($count==0){
    $q1 = "insert into ia_marks1(`adm_no`,`usn`,`name`,`branch`,`sem`,`sec`,`sub`,`1a`,`1b`,`1c`,`2a`,`2b`,`2c`,`3a`,`3b`,`3c`,`4a`,`4b`,`4c`,`total1`) values ( \"" . $r["adm_no"] .  "\", \"" . $r["usn"] . "\", \"" . $r["fname"] . "\",  \"" . $branch . "\", \"" . $sem . "\", \"" . $sec . "\",\"" . $sub . "\", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
    $q2 = "insert into ia_marks2(`adm_no`,`usn`,`name`,`branch`,`sem`,`sec`,`sub`,`1a`,`1b`,`1c`,`2a`,`2b`,`2c`,`3a`,`3b`,`3c`,`4a`,`4b`,`4c`,`total2`) values ( \"" . $r["adm_no"] .  "\", \"" . $r["usn"] . "\", \"" . $r["fname"] . "\",  \"" . $branch . "\", \"" . $sem . "\", \"" . $sec . "\",\"" . $sub . "\", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
    $q3 = "insert into ia_marks3(`adm_no`,`usn`,`name`,`branch`,`sem`,`sec`,`sub`,`1a`,`1b`,`1c`,`2a`,`2b`,`2c`,`3a`,`3b`,`3c`,`4a`,`4b`,`4c`,`total3`) values ( \"" . $r["adm_no"] .  "\", \"" . $r["usn"] . "\", \"" . $r["fname"] . "\",  \"" . $branch . "\", \"" . $sem . "\", \"" . $sec . "\",\"" . $sub . "\", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
    $q4 = "insert into marks( `usn`, `name`, `branch`, `sem`, `sec`, `sub`,`att_avg`) values ( \"" . $r["usn"] . "\", \"" . $r["fname"] . "\",  \"" . $branch . "\", \"" . $sem . "\", \"" . $sec . "\",\"" . $sub . "\", 0)";
    // echo $q1 . '<br>';
    // echo $q2 . '<br>';
    // echo $q3 . '<br>';
    // echo '<br><br>';
    
    $con -> query($q1);
    $con -> query($q2);
    $con -> query($q3);
    $con->query($q4);
    }
}
header("Location: ia_marks1.php");
?>