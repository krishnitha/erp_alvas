<?php
require_once "config1.php";

session_start();
$branch = $_SESSION["branch"];
    $sec = $_SESSION["sec"];
    $sem = $_SESSION["sem"];
    $sub = $_SESSION["sub"];
// echo $_POST["1a"];
// echo $_POST["usn"];
$cc = $_POST["cc"];
// print_r($_POST['att']);
$q5="select * from ia_marks1 where branch = \"" . $branch . "\" and sec = \"" . $sec . "\" and sem = \"" . $sem . "\" and sub = \"" . $sub . "\";";
$result1=$link->query($q5);
$c=[];
foreach($result1 as $r1)
{
    $c[]=$r1["usn"];
}
$b=array_diff($c,$_POST["att"]);
// print_r($b);
foreach($b as $a){
$q4="update ia_marks1 set att=0 where  usn = \""  . $a . "\" and branch = \"" . $branch . "\" and sec = \"" . $sec . "\" and sem = \"" . $sem . "\" and sub = \"" . $sub . "\";";
// echo $a;d
$link->query($q4);
// echo $a;
}
foreach($_POST["att"] as $d)
{
    $q4="update ia_marks1 set att=1 where  usn = \""  . $d . "\" and branch = \"" . $branch . "\" and sec = \"" . $sec . "\" and sem = \"" . $sem . "\" and sub = \"" . $sub . "\";";
    // echo $q4;
    $link->query($q4); 
}
for($i = 1; $i <= $cc; $i++){
    $total1 = (($_POST["1a" . $i]+$_POST["1b" . $i]+$_POST["1c" . $i])>($_POST["2a" . $i]+$_POST["2b" . $i]+$_POST["2c" . $i]))?($_POST["1a" . $i]+$_POST["1b" . $i]+$_POST["1c" . $i]):($_POST["2a" . $i]+$_POST["2b" . $i]+$_POST["2c" . $i]);

    $total2 = (($_POST["3a" . $i]+$_POST["3b" . $i]+$_POST["3c" . $i])>($_POST["4a" . $i]+$_POST["4b" . $i]+$_POST["4c" . $i]))?($_POST["3a" . $i]+$_POST["3b" . $i]+$_POST["3c" . $i]):($_POST["4a" . $i]+$_POST["4b" . $i]+$_POST["4c" . $i]);
    // echo $
    $q="update ia_marks1 set 1a=\"" . $_POST["1a" . $i]  . "\"
                                    ,1b=\"" . $_POST["1b" . $i]  . "\"
                                    ,1c=\"" . $_POST["1c" . $i]  . "\"
                                    ,2a=\"" . $_POST["2a" . $i]  . "\"
                                    ,2b=\"" . $_POST["2b" . $i]  . "\"
                                    ,2c=\"" . $_POST["2c" . $i]  . "\"
                                    ,3a=\"" . $_POST["3a" . $i]  . "\"
                                    ,3b=\"" . $_POST["3b" . $i]  . "\"
                                    ,3c=\"" . $_POST["3c" . $i]  . "\"
                                    ,4a=\"" . $_POST["4a" . $i]  . "\"
                                    ,4b=\"" . $_POST["4b" . $i]  . "\"
                                    ,4c=\"" . $_POST["4c" . $i]  . "\"
                                    ,total1=\"" . ($total1+$total2) . "\"
                                    where usn = \""  . $_POST["usn" . $i] . "\" and branch = \"" . $branch . "\" and sec = \"" . $sec . "\" and sem = \"" . $sem . "\" and sub = \"" . $sub . "\"";
    $reuslt=$con->query($q);
    // echo $q . "<br>";
}

header("Location: ia_marks1.php");

?>