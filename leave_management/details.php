<?php
require_once "../config.php";
$con=$link;

include("../template/student_sidebar.php");

?>
            <div>
                
                <h2 style="text-align:center">Leave Details</h2><br>
                <table class="table table-responsive">
                    <tbody>
                        <tr>
                           
                            <th>Subject</th>
                            <th>Present class</th>
                            <th>Total class</th>
                            <th>Attendance %</th>
                            <th>Detail</th>
                        </tr>
                        <?php
                        
                            $usn = $_SESSION["username"];
                            $que = "select * from attendance where usn=\"$usn\"";
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
                                    <td><button type="button" class="btn btn-info">Info</button></td>
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