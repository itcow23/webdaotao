<?php
require  "check_login.php";
require "./admin/model/connect.php";

$maKhoaHoc = $_GET['maKhoaHoc'];
$maNoiDung = $_GET['maNoiDung'];
$maBaiHoc = $_GET['maBaiHoc'];
$maLop =  $_GET['maLop'];

$moTa = $_POST['moTa'];
$hanNop = $_POST['hanNop'];
$file =  $_FILES['file_homework'];

$folder = 'assets/homework/';
$file_name = $file['name'];
$path_file = $folder . $file_name;
move_uploaded_file($file['tmp_name'], $path_file);

$sql =  "INSERT INTO baitap (moTa, hanNop, file_homework,maBaiHoc,maLop) VALUES ('$moTa', '$hanNop', '$file_name', '$maBaiHoc',' $maLop')";
$result = (new Connection())->excute($sql);

$_SESSION['code'] = "success";
$_SESSION['status'] = "Thêm bài tập thành công";
header( "Location: homework.php?maKhoaHoc=$maKhoaHoc&maNoiDung=$maNoiDung&maBaiHoc=$maBaiHoc&maLop=$maLop" );