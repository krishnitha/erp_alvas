<?php
//require_once "../config.php";
include("../template/fac-auth.php");
$con=$link;
include("../template/sidebar-fac.php");
?>
            <div>
                
                <h5 style="text-align:center">Approval Details</h5><br>
                <table class="table table-responsive table-borderless">
                    <tbody>
                        <tr>
                            <th>USN</th>
                            <th>Name</th>
                            <th>Semester</th>
                            <th>Section</th>
                            <th>View</th>
                        </tr>



                        <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><button type="button" class="btn btn-info">Info</button></td>
                        </tr>
                        
            </div>
                               
                    </tbody>
                </table>


<?php
    include("../template/footer-fac.php");
?>
               