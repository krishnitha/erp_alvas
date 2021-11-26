<?php 
require_once "config.php";
session_start();
$temp=1;
$_SESSION["temp"]=$temp;
    $se="select " . $_SESSION["date3"] . " from attendance where sem=\"" . $_SESSION["sem"] . "\" and section=\"" . $_SESSION["sec"] . "\" and usn=\"" . $_POST["usn"] . "\"and subject=\"" . $_SESSION["sub"] . "\";";
    // echo $se;
    $date3=$_SESSION["date3"];
    $res=$link->query($se);
    $mark= $res->fetch_assoc();
    
    print_r($_POST["a"]);
    echo "<br>";
    echo "<br>";
    // print_r($_POST["b"]);
    $q3="select usn from attendance where sem=\"" . $_SESSION["sem"] . "\" and section=\"" . $_SESSION["sec"] . "\"and subject=\"" . $_SESSION["sub"] . "\";";
    $result1=$link->query($q3);
    foreach($result1 as $r2){
    $c[]=$r2["usn"];
    
    }
    echo "<br>";
    // print_r($c);
    $res1=array_diff($c,$_POST["a"]);
    print_r($res1);
    foreach($res1 as $s)
    {
    
            
        
            $q1="update attendance set " . $date3 . "=0 where usn=\"" . $s . "\";";
            // echo $q1;
            $link->query($q1);
    }
    foreach($_POST["a"] as $w)
    {
        $q6="update attendance set " . $date3 . "=1 where usn=\"" . $w . "\";";
            // echo $q1;
            $link->query($q6);
    }
    // if(empty($c))
    // {

    //     $q2="update attendance set " . $date3 . "=1 where usn=\"" . $s . "\";";
    // }
        
        

    header("Location: Add_Attendence.php")

    
?>