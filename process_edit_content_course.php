<?php
require "check_login.php";
require "./admin/model/connect.php";

$maKhoaHoc = $_POST["maKhoaHoc"];
$maLop = $_POST["maLop"];
$noiDung = $_POST[ "noiDungKhoaHoc" ];
$maNoiDung =  $_POST[ "maNoiDung" ];

$sql= "update noidungkhoahoc set  noiDungKhoaHoc='$noiDung' where maNoiDung='$maNoiDung'";
$result = (new Connection())->excute($sql);

$_SESSION['code'] = "success";
$_SESSION['status'] = "Cập nhật nội dung khoa học thành công";
header( "location: manage_content_course.php?maKhoaHoc=$maKhoaHoc&maLop=$maLop" );