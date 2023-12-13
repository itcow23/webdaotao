<?php
require "check_login.php";
require "./admin/model/connect.php";

$maKhoaHoc = $_POST["maKhoaHoc"];
$maLop = $_POST["maLop"];
$noiDung = $_POST[ "noiDungKhoaHoc" ];

$sql= "insert into  noidungkhoahoc(maKhoaHoc, noiDungKhoaHoc,maLop) values('$maKhoaHoc', '$noiDung','$maLop')";
$result = (new Connection())->excute($sql);

$_SESSION['code'] = "success";
$_SESSION['status'] = "Thêm thành công";

header( "location: manage_content_course.php?maKhoaHoc=$maKhoaHoc&maLop=$maLop" );
