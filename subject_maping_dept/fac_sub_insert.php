<?php

session_start();
require_once '../config.php';
error_reporting(0);
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

    $con =  $link;
        $fac_name= $_POST["faculty"];
        $sub_name=$_POST["subject"];
        // echo $fac_name . "------------------";
        // echo "<br><br>";
        $flag=0;
        $q1="select faculty_name from faculty_details";
      $q2="select sub_name from subjects";
    $result1=$con->query($q1);
    $result2=$con->query($q2);
    foreach($result1 as $r1)
    {
        // echo $r1["faculty_name"];
        // echo "<br><br>";
        if($r1["faculty_name"]==$fac_name)
        {
            
            $flag=1;
            break;
        }
        else
        {
            $flag=0;
        }
    }
    foreach($result2 as $r2)
    {
        echo $r2["sub_name"] . "<br>";
        if($r2["sub_name"]==$sub_name)
        {
            echo "1";
            $flag=1;
            break;
        }
        else
        {
            $flag=0;
        }
    }
    if($flag==0)
    {
        echo "flag is 0";
    }
    else
    {
        $q3="insert into faculty_mapping values(\"" . $fac_name . "\",\"" . $sub_name . "\" )";
        $result3=$con->query($q3);
        if($result3){
            $_SESSION["popup"]= 1;
            header("Location: faculty_subject_mapping.php");
        }
        else{
            $_SESSION["popup"]= 2;
            header("Location: faculty_subject_mapping.php");
        }
        

    }
    

?>