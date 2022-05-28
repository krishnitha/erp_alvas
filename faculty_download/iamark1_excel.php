<?php

require_once '../config.php';
include("../template/fac-auth.php");
error_reporting(0);
include(
"../template/sidebar-fac.php");
// session_start();
$con = $link;

	$q_sub = 'select * from faculty_mapping where faculty_name = "' . $_SESSION['username'] . '"';
	$sub_fac = mysqli_fetch_assoc($link->query($q_sub))['sub_name'];
	// echo $sub_fac;
	$q_sub2 = 'select * from subjects where sub_name = "' . $sub_fac . '"';
	$sub_fac2 = mysqli_fetch_assoc($link->query($q_sub2))['sub_code'];
	$sub_sub_code = implode(' - ', [$sub_fac2, $sub_fac]);
	// echo $sub_sub_code;
	// $q1 = 'select * from ia_marks1 where sub = "' . $sub_sub_code . '"';
	//$q2 = "select distinct branch from ia_marks1";
	$q3 = "select distinct sem from ia_marks1";
	$q4 = "select distinct sec from ia_marks1";
	$q5 = "select distinct branch from ia_marks1";

	// $result1 = $con->query($q1);
	
	//$result2 = $con->query($q2);
	$result3 = $con->query($q3);
	$result4 = $con->query($q4);
	$result5 = $con->query($q5);
?>


<!--  -->
				<!-- page content start -->
				<div>
					<div class="container">
						<form method="post" action="iamark1_excel_extract_data.php" align="center">
							<div class="row">
								<div class="col-md-1"></div>

								<div class=" form-group col-md-2">
									<select class="form-control" name="branch" id="branch" aria-label="Default select example">
										<option value="selected">Branch</option>
										<?php foreach ($result5 as $r5) { ?>
											<option class="form-control" value="<?php echo $r5["branch"] ?>"><?php echo $r5["branch"] ?></option>
											<!-- <option class="form-control" value="2019">2019</option> -->
										<?php } ?>
									</select>
								</div>
								<div class=" form-group col-md-2">
									<select class="form-control" name="sem" id="sem" aria-label="Default select example">
										<option value="selected">Semester</option>
										<?php foreach ($result3 as $r3) { ?>
											<option class="form-control" value="<?php echo $r3["sem"] ?>"><?php echo $r3["sem"] ?></option>
											<!-- <option class="form-control" value="2019">2019</option> -->
										<?php } ?>
									</select>
								</div>
								<div class=" form-group col-md-2">
									<select class="form-control" name="sec" id="sec" aria-label="Default select example">
										<option value="selected">Section</option>
										<?php foreach ($result4 as $r4) { ?>
											<option class="form-control" value="<?php echo $r4["sec"] ?>"><?php echo $r4["sec"] ?></option>
											<!-- <option class="form-control" value="2019">2019</option> -->
										<?php } ?> <option class="form-control" value="all">ALL</option>

									</select>
								</div>
								<div class=" form-group col-md-2">
									<select class="form-control" name="sub" id="sub" aria-label="Default select example">
										<option value="selected">Subject</option>
											<?php 
                                    $qt = "select a.sub_name, a.sub_code, a.lab from faculty_mapping b, subjects a where b.faculty_name = \"" . $_SESSION['username'] . "\" and b.sub_name = a.sub_name";
                                    $resultst = $link->query($qt);
                                    echo $qt;
                                    foreach($resultst as $r){
                                                   if($r['lab'] != 1){                      
                                    ?>
                                 <option class="form-control" value="<?php echo $r["sub_code"] . " - " . $r["sub_name"] ?>"><?php echo $r["sub_code"] . " - " . $r["sub_name"] ?></option>
                                 <?php  } } ?>

									</select>
								</div>

								<div class="col-md-2">
									<input type="submit" name="export" value="Download" class="btn btn-success" />

								</div>
								<div class="col-md-1"></div>
							</div>
						</form>
					</div>


				</div>
				<!-- page content end -->
			</div>


			<?php  ?>

		<?php include("../template/footer-fac.php") ?>

		<script>
			$(document).ready(function() {
				$('#sidebarCollapse').on('click', function() {
					$('#sidebar').toggleClass('active');
				});
			});
		</script>
	</body>

	</html>