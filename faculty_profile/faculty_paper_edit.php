<?php
session_start();
require_once '../config.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../asset/style/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/style/style_fac.css">
    <link rel="shortcut icon" href="../asset/img/1aiet-logo.png" />
    <link rel="stylesheet" href="asset/style/style_fac.css">
    <title>Document</title>
    <style>
        .label {
            color: #97A1BF;
            font-size: 16px;
            font-weight: 800;
        }

        .value {
            color: #161E37;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <style>
        body,
        html,
        .wraper {
            background-image: url("../asset/img/bg.png") !important;
            height: 100vh !important;
            width: 100vw !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
            height: 100% !important;
            align-content: center !important;
        }

        .dropdown-toggle::after {
            display: none;
        }
    </style>
    </style>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div style="margin-left: 50px;">
                    <a href="student_dashboard.php">
                        <img src="../asset/img/1aiet-logo.png" style="height: 10vh; " class="img-fluid ml-auto" alt="" srcset="">
                    </a>
                </div>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="student_login_view.php">IA Marks</a>
                </li>




            </ul>


        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: flex-end">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="./faculty_login_profile_view.php"><i class="fa fa-user"><span style="margin-left:20%;">Profile</span></i></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="../reset-password.php"><i class="fas fa-key p-1"> Reset Password</i></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="../logout.php"><i class="fas fa-power-off p-1"> Logout</i></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#" onclick="alert('notificaions')"><i class="fas fa-bell"></i></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-primary" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" style="border-radius:30%; color: #fff" aria-expanded="false">

                                    <?php echo $_SESSION["username"] ?>



                                </a>
                                <div class="dropdown-menu" style="position: absolute; left: -150%;">
                                    <a class="nav-link" href="./faculty_login_profile_view.php"><i class="fa fa-user"><span style="margin-left:20%;">Profile</span></i></a>
                                    <a class="nav-link" href="../reset-password.php"><i class="fas fa-key p-1"> Reset Password</i></a>
                                    <a class="nav-link" href="../logout.php"><i class="fas fa-power-off p-1"> Logout</i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- page content start -->
            <div>



                <?php
                $con = $link;
                    $faculty_id = $_SESSION["username"];
                    $id = $_POST['id'];
                    $faculty_ppr_typed = $_POST['faculty_ppr_type'];
                    $faculty_ppr_year = $_POST['faculty_ppr_year'];
                    $faculty_ppr_title = $_POST['faculty_ppr_title'];
                    $faculty_ppr_jourrnal = $_POST['faculty_ppr_jourrnal'];
                    $faculty_ppr_pub_date = $_POST['faculty_ppr_pub_date'];
                    $faculty_ppr_volume = $_POST['faculty_ppr_volume'];
                    $faculty_ppr_issue = $_POST['faculty_ppr_issue'];
                    $faculty_ppr_issn = $_POST['faculty_ppr_issn'];
                    ?>

                        <form action="faculty_ppr_update.php" method="POST">
                        
                        <input type="text" name="id" id="" value="<?php echo $id ?>" hidden>
                            <div class="form-row form-inline mb-4 ">
                                <div class="col-auto">
                                    <label for="faculty_id" class="col-form-label" >Faculty ID :</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" name="faculty_id" id="faculty_id" class="form-control" required value="<?php echo $faculty_id ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class=" col-auto">
                                    <label for="faculty_ppr_type" class="col-form-label">Choose type:</label>
                                </div>
                                <div class="col-auto">
                                    <select name="faculty_ppr_type" id="faculty_ppr_type" class="form-select">
                                        <option value="" selected><?php echo $faculty_ppr_typed ?></option>
                                        <option value="National conference">National conference</option>
                                        <option value="National journal">National journal</option>
                                        <option value="international journal">international journal</option>
                                        <option value="International conference">International conference</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-auto">
                                    <label for="faculty_ppr_year" class="col-form-label">Acedemic year :</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" name="faculty_ppr_year" id="faculty_ppr_year" class="form-control" value="<?php echo $faculty_ppr_year ?>">
                                </div>
                            </div>
                            <div class="form-row mb-4 mb-4">
                                <div class="form-group col-md-4 mb-4">
                                    <label for="faculty_ppr_title">Title of the Paper :</label>
                                    <input type="text" name="faculty_ppr_title" class="form-control" id="faculty_ppr_title" value="<?php echo $faculty_ppr_title ?>" value="<?php echo $row['faculty_ppr_title'] ?>">
                                </div>
                                <div class="form-group col-md-4 mb-4">
                                    <label for="faculty_ppr_jourrnal">Name of the Journal/Conference :</label>
                                    <input type="text" name="faculty_ppr_jourrnal" class="form-control" id="faculty_ppr_jourrnal" value="<?php echo $faculty_ppr_jourrnal ?>">
                                </div>
                                <div class="form-group col-md-4 mb-4">
                                    <label for="faculty_ppr_pub_date">Date of Publication :</label>
                                    <input type="text" name="faculty_ppr_pub_date" class="form-control" id="faculty_ppr_pub_date" value="<?php echo $faculty_ppr_pub_date ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 mb-4">
                                    <label for="faculty_ppr_volume">Volume :</label>
                                    <input type="text" name="faculty_ppr_volume" class="form-control" id="faculty_ppr_volume" value="<?php echo $faculty_ppr_volume ?>">
                                </div>
                                <div class="form-group col-md-4 mb-4">
                                    <label for="faculty_ppr_issue">Issue :</label>
                                    <input type="text" name="faculty_ppr_issue" class="form-control" id="faculty_ppr_issue" value="<?php echo $faculty_ppr_issue ?>">
                                </div>
                                <div class="form-group col-md-4 mb-4">
                                    <label for="faculty_ppr_issn">ISSN no. :</label>
                                    <input type="text" name="faculty_ppr_issn" class="form-control" id="faculty_ppr_issn" value="<?php echo $faculty_ppr_issn ?>">
                                </div>
                            </div>
                            <button type="submit" value="Submit" class="btn btn-primary">Update</button>
                        </form>




                <?php
                    
                 ?>

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