<?php
require_once "admin/model/connect.php";
// 7. Lấy thông tin tổng số nộp bài tập
$sql17 = "Select * from nopbaitap where maBaiHoc='" . $_GET['mabaihoc'] . "' and maLop='" . $_GET['malop'] . "'";
$data = (new Connection())->select($sql17);

$getbaihoc = "select  * from baihoc where maBaiHoc='" . $_GET['mabaihoc'] . "'";
$baihoc = (new Connection())->select($getbaihoc);
$infobaihoc = mysqli_fetch_array($baihoc);

$getlop =  "select  * from lop where maLop='" . $_GET['malop'] . "'";
$lop = (new Connection())->select($getlop);
$infolop = mysqli_fetch_array($lop);

$date  = date("Y-m-d");


//lay files
$files = [];
foreach ($data as $item) {
    array_push($files, $item['fileNop']);
}

$path  = "assets/submit_homework/";
$zipname ="Ngày ". $date . "_Lớp". $infolop['tenLop'] . ".zip";
$zip = new ZipArchive();

$zip->open($path.$zipname, ZipArchive::CREATE);
foreach ($files as $file) {
    $zip->addFile($path.$file, pathinfo( $path.$file, PATHINFO_BASENAME));
}

$zip->close();

header('Content-Type: application/zip');
header("Content-Disposition: attachment; filename=" . $zipname);
header('Content-Length: ' . filesize($path . $zipname));
readfile($path . $zipname);
unlink($path . $zipname);

