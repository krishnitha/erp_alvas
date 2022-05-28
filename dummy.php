<?php 
    require_once 'config.php';
    
    $q = 'select * from lab_marks';
    $result = $link->query($q);
    foreach($result as $r){
        $avg = ceil($r['exp_avg']);
        $q2 = 'update lab_marks set exp_avg = "' . $avg . '" where usn = "' . $r['usn'] . '" and sub = "' . $r['sub'] . '"';
        // echo $q2;
        $link->query($q2);
    }
    $q3 = 'delete from lab_marks where sub = ""';
    $link->query($q3);
?>

