<?php 
require_once "../config.php";
include("../template/fac-auth.php");
include("../template/sidebar-fac.php");

?>
                <div class="container">
                <?php

if(isset($_SESSION["popup"]) && $_SESSION["popup"] == 1){
    $_SESSION["popup"] = 0;
    echo '<div style="width:50%;" class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Sucessful</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  
}
else if(isset($_SESSION["popup"]) && $_SESSION["popup"] == 2){
    $_SESSION["popup"] = 0;
    echo '<div style="width:50%;" class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>failed</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  
}

?>
<style>
    @media screen and (min-width: 320px) {
            .import-btn {
                margin-left: 80%;
            }

        }
</style>
                    <form action="faculty_insert_data.php" method="POST">
                        <div class="row">
                            <!-- <div class="col">
                                <h2>Add Faculty Details</h2>
                            </div> -->
                            <!-- <div class="col"></div> -->
                            <div class="col">
                               <a href="../upload/faculty_upload/examples/04-upload_and_convert_to_html.php" class="btn btn-primary import-btn">Import</a>
                                 <!-- <button type="file">Upload</button> -->
                            </div>
                        </div><br>
                        <h2>Add Faculty Details</h2>
                        <div class="row mt-4">
                            
                            <div class="col col-12  col-lg-4">
                                <div class="mb-3">
                                    <label for="faculty_id" class="form-label">Faculty ID<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="faculty_id" name="faculty_id" required>
                                </div>
                            </div>
                            <div class="col col-12  col-lg-4">
                                <div class="mb-3">
                                    <label for="faculty_name" class="form-label">Faculty Name<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="faculty_name" name="faculty_name" required>
                                </div>
                            </div>

                            <div class="col col-12  col-lg-4">
                                <div class="mb-3">
                                    <label for="faculty_desg" class="form-label">Designation<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="faculty_desg" name="faculty_desg" required>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col col-12  col-lg-4">
                                <div class="mb-3">
                                    <label for="faculty_dept" class="form-label">Department<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="faculty_dept" name="faculty_dept" required>
                                </div>
                            </div>
                            <div class="col col-12  col-lg-4">
                                <div class="mb-3">
                                    <label for="faculty_qulfy" class="form-label">Qualification<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="faculty_qulfy" name="faculty_qulfy" required>
                                </div>
                            </div>
                            <div class="col col-12  col-lg-4">
                                <div class="mb-3">
                                    <label for="faculty_yoj" class="form-label">Year Of Joining<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="faculty_yoj" name="faculty_yoj" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-12  col-lg-4">
                                <div class="mb-3">
                                    <label for="faculty_dob" class="form-label">DOB<span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="faculty_dob" id="faculty_dob" required>
                                </div>
                            </div>
                            <div class="col col-12  col-lg-4">
                                <div class="mb-3">
                                    <label for="faculty_email" class="form-label">Mail Id<span style="color: red;">*</span></label>
                                    <input class="form-control" type="email" id="faculty_email" name="faculty_email" required>
                                </div>
                            </div>
                            <div class="col col-12  col-lg-4">
                                <div class="mb-3">
                                    <label for="faculty_contact" class="form-label">Contact Number<span style="color: red;">*</span></label>
                                    <input type="number" class="form-control" name="faculty_contact" id="faculty_contact" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col col-12  col-lg-4">
                                <div class="mb-3">
                                    <label for="faculty_parmenent_address" class="form-label">Parmanent Address<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="faculty_parmenent_address" id="faculty_parmenent_address" required>
                                </div>
                            </div>
                            <div class="col col-12  col-lg-4">
                                <div class="mb-3">
                                    <label for="faculty_present_address" class="form-label">Correspondence Address</label>
                                    <input type="text" class="form-control" name="faculty_present_address" id="faculty_present_address" required>
                                </div>
                            </div>
                            <div class="col col-12  col-lg-4">
                                <div class="mb-3">
                                    <label for="faculty_teaching_exp" class="form-label">Teaching Experience<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="faculty_teaching_exp" id="faculty_teaching_exp" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-12">

                                <div class="mb-3">
                                    <label for="faculty_industry_exp" class="form-label">Industry Experience<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="faculty_industry_exp" id="faculty_industry_exp" required>
                                </div>

                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="faculty_aicte_id" class="form-label">AICTE ID<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="faculty_aicte_id" id="faculty_aicte_id" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-4"></div>
                        </div>

                        <div>
                            <h3>Education Details</h3>
                        </div>
                        <div>
                            <h5>UG</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="faculty_ug_dept" class="form-label">BE,DEPARTMENT<span style="color: red;">*</span></label>

                                    <input type="text" class="form-control" id="faculty_ug_dept" name="faculty_ug_dept" required />
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="faculty_ug_year" class="form-label">Year of Passing<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="faculty_ug_year" id="faculty_ug_year" required />
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="faculty_ug_college" class="form-label">College name<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="faculty_ug_college" id="faculty_ug_college" required />
                                </div>
                            </div>


                        </div>
                        <div>
                            <h5>PG</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">

                                    <label for="faculty_pg_dept" class="form-label">M Tech,DEPARTMENT<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="faculty_pg_dept" id="faculty_pg_dept" required />
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="faculty_pg_year" class="form-label">Year of Passing<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="faculty_pg_year" id="faculty_pg_year" required />
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="faculty_pg_college" class="form-label">College name<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="faculty_pg_college" id="faculty_pg_college" required />
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5>PHD</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="faculty_phd_reg" class="form-label">Registration date<span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" id="faculty_phd_reg" name="faculty_phd_reg" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="faculty_phd_status" class="form-label">Current Status<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="faculty_phd_status" name="faculty_phd_status" required />
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="faculty_phd_guide" class="form-label">Guide Name<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="faculty_phd_guide" name="faculty_phd_guide" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="faculty_phd_topic" class="form-label">Topic of research<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="faculty_phd_topic" name="faculty_phd_topic" required />
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="faculty_phd_domain" class="form-label">Research Domain<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="faculty_phd_domain" name="faculty_phd_domain" required />
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="faculty_phd_center" class="form-label">University/research center<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="faculty_phd_center" id="faculty_phd_center" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="faculty_phd_yoj" class="form-label">Year of joining<span style="color: red;">*</span></label>
                                    <input type="number" class="form-control" id="faculty_phd_yoj" name="faculty_phd_yoj" required />
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="faculty_phd_complition" class="form-label">Year of completion<span style="color: red;">*</span></label>
                                    <input type="number" class="form-control" id="faculty_phd_complition" name="faculty_phd_complition" required />
                                </div>
                            </div>


                        </div>


                        Teaching Subjects : <input type="text" class="form-control" name="faculty_sub_handel">

                        <!-- <div class="col-2 col-lg-2">

                            <button type="submit" class="btn btn-success mt-4">Submit</button></a>
                        </div> -->

                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <button type="submit" class="btn btn-success mt-4">Submit</button></a>

                            </div>
                            <div class="col-12 col-lg-4 mt-4">
                                <a class="btn btn-primary" href="faculty_workshop.php">WorkShop</a>
                            </div>
                            <div class="col-12 col-lg-4 mt-4">
                                <a class="btn btn-primary" href="faculty_ppr.php"> ADD paper</a>
                            </div>
                        </div>

                    </form>


                </div>
            </div>




        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });

        document.getElementById('buttonid').addEventListener('click', openDialog);

        function openDialog() {
            document.getElementById('fileid').click();
        }
    </script>
</body>

</html>