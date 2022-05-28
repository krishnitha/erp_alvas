<?php include("../template/fac-auth.php");
include("../template/sidebar-fac.php");

error_reporting(0);


$fac_sub = "SELECT sub_name FROM faculty_mapping WHERE faculty_name = \"" . $_SESSION['username'] . "\"";
$fac_sub = "SELECT sub_name FROM faculty_mapping WHERE faculty_name = \"" . $_SESSION['username'] . "\"";

$result = $link->query($fac_sub);

$q1 = "select distinct dept_name from dept_pso order by dept_name";
$q2 = "select distinct semester from students";
$q3 = "select distinct section from students";
$result1 = $link->query($q1);
$result2 = $link->query($q2);
$result3 = $link->query($q3);
$faculty_name = $_SESSION["username"];
?>



<div class="container-fluid">
    <form action="../assignment/excel_session.php" method="post">
        <div class=" row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="sub">Subject</label>
                    <select class="form-control" name="sub_name" required>
                        <option selected disabled>Select Subject </option>
                        <?php
                                        $qt = "select a.sub_name, a.sub_code,a.lab from faculty_mapping b, subjects a where b.faculty_name = \"" . $faculty_name . "\" and b.sub_name = a.sub_name";
                                        $resultst = $link->query($qt);
                                        echo $qt;
                                        foreach ($resultst as $r) {
                                            if($r['lab'] == 0)
                                               {

                                                   ?>
                                            <option class="form-control" value="<?php echo $r["sub_code"] . " - " . $r["sub_name"] ?>">
                                                <?php echo $r["sub_code"] . " - " . $r["sub_name"] ?></option>
                                                <?php }
                                             } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="sub">Branch</label>
                    <select name="branch" class="form-control">
                        <option selected disabled>Select Branch </option>

                        <?php

                        foreach ($result1 as $r) {


                            echo "<option value=\"" . $r["dept_name"] . "\"> " . $r["dept_name"] . "</option>";
                        }  ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="sub">Semester</label>
                    <select name="semester" class="form-control">
                        <option selected disabled>Select Semester </option>
                        <?php

                        foreach ($result2 as $r) {


                            echo "<option value=\"" . $r["semester"] . "\"> " . $r["semester"] . "</option>";
                        }  ?>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="section">Section</label>
                    <select name="section" id = "section" class="form-control">
                        <option selected disabled>Select Section </option>
                        <?php

                        foreach ($result3 as $r) {


                            echo "<option value=\"" . $r["section"] . "\"> " . $r["section"] . "</option>";
                        }  ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group mt-4">
                    <label for=""></label>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>


        </div>
    </form>


</div>


<?php include("../template/footer-fac.php") ?>