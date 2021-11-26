<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="asset/style/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> 
    <link rel="stylesheet" href="asset/style/style_admin.css">
    <link rel="shortcut icon" href="asset/img/1aiet-logo.png" />
    <title>Admin | Faculty Register</title>
</head>

<body>
    <style>
        body,
        html,
        .wraper {
            background-image: url("asset/img/bg.png") !important;
            height: 100vh !important;
            background-position: fixed !important;
            background-attachment: fixed;
            background-repeat: no-repeat !important;
            background-size: cover !important;
            align-content: center !important;
        }
    </style>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div style="margin-left: 50px;">
                    <a href="admin_dashboard.php">
                        <img src="asset/img/1aiet-logo.png" style="height: 10vh; " class="img-fluid ml-auto" alt="logo" srcset="">
                    </a>
                </div>
            </div>
            <ul class="list-unstyled components">
            <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Student</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="students/students_insert.php">Add Student</a>
                        </li>
                        <li>
                            <a href="students/student_view_details.php">View Student</a>
                        </li>


                    </ul>
                </li>
                <li class="active">
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Faculty</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                        <li>
                            <a href="faculty/faculty_insert.php">Add Faculty</a>
                        </li>
                        <li>
                            <a href="faculty/faculty_view_details.php">View Faculty</a>
                        </li>
                        <li>
                            <a href="register.php"  style="background: white; color: black;">Faculty Register</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="section_creation/batch_selection.php">Section</a>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Subject</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="subject_maping/add_sub.php">Add Subject</a>
                        </li>
                        <li>
                            <a href="subject_maping/view_sub.php">View Subject</a>
                        </li>

                    </ul>
                </li>
                <li  class="">
                    
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Faculty-Subject Mapping</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu1">
                        <li>
                            <a href="subject_maping/faculty_subject_mapping.php">Subject Mapping</a>
                        </li>
                        <li>
                            <a href="subject_maping/faculty_view.php">Faculty View</a>
                        </li>

                    </ul>
                    
                </li>
                
               
                <!-- <li>
                    <a href="#">Contact</a>
                </li> -->
            </ul>


        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" style="width: 40px;" class="btn btn-primary ">
                        <i class="fas fa-align-left"></i>

                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: flex-end;">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#" onclick="alert('notificaions')"><i class="fas fa-bell glow "></i></a>
                            </li>
                            <li class="nav-item " style="float: right;">
                                <a class="nav-link" href="logout.php"> <i class="fas fa-power-off p-1"> Logout</i></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <!-- page content start -->
            <div>

                
<div class="row">
    <?php
            require_once "config.php";
            if(isset($_POST["sub"])){
                if(isset($_POST["username"])){
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $confirm = $_POST["confirm_password"];
                    if($password != $confirm ){
                        echo "<span class='ml-5' style='color:#e50e0e;'>Passwords don't match</span>";
                    }
                    else{
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $q_p = "insert into users(`username`,`password`,`identity`) values(\"" . $username . "\",\"" . $password . "\",2)";
                        // echo $q_p;
                        $res = $link -> query($q_p);
                    }
                }
                else{
                    echo "<span class='ml-5' style='color:#e50e0e;'>Select Faculty</span>";
                }
            }
                // $username_err = $password_err = $confirm_password_err = "";
                
                ?>
                                            <?php

if(isset($_SESSION["popup"]) && $_SESSION["popup"] == 1){
    $_SESSION["popup"] = 0;
    echo '<div style="width:50%; height:50px;" class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Sucessful</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <br>';
  
}
else if(isset($_SESSION["popup"]) && $_SESSION["popup"] == 2){
    $_SESSION["popup"] = 0;
    echo '<div style="width:50%;height:50px;" class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>failed</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  
} ?>
                    </div>

                <div class="wrapper container p-4 m-3">
                    


                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <div class="form-group">
                            <label for="us">Username<span style="color: red;">*</span></label>
                           
                            <select name="username" id="us" name="username" class="form-control" required>
                                <option selected disabled>Select Faculty</option>
                                <?php

                                $q1 = "select * from faculty_details";
                                // echo $q1;
                                $results = $link->query($q1);
                                // print_r($results);

                                foreach ($results as $r) {

                                ?>
                                    <option value="<?php echo $r["faculty_name"] ?>"><?php echo $r["faculty_name"] ?></option>
                                <?php
                                }
                                ?>



                            </select>

                        </div>
                        <div class="form-group">
                            <label>Password<span style="color: red;">*</span></label>
                            <input type="password" value="aiet123" name="password" class="form-control" required>
                            
                        </div>
                        <div class="form-group">
                            <label>Confirm Password<span style="color: red;">*</span></label>
                            <input type="password" value="aiet123" name="confirm_password" class="form-control" required>
                        </div><br>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary p-2" value="Submit" name="sub">
                            <input type="reset" class="btn btn-success p-2 m-2" value="Reset">
                        </div>
                        <!-- <p>Already have an account? <a href="login.php" style="color:blue;">Login here</a>.</p> -->
                    </form>
                    
                </div>

            </div>
            
            <!-- page content end -->
        </div>
    </div>
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
</body>

</html>