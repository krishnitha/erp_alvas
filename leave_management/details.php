<?php
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
                            <th>Present class</th>
                            <th>Total class</th>
                            <th>Attendance %</th>
                            <th>Detail</th>
                        </tr>
                        <?php

                            $s='select * from students where usn="' . $_SESSION["username"] . '"';
                            // echo $s;
                            $res = $link->query($s);
                            $res = mysqli_fetch_assoc($res);
                            $usn = $_SESSION["username"];
                            $que = "select * from attendance where usn=\"" . $usn . "\" and sem=\"" . $res["semester"] . "\" order by subject ASC";
                            // echo $que;
                            $result = $con->query($que);
                            foreach ($result as $row) {
                              
                        ?>

                                <tr>
                                    
                                    <td>
                                        <?php echo $row["subject"] ?>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="../leave_management/info.php"><button type="button" class="btn btn-info">Info</button></td>
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