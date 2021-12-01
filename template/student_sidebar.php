<?php
session_start();
require_once "../config.php";
$s='select * from students where usn="' . $_SESSION["username"] . '"';
                            // echo $s;
                            $res = $link->query($s);
                            $res = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../asset/style/bootstrap.min.css" />
    <link rel="stylesheet" href="../asset/style/style_student.css" />
    <link rel="shortcut icon" href="../asset/img/1aiet-logo.png" />
    <title>Student | Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../asset/style/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/style/style_student.css">
    <link rel="shortcut icon" href="../asset/img/1aiet-logo.png" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../asset/style/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/style/style_student.css">
    <link rel="shortcut icon" href="../asset/img/1aiet-logo.png" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="../asset/style/bootstrap.min.css" />
</head>

<body>
    <div class=" loader load-container">
        <div>
            <div class="wrapper">
                <div class="circle">
                    <div class="yinyang"></div>
                    <div class="yinyang"></div>
                </div>
            </div>
            <h3 class="mt-3">

                Loading....

            </h3>

        </div>
    </div>
    <style>
        *
        {
            transition: 0.7s ease-in-out !important;
        }
    .dropdown-toggle::after {
        display: none;

    }

    .dropdown-menu[data-bs-popper] {
        left: -250%;
        animation: show 500ms;
    }

    .avatar {
        background-color: #ffe6b8;
        color: orange;
        border: 2px solid orange;
        padding: 13px;
        border-radius: 50%;
        margin: 0;
        width: 40px;
        height: 40px;
        display: flex;
        text-align: center;
        align-content: center;
        justify-content: center;
        align-items: center;
        animation: show 1s;
        text-transform: uppercase;
    }

    @keyframes show {
        0% {
            opacity: 30%;
        }

        100% {
            opacity: 100%;
        }
    }

    #sidebar ul li.active>a,
    a[aria-expanded="true"] {
        background: transparent
    }
    #sidebar ul.components { border: none !important;}
    /* loading screen */
    .load-container {
        padding: 0;
        margin: 0;
        width: 100vw !important;
        height: 100vh !important;
        background: radial-gradient(#7d59b6bf, #4447ad);
        z-index: 99999999999999;
    }

    .circle {
        margin-top: 3rem;
        box-sizing: border-box;
        height: 200px;
        width: 200px;
        border-radius: 50%;
        padding-left: 50px;
        background-image: linear-gradient(to left, #fff, #fff 50%, #000 50%, #000);
        animation: roll 10s linear infinite;
    }

    .yinyang {
        position: relative;
        background: #fff;
        height: 100px;
        width: 100px;
        border-radius: 50%;
        background-image: linear-gradient(to left, #fff, #fff 50%, #000 50%, #000);
        animation: roll 4s linear infinite;
        animation-direction: reverse;
    }

    .yinyang:before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translatex(-50%);
        background: #fff;
        border: 18px solid #000;
        border-radius: 50%;
        width: 50px;
        height: 50px;
    }

    .yinyang:after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translatex(-50%);
        background: #000;
        border: 18px solid #fff;
        border-radius: 50%;
        width: 50px;
        height: 50px;
    }

    @keyframes roll {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(-360deg);
        }
    }

    .loader {
        position: absolute;
        align-items: center;
        display: flex;
        justify-content: center;
        background: #efefef88;
        text-align: center;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    p {
        opacity: .55;
    }

    .wrapper {
        filter: drop-shadow(0 0 0.75rem #7d888c);
    }

    /* loading screen */
    a {
        text-decoration: none;
    }

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
        justify-content: center;
    }

    #content {
        width: 100%;
        padding: 20 px;
        min-height: 100 vh;
        transition: all 0.3s;
    }

    .student-navbar {
        background: #fff !important;
        box-shadow: 0px 0px 13px 3px #a49fa7;
    }

    .dropdown-toggle::after {
        display: none;
    }

    .avatar {
        background-color: #ffe6b8;
        color: orange;
        border: 2px solid orange;
        padding: 13px;
        border-radius: 50%;
        margin: 0;
        width: 40px;
        height: 40px;
        display: flex;
        text-align: center;
        align-content: center;
        justify-content: center;
        align-items: center;
        animation: show 1s;
        text-transform: uppercase;
    }
    </style>
    <script>
    function onReady(callback) {
        var intervalId = window.setInterval(function() {
            if (document.getElementsByTagName('body')[0] !== undefined) {
                window.clearInterval(intervalId);
                callback.call(this);
            }
        }, 1000);
    }

    function setVisible(selector, visible) {
        document.querySelector(selector).style.display = visible ? 'flex' : 'none';
    }

    onReady(function() {
        setVisible('.loader', false);
        setVisible('.page', true);
    });
    </script>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div style="margin-left: 50px">
                    <a href="#">
                        <img src="../asset/img/1aiet-logo.png" style="height: 10vh" class="img-fluid ml-auto" alt=""
                            srcset="" />
                    </a>
                </div>
            </div>

            <ul class="list-unstyled components" >
                <li>
                    <a href="../student_profile/student_login_view.php" style="color: black">IA Marks</a>
                    <li>
                    <a href="#leaveSubmenu" data-toggle="collapse" style="color: black" aria-expanded="false"
                        class="dropdown-toggle">Leave</a>
                    <ul class="collapse list-unstyled" id="leaveSubmenu">
                        <li>
                            <a href="../leave_management/details.php" style="color: black; background:white">Details</a>
                        </li>
                        <li>
                            <a href="../leave_management/medical.php" style="color: black; background:white">Medical</a>
                        </li>
                        <li>
                            <a href="../leave_management/event.php" style="color: black; background:white">Event</a>
                        </li>
                       
                       
                        <?php
                            
                            if($res["semester"] == "7" || $res["semester"] == "8"){
                        ?>

                        <li>
                        <a href="../leave_management/placement.php" style="color: black; background:white">Placement</a>
                        </li>

                        <?php 
                      }
                       ?>

                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light bg-light student-navbar">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn btn-info ">
                            <i class="fas fa-align-left"></i>
                        </button>
                        <div class="d-none d-sm-none d-md-block">
                            <h5 style="text-align: center;" class="">Alva's Institute Of Engineering & Technology</h5>
                        </div>

                        <div class="d-md-none d-sm-block">
                            <h5 style="text-align: center;" class=" ">AIET</h5>
                        </div>

                        <div class="row">
                        <div id="Back-btn" class="col">
                                <button class="btn" onclick="window.history.back();">
                                    <i class="fa fa-lg fa-arrow-left"></i>
                                </button>
                            </div>
                            <div class="col p-0 m-0" id="navbarSupportedContent" style="justify-content: flex-end;">
                                <li class="nav-item dropdown " style="list-style: none;">
                                    <a class="nav-link dropdown-toggle p-0 m-0" data-bs-toggle="dropdown" href="#"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <php ?>
                                            <Span class="p-0 m-0 avatar"
                                                style="color:orange; font-size:18px; font-weight:bold;">
                                                <?php
                                        $user = $_SESSION['username'];
                                        echo $user[-3];
                                        echo $user[-2];
                                        echo $user[-1];
                                        ?>
                                            </Span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class=" dropdown-item"
                                            href="../student_profile/student_login_profile_view.php">
                                            <i class="fas fa-users  p-2"></i> Profile </a>
                                        <a class="dropdown-item" href="../student_profile/reset-password.php"> <i
                                                class="fas fa-key  p-2"></i>Reset Password</a>
                                        <a class=" dropdown-item" href="#" onclick="alert('notificaions')"><i
                                                class="fas fa-bell p-2"></i> Notifications </a>
                                        <div class="dropdown-divider"></div>
                                        <a class=" dropdown-item" href="../logout.php"><i class="fas fa-power-off p-2">
                                                Logout</i></a>
                                    </div>
                                </li>
                                <!-- </ul> -->
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- page content start -->
            <div>