<?php
include("../template/stud_auth.php");
error_reporting(0);
require_once "../config.php";
$con=$link;
include("../template/student_sidebar.php");
?>
            <div>
                
                <h5 style="text-align:center">Leave Details</h5><br>
                <table class="table table-responsive table-borderless">
                    <tbody>
                        <tr>
                            <th>Subject</th>
                            <th>Classes Attended</th>
                            <th>Total class</th>
                            <th>Attendance %</th>
                            <th>Detail</th>
                        </tr>
                        <?php
                            $s='select * from students where usn="' . $_SESSION['username'] . '"';
                            $res = $link->query($s);
                            $res = mysqli_fetch_assoc($res);
                            $usn = $_SESSION["username"];
                            $que = "select * from attendance_new where usn=\"" . $usn . "\" and sem=\"" . $res["semester"] . "\" order by subject ASC";
                            $result = $con->query($que);
                            foreach ($result as $row) {
                                $s1='select * from sem_start_end where sem="' . $row["sem"] . '"';
                                $r1 = $link->query($s1);
                                $res1 = mysqli_fetch_assoc($r1);
                                $date1=str_replace("-","_",$res1["start"]);
                                $date2=str_replace("-","_",$res1["end"]);
                                $sub=$row["sub"];
                                $q6="SELECT Column_Name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME=\"attendance\" and COLUMN_NAME BETWEEN '" . $date1 . "' and '" . $date2 . "'";
                                $result6=$link->query($q6);
                                echo mysqli_num_rows($result6);
                            ?>
                                <tr>
                                    <td><?php echo $row["sub"] ?></td>
                                    <td><?php echo $c1 ?></td>
                                    <td><?php echo $abs ?></td>
                                    <td><?php echo $avg ?></td>
                                    <td><a href="../student_leave_management/info.php?sub=<?php echo $row["sub"]; ?>"><button type="button" class="btn btn-info">Info</button></td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>



                <!-- <h1>you have logged in as Student <?php echo $_SESSION["username"] ?></h1> -->


            </div>
            <!-- page content end -->
            <?php
include("../template/student-footer.php");
?>