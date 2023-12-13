<?php
require  "check_login.php";
require "./admin/model/connect.php";

$maKhoaHoc = $_GET['maKhoaHoc'];
$maNoiDung = $_GET['maNoiDung'];
$maBaiHoc = $_GET['maBaiHoc'];
$maTK =  $_SESSION['id'];
$maLop  = $_GET['maLop'];

if($_FILES['fileSubmit']['size']>0){
    $file =  $_FILES['fileSubmit'];
    $folder = 'assets/submit_homework/';
    $file_name = $file['name'];
    $path_file = $folder . $file_name;
    move_uploaded_file($file['tmp_name'], $path_file);
    
    $sql =  "INSERT INTO nopbaitap (fileNop,maBaiHoc,maLop,maTK) VALUES ('$file_name', '$maBaiHoc', '$maLop', '$maTK')";
    $result = (new Connection())->excute($sql);
    
    $_SESSION['code'] = "success";
    $_SESSION['status'] = "Nộp bài tập thành công";
    header( "Location: homework.php?maKhoaHoc=$maKhoaHoc&maNoiDung=$maNoiDung&maBaiHoc=$maBaiHoc&maLop=$maLop" );
}
else{
    $_SESSION['code'] = "error";
    $_SESSION['status'] = "Thêm file để nộp";
    header( "Location: homework.php?maKhoaHoc=$maKhoaHoc&maNoiDung=$maNoiDung&maBaiHoc=$maBaiHoc&maLop=$maLop" );
}