<?php
require_once "../config.php";
$con=$link;

include("../template/student_sidebar.php");
?>

    
            <h3 style="text-align:center">Enter The Medical Leave Details</h3>
      		<form action="medicalapply.php" method="post">
        		<table   class="table table-responsive">
        			<tr>
        				<th></th>
                        <th style="width:20px"></th>
        				<th ></th>
        			</tr>
        			<tr>
        				<td>Reason<br></td>
                        <td></td>
                        <td> <input type = "text" class = "form-control" id = "name" placeholder = "Enter the Reason for leave">   
        				</td>
        				
        			</tr>
                    <br>
                    <tr>
        				<td>Number of days leave taken <br></td>
                        <td></td>
                        <td> <input type="number" class="form-control" id="number"> 
        				</td>
        				
        			</tr>
                    <tr>
                        <td> From <br></td>
                        <td></td>
                        <td> <input type = "date" name="date">
                        </td>
                
                    </tr>
                    <tr>
                        <td>To <br></td>
                        <td></td>
                        <td> <input type = "date" name="date">
                        </td>
                
                    </tr>
                    
                    <tr>
                        <td>Upload Document<br></td>
                        <td></td>
                        <td> <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </td>
                    </tr>
                
                </table>
                <div class="text-center">
                    <input type="button" class="btn btn-info" value="Submit">
                </div>
            </form>




<?php
include("../template/student-footer.php");
?>