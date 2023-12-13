<?php
require  "check_login.php";
require "./admin/model/connect.php";

$maBaiHoc = $_GET['maBaiHoc'];
$maKhoaHoc = $_GET['maKhoaHoc'];
$maNoiDung = $_GET['maNoiDung'];
$maLop = $_GET['maLop'];
$maKH = $_SESSION['maKH'];
$noiDung =  $_POST['noiDung'];

$sql = "insert into binhluan(maKH,maBaiHoc,noiDung,maLop)  values('$maKH','$maBaiHoc','$noiDung','$maLop')";
$result = (new Connection())->excute($sql);

$_SESSION['code'] = "success";
$_SESSION['status'] = "Đã đăng";
header( "Location: homework.php?maKhoaHoc=$maKhoaHoc&maNoiDung=$maNoiDung&maBaiHoc=$maBaiHoc&maLop=$maLop" );