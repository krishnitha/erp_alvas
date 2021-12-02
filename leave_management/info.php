<?php
    require_once "../config.php";
    $con=$link;

    include("../template/student_sidebar.php");
?>
<div>
<h3 style="text-align:center">tittle</h3><br>
</div>
<div>
<h5 style="text-align:left">Faculty Name:</h5><br>
</div>
<div>
    <table class="table table-responsive table-borderless">
        <tr>
                <td><b>Total No.of Classes Taken </b></td>
                <td><b>Total No.of Classes Present </b></td>
        	    <td><b>Attendence percentage </b></td>
                <td><b>No.of Leaves Taken </b></td>
                <td><b>No.of Leaves Remaining </b></td>

        </tr>
    </table>
</div>
<?php
include("../template/student-footer.php");
?>
