<?php
require_once "../config.php";
$con=$link;
error_reporting(0);
include(
"../template/stud_auth.php");
include("../template/student_sidebar.php");

?>
            <div>
                
                <h4>IA1 Marks</h4>
                <table class="table table-responsive">
                    <tbody>
                        <tr>
                           
                            <th>Subjects</th>
                            <th>Total</th>
                            <th>Attendance</th>

                        </tr>
                        <?php
                        
                            $usn = $_SESSION["username"];
                            $que = "select * from marks where usn=\"$usn\"";
                            // echo $que;
                            $result = $con->query($que);
                            foreach ($result as $row) {
                              
                        ?>

                                <tr>
                                    
                                    <td>
                                        <?php echo $row["sub"] ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $row["ia1"] ?>
                                    </td>
                                    <td><?php echo $row["att_avg"] ?></td>
                                </tr>



                        <?php
                            }
                        ?>
                    </tbody>
                </table>


                <h4>IA2 Marks</h4>
                <table class="table table-responsive">
                    <tbody>
                        <tr>
                            
                            <th>Subjects</th>
                            
                            <th>Total</th>
                            <th>Attendance</th>

                        </tr>
                        <?php
                        
                            $usn = $_SESSION["username"];
                            $que = "select * from marks where usn=\"$usn\"";
                            $result = $con->query($que);
                            foreach ($result as $row) {
                        ?>

                                <tr>
                                    
                                    <td>
                                        <?php echo $row["sub"] ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $row["ia2"] ?>
                                    </td>
                                    <td><?php echo $row["att_avg"] ?></td>
                                </tr>


                        <?php
                            }
                        ?>
                    </tbody>
                </table>


                <h4>IA3 Marks</h4>
                <table class="table table-responsive">
                    <tbody>
                        <tr>
                            
                            <th>Subjects</th>
                            
                            <th>Total</th>
                            <th>Attendance</th>

                        </tr>

                        <?php
                       
                            $usn = $_SESSION["username"];
                            $que = "select * from marks where usn=\"$usn\"";
                            $result = $con->query($que);
                            foreach ($result as $row) {
                        ?>

                                <tr>
                                   
                                    <td>
                                        <?php echo $row["sub"] ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $row["ia3"] ?>
                                    </td>
                                    <td><?php echo $row["att_avg"] ?></td>
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