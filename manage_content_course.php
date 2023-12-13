<?php 
    require "check_login.php";
    require "./admin/model/connect.php";
    $maKhoaHoc = $_GET['maKhoaHoc'];
    $maLop  = $_GET['maLop'];

    $sql2= "Select * from lop inner join khoahoc on khoahoc.maKhoaHoc = lop.maKhoaHoc where maLop = '$maLop' and khoahoc.maKhoaHoc = '$maKhoaHoc'";
    $result = (new Connection())->select($sql2);
    $item = mysqli_fetch_array($result);

    $sql= "Select * from khoahoc where  maKhoaHoc = '$maKhoaHoc'";
    $khoahocs = (new Connection())->select($sql);
    $khoahoc = mysqli_fetch_array($khoahocs);

    $sql1= "Select noidungkhoahoc.*,khoahoc.tenKhoaHoc,lop.tenLop from noidungkhoahoc inner join khoahoc on  khoahoc.maKhoaHoc=noidungkhoahoc.maKhoaHoc inner join lop on  lop.maLop=noidungkhoahoc.maLop where noidungkhoahoc.maKhoaHoc = '$maKhoaHoc' and noidungkhoahoc.maLop = '$maLop'";
    $noidungs = (new Connection())->select($sql1);

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
                        <h2 style="text-align: center; color: red; margin-bottom: 20px; font-weight: 500;">Quản lý nội dung <?php echo " - Khóa" . $item['tenKhoaHoc'] ." - Lớp ".$item['tenLop'] ?></h2>
                    </div>
                </div>
                <div class="row">
                    <h2></h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Quản lý khóa học
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <ul style="padding-left: 20px;">
                                            <li style="list-style-position: outside;">
                                               <a href="manage_content_course.php?maKhoaHoc=<?php echo $maKhoaHoc ?>&maLop=<?php echo $maLop ?>">
                                                    Quản lý nội dung
                                               </a> 
                                            </li>
                                            <li style="list-style-position: outside;">
                                                <a href="manage_lesson_course.php?maKhoaHoc=<?php echo $maKhoaHoc ?>&maLop=<?php echo $maLop ?>">
                                                    Quản lý bài học
                                               </a> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                    <div class="table-responsive">
                        <button class="btn btn-info" data-toggle="modal" data-target="#create">
                            Thêm
                        </button>
                            <table class="table">
                                        <tr>
                                            <th>Mã</th>
                                            <th>Tên Khoá Học</th>
                                            <th>Nội Dung Khóa Học</th>
                                            <th>Tên Lớp</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    
                                    <?php foreach($noidungs as $each): ?>
                                        <tr>
                                            <td><?php echo $each['maNoiDung'] ?></td>
                                            <td><?php echo $each['tenKhoaHoc'] ?></td>
                                            <td><?php echo $each['noiDungKhoaHoc']  ?></td>
                                            <td><?php echo $each['tenLop']  ?></td>
                                            <td>
                                                <button class="btn btn-success" data-toggle="modal" data-target="#maNoiDung<?php echo $each['maNoiDung'] ?>">
                                                    Sửa
                                                </button>
                                                
                                            </td>
                                            <td>
                                                <a href="process_delete_content_course.php?maNoiDung=<?php echo $each['maNoiDung'] ?>&maKhoaHoc=<?php echo $maKhoaHoc ?>&maLop=<?php echo $maLop ?>" class="btn btn-danger">
                                                    Xoá
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="maNoiDung<?php echo $each['maNoiDung'] ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Sửa nội dung khoa học</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="process_edit_content_course.php" method="POST">
                                                            <input type="hidden" name="maNoiDung" value="<?php echo $each['maNoiDung'] ?>">
                                                            <div class="form-group col-md-12">
                                                                <label>Tên Khóa Học</label>
                                                                <input type="hidden" name="maKhoaHoc" value="<?php echo $maKhoaHoc ?>">
                                                                <input type="hidden" name="maLop" value="<?php echo $maLop ?>">
                                                                <input type="text" value="<?php echo $khoahoc['tenKhoaHoc'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label>Nội Dung</label>
                                                                <input type="text" name="noiDungKhoaHoc" class="form-control" value="<?php echo $each['noiDungKhoaHoc'] ?>">
                                                            </div>

                                                            <div class="form-group mb-0 justify-content-end row">
                                                                <div class="col-7">
                                                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                            </table>
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

<!-- Model create -->
<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm nội dung khoa học</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="process_create_content_course.php" method="POST">
               
                    <div class="form-group col-md-12">
                        <label>Tên Khóa Học</label>
                        <input type="hidden" name="maKhoaHoc" value="<?php echo $maKhoaHoc ?>">
                        <input type="hidden" name="maLop" value="<?php echo $maLop ?>">
                       <input type="text" value="<?php echo $khoahoc['tenKhoaHoc'] ?>" readonly>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Nội Dung</label>
                        <input type="text" name="noiDungKhoaHoc" class="form-control" placeholder="Nội dung khóa học">
                    </div>

                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


