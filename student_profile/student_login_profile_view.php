<?php
include("../template/student_sidebar.php");
?>
<!-- page content start -->
<div>
    <?php
                $con = mysqli_connect("localhost", "root", "", "erp_alvas");
                if (mysqli_connect_error()) {
                    echo "error";
                } else {
                    $usn = $_SESSION["username"];
                    $que = "select * from students where usn=\"$usn\"";
                    $result = $con->query($que);
                    foreach ($result as $row) {
                ?>

    <div class="card" style="padding:3%;">
        <div class="row">

            <div class="col-lg-3 col-6 " style="margin-left: 2%;">

                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkkBpQ9U04geL7EKfAaXSxUCshUNLfDTKzlQ&usqp=CAU"
                    alt="" srcset="" width="80%" height="80%">

            </div>
            <div class="col-lg-8 col-6" style="text-align: center;">
                <div class="row">
                    <h3>
                        <span>
                            <?php echo $row["fname"] ?>
                            <?php echo $row["mname"] ?>
                            <?php echo $row["lname"] ?>
                        </span>
                    </h3>
                </div>
                <div class="row">

                    <span>
                        <?php echo $row["usn"] ?>
                    </span>

                </div>
                <div class="row">
                    <span class="value"><?php echo $row["email_id"] ?></span>
                </div>
                <div class="row">
                    <span class="value"><?php echo $row["mob_no"] ?></span>
                </div>
            </div>

        </div>
    </div>



    <div class="card mt-2" style="padding:3%;">

        <div class="row">

            <p style="font-style: italic;font-weight:600;color:black;">Basic Details</p>

            <div class="col col-lg-4 col-12 label mt-2">
                Admssion Number : <span class="value"><?php echo $row["adm_no"] ?></span>


            </div>

            <div class="col col-lg-4 col-12 label mt-2">
                Gender : <span class="value"><?php echo $row["gender"] ?></span>


            </div>

            <div class="col col-lg-4 col-12 label mt-2">
                Semester : <span class="value"><?php echo $row["semester"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                Section : <span class="value"><?php echo $row["section"] ?></span>


            </div>


            <div class="col col-lg-4 col-12 label mt-2">
                Branch : <span class="value"><?php echo $row["branch"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                Mobile Number :


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                Aadhar Number : <span class="value"><?php echo $row["aadhar"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                Date Of Admission : <span class="value"><?php echo $row["data_of_admission"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                Nationality : <span class="value"><?php echo $row["nationality"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                KCET : <span class="value"><?php echo $row["kcet"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                COME DK : <span class="value"><?php echo $row["comedk"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                JEE : <span class="value"><?php echo $row["jee"] ?></span>


            </div>
        </div>
        <div class="row mt-4">
            <p style="font-style: italic;font-weight:600;color:black;">Present Address</p>
            <div class="col col-lg-4 col-12 label ">
                District: <span class="value"><?php echo $row["present_state"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label ">
                District: <span class="value"><?php echo $row["present_dist"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label ">
                House Number: <span class="value"><?php echo $row["present_house_no_name"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                Post Village <span class="value"><?php echo $row["present_post_village"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2 ">
                Pin-Code: <span class="value"><?php echo $row["present_pincode"] ?></span>


            </div>
        </div>

        <div class="row mt-4">
            <p style="font-style: italic;font-weight:600;color:black;">Permanent Address</p>
            <div class="col col-lg-4 col-12 label ">
                District: <span class="value"><?php echo $row["permanent_state"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label ">
                District: <span class="value"><?php echo $row["permanent_dist"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label ">
                House Number: <span class="value"><?php echo $row["permanent_house_no_name"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                Post Village <span class="value"><?php echo $row["permanent_post_village"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2 ">
                Pin-Code: <span class="value"><?php echo $row["permanent_pin_code"] ?></span>


            </div>
        </div>
        <form action="student_view_edit.php" method="post">
            <button type="submit" class="btn" style="float: right;"><i class="fas fa-edit"></i></button>
        </form>
    </div>


    <?php
                    }
                } ?>



    <?php
                $con = mysqli_connect("localhost", "root", "", "erp_alvas");
                if (mysqli_connect_error()) {
                    echo "error";
                } else {
                    $usn = $_SESSION["username"];
                    $que = "select adm_no from students where usn=\"$usn\"";
                    $result = $con->query($que);
                   
                    foreach ($result as $row) {
                        $admission_no = $row["adm_no"];
                        $_SESSION["adm_no"]=$row["adm_no"];
                        $que = "select * from sslc_details where adm_no=\"$admission_no\"";
                        $re = $con->query($que);

                        foreach ($re as $r) {
                ?>


    <div class="card mt-3" style="padding:3%;">
        <div class="row">
            <p style="font-style: italic;font-weight:600;color:black;">SSLC Details</p>

            <div class="col col-lg-4 col-12 label mt-2">
                School Name : <span class="value"><?php echo $r["sslc_school"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                School Board : <span class="value"><?php echo $r["sslc_board_university"] ?></span>


            </div>


            <div class="col col-lg-4 col-12 label mt-2">
                SSLC Reg No : <span class="value"><?php echo $r["sslc_reg_no"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                SSLC Year :<span class="value"><?php echo $r["sslc_year"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                SSLC Max Marks: <span class="value"><?php echo $r["sslc_max_marks"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                SSLC Obtained Marks : <span class="value"><?php echo $r["sslc_obtained_marks"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                SSLC Percentage : <span class="value"><?php echo $r["sslc_percentage"] ?></span>


            </div>
            <form action="student_login_profile_sslc_edit.php" method="post">
                <button type="submit" class="btn" style="float: right;"><i class="fas fa-edit"></i></button>
            </form>
        </div>
    </div>

    <?php
                }
                    }
                } ?>



    <?php
                $con = mysqli_connect("localhost", "root", "", "erp_alvas");
                if (mysqli_connect_error()) {
                    echo "error";
                } else {
                    $usn = $_SESSION["username"];
                    $que = "select adm_no from students where usn=\"$usn\"";
                    $result = $con->query($que);
                   
                    foreach ($result as $row) {
                        $_SESSION["admission_no"] = $row["adm_no"];

                        $que = "select * from puc_details where adm_no=\"$admission_no\"";
                        $re = $con->query($que);

                        foreach ($re as $r) {
                ?>


    <div class="card mt-3" style="padding:3%;">
        <div class="row">
            <p style="font-style: italic;font-weight:600;color:black;">PUC Details</p>

            <div class="col col-lg-4 col-12 label mt-2">
                College Name : <span class="value"><?php echo $r["puc_school"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                Board : <span class="value"><?php echo $r["puc_board_university"] ?></span>


            </div>


            <div class="col col-lg-4 col-12 label mt-2">
                PUC Reg No : <span class="value"><?php echo $r["puc_reg_no"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                PUC Year :<span class="value"><?php echo $r["puc_year"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                PUC Max Marks: <span class="value"><?php echo $r["puc_max_marks"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                PUC Obtained Marks : <span class="value"><?php echo $r["puc_obtained_marks"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                PUC Percentage : <span class="value"><?php echo $r["puc_percentage"] ?></span>


            </div>

            <div class="col col-lg-4 col-12 label mt-2">
                PUC Phsics max marks : <span class="value"><?php echo $r["puc_phy_max_marks"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                PUC Phsics Obtainedmarks : <span class="value"><?php echo $r["puc_phy_obtained_marks"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                PUC Maths max marks : <span class="value"><?php echo $r["puc_maths_max_marks"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                PUC Phsics Obtained marks : <span class="value"><?php echo $r["puc_phy_obtained_marks"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                PUC Chemistrymax marks : <span class="value"><?php echo $r["puc_che_max_marks"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                PUC Chemistry Obtained marks : <span class="value"><?php echo $r["puc_phy_obtained_marks"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                PUC Elective max marks : <span class="value"><?php echo $r["puc_elective_max_marks"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                PUC Elective Obtained marks : <span class="value"><?php echo $r["puc_elective_obtained_marks"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                PUC Sub Total Marks : <span class="value"><?php echo $r["puc_sub_total_marks"] ?></span>


            </div>
            <div class="col col-lg-4 col-12 label mt-2">
                PUC Engineering Max Marks : <span class="value"><?php echo $r["puc_eng_obtained_marks"] ?></span>


            </div>

            <form action="student_login_profile_puc_edit.php" method="post">
                <button type="submit" class="btn" style="float: right;"><i class="fas fa-edit"></i></button>
            </form>
        </div>
    </div>

    <?php
                }
                    }
                } ?>




</div>
<!-- page content end -->
</div>
</div>
<?php
include("../template/student-footer.php");
?>