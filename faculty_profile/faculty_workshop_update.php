<?php
    require_once '../config.php';
$con = $link;
         session_start();
         $id = $_POST['id'];
             $faculty_id = $_POST['faculty_id'];
             $faculty_workshop_name =$_POST['faculty_workshop_name'];
             $faculty_workshop_title = $_POST['faculty_workshop_title'];
             $faculty_workshop_no_of_days = $_POST['faculty_workshop_no_of_days'];


             $q1 = "update faculty_workshop_details set faculty_workshop_name=\"" .  $faculty_workshop_name . "\",
                                                                 faculty_workshop_title=\"" .  $faculty_workshop_title . "\",
                                                                 faculty_workshop_no_of_days = \"" . $faculty_workshop_no_of_days . "\" WHERE faculty_id=\"" . $faculty_id  . "\"  and id = \"" . $id . "\" "; 
             
             
                                                        
            if($r = $con->query($q1))
            {
                header ("Location:faculty_login_profile_view.php");
            }
            else
            {
                echo "workshop Details Not Recorded";
            }
    
?>