<?php
include "../template/fac-auth.php";
include "../template/sidebar-fac.php";
require "../Classes/PHPExcel.php";
require_once "../config.php";
// include "../template/fac-auth.php";
// session_start();

$_SESSION['feedback_name'] = $_POST['feedback_name'];
$_SESSION['semester'] = $_POST['semester'];
$_SESSION['section'] = $_POST['section'];

if ($_SESSION['feedback_name'] == 'curriculum_feedback') {
    // echo '<script>window.location.replace("download_feed.php");</script>';
    header("Location: download_curr.php");

} else if ($_SESSION['feedback_name'] == 'course_wise_2'){
    $dept = 'select faculty_dept from faculty_details where faculty_name="' . $_SESSION['username'] . '"';
    $r_dept = mysqli_fetch_assoc($link->query($dept));
    $q = 'select sub_name,sub_code from subjects where branch="' . $r_dept['faculty_dept'] . '"and sem="' . $_SESSION['semester'] . '"';
    $r = $link->query($q);

?>
    <form action="download_cw2.php" method="post">
        <div class="row m-5">
            <div class="col col-8 col-md-8 col-lg-8">
                <select name="sub" id="" class='form-control' required>
                    <option value="" selected disabled>Select Subject</option>
                    <?php

                    foreach ($r as $s) {
                    ?>
                        <option value="<?php echo $s['sub_code'] . ' - ' . $s['sub_name'] ?>"><?php echo $s['sub_code'] . ' - ' . $s['sub_name'] ?></option>
                    <?php } ?>

                </select>
            </div>
            <div class="col col-4 col-md-4 col-lg-4">
                <input type="submit" class="btn btn-primary" style="margin-left: 3em;" name="" id="" value='SUBMIT'>
            </div>
        </div>
    </form>
<?php
}
else{
    $dept = 'select faculty_dept from faculty_details where faculty_name="' . $_SESSION['username'] . '"';
    $r_dept = mysqli_fetch_assoc($link->query($dept));
    $q = 'select sub_name,sub_code from subjects where branch="' . $r_dept['faculty_dept'] . '"and sem="' . $_SESSION['semester'] . '"';
    $r = $link->query($q);

?>
    <form action="download_ce.php" method="post">
        <div class="row m-5">
            <div class="col col-8 col-md-8 col-lg-8">
                <select name="sub" id="" class='form-control' required>
                    <option value="" selected disabled>Select Subject</option>
                    <?php

                    foreach ($r as $s) {
                    ?>
                        <option value="<?php echo $s['sub_code'] . ' - ' . $s['sub_name'] ?>"><?php echo $s['sub_code'] . ' - ' . $s['sub_name'] ?></option>
                    <?php } ?>

                </select>
            </div>
            <div class="col col-4 col-md-4 col-lg-4">
                <input type="submit" class="btn btn-primary" style="margin-left: 3em;" name="" id="" value='SUBMIT'>
            </div>
        </div>
    </form>
<?php
}
include "../template/footer-fac.php";
?>