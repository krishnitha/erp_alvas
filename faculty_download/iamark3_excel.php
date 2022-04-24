<?php

require_once '../config.php';
$con = $link;

	$q1 = "select distinct sub from ia_marks3";
	//$q2 = "select distinct branch from ia_marks3";
	$q3 = "select distinct sem from ia_marks3";
	$q4 = "select distinct sec from ia_marks3";

	$result1 = $con->query($q1);
	//$result2 = $con->query($q2);
	$result3 = $con->query($q3);
	$result4 = $con->query($q4);

	include("../template/fac-auth.php");
	include("../template/sidebar-fac.php");
?>



	
				<!-- page content start -->
				<div>
					<div class="container">
						<form method="post" action="iamark3_excel_extract_data.php" align="center">
							<div class="row">
								<div class="col-md-1"></div>
								
								
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
										<?php foreach ($result1 as $r) { ?>
											<option class="form-control" value="<?php echo $r["sub"] ?>"><?php echo $r["sub"] ?></option>
											<!-- <option class="form-control" value="2019">2019</option> -->
										<?php } ?>


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
		</div>
		
		<?php include("../template/footer-fac.php") ?>

		<script>
			$(document).ready(function() {
				$('#sidebarCollapse').on('click', function() {
					$('#sidebar').toggleClass('active');
				});
			});
		</script>
	<?php  ?>
	</body>

	</html>