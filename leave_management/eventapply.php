<?php
    require_once "../config.php";
    $con=$link;

    include("../template/student_sidebar.php");
?>

        <h4 style="text-align:center">Enter The Event Details</h4><br>
        <div style="margin-left:20%;margin-right:20%">
      		<form action="eventapply.php" method="post">
        		<table   class="table table-responsive table-borderless">
        			<tr>
        				<th></th>
                        <th></th>
        				<th></th>
        			</tr>
        			<tr>
        				<td>Event Name<br></td>
                        <td></td>
                        <td> 
                            <input type = "text" class = "form-control" id = "name" placeholder = "Enter Event Name" required>   
        				</td>
        			</tr>
                    <tr>
                        <td>Date<br></td>
                        <td></td>
                        <td> 
                            <input type = "date" name="date" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Start Time<br></td>
                        <td></td>
                        <td>
                            <input type="time" id="inputMDEx1" class="form-control" required>
                            <label for="inputMDEx1">Choose time</label>
                        </td>
                    </tr>
                    <tr>
                        <td>End Time<br></td>
                        <td></td>
                        <td> 
                            <input type="time" id="inputMDEx1" class="form-control" required>
                            <label for="inputMDEx1">Choose time</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Upload Document<br></td>
                        <td></td>
                        <<td>
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