<?php include("../template/fac-auth.php");
include("../template/sidebar-fac.php");

// echo $_SESSION['sub_name'];

$fac_assign = "select * from add_assignment where sub_name = \"" . $_SESSION['sub_name'] . "\" and fac_name = \"" . $_SESSION['username'] . "\"";
$sub_code = "select sub_code from subjects where sub_name = \"" . $_SESSION['sub_name'] . "\"";

$r = $link->query($sub_code);
$result = $link->query($fac_assign);

$q1 = "select distinct branch from students";
$q2 = "select distinct semester from students";
$q3 = "select distinct section from students";
$result1 = $link->query($q1);
$result2 = $link->query($q2);
$result3 = $link->query($q3);


// if (isset($_POST['submit'])) {

//     $_SESSION['assignment_no'] = $_POST['assignment_no'];
// }   
?>

<div class="container-fluid">
    <div class="row">
        <h3>Subject: <?php foreach ($r as $sub) {
                            echo $sub['sub_code'];
                        } ?>-<?php echo $_SESSION['sub_name'] ?></h3>
    </div>
    <form action="../assignment/session2.php" method="post">

        <!-- <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for=""></label>
                    <select class="form-control" name="sub_name" required hidden>
                        <option value="<?php echo $_SESSION['sub_name'] ?>" selected><?php echo $_SESSION['sub_name'] ?></option>
                    </select>
                </div>
            </div>
        </div> -->

        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="sub">Assignment No.</label>
                    <select class="form-control" name="assignment_no" required>
                        <option selected disabled>select assignment no. </option>
                        <?php foreach ($result as $row) { ?>

                            <option value="<?php echo $row["assignment_no"]; ?>"><?php echo $row["assignment_no"]; ?></option>

                        <?php } ?>
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


                            echo "<option value=\"" . $r["branch"] . "\"> " . $r["branch"] . "</option>";
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
                    <label for="sub">Section</label>
                    <select name="section" class="form-control">
                        <option selected>Select Section </option>
                        <?php

                        foreach ($result3 as $r) {


                            echo "<option value=\"" . $r["section"] . "\"> " . $r["section"] . "</option>";
                        }  ?>
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group" mt-3>
                    <label for="sub"></label>
                    <div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
<?php

?>

</div>


<?php include("../template/footer-fac.php") ?>