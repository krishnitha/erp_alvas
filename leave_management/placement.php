<?php
require_once "../config.php";
$con=$link;

include("../template/student_sidebar.php");
?>
<div>
    <h4 style="text-align:center">Placement Details</h4><br>
</div>
<div style="margin-left:5%;margin-right:5%">
    <table class="table table-responsive table-borderless">
    <?php

        $s='select * from students where usn="' . $_SESSION["username"] . '"';
        // echo $s;
        $res = $link->query($s);
        $res = mysqli_fetch_assoc($res);
        $usn = $_SESSION["username"];
        $que = "select * from student_placement_leave where usn=\"" . $usn . "\" and sem=\"" . $res["semester"] . "\" order by applied_date ASC";
        // echo $que;
        $result = $con->query($que);
        if($result->num_rows > 0){
        ?>
            <tr>
                <th>Applied On</th>
                <th>Company Name</th>
                <th>Date</th>
                <th>Time From</th>
                <th>Time To</th>
                <th>Rounds Cleared </th>
                <th>Document</th>
            </tr>
            <?php
            foreach ($result as $row) 
            {                      
            ?>
            <tr>
                <td><?php echo $row["applied_date"] ?></td>
                <td><?php echo $row["company_name"] ?></td>
                <td><?php echo $row["place_date"] ?></td>
                <td><?php echo $row["from_time"] ?></td>
                <td><?php echo $row["to_time"] ?></td>
                <td><?php echo $row["rounds"] ?></td>
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
                <th>Company Name</th>
                <th>Date</th>
                <th>Time From</th>
                <th>Time To</th>
                <th>Rounds Cleared </th>
                <th>Document</th>
            </tr>
            <tr style="text-align:center;font-size:30px">
                <td> - </td>
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
<a href="../leave_management/placementapply.php"><button  type="button" class="btn btn-info">Apply New</button></a>
</div>
<?php
include("../template/student-footer.php");
?>
