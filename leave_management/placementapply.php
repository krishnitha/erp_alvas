<?php
require_once "../config.php";
$con=$link;

include("../template/student_sidebar.php");
?>

    
        <h3 style="text-align:center">Enter The placement Details</h3>
        <div style="margin-left:20%;margin-right:20%">
      		<form action="placementapply.php" method="post">
        		<table   class="table table-responsive table-borderless">
        			<tr>
        				<th></th>
                        <th style="width:20px"></th>
        				<th ></th>
        			</tr>
        			<tr>
        				<td>Company Name<br></td>
                        <td></td>
                        <td> <input type = "text" class = "form-control" id = "name" placeholder = "Enter Company Name">   
        				</td>
        				
        			</tr>
                    <br>
                    <tr>
                        <td>Date<br></td>
                        <td></td>
                        <td> <input type = "date" name="date">
                        </td>
                
                    </tr>
                    <tr>
                        <td>Start Time<br></td>
                        <td></td>
                        <td>
                                <input type="time" id="inputMDEx1" class="form-control">
                                <label for="inputMDEx1">Choose time</label>
                        </td>
                       
                    </tr>
                    <tr>
                        <td>End Time<br></td>
                        <td></td>
                        <td> <input type="time" id="inputMDEx1" class="form-control">
                            <label for="inputMDEx1">Choose time</label>
                        
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
        </div>




<?php
include("../template/student-footer.php");
?>