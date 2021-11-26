<?php include("../template/fac-auth.php");
include("../template/sidebar-fac.php");

$fac_sub = "SELECT sub_name FROM faculty_mapping WHERE faculty_name = \"" . $_SESSION['username'] . "\"";

$result = $link->query($fac_sub);

// if (isset($_POST['submit'])) {
//     $_SESSION['sub_name'] = $_POST['sub_name'];
// }
?>

<div class="container-fluid">
    <form action="../assignment/session1.php" method="post">
        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="sub">Subject</label>
                    <select class="form-control" name="sub_name" required>
                        <option selected disabled>Select Subject </option>
                        <?php foreach ($result as $row) { ?>

                            <option value="<?php echo $row['sub_name']; ?>"><?php echo $row['sub_name']; ?></option>

                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="sub"></label>
                    <div>
                        <button type="submit" class="btn btn-primary " name="submit">Submit</button>
                    </div>
                </div>

            </div>
    </form>


</div>

<?php include("../template/footer-fac.php") ?>