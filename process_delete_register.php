<?php
require "check_login.php";
require "./admin/model/connect.php";

$maDangKy =  $_POST[ "maDangKy" ];

$sql= "delete from dangkykhoahoc  where maDangKy = '$maDangKy'";
$result = (new Connection())->excute($sql);

$_SESSION['code'] = "success";
$_SESSION['status'] = "Hủy thành công";
header( "location: register_course.php" );