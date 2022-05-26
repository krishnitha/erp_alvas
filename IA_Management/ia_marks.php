<?php
// session_start();
    include("../template/fac-auth.php");
    include("../template/sidebar-fac.php");
error_reporting(0);
    
    require_once "config1.php";
    
    $q1 = "select distinct branch from students";
                    // echo $q1;
     $result = $con->query($q1);
     $q2 = "select distinct semester from students";
     $q3 = "select distinct section from students";
     $result1 = $con->query($q2);
     $result2 = $con->query($q3);
     $faculty_name = $_SESSION["username"];
     if(isset($_SESSION["check_error"]) && $_SESSION["check_error"] == 1){
        $_SESSION["check_error"] = 0;
        echo '<div style="width:50%;" class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Subject and semester doesnot match</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      
      
    }

?>

        

<div class="container">
    <form action="ia_add_student.php" method="post">
    <div class="row mb-4">
        
    <div class="col col-3 col-mg-3 col-lg-3">
        <label for="sub">Subject</label>
        <select class="form-control" name="sub" id="sub" aria-label="Default select example">
            <option value="" selected disabled>Select Subject</option>
            <?php 
                $qt = "select a.sub_name, a.sub_code,a.lab from faculty_mapping b, subjects a where b.faculty_name = \"" . $faculty_name . "\" and b.sub_name = a.sub_name";
                $resultst = $con->query($qt);
                echo $qt;
                foreach($resultst as $r){
                if($r['lab'] != 1){                                 
            ?>
            <option class="form-control" value="<?php echo $r["sub_code"] . " - " . $r["sub_name"] ?>"><?php echo $r["sub_code"] . " - " . $r["sub_name"] ?></option>
            <?php  } } ?>
            </select>
    </div>
        <div class="col">
        <label for="sub">Branch</label>
            <select name="branch" class="form-control" >
                <option selected disabled>Select Branch </option>

                <?php
                    
                    foreach($result as $r){

               
                echo "<option value=\"" . $r["branch"] . "\"> " . $r["branch"] . "</option>";

                 }  ?>
              </select>
        </div>

        <div class="col">
        <label for="sub">Semester</label>
            <select name="sem" class="form-control" >
                <option selected disabled>Select Semester </option>
                <?php
                    
                    foreach($result1 as $r){

                
                echo "<option value=\"" . $r["semester"] . "\"> " . $r["semester"] . "</option>";

                 }  ?>
              </select>
        </div>

        <div class="col">
        <label for="sub">Section</label>
            <select name="sec" class="form-control" >
                <option  selected disabled>Select Section </option>
                <?php
                    
                    foreach($result2 as $r){

               
                echo "<option value=\"" . $r["section"] . "\"> " . $r["section"] . "</option>";

                 }  ?>
              </select>
        </div> 

        <div class="container">
            <div class="col-11">
            </div>
            <div class="col-1">
            <button class="btn btn-primary mt-4" type="submit">Submit</button>
            </div>
        </div>
    </div>
    </form>
</div>

<?php include("../template/footer-fac.php") ?>