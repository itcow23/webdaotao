<?php
require "check_login.php";
require "./admin/model/connect.php";

$maKhoaHoc = $_POST["maKhoaHoc"];
$maLop = $_POST["maLop"];
$maNoiDung = $_POST["maNoiDung"];
$tenBaiHoc = $_POST["tenBaiHoc"];
$tieuDe = $_POST["tieuDe"];
$moTa = $_POST["moTa"];
$video = $_POST["video"];

$sql = "insert into baihoc(tenBaiHoc,tieuDe,moTa,video,maKhoaHoc,maNoiDung,maLop) values ('$tenBaiHoc','$tieuDe' ,'$moTa','$video','$maKhoaHoc','$maNoiDung', '$maLop')";
$result = (new Connection())->excute($sql);

$_SESSION['code'] = "success";
$_SESSION['status'] = "Thêm bài học thành công";
header( "location: manage_lesson_course.php?maKhoaHoc=$maKhoaHoc&maLop=$maLop" );