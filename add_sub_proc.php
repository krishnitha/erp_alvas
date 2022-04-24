<?php
require_once "./config.php";
$con = $link;

    session_start();
    $branch=$_POST['branch'];
    $sem=$_POST['semester'];
    $sub_name = $_POST['sub_name'];
    $sub_code = $_POST['sub_code'];

    $elective = 0;
    // echo $_POST['elective'];
    if(!empty($_POST['elective'])){
    if($_POST['elective'] == 'on')
        $elective = 1;
    }

    $q = "insert into subjects (`sub_name`,`sub_code`,`elective`,`branch`,`sem`) values(\"" . $sub_name . "\",\"" . $sub_code . "\",\"" . $elective . "\",\"" . $branch . "\",\"" . $sem . "\")";
    // echo $q;
    try{
        $con ->query($q);
        $_SESSION["popup"] = 1;
        header("Location: subject_maping/add_sub.php");
        
    }
    catch(Exception $e){
        $_SESSION["popup"] = 2;
        header("Location: subject_maping/add_sub.php");
        
    }

    



?>