<?php
require_once "../config.php";
$con=$link;

include("../template/student_sidebar.php");
?>
    <h4 style="text-align:center">Event Details</h4><br>
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
<?php
include("../template/student-footer.php");
?>
