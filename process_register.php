<?php
require  "check_login.php";
require "./admin/model/connect.php";

$maKhoaHoc = $_POST['maKhoaHoc'];
$maLop =  $_POST['maLop'];
$tenHV = $_POST['tenHV'];
$tenGV =  $_POST['tenGV'];
$maTK =  $_POST['maTK'];

$sql1 = "Select * from dangkykhoahoc where maLop =  '$maLop'";
$result1 =  (new Connection())->select($sql1);
$num_row = mysqli_num_rows($result1);


if($num_row > 59)
{
    $_SESSION['code'] = "error";
    $_SESSION['status'] = "Lớp đầy";
    header("location:register_course.php");
    exit;
}else{
    $sql = "INSERT INTO dangkykhoahoc (maLop,maKhoaHoc,tenGV, tenHV,maTK ) VALUES ('$maLop', '$maKhoaHoc', '$tenGV', '$tenHV','$maTK')";
    $result =  (new Connection())->excute($sql);

    $_SESSION['code'] = "success";
    $_SESSION['status'] = "Đăng ký thành công";
    header( "Location: register_course.php" );
}
