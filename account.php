<?php 
    require "check_login.php";
    require "./admin/model/connect.php"; 

    $maKH= $_SESSION['maKH'];
    $sql= "Select * from khachhang where maKH='$maKH'";
    $result =  (new Connection())->select($sql);
    $user =  mysqli_fetch_array($result);

    $avatar = "./admin/public/photos/khachhang/".$user['avatar'];
    $noavatar =  "./admin/public/photos/khachhang/noavatar.png";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Lesson</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/examples.css" rel="stylesheet" />
    <link href="./assets/css/gsdk.css" rel="stylesheet" />
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
                            <a class="dropdown-item" href="#"><i class="nc-icon nc-bank"></i>&nbsp; Tài Khoản</a>
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
                <div class="row" style="padding-top: 70px;">
                    <div class="fileinput-preview fileinput-exists img-no-padding"></div>
                    <div class="col-md-6 ml-auto mr-auto">
                    <?php if(isset($_SESSION['success'])){ ?>
                        <div class="alert alert-success">
                            <div class="alert_container">
                                <span><?php 
                                     echo $_SESSION['success'];
                                    unset($_SESSION['success']); ?> </span>
                            </div>
                        </div>
                    <?php } ?>
                        <form class="settings-form" action="process_account.php" method="POST" enctype="multipart/form-data">
                            <div class="fileinput-new img-no-padding" style="margin-left: 140px; margin-bottom:40px;">
                                <img class="img-circle img-no-padding img-responsive" src="<?php if(empty($user['avatar'])) {echo $noavatar;} else {echo $avatar; } ?>" alt="Avatar" style="max-block-size:200px;">
                            </div>
                            <div class="form-group">
                                <label>Họ Tên</label>
                                <input type="text" class="form-control border-input" value="<?php echo $user['hoTen'] ?>" readonly>
                            </div>
                          <div class="form-group">
                                <label>Ngày Sinh</label>
                                <input type="text" class="form-control border-input" value="<?php echo $user['ngaySinh'] ?>" readonly>
                          </div>
                          <div class="form-group">
                                <label>Giới Tính</label>
                                <input type="text" class="form-control border-input" value="<?php if($user['gioiTinh']==1) echo "Nam"; else echo "Nữ";  ?>" readonly>
                          </div>
                          <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="soDienThoai" class="form-control border-input" value="<?php if(isset($_SESSION['error_sdt'])) echo $_GET['sdt']; else echo $user['soDienThoai'] ?>">
                                <span style="color: red;"><?php 
                                if(isset($_SESSION['error_sdt'])) echo $_SESSION['error_sdt'];
                                unset($_SESSION['error_sdt']); ?></span>
                          </div>
                          <div class="form-group">
                                <label>Địa Chỉ</label>
                                <input type="text" name="diaChi" class="form-control border-input" value="<?php echo $user['diaChi'] ?>">
                          </div>
                            <div class="form-group">
                                    <label>Thay đổi ảnh</label>
                                    <input type="file" name="avatar" class="form-control border-input">
                            </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-wd btn-info btn-round">Save</button>
                          </div>
                        </form>

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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if(isset($_SESSION['code'])){?>
<script type="text/javascript">
$(document).ready(function() {
    swal({
        title:  '<?php echo $_SESSION['status']; ?>',
        icon:  '<?php echo $_SESSION['code']; ?>',
        button: "Ok",
        timer: 2000
    });
});
</script>
<?php unset($_SESSION['code']);
  unset($_SESSION['status']);
} ?>




</html>