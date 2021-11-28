<?php
require_once "../config.php";
$con=$link;

include("../template/student_sidebar.php");
?>
<div>
    <h5 style="text-align:center">Medical Leave Details</h5><br>
</div>
<div class="text-center">
<a href="../leave_management/medicalapply.php"><button  type="button" class="btn btn-info"> Apply</button></a>
</div>
<?php
include("../template/student-footer.php");
?>