<?php
include "../template/fac-auth.php";
include "../template/sidebar-fac.php";
error_reporting(0);

$q1 = 'select * from coordinator where name = "'. $_SESSION["username"] .'"';
$res = $link -> query($q1);
$r = mysqli_fetch_assoc($res);

$ql = 'select * FROM student_medical_leave as s WHERE coordinator_status = 0 and (select branch from students where usn = s.usn) = (select faculty_dept from faculty_details WHERE faculty_name = "' . $_SESSION["username"] . '")';
$resm = $link -> query($ql);

$qe = 'select * FROM student_event_leave as s WHERE coordinator_status = 0 and (select branch from students where usn = s.usn) = (select faculty_dept from faculty_details WHERE faculty_name = "' . $_SESSION["username"] . '")';
$rese = $link -> query($qe);

$qp = 'select * FROM student_placement_leave as s WHERE status = 0 and (select branch from students where usn = s.usn) = (select faculty_dept from faculty_details WHERE faculty_name = "' . $_SESSION["username"] . '")';
$resp = $link -> query($qp);
?>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gabriela&display=swap" rel="stylesheet">
<div class="container">
    <div class="row">
        <h4 style="text-align:center; margin-top: 30px;  font-family: 'Gabriela', serif;">Medical Leave</h4>
        <table class="table table-responsive table-striped mt-3" style="margin-top: 20px;">
        <?php
            $found1=0;
            foreach ($resm as $row) {
                $st = 'select * from students where usn = "' . $row["usn"] . '"';
                $s = $link->query($st);
                $s2 = mysqli_fetch_assoc($s);    
                $class = $s2["semester"]."-".$s2["section"];
                if($class == $r["class_cordinator"]){
                    if($found1==0){
        ?>
                        <tr>
                            <th scope="col" style="width: 10%;">USN</th>
                            <th scope="col" style="width: 10%;">Name</th>
                            <th scope="col" style="width: 10%;">Reason</th>
                            <th scope="col" style="width: 10%;">View</th>
                        </tr>
        <?php
                    }
        ?>
                    <tr>
                        <td><?php echo $row["usn"] ?></td>
                        <td><?php echo $s2["fname"] ?></td>
                        <td><?php echo $row["reason"] ?></td>
                        <td><a href="../approvals/coordinator_view_medical.php?id=<?php echo $row["id"]; ?>">
                        <button type="button" class="btn btn-info">View</button></td>
                    </tr>
        <?php
                    $found1 = 1;
            }
        }
        if($found1==0){
            echo '<h5><center> No Leave Applied </center></h5>';
        }
        ?>
       </table>
        <h4 style="text-align:center;margin-top: 40px;  font-family: 'Gabriela', serif;">Event Leave</h4>
        <table class="table table-responsive table-striped mt-3" style="margin-top: 20px;">
        <?php
            $found2=0;
            foreach ($rese as $row) {
                $st = 'select * from students where usn = "' . $row["usn"] . '"';
                $s = $link->query($st);
                $s2 = mysqli_fetch_assoc($s);    
                $class = $s2["semester"]."-".$s2["section"];
                if($class == $r["class_cordinator"]){
                    if($found2==0){
        ?>
                        <tr>
                            <th scope="col" style="width: 10%;">USN</th>
                            <th scope="col" style="width: 10%;">Name</th>
                            <th scope="col" style="width: 10%;">Event Name</th>
                            <th scope="col" style="width: 10%;">View</th>
                        </tr>
        <?php
                    }
        ?>
                    <tr>
                        <td><?php echo $row["usn"] ?></td>
                        <td><?php echo $s2["fname"] ?></td>
                        <td><?php echo $row["event_name"] ?></td>
                        <td><a href="../approvals/coordinator_view_event.php?id=<?php echo $row["id"]; ?>">
                        <button type="button" class="btn btn-info">View</button></td>
                    </tr>
        <?php
                    $found2 = 1;
            }
        }
        if($found2==0){
            echo '<h5><center> No Leave Applied </center></h5>';
        }
        ?>
        </table>
            
        <h4 style="text-align:center; margin-top: 40px; font-family: 'Gabriela', serif;">Placement Leave</h4>
        <table class="table table-responsive table-striped mt-3" style="margin-top: 20px;">
        <?php
            $found3=0;
            foreach ($resp as $row) {
                $st = 'select * from students where usn = "' . $row["usn"] . '"';
                $s = $link->query($st);
                $s2 = mysqli_fetch_assoc($s);    
                $class = $s2["semester"]."-".$s2["section"];
                if($class == $r["class_cordinator"]){
                    if($found3==0){
        ?>
                        <tr>
                            <th scope="col" style="width: 10%;">USN</th>
                            <th scope="col" style="width: 10%;">Name</th>
                            <th scope="col" style="width: 10%;">Company Name</th>
                            <th scope="col" style="width: 10%;">View</th>
                        </tr>
        <?php
                    }
        ?>
                    <tr>
                        <td><?php echo $row["usn"] ?></td>
                        <td><?php echo $s2["fname"] ?></td>
                        <td><?php echo $row["company_name"] ?></td>
                        <td><a href="../approvals/view_placement_leave.php?id=<?php echo $row["id"]; ?>">
                            <button type="button" class="btn btn-info">View</button></td>
                    </tr>
        <?php
                    $found3 = 1;
            }
        }
        if($found3==0){
            echo '<h5><center> No Leave Applied </center></h5>';
        }
        ?>
        </table>
    </div>
</div>


<?php
include "../template/footer-fac.php";
?>