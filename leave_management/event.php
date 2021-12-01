<?php
require_once "../config.php";
$con=$link;

include("../template/student_sidebar.php");
?>
    <h4 style="text-align:center">Event Details</h4><br>
<<<<<<< HEAD
</div>
<div>
    <table class="table table-responsive table-borderless">
        <tr>
        	<th>Applied On</th>
            <th>Event Name</th>
        	<th>Time From</th>
            <th>Time To</th>
            <th>Document</th>
        </tr>
    </table>
</div>
<div class="text-center"style="margin-top:30px">
<a ="../lhrefeave_management/eventapply.php"><button  type="button" class="btn btn-info"> Apply New</button></a>
</div>
=======
        <div style="margin-left:5%;margin-right:5%">
            <table class="table table-responsive table-borderless">
                <tr>
                    <th>Applied On</th>
                    <th>Event Name</th>
                    <th>Time From</th>
                    <th>Time To</th>
                    <th>Document</th>
                </tr>
            </table>
        </div>
        <div class="text-center" style="margin-top:30px">
            <a href="../leave_management/eventapply.php"><button  type="button" class="btn btn-info"> Apply New</button></a>
        </div>
>>>>>>> 9a8a694d1f3e8e3251477542497ae5dec685b2b7
<?php
include("../template/student-footer.php");
?>
