<?php 
include "../template/fac-auth.php";
include("../template/sidebar-fac.php");
        require_once "config.php"; ?>
<?php 
    $result = $con -> query('Select faculty_id, faculty_dept from faculty_details where faculty_name="' . $_SESSION["username"] . '"');
    $res = mysqli_fetch_assoc($result);
    

    $q2 = 'select * from dept_pso where dept_name = "' . $res["faculty_dept"] . '"';
    $result2 = $con -> query($q2);
    $res2 = mysqli_fetch_assoc($result2);

    $q3 = 'select * from co where faculty_id="' . $res["faculty_id"] . '"';
    $result3 = $con -> query($q3);
    $_SESSION["f_co"] = 0;
    // print_r($res2);
    // print_r($res1);
?>


<form action="co_po_pso_viewing.php" method="post">

    <div class="row mb-3">
        <div class="col col-4 col-lg-4 col-md-4">
            <label for="sub" class="ml-5">Select Subject:</label>
            <select name="sub" id="sub" class="form-control">
                <option selected disabled>Select Subject</option>
                <?php
                    foreach($result3 as $res3){
                ?>
                <option value="<?php echo $res3["sub"] ?>"><?php echo $res3["sub"] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col col-4 col-md-4 col-lg-4">
            
            <button type="submit" class="btn btn-info mt-4" id="nn" name="co_sub">LOAD</button>
        </div>
    </div>
    
</form>


<?php include("../template/footer-fac.php") ?>