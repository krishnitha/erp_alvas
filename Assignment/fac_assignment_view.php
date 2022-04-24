<?php include("../template/fac-auth.php");
include("../template/sidebar-fac.php");

// $fac_sub = "SELECT sub_name FROM faculty_mapping WHERE faculty_name = \"" . $_SESSION['username'] . "\"";
$fac_det = "select * from add_assignment where fac_name =  \"" . $_SESSION['username'] . "\" order by sub_name";
//  echo $fac_sub;
$result = $link->query($fac_det);

?>

<div class="container-fluid">


    <?php foreach ($result as $row) { ?>
        <form action="../assignment/fac_assignment_add_update.php" method="POST">


            <div class=" row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="sub">Subject</label>
                        <select class="form-control" name="sub_name" required>
                            <option value="<?php echo $row['sub_name']; ?>" selected><?php echo $row['sub_name']; ?></option>
                        </select>
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-group">
                        <label for="Asno">Assignment No. </label>
                        <select class="form-control" name="assignment_no">
                            <option value="<?php echo $row['assignment_no']; ?>" selected><?php echo $row['assignment_no']; ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="sub">Semester</label>
                        <select class="form-control" name="semester" required>
                            <option selected value="<?php echo $row["semester"]; ?>"><?php echo $row["semester"]; ?></option>


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
                            <option selected value="<?php echo $row["section"]; ?>"><?php echo $row["section"]; ?></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>

                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">CO's</label>

                        <select class="form-control" name="co_no" required>
                            <option selected value="<?php echo $row["co_no"]; ?>"><?php echo $row["co_no"]; ?></option>
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
                        $res = "../upload/assignment/" . $s;
                        ?>
                        <button type="submit" class="btn btn-success">
                            <a href="<?php echo $res ?>" target="_blank">Assginment view</a>
                        </button>
                    </div>
                </div>

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
                <option selected value="<?php echo $row["section"]; ?>"><?php echo $row["section"]; ?></option>

            </select>

            <select class="form-control" name="semester" required hidden>
                <option selected value="<?php echo $row["semester"]; ?>"><?php echo $row["semester"]; ?></option>
            </select>
            <select class="form-control" name="sub_name" required hidden>
                <option value="<?php echo $row['sub_name']; ?>" selected></option>
            </select>


            <select class="form-control" name="assignment_no" hidden>
                <option value="<?php echo $row['assignment_no']; ?>" selected></option>
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

<?php include("../template/footer-fac.php") ?>