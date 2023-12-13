<?php
require  "check_login.php";
require "./admin/model/connect.php";

$maBaiHoc = $_GET['maBaiHoc'];
$maKhoaHoc = $_GET['maKhoaHoc'];
$maNoiDung = $_GET['maNoiDung'];
$maLop = $_GET['maLop'];
$maBinhLuan = $_GET['maBinhLuan'];

$sql = "delete from binhluan where maBinhLuan = '$maBinhLuan' ";
$result = (new Connection())->excute($sql);

$_SESSION['code'] = "success";
$_SESSION['status'] = "Xóa bình luận thành công";
header( "Location: homework.php?maKhoaHoc=$maKhoaHoc&maNoiDung=$maNoiDung&maBaiHoc=$maBaiHoc&maLop=$maLop" );