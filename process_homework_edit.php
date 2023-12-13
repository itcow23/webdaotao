<?php
require  "check_login.php";
require "./admin/model/connect.php";

$maKhoaHoc = $_GET['maKhoaHoc'];
$maNoiDung = $_GET['maNoiDung'];
$maBaiHoc = $_GET['maBaiHoc'];
$maLop  = $_GET['maLop'];

$moTa = $_POST['moTa'];
$hanNop = $_POST['hanNop'];
$file_new =  $_FILES['file_homework_new'];

if ($file_new['size']>0){

    $folder = 'assets/homework/';
    $file_name = $file_new['name'];
    $path_file = $folder . $file_name;
    move_uploaded_file($file['tmp_name'], $path_file);
}
else{
    $file_name = $_POST['file_homework_old'];
}

$sql =  "update baitap  set moTa = '$moTa', hanNop = '$hanNop', file_homework = '$file_name' where maBaiHoc = '$maBaiHoc'";
$result = (new Connection())->excute($sql);

$_SESSION['code'] = "success";
$_SESSION['status'] = "Cập nhật bài tập thành công";
header( "Location: homework.php?maKhoaHoc=$maKhoaHoc&maNoiDung=$maNoiDung&maBaiHoc=$maBaiHoc&maLop=$maLop" );