<?php
require "check_login.php";
require "./admin/model/connect.php";

$maBaiHoc =  $_GET[ "maBaiHoc" ];
$maKhoaHoc = $_GET['maKhoaHoc'];
$maLop = $_GET['maLop'];

$sql= "delete from baihoc  where maBaiHoc='$maBaiHoc'";
$result = (new Connection())->excute($sql);

$_SESSION['code'] = "success";
$_SESSION['status'] = "Xóa bài học thành công";
header( "location: manage_lesson_course.php?maKhoaHoc=$maKhoaHoc&maLop=$maLop" );