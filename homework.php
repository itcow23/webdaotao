<?php
require "check_login.php";
require "./admin/model/connect.php";
$maKhoaHoc = $_GET['maKhoaHoc'];
$maBaiHoc = $_GET['maBaiHoc'];
$maNoiDung = $_GET['maNoiDung'];
$maLop = $_GET['maLop'];
$maTK  = $_SESSION['id'];


// 1. Lấy thông tin 1 khóa học
$sql1 = "Select * from khoahoc where maKhoaHoc='$maKhoaHoc'";
$khoahocs = (new Connection())->select($sql1);
$khoahoc = mysqli_fetch_array($khoahocs);

// 2. Lấy thông tin nội dung
$sql3 = "Select * from noidungkhoahoc where  maKhoaHoc='$maKhoaHoc' and maLop='$maLop'";
$noidungs = (new Connection())->select($sql3);

// 4.Lấy thông tin 1 bài học
$sql2 = "Select * from baihoc where  maBaiHoc='$maBaiHoc'";
$baihocss = (new Connection())->select($sql2);
$infobaihoc = mysqli_fetch_array($baihocss);

// 5. Lấy thông tin 1 nội dung
$sql5 = "Select * from noidungkhoahoc where maNoiDung='$maNoiDung'";
$tennoidung = (new Connection())->select($sql5);
$infonoidung = mysqli_fetch_array($tennoidung);

// 6. Lấy thông tin bài tập
$sql6 = "Select * from baitap where maBaiHoc='$maBaiHoc' and maLop='$maLop'";
$baitaps = (new Connection())->select($sql6);
$num_row_bt = mysqli_num_rows($baitaps);
$infobaitap = mysqli_fetch_array($baitaps);

// 7. Lấy thông tin tổng số nộp bài tập
$sql7 = "Select * from nopbaitap where maBaiHoc='$maBaiHoc' and maLop='$maLop' and maTK='$maTK'";
$nopbaitaps = (new Connection())->select($sql7);
$num_row_nopbaitap = mysqli_num_rows($nopbaitaps);


// 7. Lấy thông tin nộp bài tập của 1 học viên
$maTK = $_SESSION['id'];
$sql10 = "Select * from nopbaitap where maBaiHoc='$maBaiHoc' and maLop='$maLop' and maTK='$maTK'";
$nopbaitaphvs = (new Connection())->select($sql10);
$num_row_nopbaitaphv = mysqli_num_rows($nopbaitaphvs);
$infonopbaitap = mysqli_fetch_array($nopbaitaps);

// 8. Lấy tổng số sinh viên của lớp
$sql9 = "Select * from dangkykhoahoc where maLop='$maLop'";
$dangkykhoahocs = (new Connection())->select($sql9);
$num_row_dangkykhoahoc = mysqli_num_rows($dangkykhoahocs);

// 9. Lấy thông tin bình luận
$sql8 = "Select binhluan.*,khachhang.hoTen from binhluan inner join khachhang on binhluan.maKH=khachhang.maKH where maBaiHoc='$maBaiHoc' and maLop='$maLop'";
$binhluans = (new Connection())->select($sql8);
$num_row_binhluan = mysqli_num_rows($binhluans);

// 7. Lấy thông tin tổng số nộp bài tập
$sql17 = "Select * from nopbaitap where maBaiHoc='$maBaiHoc' and maLop='$maLop'";
$infonopbaitaps = (new Connection())->select($sql17);
$num_row_infonopbaitap = mysqli_num_rows($infonopbaitaps);

$sql12= "Select * from lop where maKhoaHoc='$maKhoaHoc' and maLop='$maLop'";
$lops = (new Connection())->select($sql12);
$lop = mysqli_fetch_array($lops);

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
                    <li class="nav-item" style="<?php if ($_SESSION['level'] == 2) { ?> display: none; <?php } ?>">
                        <a class="nav-link" href="register_course.php" data-scroll="true" href="javascript:void(0)">Đăng ký khóa học</a>
                    </li>
                    <li class="nav-item" style="<?php if ($_SESSION['level'] == 1) { ?> display: none; <?php } ?>">
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
                <div class="row" style="padding-top: 40px;">
                    <div class="col-md-4">
                        <div class="product-details">
                            <a href="#">
                                <h3 class="title"><?php echo $khoahoc['tenKhoaHoc'] ." - Lớp " . $lop['tenLop']?></h3>
                            </a>
                        </div>
                        <?php foreach ($noidungs as $noidung) : ?>
                            <?php
                            $maNoiDung = $noidung['maNoiDung'];
                            $sql2 = "Select * from baihoc where maNoiDung = '$maNoiDung'";
                            $baihocs = (new Connection())->select($sql2);
                            ?>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $maNoiDung ?>" aria-expanded="true" aria-controls="collapseOne">
                                                <?php echo $noidung['noiDungKhoaHoc'] ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?php echo $maNoiDung ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <ul style="padding-left: 20px;">
                                                <?php foreach ($baihocs as $baihoc) : ?>
                                                    <li style="list-style-position: outside;">
                                                        <a href="lesson.php?maKhoaHoc=<?php echo $baihoc['maKhoaHoc'] ?>&maBaiHoc=<?php echo $baihoc['maBaiHoc'] ?>&maNoiDung=<?php echo $baihoc['maNoiDung'] ?>&maLop=<?php echo $maLop?>">
                                                            <?php echo $baihoc['tenBaiHoc'] ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="col-md-8">
                        <div class="product-details">
                            <h3 class="title"><?php echo $infobaihoc['tenBaiHoc'] ?></h3>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#create_homework" <?php if ($_SESSION['level'] == 1 ||  $num_row_bt != 0) echo "hidden" ?>>Thêm bài tập</button>
                            <button class="btn btn-success" data-toggle="modal" data-target="#edit_homework" <?php if ($_SESSION['level'] == 1 || $num_row_bt == 0) echo "hidden" ?>> Sửa bài tập </button>
                            <br>
                            <br>
                            <span <?php if ($num_row_bt == 0) echo "hidden" ?>><?php echo $infobaitap['moTa'] ?></span>

                            <!-- Create Homework -->
                            <div class="modal fade" id="create_homework" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Thêm bài tập</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="process_homework_create.php?maKhoaHoc=<?php echo $maKhoaHoc ?>&maNoiDung=<?php echo $maNoiDung ?>&maBaiHoc=<?php echo $maBaiHoc ?>&maLop=<?php echo $maLop ?>" method="POST" enctype="multipart/form-data">
                                                <div class="form-group col-md-12">
                                                    <label>Mô Tả</label>
                                                    <input type="text" name="moTa" class="form-control" placeholder="Nhập mô tả">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Hạn nộp</label>
                                                    <input type="date" name="hanNop" class="form-control" placeholder="Nhập hạn nộp">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>File bài tập</label>
                                                    <input type="file" name="file_homework" class="form-control" placeholder="file">
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

                            <!-- Edit Homework -->
                            <div class="modal fade" id="edit_homework" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Sửa bài tập</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="process_homework_edit.php?maKhoaHoc=<?php echo $maKhoaHoc ?>&maNoiDung=<?php echo $maNoiDung ?>&maBaiHoc=<?php echo $maBaiHoc ?>&maLop=<?php echo $maLop ?>" method="POST" enctype="multipart/form-data">

                                                <div class="form-group col-md-12">
                                                    <label>Mô Tả</label>
                                                    <input type="text" name="moTa" value="<?php echo $infobaitap['moTa'] ?>" class="form-control" placeholder="Nhập mô tả">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Hạn nộp</label>
                                                    <input type="date" name="hanNop" value="<?php echo $infobaitap['hanNop'] ?>" class="form-control" placeholder="Nhập hạn nộp">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>File bài tập cũ</label>
                                                    <a href="assets/homework/<?php echo $infobaitap['file_homework'] ?>" download="<?php echo $infobaitap['file_homework'] ?>">
                                                        <?php echo $infobaitap['file_homework'] ?>
                                                    </a>
                                                    <input type="hidden" name="file_homework_old" value="<?php echo $infobaitap['file_homework'] ?>" class="form-control" placeholder="file">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Upload bài tập mới</label>
                                                    <input type="file" name="file_homework_new" class="form-control" placeholder="file">
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

                        </div>
                        <br>
                        <h3 <?php if ($num_row_bt != 0 || $_SESSION['level'] == 2) echo "hidden" ?>>
                            Chưa có bài tập được giao
                        </h3>
                        <div class="table-responsive" <?php if ($num_row_bt == 0) echo "hidden" ?>>
                            <table class="table">
                                <tr>
                                    <th>File bài tập</th>
                                    <td>
                                        <a href="assets/homework/<?php echo $infobaitap['file_homework'] ?>" download="<?php echo $infobaitap['file_homework'] ?>" style="color: red;">
                                            <?php echo $infobaitap['file_homework'] ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hạn nộp</th>
                                    <td><?php echo $infobaitap['hanNop'] ?></td>
                                </tr>
                                <tr <?php if ($_SESSION['level'] == 1) echo "hidden"; ?>>
                                    <th>Nộp bài</th>
                                    <td><?php echo $num_row_infonopbaitap ?>/<?php echo $num_row_dangkykhoahoc ?></td>
                                    <td><button class="btn" data-toggle="modal" data-target="#list">Danh sách nộp bài</button></td>
                                </tr>
                                <tr <?php if ($_SESSION['level'] == 2) echo "hidden"; ?> >
                                    <th>Bài Tập</th>
                                    <td><?php if ($num_row_nopbaitaphv == 0) echo "Chưa nộp";
                                        else { ?>
                                            <a href="assets/submit_homework/<?php echo $infonopbaitap['fileNop'] ?>" download="<?php echo $infonopbaitap['fileNop'] ?>" style="color: red;">
                                                <?php echo $infonopbaitap['fileNop'] ?>
                                            </a>
                                            - Ngày Nộp <?php echo $infonopbaitap['ngayNop']; ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>

                            <form action="process_submitHW.php?maKhoaHoc=<?php echo $maKhoaHoc ?>&maNoiDung=<?php echo $maNoiDung ?>&maBaiHoc=<?php echo $maBaiHoc ?>&maLop=<?php echo $maLop ?>" method="POST" enctype="multipart/form-data" <?php if ($_SESSION['level'] == 2 || $num_row_nopbaitap != 0) echo "hidden" ?>>
                                <input type="file" name="fileSubmit">
                                <button class="btn">
                                    Nộp bài
                                </button>
                            </form>

                            <form action="process_editHW.php?maKhoaHoc=<?php echo $maKhoaHoc ?>&maNoiDung=<?php echo $maNoiDung ?>&maBaiHoc=<?php echo $maBaiHoc ?>&maLop=<?php echo $maLop ?>" method="POST" enctype="multipart/form-data" <?php if ($_SESSION['level'] == 2 || $num_row_nopbaitap == 0) echo "hidden" ?>>
                                <input type="hidden" name="fileSubmit_old" value="<?php echo $infonopbaitap["fileNop"] ?>">
                                <input type="file" name="fileSubmit_new">
                                <button class="btn">
                                    Sửa bài
                                </button>
                            </form>
                            <hr>
                            <div class="">
                                <form action="process_comment.php?maKhoaHoc=<?php echo $maKhoaHoc ?>&maNoiDung=<?php echo $maNoiDung ?>&maBaiHoc=<?php echo $maBaiHoc ?>&maLop=<?php echo $maLop ?>" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bình luận</label>
                                        <textarea class="form-control" name="noiDung" id="exampleInputEmail1" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                </form>
                                <hr>
                                <?php if ($num_row_binhluan != 0) { ?>
                                    <?php foreach ($binhluans as $binhluan) : ?>
                                        <div>
                                            <h5 style="font-weight: bold;"><?php echo $binhluan['hoTen'] ?> <span style="font-size: 12px;"><?php echo $binhluan['ngayDang'] ?></span></h5>
                                            <p id="comment<?php echo $binhluan['maBinhLuan'] ?>"><?php echo $binhluan['noiDung'] ?></p>
                                            <form method="post" action="process_edit_comment.php?maKhoaHoc=<?php echo $maKhoaHoc ?>&maNoiDung=<?php echo $maNoiDung ?>&maBaiHoc=<?php echo $maBaiHoc ?>&maLop=<?php echo $maLop ?>" id="edit_comment<?php echo $binhluan['maBinhLuan'] ?>" style="display: none;">
                                                <input type="hidden" name="maBinhLuan" value="<?php echo $binhluan['maBinhLuan'] ?>">
                                                <textarea class="form-control" name="noiDung" id="exampleInputEmail1" rows="3"><?php echo $binhluan['noiDung'] ?></textarea>
                                                <button type="submit">Sửa</button>
                                            </form>
                                            <div id="btnComment<?php echo $binhluan['maBinhLuan'] ?>" <?php if ($_SESSION['maKH'] != $binhluan['maKH']) echo "hidden" ?>>
                                                <button onclick="editcomment<?php echo $binhluan['maBinhLuan'] ?>()" style="margin-right: 20px;">Sửa</button>
                                                <a href="process_delete_comment.php?maKhoaHoc=<?php echo $maKhoaHoc ?>&maNoiDung=<?php echo $maNoiDung ?>&maBaiHoc=<?php echo $maBaiHoc ?>&maBinhLuan=<?php echo $binhluan['maBinhLuan'] ?>&maLop=<?php echo $maLop ?>"><button>Xóa</button></a>
                                            </div>
                                            <hr>
                                        </div>
                                    <?php endforeach; ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- wrapper -->
            <script>
                <?php foreach ($binhluans as $binhluan) : ?>

                    function editcomment<?php echo $binhluan['maBinhLuan'] ?>() {
                        var x = document.getElementById("edit_comment<?php echo $binhluan['maBinhLuan'] ?>");
                        var y = document.getElementById("btnComment<?php echo $binhluan['maBinhLuan'] ?>");
                        var z = document.getElementById("comment<?php echo $binhluan['maBinhLuan'] ?>");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            y.style.display = "none";
                            z.style.display = "none";
                        } else {
                            x.style.display = "none";
                            y.style.display = "block";
                            z.style.display = "block";
                        }
                    }
                <?php endforeach; ?>
            </script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

<?php if (isset($_SESSION['code'])) { ?>
    <script type="text/javascript">
        $(document).ready(function() {
            swal({
                title: '<?php echo $_SESSION['status']; ?>',
                icon: '<?php echo $_SESSION['code']; ?>',
                button: "Ok",
                timer: 2000
            });
        });
    </script>
<?php unset($_SESSION['code']);
    unset($_SESSION['status']);
} ?>




</html>

<!-- Modal danh sách sinh viên -->
<div class="modal fade" id="list" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Danh sách học viên</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <a href="downloadAllFile.php?malop=<?= $maLop ?>&mabaihoc=<?= $maBaiHoc ?>" class="btn btn-success">
                Download All
            </a>
                <div class="table-responsive">
                    <table class="table table-hover" id="list-files">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th>File</th>
                                <th>Ngày nộp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($dangkykhoahocs as $hocvien) :
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $i;
                                        $i = $i + 1;
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $hocvien['tenHV']; ?>
                                        
                                    </td>
                                    <?php
                                    $test = '';

                                    foreach ($infonopbaitaps as $nopbai) : ?>
                                        <?php if ($hocvien['maTK'] == $nopbai['maTK']) {
                                            $test = $nopbai;
                                        }
                                        ?>
                                    <?php endforeach; ?>
                                    <td class="file_path">
                                        <?php if (!empty($test)) { ?>
                                            <a href="assets/submit_homework/<?php echo $test['fileNop'] ?>" download="<?php echo $test['fileNop'] ?>" style="color: red;">
                                                <?php echo $test['fileNop'] ?>
                                            </a>
                                        <?php } else echo "Chưa nộp"; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($test)) echo $test['ngayNop'];
                                        else echo "Chưa nộp"; ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>