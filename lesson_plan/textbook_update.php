<?php

    require_once "../section_creation/config.php";

    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $t3 = $_POST['t3'];

    $sub = $_POST['sub'];

    $q = 'update co set t1 = "' . $t1 . '", t2 = "' . $t2 . '", t3 = "' . $t3 . '" where sub = "' . $sub . '"';
    $con->query($q);
    header("Location: display.php");
?>