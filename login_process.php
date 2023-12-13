<?php
require "./admin/model/connect.php"; 
$email = $_GET[ 'email' ];
$matKhau = $_GET[ 'matKhau' ];

$sql= "Select * from taikhoan inner join khachhang on taikhoan.id = khachhang.maTK
 where email='$email' and matKhau='$matKhau'";
$result =  (new Connection())->select($sql);
$num_row = mysqli_num_rows($result);
if ($num_row == 1) {
    session_start();
    $each =  mysqli_fetch_array($result);
    $_SESSION[ 'id' ] = $each['id'];
    $_SESSION[ 'hoTen' ] = $each['hoTen'];
    $_SESSION[ 'level' ] = $each[ 'level' ];
    $_SESSION[ 'maKH' ] = $each[ 'maKH' ];
    header( 'Location:index.php' );
}
else {
    session_start();
    $_SESSION['error'] = "Sai tên đăng nhập hoặc mật khẩu";
    header("location:login.php");
    exit;
}