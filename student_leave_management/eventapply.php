<?php
    require_once "../config.php";
    $con=$link;
    include("../template/student_sidebar.php");
?>

        <style>
            .label2 
            {
                background-color: rgb(50, 113, 124);
                color:white;
                padding: 0.5rem;
                font-family: sans-serif;
                border-radius: 0.3rem;
                cursor: pointer;
            }
        </style>

        <h4 style="text-align:center">Enter The Event Details</h4><br>
        <div style="margin-left:20%;margin-right:20%">
      		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
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
                            <input type = "text" name="Ename" class = "form-control" id = "name" placeholder = "Enter Event Name" required>   
        				</td>
        			</tr>
                    <tr>
                        <td>Date<br></td>
                        <td></td>
                        <td> 
                            <input type = "date" name="Edate" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Start Time<br></td>
                        <td></td>
                        <td>
                            <input type="time" name="start" id="inputMDEx1" class="form-control" required>
                            <label for="inputMDEx1">Choose time</label>
                        </td>
                    </tr>
                    <tr>
                        <td>End Time<br></td>
                        <td></td>
                        <td> 
                            <input type="time" name="end" id="inputMDEx1" class="form-control" required>
                            <label for="inputMDEx1">Choose time</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Upload Document<br></td>
                        <td></td>
                        <td>
                            <input type="file" name="fileupload" id="actual-btn" hidden required/>
                            <label class="label2" for="actual-btn">Choose File</label>
                            <input type="hidden" name="MAX_FILE_SIZE" required value="100000">
                            <span id="file-chosen">No file chosen</span>
                            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                            <?php
                            if(isset($_POST["Submit"]))
                            {
                                $target_dir="../leave_doc/event_doc/";
                                $filename=$_FILES["fileupload"]["name"];
                                $tmpname=$_FILES["fileupload"]["tmp_name"];
                                $filetype=$_FILES["fileupload"]["type"];
                                $errors=[];
                                $fileextensions=["pdf","jpeg","jpg","png"];
                                $arr=explode(".",$filename);
                                $ext=strtolower(end($arr));
                                $uploadpath=$target_dir.basename($filename);
                                if(!in_array($ext,$fileextensions))
                                {
                                    $errors[]="Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
                                }
                                if (file_exists($filename)) {
                                    $errors[]= "Sorry, file already exists.";
                                }
                                if(empty($errors))
                                {
                                    if(move_uploaded_file($tmpname,$uploadpath))
                                    {
                                        $s='select * from students where usn="' . $_SESSION["username"] . '"';
                                        $res = $link->query($s);
                                        $res = mysqli_fetch_assoc($res);
                                        $ename = $_POST["Ename"];
                                        $edate = $_POST["Edate"];
                                        $date = date('Y-m-d');
                                        $from = $_POST["start"];
                                        $to = $_POST["end"];
                                        $que = "insert into student_event_leave(usn,sem,event_name,event_date,applied_date,from_time,to_time,doc_name) values (\"" . $_SESSION['username'] . "\",
                                        \"" . $res["semester"] . "\",\"" . $ename . "\",\"" . $edate . "\",\"" . $date . "\",\"" . $from . "\",\"" . $to . "\",\"" . $uploadpath . "\")";
                                        $result = $con->query($que);
                                        header("Location: ../student_leave_management/event.php");
                                    }
                                    else
                                    {
                                        ?>
                                            <label for="file-chosen">upload failed</label>
                                        <?php
                                    }
                                }
                                else
                                {
                                    foreach($errors as $value)
                                    {
                                ?>
                                        <br>
                                        <label for="actual-btn" style="color:red"><?php echo "$value"?></label>
                                <?php
                                    }
                                }
                            }
                    ?>
                        </td>
                    </tr>
                
                </table>
            
                <div class="text-center">
                    <input type="Submit" name ="Submit" class="btn btn-info" value="Submit">
                </div>
            </form>
        </div>
        <script>
            const actualBtn = document.getElementById('actual-btn');

            const fileChosen = document.getElementById('file-chosen');

            actualBtn.addEventListener('change', function() {
                fileChosen.textContent = this.files[0].name
            })
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
        

<?php
include("../template/student-footer.php");
?>