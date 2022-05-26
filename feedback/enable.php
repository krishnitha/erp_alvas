<?php
include "../template/fac-auth.php";
include "../template/sidebar-fac.php";
    error_reporting(0);

$q_sem = 'select distinct sem from subjects';
$q_feed = 'select distinct feedback_name from feedback_response';
$r_sem = $link->query($q_sem);
$r_feed = $link->query($q_feed);
$flag = $_SESSION['flag'] ?? 0;

if ($flag == 1) {
    echo '<span style="color:red;"> Semesters ' . $_SESSION['repsem'] . ' is/are already notified of ' . $_SESSION['feedback_name'] . '  </span>';
    $_SESSION['flag'] = 0;
}
?>

<form action="enable_next.php" method="post">
    <div class="row">
        <div class="col-md-3">
            <label for=""></label>
            <select name="feedback_name" id="" class="form-control" required>
                <option value="" selected disabled>Select Feedback</option>
                <option value="Course_wise_1">Course wise 1</option>
                <option value="Course_wise_2">Course wise 2</option>
                <option value="Course_end">Course End</option>

            </select>
        </div>
        <div class="col-md-3">
        <label for=""></label>
            <select name="semester[]" id="" class="form-control" multiple required>
                <option value="" selected disabled>Select Semester</option>
                <?php

                foreach ($r_sem as $r) {
                ?>
                    <option value="<?php echo $r['sem'] ?>"><?php echo $r['sem'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="from_date">From Date</label>
            <input type="date" class="form-control" id="from_date" name="from_date" required>
        </div>
        <div class="col-md-3">
            <label for="to_date">To date</label>
            <input type="date" class="form-control" id="to_date" name="to_date" required>
        </div>
    </div>
    <!-- <input type="submit" class="btn btn-primary" style="margin-left: 3em;" name="" id="" value='NOTIFY'> -->
<button class="btn btn-primary mt-2" type="submit">Notify</button>


</form>

<?php
$q_all = 'select * from feedback_notification';
$r_q_all = $link->query($q_all);
?>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th style='width: 5em;' scope="col">SL.No</th>
            <th style='width: 40em;' scope="col">Feedback name</th>
            <th style="text-align:center;" scope="col">Semesters</th>
            <th style="text-align:center;" scope="col">From date</th>
            <th style="text-align:center;" scope="col">To date</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($r_q_all as $d) {  ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $d['feedback_name'] ?></td>
                <td><?php echo $d['sem'] ?></td>
                <td><?php echo $d['from_date'] ?></td>
                <td><?php echo $d['to_date'] ?></td>
            </tr>
        <?php } ?>



    </tbody>








    <?php
    include "../template/footer-fac.php";
    ?>