<?php
require "check_login.php";
require "./admin/model/connect.php";

$maNoiDung =  $_GET[ "maNoiDung" ];
$maKhoaHoc = $_GET['maKhoaHoc'];
$maLop = $_GET['maLop'];

$sql= "delete from noidungkhoahoc  where maNoiDung='$maNoiDung'";
$result = (new Connection())->excute($sql);

$_SESSION['code'] = "success";
$_SESSION['status'] = "Xóa nội dung khoa học thành công";
header( "location: manage_content_course.php?maKhoaHoc=$maKhoaHoc&maLop=$maLop" );