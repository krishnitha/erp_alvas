<?php include("../template/fac-auth.php");
include("../template/sidebar-fac.php");



$fac_sub = "SELECT sub_name FROM faculty_mapping WHERE faculty_name = \"" . $_SESSION['username'] . "\"";
//  echo $fac_sub;
$result = $link->query($fac_sub);

?>

<div class="container-fluid">
    <form action="fac_assignment_add_upload.php" method="post" enctype="multipart/form-data">

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
                <div class="form-group">
                    <label for="Asno">Assignment No. </label>
                    <select class="form-control" name="assignment_no" required>
                        <option selected disabled>Select assignment no. </option>
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
                    <label for="">CO's</label>

                    <select class="form-control" name="co_no" required>
                        <option selected disabled>Select CO's</option>
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
                    <input type="date" class="form-control" id="last_date" name="last_date">
                </div>
            </div>
        </div>

        <div class="col col-3 col-mg-3 col-lg-3 mt-3">
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
                    <button type="submit" class="btn btn-success">Submit</button>
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



<?php include("../template/footer-fac.php") ?>