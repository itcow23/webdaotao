<?php require "check_login.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Elearning</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/paper-kit.css?v=2.1.0" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet">

</head>

<body class="ecommerce">
    <nav class="navbar navbar-expand-lg fixed-top nav-down">
        <div class="container">
            <div class="navbar-translate">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">Elearning</a>
                </div>
                <button class="navbar-toggler navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
				</button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="course.php" data-scroll="true" href="javascript:void(0)">Khóa Học</a>
                    </li>
                    <li class="nav-item" style="<?php if($_SESSION['level']==2){ ?> display: none; <?php } ?>">
                        <a class="nav-link" href="register_course.php" data-scroll="true" href="javascript:void(0)">Đăng ký khóa học</a>
                    </li>
                    <li class="nav-item" style="<?php if($_SESSION['level']==1){ ?> display: none; <?php } ?>">
                        <a class="nav-link" href="manage_course.php" data-scroll="true" href="javascript:void(0)">Quản lý khóa học</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)"><?php echo $_SESSION['hoTen'] ?></a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                            <a class="dropdown-item" href="account.php"><i class="nc-icon nc-bank"></i>&nbsp; Tài Khoản</a>
                            <a href="logout.php" class="dropdown-item"><i class="nc-icon nc-basket"></i>&nbsp; Đăng Xuất</a>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <div class="section section-blog">
            <div class="container">
                <h1></h1>
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align: center; color: red; margin-bottom: 20px; font-weight: 500;">HỆ THỐNG HỌC KẾT HỢP ELEARNIG</h2>
                    </div>
                </div>
                <div class="row">
                    <!-- SINH VIÊN -->
                    <div class="col-md-6" style="<?php if($_SESSION['level']==2){ ?> display: none; <?php } ?>">
                        <div class="card card-blog" style="background-color: royalblue;">
                            <div class="card-image" style="text-align: center;">
                                <a href="register_course.php" >
                                    <img class="img-fluid " src="https://qlht.haui.edu.vn/theme/adaptable/pix/icon_homepage/diendan.png">
                                    <h3 style="color: white; margin: 20px; font-weight: 1000;">Đăng Ký khóa Học</h3>
                                </a>
                            </div>
                        </div>
                    </div>   

                    <!-- GIẢNG VIÊN -->
                    <div class="col-md-6" style="<?php if($_SESSION['level']==1){ ?> display: none; <?php } ?>">
                        <div class="card card-blog" style="background-color: royalblue;">
                            <div class="card-image" style="text-align: center;">
                                <a href="manage_course.php" >
                                    <img class="img-fluid " src="https://qlht.haui.edu.vn/theme/adaptable/pix/icon_homepage/diendan.png">
                                    <h3 style="color: white; margin: 20px; font-weight: 1000;">Quản lý khóa Học</h3>
                                </a>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="card card-blog" style="background-color: royalblue;">
                            <div class="card-image" style="text-align: center;">
                                <a href="course.php" >
                                    <img class="img-fluid " src="https://qlht.haui.edu.vn/theme/adaptable/pix/icon_homepage/giang-day.png">
                                    <h3 style="color: white; margin: 20px; font-weight: 1000;">Khóa Học</h3>
                                </a>
                            </div>
                        </div>
                    </div>                             
                </div>
            </div>
        </div>

    </div>
    <!-- wrapper -->

</body>

<!-- Core JS Files -->
<script src="./assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="./assets/js/popper.js" type="text/javascript"></script>
<script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Plugin for Switches -->
<script src="./assets/js/bootstrap-switch.min.js"></script>

<!--  Plugins for Slider -->
<script src="./assets/js/nouislider.js"></script>

<!--  Plugins for Select -->
<script src="./assets/js/bootstrap-select.js"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/paper-kit.js?v=2.1.0"></script>

</html>