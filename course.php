<?php 
    require "check_login.php";
    require "./admin/model/connect.php"; 

    $maTK =  $_SESSION[ 'id' ];
    
    //Lấy khóa học học viên đã đăng ký
    $sql= "select * from dangkykhoahoc  INNER JOIN khoahoc ON dangkykhoahoc.maKhoaHoc = khoahoc.maKhoaHoc where maTK = '$maTK' ";
    $resulthv = (new Connection())->select($sql);

    //Lấy khóa học giảng viện dạy
    $sqlgv= "select * from lop  INNER JOIN khoahoc ON lop.maKhoaHoc = khoahoc.maKhoaHoc where  maTK = '$maTK' ";
    $resultgv = (new Connection())->select($sqlgv);
?>
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
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent nav-down" color-on-scroll="200">
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
    <div class="page-header" style="background-image: url('./assets/img/img.jpg');">
        <div class="filter"></div>
        <div class="content-center">
            <div class="container text-center">
            </div>
        </div>
    </div>
    <div class="wrapper">

        <div class="section section-blog" <?php if($_SESSION['level']==2) echo "hidden" ?>>
            <div class="container">
                <div class="row">
                <?php foreach($resulthv as $each): ?>
                    <?php 
                        // Lấy lớp HV
                        $maKhoaHoc = $each[ 'maKhoaHoc' ];
                        $sqllophv =  "Select * from dangkykhoahoc inner join lop on dangkykhoahoc.maLop = lop.maLop where dangkykhoahoc.maTK='$maTK' and dangkykhoahoc.maKhoaHoc = '$maKhoaHoc'  ";
                        $lopHVs = (new Connection())->select($sqllophv);
                        $lophv = mysqli_fetch_array($lopHVs); 

                    ?>
                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-image">
                                <a href="course_details.php?maKhoaHoc=<?php echo $each['maKhoaHoc']; ?>&maLop=<?php echo $lophv['maLop']; ?>">
                                    <img class="img img-raised" src="./admin/public/photos/khoahoc/<?php echo $each['anh']; ?>">
                                </a>
                            </div>
                            <div class="card-body">
                                <h6 class="card-category text-info"><?php echo $each['tenKhoaHoc']; ?></h6>
                                <h5 class="card-title">
                                    <a href="#pablo"><?php echo "Lớp ". $lophv['tenLop'] ?></a>
                                </h5>
                                <hr>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $each['thoiGian']; ?> min read
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                 
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="section section-blog" <?php if($_SESSION['level']==1) echo "hidden" ?>>
            <div class="container">
                <div class="row">
                <?php foreach($resultgv as $each): ?>
                    <?php 
                        // Lấy lớp GV
                        $maKhoaHoc = $each[ 'maKhoaHoc' ];
                        $sqllopgv =  "Select * from lop where maTK='$_SESSION[id]' and maKhoaHoc =  '$maKhoaHoc' ";
                        $lopGVs = (new Connection())->select($sqllopgv);
                        $lopgv = mysqli_fetch_array($lopGVs); 

                    ?>
                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-image">
                                <a href="course_details.php?maKhoaHoc=<?php echo $each['maKhoaHoc']; ?>&maLop=<?php echo $lopgv['maLop']; ?>">
                                    <img class="img img-raised" src="./admin/public/photos/khoahoc/<?php echo $each['anh']; ?>">
                                </a>
                            </div>
                            <div class="card-body">
                                <h6 class="card-category text-info"><?php echo $each['tenKhoaHoc']; ?></h6>
                                <h5 class="card-title">
                                    <a href="#pablo"><?php echo "Lớp ". $lopgv['tenLop']; ?></a>
                                </h5>
                                <hr>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $each['thoiGian']; ?> min read
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                 
                <?php endforeach; ?>
                </div>
            </div>
        </div>

        <footer class="footer footer-big">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-9">
                        <div class="links">
                            <ul class="uppercase-links">
                                <li>
                                    <a href="#paper-kit">
									Home
								</a>
                                </li>
                                <li>
                                    <a href="#paper-kit">
									Company
								</a>
                                </li>
                                <li>
                                    <a href="#paper-kit">
									Portfolio
								</a>
                                </li>
                                <li>
                                    <a href="#paper-kit">
								   Team
								</a>
                                </li>
                                <li>
                                    <a href="#paper-kit">
								   Blog
								</a>
                                </li>
                                <li>
                                    <a href="#paper-kit">
								   Contact
								</a>
                                </li>


                            </ul>
                            <hr />

                            <div class="copyright">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>, made with <i class="fa fa-heart heart"></i> by Elearning
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ml-auto col-sm-2">
                        <div class="social-area">
                            <a href="#facebook" class="btn btn-neutral btn-round btn-just-icon btn-facebook">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="#twitter" class="btn btn-neutral btn-just-icon btn-round btn-twitter">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="#google" class="btn btn-neutral btn-just-icon btn-round btn-google">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </a>
                            <a href="#pin" class="btn btn-neutral btn-just-icon btn-round btn-pinterest">
                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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