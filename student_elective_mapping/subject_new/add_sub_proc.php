<?php
    require_once "../config.php";
    $branch = $_POST['branch'];
    $sem = $_POST['semester'];
    $sub_name = $_POST['sub_name'];
    $sub_code = $_POST['sub_code'];

    $type = $_POST['type'] ?? 0;
    
    $q = "insert into subjects values(\"" . $sub_name . "\",\"" . $sub_code . "\",\"" . $branch . "\",\"" . $sem . "\",\"" . $type . "\")";
    // echo $q;
    try{
        $link ->query($q);
        $_SESSION["popup"] = 1;
        header("Location: add_subjects.php");
        
    }
    catch(Exception $e){
        $_SESSION["popup"] = 2;
        header("Location: add_subjects.php");    
    }