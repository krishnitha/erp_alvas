<?php
// require_once "../config.php";
include("../template/fac-auth.php");
$con=$link;

include("../template/sidebar-fac.php");
?>
<h4 style="text-align:center">ON OFFICE DUTY LEAVE DETAILS</h4><br>
<div class="text-center" style="margin-top:30px">
<table class="table table-responsive table-borderless">
<tr>
                    <th>Applied On</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Document</th>
                    <th>Document</th>

                   
</tr>
</table>
</div>
<div class="text-center" style="margin-top:30px">
            <a href="../Fac_leave_management/OOD_leaveapply.php"><button  type="button" class="btn btn-info"> Apply New</button></a>
</div>
<?php
include("../template/footer-fac.php");
?>