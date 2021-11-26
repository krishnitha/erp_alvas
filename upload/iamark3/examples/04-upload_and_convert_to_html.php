<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/../src/SimpleXLSX.php';
require_once "config1.php";


echo '<h1>Upload .xlsx extension file only</h1>';

if (isset($_FILES['file'])) {
	
	if ( $xlsx = SimpleXLSX::parse( $_FILES['file']['tmp_name'] ) ) {

		echo '<h2>Successfully Uploaded</h2>';
		header("Location: ../../../IA_Management/ia_marks1.php");
		echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';

		$dim = $xlsx->dimension();
		$cols = $dim[0];
		$q2="select * from ia_marks1 where 1";
				//echo $q2;
				$result1=$con->query($q2);

		foreach ( $xlsx->rows() as $k => $r ) {
					 // skip first row
			// print($k)
			// echo '<tr>';
			// for ( $i = 0; $i < $cols; $i ++ ) {
			// 	echo '<td>' . ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' ) . '</td>';
			// 	//print($r[0]);
			// }
			echo '</tr>';
			if ($k == 0) continue;
			else{
				
				foreach($result1 as $r1)
				{
					// print_r($r1);
					// echo $r[0];
					// echo $r1['adm_no'];
					// echo "<br>";
					if($r1['adm_no']==$r[0] && $r1['usn']==$r[1]&& $r1['branch']==$r[3] && $r1['sem']==$r[4] && $r1['sec']==$r[5] && $r1['sub']==$r[6])
					{
						
						$q="UPDATE `ia_marks3` SET `1a`='". $r[7] ."',`1b`='". $r[8] ."',`1c`='". $r[9] ."',`2a`='". $r[10] ."',`2b`='". $r[11] ."',`2c`='". $r[12] ."',`3a`='". $r[13] ."',`3b`='". $r[14] ."',`3c`='". $r[15] ."',`4a`='". $r[16] ."',`4b`='". $r[17] ."',`4c`='". $r[18] ."',`total3`='". $r[19] ."' WHERE  adm_no= '". $r[0] ."'and `branch`='" . $r[3] . "' and `sem`='" . $r[4] . "' and `sec`='" . $r[5] . "' and `sub`='" . $r[6] . "'";
						//echo $q;
						$result=$con->query($q);
						 

					}
				}

			
			//echo $q;
			//echo "<br>";
			// $q1="insert into sslc_details values(\"" . $r[0] . "\",\"" . $r[34] . "\",\"" . $r[35] . "\",\"" . $r[36] . "\",\"" . $r[37] . "\",\"" . $r[38] . "\",\"" . $r[39] . "\",\"" . $r[40] . "\")";
			// //echo $q1;
			// $con->query($q1);
			// $q2="insert into puc_details values(\"" . $r[0] . "\",\"" . $r[41] . "\",\"" . $r[42] . "\",\"" . $r[43] . "\",\"" . $r[44] . "\",\"" . $r[45] . "\",\"" . $r[46] . "\",\"" . $r[47] . "\",\"" . $r[48] . "\",\"" . $r[49] . "\",\"" . $r[50] . "\",\"" . $r[51] . "\",\"" . $r[52] . "\",\"" . $r[53] . "\",\"" . $r[54] . "\",\"" . $r[55] . "\",\"" . $r[56] . "\",\"" . $r[57] . "\",\"" . $r[58] . "\")";
			// $con->query($q2);
			// $q3="insert into parents_details values(\"" . $r[0] . "\",\"" . $r[1] . "\",\"" . $r[59] . "\",\"" . $r[60] . "\",\"" . $r[61] . "\",\"" . $r[62] . "\",\"" . $r[63] . "\",\"" . $r[64] . "\",\"" . $r[65] . "\",\"" . $r[66] . "\",\"" . $r[67] . "\",\"" . $r[68] . "\",\"" . $r[69] . "\",\"" . $r[70] . "\")";
			// $con->query($q3);
		
		}
		}
		echo '</table>';
	} else {
		echo SimpleXLSX::parseError();
	}
}
echo '<link rel="stylesheet" href="../../../asset/style/bootstrap.min.css" />
<div class="container">
	<h2>Upload form</h2>
	<form method="post" enctype="multipart/form-data">
		format supported *.XLSX
		<div class="row">
			<div class="col-12">
				<input type="file" name="file" class="btn btn-primary" value="Choose a file" />&nbsp;&nbsp;
				<input type="submit" value="Upload" class="btn btn-success" />
			</div>
		</div>
		select a file and click upload
	</form>
</div>';
