<?php
require  "check_login.php";
require "./admin/model/connect.php";

session_start( );
$maKH = $_SESSION['maKH'];
$soDienThoai = $_POST['soDienThoai'];
$diaChi =  $_POST['diaChi'];
$test_sdt = '/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/';
if( !preg_match($test_sdt, $soDienThoai) ){
    $_SESSION['status'] = "Cập nhật không thành công";
    $_SESSION['code'] = "error";
    $_SESSION['error_sdt'] = "Số điện thoại không hợp lệ";
    header("location: account.php?sdt=$soDienThoai");
} else {
    if($_FILES['avatar']['size'] > 0){
    
        $avatar = $_FILES['avatar'];
        $folder =  "./admin/public/photos/khachhang/";
        $file_extension = explode('.', $avatar['name'])[1];
        $file_name = time() . '.' . $file_extension;
        $path_file = $folder . $file_name;
        move_uploaded_file($avatar["tmp_name"], $path_file);
    
        $sql = "update khachhang set soDienThoai='$soDienThoai',
        diaChi='$diaChi', avatar='$file_name' where maKH='$maKH'";
        $result = (new Connection())->excute($sql);

        $_SESSION['code'] = "success";
        $_SESSION['status'] = "cập nhật thông tin thành công";
        header( "Location: account.php" );
    }else{
        $sql = "update khachhang set soDienThoai='$soDienThoai',
        diaChi='$diaChi' where maKH='$maKH'";
        $result = (new Connection())->excute($sql);

        $_SESSION['code'] = "success";
        $_SESSION['status'] = "cập nhật thông tin thành công";
        header( "Location: account.php" );
    }
}


