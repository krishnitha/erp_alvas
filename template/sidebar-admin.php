<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="../asset/style/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../asset/style/style_admin.css">
    <link rel="shortcut icon" href="../asset/img/1aiet-logo.png" />
</head>
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

<body>

    <div class=" loader load-container">
        <div class="loader">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="shadow"></div>
            <div class="shadow"></div>
            <div class="shadow"></div>
            <span style="color: white;">Loading</span>
        </div>
    </div>

    <style>
    /* loading animation and stuff */
    .load-container {
        padding: 0;
        margin: 0;
        width: 100vw !important;
        height: 100vh !important;
        background: radial-gradient(#120d1abf, #080814);
        z-index: 99999999999999;
    }

    .loader {
        width: 200px;
        height: 60px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .circle {
        width: 20px;
        height: 20px;
        position: absolute;
        border-radius: 50%;
        background-color: #fff;
        left: 15%;
        transform-origin: 50%;
        animation: circle .5s alternate infinite ease;
    }

    @keyframes circle {
        0% {
            top: 60px;
            height: 5px;
            border-radius: 50px 50px 25px 25px;
            transform: scaleX(1.7);
        }

        40% {
            height: 20px;
            border-radius: 50%;
            transform: scaleX(1);
        }

        100% {
            top: 0%;
        }
    }

    .circle:nth-child(2) {
        left: 45%;
        animation-delay: .2s;
    }

    .circle:nth-child(3) {
        left: auto;
        right: 15%;
        animation-delay: .3s;
    }

    .shadow {
        width: 20px;
        height: 4px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, .5);
        position: absolute;
        top: 62px;
        transform-origin: 50%;
        z-index: -1;
        left: 15%;
        filter: blur(1px);
        animation: shadow .5s alternate infinite ease;
    }

    @keyframes shadow {
        0% {
            transform: scaleX(1.5);
        }

        40% {
            transform: scaleX(1);
            opacity: .7;
        }

        100% {
            transform: scaleX(.2);
            opacity: .4;
        }
    }

    .shadow:nth-child(4) {
        left: 45%;
        animation-delay: .2s
    }

    .shadow:nth-child(5) {
        left: auto;
        right: 15%;
        animation-delay: .3s;
    }

    .loader span {
        position: absolute;
        top: 75px;
        font-family: 'Lato';
        font-size: 20px;
        letter-spacing: 12px;
        color: #fff;
        left: 15%;
    }

    /* loading animation and stuff */
    .dropdown-item {
        color: #212529;
    }

    .dropdown-item:active {
        color: #FFF !important;
        background-color: #ff8800 !important;
        animation: show 3ms;
    }

    .dropdown-toggle::after {
        display: none;
    }

    #sidebar ul li.active>a,
    a[aria-expanded="true"] {
        color: #fff;
        background: transparent;
    }

    .dropdown-menu[data-bs-popper] {
        /* left: -250%; */
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

    body,
    html,
    .wraper {
        background-image: url("../asset/img/bg.png") !important;
        height: 100% !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;
        height: 100% !important;
        align-content: center !important;
        background: fixed;
    }
    </style>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div style="margin-left: 50px;">
                    <a href="../dashboard/admin_dashboard.php">
                        <img src="../asset/img/1aiet-logo.png" style="height: 10vh; " class="img-fluid ml-auto"
                            alt="logo" srcset="">
                    </a>
                </div>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Student</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="../students/students_insert.php">Add Student</a>
                        </li>
                        <li>
                            <a href="../students/student_Select.php">View Student</a>
                        </li>
                        <li class="">
                            <a href="../stud_register/register_select.php">Student Register</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Faculty</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                        <li>
                            <a href="../faculty/faculty_insert.php">Add Faculty</a>
                        </li>
                        <li>
                            <a href="../faculty/faculty_department.php">View Faculty</a>
                        </li>
                        <li>
                            <a href="../faculty/register.php">Faculty Register</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="#Creation" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Creation</a>
                    <ul class="collapse list-unstyled" id="Creation">
                        <li>
                            <a href="../section_creation/batch_selection.php">Section</a>
                        </li>
                        <li class="">
                            <a href="../lab_batch/lab_batch.php">Lab Batch</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Subject</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="../subject_maping/add_sub.php">Add Subject</a>
                        </li>
                        <li>
                            <a href="../subject_maping/view_sub.php">View Subject</a>
                        </li>
                        <li>
                            <a href="../student_elective_mapping/drop_view_dis.php">Student Elective Mapping</a>
                        </li>
                        <li>
                            <a href="../subject_maping/faculty_subject_mapping.php">Subject Mapping</a>
                        </li>
                        <li>
                            <a href="../subject_maping/faculty_view.php">Faculty View</a>
                        </li>

                    </ul>
                </li>




                <li>
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">HOD</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu2">
                        <li>
                            <a href="../hod_assign/assign.php">Assign HOD Post</a>
                        </li>
                        <li>
                            <a href="../hod_assign/view_hod.php">View HOD</a>
                        </li>

                    </ul>
                </li>
                <li class="">
                    <a href="../user_privilege/select_dept.php">User Privilege</a>

                </li>
            </ul>


        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" style="width: 40px; background-color:#6a6b6d;border:none"
                        class="btn btn-primary ">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <div class="d-none d-sm-none d-md-block">
                        <h5 style="text-align: center;" class="">Alva's Institute Of Engineering & Technology</h5>
                    </div>

                    <div class="d-md-none d-sm-block">
                        <h5 style="text-align: center;" class=" ">AIET</h5>
                    </div>
                    <div class="">
                        <div class="row">
                            <div id="Back-btn" class="col">
                                <button class="btn" onclick="window.history.back();">
                                    <i class="fa fa-lg fa-arrow-left"></i>
                                </button>
                            </div>

                            <div class="p-0 m-0 col" id="navbarSupportedContent" style="justify-content: flex-end;">

                                <!-- <div class="collapse navbar-collapse p-0 m-0" id="navbarSupportedContent"
                                    style="justify-content: flex-end;"> -->
                                <!-- <ul class="nav navbar-nav ml-auto"> -->
                                <li class="nav-item dropdown " style="list-style: none;">
                                    <a class="nav-link dropdown-toggle p-0 m-0"
                                        style="background-color: none !important;" data-bs-toggle="dropdown" href="#"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <Span class="p-0 m-0 avatar"
                                            style="color:orange; font-size:20px; font-weight:bold;">
                                            <?php
                                    echo 'A';
                                    ?>
                                        </Span>
                                    </a>
                                    <div class="dropdown-menu" style="left: -350%;">
                                        <a class=" dropdown-item"
                                            href="../faculty_profile/faculty_login_profile_view.php"> <i
                                                class="fas fa-users  p-2"></i> Profile </a>
                                        <a class="dropdown-item" href="../faculty/admin_passwd_reset.php"> <i
                                                class="fas fa-key  p-2"></i>Reset Password</a> <a class=" dropdown-item"
                                            href="#" onclick="alert('notificaions')"><i class="fas fa-bell p-2"></i>
                                            Notifications </a>
                                        <div class="dropdown-divider"></div>
                                        <a class=" dropdown-item" href="../logout.php"><i class="fas fa-power-off p-2">
                                                Logout</i></a>
                                    </div>
                                </li>

                                <!-- </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- page content start -->
            <div>