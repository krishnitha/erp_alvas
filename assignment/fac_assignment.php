<?php include("../template/fac-auth.php");
include("../template/sidebar-fac.php");

require_once '../config.php';
?>

<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="Add-tab" data-toggle="tab" href="#Add_Assignments" role="tab" aria-controls="home" aria-selected="true">Add Assignment</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="View-tab" data-toggle="tab" href="#View_Assignments" role="tab" aria-controls="profile" aria-selected="false">View Assignment</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Add_Assignments" role="tabpanel" aria-labelledby="home-tab">
            <!-- add tab -->
            <div class="mt-3">
                <?php
                $q1 = "select distinct dept_name from dept_pso order by dept_name";
                $q2 = "select distinct semester from students";
                $q3 = "select distinct section from students";

                $result1 = $link->query($q1);
                $result2 = $link->query($q2);
                $result3 = $link->query($q3);
                $faculty_name = $_SESSION["username"];

                ?>

                <div class="container-fluid">
                    <form action="fac_assignment_add_upload.php" method="post" enctype="multipart/form-data">

                        <div class=" row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="sub">Subject</label>
                                    <select class="form-control" name="sub_name" required>
                                        <option value="" selected disabled hidden>Select Subject</option>
                                        <?php
                                        $qt = "select a.sub_name, a.sub_code,a.lab from faculty_mapping b, subjects a where b.faculty_name = \"" . $faculty_name . "\" and b.sub_name = a.sub_name";
                                        $resultst = $link->query($qt);
                                        echo $qt;
                                        foreach ($resultst as $r) {
                                            if ($r['lab'] == 0) {

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
                                    <select name="branch" class="form-control" required>
                                        <option selected value="" disabled>Select Branch </option>

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
                                    <select name="semester" class="form-control" required>
                                        <option selected value="" disabled>Select Semester </option>
                                        <?php

                                        foreach ($result2 as $r) {


                                            echo "<option value=\"" . $r["semester"] . "\"> " . $r["semester"] . "</option>";
                                        }  ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sub">Section</label>
                                    <select name="section" class="form-control" required>
                                        <option value="" selected>Select Section </option>
                                        <?php

                                        foreach ($result3 as $r) {


                                            echo "<option value=\"" . $r["section"] . "\"> " . $r["section"] . "</option>";
                                        }  ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Asno">Assignment No. </label>
                                    <select class="form-control" name="assignment_no" required>
                                        <option selected value="" disabled>Select assignment no. </option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">

                                    <label for="" data-bs-toggle="tooltip" data-bs-placement="top" title="Use ctrl key for multiple select">CO's</label>

                                    <select class="form-control" name="co_no[]" required multiple>
                                        <option selected value="" disabled>Select CO's</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>

                                </div>
                            </div>



                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="last_date">Last Date:</label>
                                    <input type="date" class="form-control" id="last_date" name="last_date" required>
                                </div>
                            </div>
                        </div>

                        <div class="col col-sm-3 col-md-3 mt-3">
                            <!-- actual upload which is hidden -->
                            <label for="actual-btn">Assignment PDF</label> <br>
                            <input type="file" name="pdf" id="actual-btn" hidden required />

                            <!-- our custom upload button -->
                            <label class="label1" for="actual-btn">Choose File</label>
                            <input type="hidden" name="MAX_FILE_SIZE" required value="100000">
                            <!-- name of file chosen -->
                            <span id="file-chosen">No file chosen</span>
                            <!-- UPLOAD: <input type="file" name="ufile" id=""> -->
                            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                            <!-- <input type="submit" name="submit" value="UPLOAD" > -->
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group mt-5">
                                    <label for=""></label>
                                    <button type="submit" id="submitBtn" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <script>
                    const actualBtn = document.getElementById('actual-btn');

                    const fileChosen = document.getElementById('file-chosen');

                    actualBtn.addEventListener('change', function() {
                        fileChosen.textContent = this.files[0].name
                    })
                </script>


            </div>
            <!-- add tab end -->
        </div>
        <div class="tab-pane fade" id="View_Assignments" role="tabpanel" aria-labelledby="profile-tab">
            <!-- view tab -->
            <div class="mt-3">
                <?php
                // $fac_sub = "SELECT sub_name FROM faculty_mapping WHERE faculty_name = \"" . $_SESSION['username'] . "\"";
                $fac_det = "select * from add_assignment where fac_name =  \"" . $_SESSION['username'] . "\" order by sub_name";
                
                $result = $link->query($fac_det);
                if(mysqli_num_rows($result) < 1)
                {
                    echo "<h1>Assignment Not Added</h1>";
                }

                $q1 = "select distinct branch from students";
                $q2 = "select distinct semester from students";
                $q3 = "select distinct section from students";

                $result1 = $link->query($q1);
                $result2 = $link->query($q2);
                $result3 = $link->query($q3);

                ?>

                <div class="container-fluid">


                    <?php foreach ($result as $row) { ?>
                        <form action="../assignment/fac_assignment_add_update.php" method="POST">

                            
                            <div class=" row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="sub">Subject</label>
                                        <select class="form-control" name="sub_name" required>
                                            <option value="<?php echo $row['sub_name']; ?>" selected>
                                                <?php echo $row['sub_name']; ?></option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Asno">Assignment No. </label>
                                        <select class="form-control" name="assignment_no">
                                            <option value="<?php echo $row['assignment_no']; ?>" selected>
                                                <?php echo $row['assignment_no']; ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="sub">Semester</label>
                                        <select class="form-control" name="semester" required>
                                            <option selected value="<?php echo $row["semester"]; ?>" ><?php echo $row["semester"]; ?></option>


                                            <?php

                                            foreach ($result2 as $r) {


                                                echo "<option value=\"" . $r["semester"] . "\"> " . $r["semester"] . "</option>";
                                            }  ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="sub">Section</label>
                                        <select class="form-control" name="section" required>
                                            <option selected value="<?php echo $row["section"]; ?>" >
                                                <?php echo $row["section"]; ?></option>
                                            <?php

                                            foreach ($result3 as $r) {


                                                echo "<option value=\"" . $r["section"] . "\"> " . $r["section"] . "</option>";
                                            }  ?>   

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="" data-bs-toggle="tooltip" data-bs-placement="top" title="Use ctrl key for multiple select">CO's</label>

                                        <select class="form-control" name="co_no[]" required multiple>
                                            <option selected value="<?php echo $row["co_no"]; ?>">
                                                <?php echo $row["co_no"]; ?></option>

                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="last_date">Last Date:</label>
                                        <input type="date" class="form-control" id="last_date" name="last_date" value="<?php echo $row["last_date"]; ?>">
                                    </div>
                                </div>



                                <div class="col-md-2 mt-4">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <?php
                                        $s = $row['file_name'];
                                        $res = "../upload/" . $s;
                                        ?>

                                        <a href="<?php echo $res ?>" target="_blank">
                                            <button type="button" class="btn btn-success">Assginment view</button>
                                        </a>

                                    </div>
                                </div>
                                <input type="text" name="branch" id="" value="<?php echo $row['branch']; ?>" hidden>
                                <input type="text" name="fac_name" id="" value="<?php echo $row['fac_name']; ?>" hidden>
                                <div class="col-md-2 mt-4">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>

                            </div>


                        </form>
                        <form action="../assignment/fac_assignment_delete.php" method="POST">
                            <select class="form-control" name="section" required hidden>
                                <option selected value="<?php echo $row["section"]; ?>"><?php echo $row["section"]; ?>
                                </option>

                            </select>

                            <select class="form-control" name="semester" required hidden>
                                <option selected value="<?php echo $row["semester"]; ?>"><?php echo $row["semester"]; ?>
                                </option>
                            </select>

                            <select class="form-control" name="sub_name" required hidden>
                                <option value="<?php echo $row['sub_name']; ?>" selected></option>
                            </select>


                            <select class="form-control" name="assignment_no" hidden>
                                <option value="<?php echo $row['assignment_no']; ?>" selected></option>
                            </select>

                            <select class="form-control" name="branch" hidden>
                                <option value="<?php echo $row['branch']; ?>" selected></option>
                            </select>

                            <select class="form-control" name="file_name" hidden>
                                <option value="<?php echo $row['file_name']; ?>" selected></option>
                            </select>


                            <div class="col-md-2 mt-4">
                                <div class="form-group">
                                    <label for=""></label>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>

                        </form>
                        <hr>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- view tab end -->
    </div>
</div>
<script type="text/JavaScript">
    var add_assignment = "<?php echo $_SESSION['add_assignment'] ?? "" ?>";
        var assignment_update = "<?php echo $_SESSION['assignment_update'] ?? "" ?>";

    if(add_assignment == "success"){
        <?php $_SESSION['add_assignment'] = "" ?>
        alert("Assignment added successfully");
    }
    else if(add_assignment == "failed"){
        <?php $_SESSION['add_assignment'] = "" ?>
        alert("Assignment already exists");
    }
    else if(assignment_update == "success"){
        <?php $_SESSION['assignment_update'] = "" ?>
        alert("Assignment Updation Successful");
    }
    else if(assignment_update == "failed")
    {
        <?php $_SESSION['assignment_update'] = "" ?>
        alert("Assignment already updation failed!!!");
    }  
</script>

<?php include("../template/footer-fac.php") ?>