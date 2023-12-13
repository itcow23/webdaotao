<?php 
    require "check_login.php";
    require "./admin/model/connect.php"; 
    $sql= "Select * from khoahoc";
    $result = (new Connection())->select($sql);

 
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
                        <h2 style="text-align: center; color: red; margin-bottom: 20px; font-weight: 500;">Đăng ký khóa học</h2>
                    </div>
                    <?php if(isset($_SESSION['success'])){ ?>
                            <div class="alert alert-success toast">
                                <div class="alert_container">
                                    <span>
                                        <?php  echo $_SESSION['success'];
                                        unset($_SESSION['success']); ?> 
                                    </span>
                                </div>
                            </div>
                        <?php } ?>
                </div>
                <div class="row">
                    <h2></h2>
                </div>
                <div class="row">
                    <?php foreach($result as $each): ?>
<?php
       //Lấy thông tin đăng ký
       $maTK = $_SESSION['id'];
       $maKhoaHoc_dky = $each['maKhoaHoc'] ;
       $sql1 = "select * from dangkykhoahoc  where maTK = '$maTK' and maKhoaHoc = '$maKhoaHoc_dky'";
       $result1 = (new Connection())->select($sql1);
       $num_row_dky = mysqli_num_rows($result1);
       $dangky = mysqli_fetch_array($result1);
?>
                        <div class="col-md-3">
                            
                                <div class="card card-blog">
                                    <div class="card-image">
                                        <a href="#">
                                            <img class="img img-raised" src="./admin/public/photos/khoahoc/<?php echo $each['anh']; ?>">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-category text-info"><?php echo $each['tenKhoaHoc']; ?></h6>
                                        <h5 class="card-title">
                                            <a href="#pablo"><?php echo $each['moTa']; ?></a>
                                        </h5>
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $each['thoiGian']; ?> min read
                                        </div>
                                    </div>
                                    <div class="card-footer" style="text-align: center;">
                                        <button <?php if($num_row_dky != 0) echo "hidden"; ?> class="btn btn-info" data-toggle="modal" data-target="#create<?php echo $each['maKhoaHoc'] ?>">
                                            Đăng Ký
                                        </button>
                                        <button <?php if($num_row_dky == 0) echo "hidden"; ?> class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $each['maKhoaHoc'] ?>">
                                            Hủy
                                        </button>
                                    </div>
                                </div>
                        </div>  
                                        <!-- Modal -->
<?php
    $maKhoaHoc_lop =  $each['maKhoaHoc'];
    $sql = "SELECT lop.*,khachhang.hoTen FROM lop inner join taikhoan on lop.maTK = taikhoan.id
    inner join khachhang on taikhoan.id = khachhang.maTK WHERE maKhoaHoc = '$maKhoaHoc_lop'";
    $lops = (new Connection())->select($sql);
?>
<!-- modal đăng ký khóa học-->
<div class="modal fade" id="create<?php echo $each['maKhoaHoc'] ?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Đăng ký <?php echo $each['tenKhoaHoc'] ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Tên Lớp</th>
                            <th>Giáo viên</th>
                            <th>Số Lượng</th>
                            <th>Đăng ký</th>
                        </tr>
                        <?php foreach ($lops as $lop): ?>
                            <?php
                                $malop =  $lop['maLop'];
                                $maKhoaHoc = $lop['maKhoaHoc'];
                                $sql123 = "select * from dangkykhoahoc where maLop = '$malop' and maKhoaHoc = '$maKhoaHoc'";
                                $sum = (new Connection())->select($sql123);
                                $num_sum = mysqli_num_rows($sum);
                             ?>
                            <form action="process_register.php" method="POST">
                             <tr>
                                 <td>
                                    <input type="hidden" name="maKhoaHoc" value="<?php echo $lop['maKhoaHoc'] ?>">
                                    <input type="hidden" name="tenHV" value="<?php echo $_SESSION['hoTen'] ?>">
                                    <input type="hidden" name="maTK" value="<?php echo $_SESSION['id'] ?>">
                                    <input type="hidden" name="maLop" value="<?php echo $lop['maLop'] ?>">
                                    <input type="text" name="tenLop" value="<?php echo $lop['tenLop'] ?>" readonly style="border: none; outline:none;">
                                 </td>
                                 <td>
                                 <input type="text" name="tenGV" value="<?php echo $lop['hoTen'] ?>" readonly style="border: none; outline:none;">
                                 </td>
                                 <td>
                                    <input type="text" value="<?php echo $num_sum . "/60" ?>" readonly style="border: none; outline:none;">
                                 </td>
                                 <td>
                                     <button type="submit" class="btn btn-info">Đăng ký</button>
                                 </td>
                             </tr>
                            </form>
                             <?php endforeach; ?>
                        </table>
                    </div>
            </div>
        </div>
    </div>        
</div>    

<!-- modal hủy khóa học -->
<div class="modal fade" id="delete<?php echo $each['maKhoaHoc'] ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Xác nhận hủy khóa học <?php echo $each['tenKhoaHoc'] ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="margin: auto;">
               <form action="process_delete_register.php" method="post">
                    <input type="hidden" name="maDangKy" value="<?php echo $dangky['maDangKy'] ?>">
                    <button type="submit" class="btn btn-primary" style="margin-right:100px;">Đồng ý</button>
                    <button type="" class="btn btn-danger" data-dismiss="modal">Hủy</button>
               </form>
            </div>
        </div>
    </div>        
</div>                       
                    <?php endforeach; ?>    

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