<?php 

include_once "../template/fac-auth.php";
include_once "../template/sidebar-fac.php";
require_once "../config.php";
error_reporting(0);

$dept = mysqli_fetch_assoc($link->query('select faculty_dept from faculty_details where faculty_name = "' . $_SESSION['username'] . '"'))['faculty_dept'];
?>


<form action="calculate.php" method="post">
    <div class="form-row">
    <div class="form-group col-md-4">
        <select class="form-control" name="sem" id="">
            <option selected disabled>Select Semester</option>
            <?php 
                $result = $link->query('select distinct(semester) from students');
                foreach($result as $r){
            ?>
                <option value="<?php echo $r['semester'] ?>"><?php echo $r['semester'] ?></option>
            <?php } ?>
        </select>
        
    </div>
    <div class="form-group col-md-4 mt-3">
        <select class="form-control" name="sec" id="">
            <option selected disabled>Select Section</option>
            <?php 
                $result = $link->query('select distinct(section) from students');
                foreach($result as $r){
            ?>
                <option value="<?php echo $r['section'] ?>"><?php echo $r['section'] ?></option>
            <?php } ?>
        </select>
    </div>
    <!-- <div class="form-group col-md-4 mt-3">
        <select class="form-control" name="sub" id="sub" aria-label="Default select example">
            <option value="" selected disabled>Select Subject</option>
            <?php 
                $qt = "select a.sub_name, a.sub_code, a.lab from faculty_mapping b, subjects a where b.faculty_name = \"" . $_SESSION['username'] . "\" and b.sub_name = a.sub_name";
                $resultst = $link->query($qt);
                // echo $qt;
                foreach($resultst as $r){
                    if($r['lab'] != 1){                
            ?>
            <option class="form-control" value="<?php echo $r["sub_code"] . " - " . $r["sub_name"] ?>"><?php echo $r["sub_code"] . " - " . $r["sub_name"] ?></option>
            <?php } } ?>
            </select>
</div> -->
<!-- <div class="form-group col-md-4">
        <select  class="form-control mt-3" name="ia" id="">
        <option selected disabled>Select IA</option>
        <option value="1">IA 1</option>
        <option value="2">IA 2</option>
        <option value="3">IA 3</option>
    </select>
</div> -->
    <div class="form-group col-md-4">
        
        
        <input id="startdate"  class="form-control mt-3" type="date" name="startdate">
    </div>
    
    <div class="form-group col-md-4">
         <input type="text" hidden name="dept" value="<?php echo $dept ?>" id="">
    <button class="btn btn-primary mt-4" type="submit">Submit</button></div>
    
    </div>
     
    
     
     </div>
       
</form>


















<?php include_once "../template/footer-fac.php"; ?>