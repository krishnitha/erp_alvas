<?php
require_once "../config.php";
$con=$link;

include("../template/student_sidebar.php");
?>
<div>
    <h4 style="text-align:center">Medical Leave Details</h4><br>
</div>
<div style="margin-left:5%;margin-right:5%">
    <table class="table table-responsive table-borderless">
        <?php

            $s='select * from students where usn="' . $_SESSION["username"] . '"';
            // echo $s;
            $res = $link->query($s);
            $res = mysqli_fetch_assoc($res);
            $usn = $_SESSION["username"];
            $que = "select * from student_medical_leave where usn=\"" . $usn . "\" and sem=\"" . $res["semester"] . "\" order by applied_date ASC";
            // echo $que;
            $result = $con->query($que);
            if($result->num_rows > 0){
        ?>
                <tr>
                    <th>Applied On</th>
                    <th>Reason</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                    <th>Document</th>
                </tr>

            <?php
                foreach ($result as $row) 
                {                      
            ?>
            
                    <tr>
                        <td><?php echo $row["applied_date"] ?></td>
                        <td><?php echo $row["reason"] ?></td>
                        <td><?php echo $row["from_date"] ?></td>
                        <td><?php echo $row["to_date"] ?></td>
                        <td>
                            <?php 
                                if($row["status"]==1)
                                {
                                    echo "Accepted";
                                }
                                else if($row["status"]==2)
                                {
                                    echo "Rejected"; 
                                }
                                else
                                {
                                    echo "Pending";
                                }
                            ?>
                        </td>
                        <td><a href="<?php echo $row["doc_name"]; ?>" target="_blank" style="color:blue">View</a>
                    </tr>
        <?php
                }
            }
            else
            {
        ?>

                    <tr style="text-align:center">
                        <th>Applied On</th>
                        <th>Reason</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                        <th>Document</th>
                    </tr>
                    <tr style="text-align:center;font-size:30px">
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                    </tr>
        <?php
            }
        ?>
    </table>
</div>
<div class="text-center" style="margin-top:30px">
    <a href="../student_leave_management/medicalapply.php"><button  type="button" class="btn btn-info">Apply New</button></a>
</div>
<?php
include("../template/student-footer.php");
?>