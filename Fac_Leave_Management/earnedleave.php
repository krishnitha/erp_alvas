<?php
// require_once "../config.php";
include("../template/fac-auth.php");
$con=$link;

include("../template/sidebar-fac.php");
?>
<div class="text-center" style="margin-top:30px">
    <a href="../leave_management/earnedleaveapply.php"><button  type="button" class="btn btn-info">Apply New</button></a>
</div>
<?php
include("../template/footer-fac.php");
?>