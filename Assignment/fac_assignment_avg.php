<?php include("../template/fac-auth.php");
include("../template/sidebar-fac.php");



$fac_sub = "SELECT sub_name FROM faculty_mapping WHERE faculty_name = \"" . $_SESSION['username'] . "\"";

$result = $link->query($fac_sub);


?>



<div class="container-fluid">
    <form action="../assignment/fac_assignment_avg_marks.php" method="post">
        <div class=" row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="sub">Subject</label>
                    <select class="form-control" name="sub_name" required>
                        <option selected disabled>Select Subject </option>
                        <?php foreach ($result as $row) { ?>

                            <option value="<?php echo $row["sub_name"]; ?>"><?php echo $row["sub_name"]; ?></option>

                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="sub">Semester</label>
                    <select class="form-control" name="semester" required>
                        <option selected disabled>Select Semester </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="sub">Section</label>
                    <select class="form-control" name="section" required>
                        <option selected disabled>Select Semester </option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>

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