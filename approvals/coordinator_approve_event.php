<?php
    require_once "../config.php";

    $id = $_POST["id"];
    if(isset($_POST['approve']))
    {
    	$link -> query('update student_event_leave set coordinator_status=1 where id=' . $id . '');
    }

    if(isset($_POST['reject']))
    {
    	$link -> query('update student_event_leave set coordinator_status=2 where id=' . $id . '');
    }


    header("Location: class_coordinator_approvals.php");

?>