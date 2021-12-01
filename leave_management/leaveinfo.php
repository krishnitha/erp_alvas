<?php
    require_once "../config.php";
    $con=$link;

    include("../template/student_sidebar.php");
?>
<div>
<h4 style="text-align:center">tittle</h4><br>
</div>
<div>
    <table class="table table-responsive table-borderless">
        <tr>
        	<td><b>Total No.of Leaves</b></td>
            <td><b>Total No.of Leaves Taken</b></td>
        	<td><b>Remaining Leaves</b></td>
        </tr>
    </table>
</div>
<?php
include("../template/student-footer.php");
?>
