<?php
    require_once "../config.php";
    $con=$link;

    include("../template/student_sidebar.php");
?>
    
        <h4 style="text-align:center">Enter The Medical Leave Details</h4><br>
        <div style="margin-left:20%;margin-right:20%">
      		<form action="medicalapply.php" method="post">
        		<table   class="table table-responsive table-borderless">
        			<tr>
        				<th></th>
                        <th></th>
        				<th></th>
        			</tr>
        			<tr>
        				<td>Reason<br></td>
                        <td></td>
                        <td> 
                            <input type = "text" class = "form-control" id = "name" placeholder = "Enter the Reason for leave" required>   
        				</td>
        			</tr>

                    <tr>
                        <td> From <br></td>
                        <td></td>
                        <td> 
                            <input type = "date" name="date" class="form-control" required>
                        </td>
                    </tr>

                    <tr>
                        <td>To <br></td>
                        <td></td>
                        <td> <input type = "date" name="date" class="form-control" required></td>
                    </tr>
                    
                    <tr>
                        <td>Upload Document<br></td>
                        <td></td>
                        <td>
                            <label class="label1" for="actual-btn">Choose File</label>
                            <input type="hidden" name="MAX_FILE_SIZE" required value="100000">
                            <span id="file-chosen">No file chosen</span>
                            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                        </td>
                    </tr>
                
                </table>
                <div class="text-center">
                    <input type="button" class="btn btn-info" value="Submit">
                </div>
            </form>
        </div>


<?php
include("../template/student-footer.php");
?>