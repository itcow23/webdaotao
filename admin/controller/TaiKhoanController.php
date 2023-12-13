<?php

class TaiKhoanController {
    public function index() {
        require 'model/TaiKhoan.php';
        $arr = (new TaiKhoan())->all();
        require 'view/TaiKhoan/index.php';
    }
   
    public function create() {
        require 'model/KhachHang.php';
        $khachhangs = (new KhachHang())->all();
        require 'view/TaiKhoan/create.php';
    }
    public function store() {
        require 'model/TaiKhoan.php';
        (new TaiKhoan())->create($_POST);

        $_SESSION['code'] = "success";
        $_SESSION['status'] = "Thêm thành công";
        header('location: index.php?controller=taikhoan');
    }
    public function edit() {
        $maTK = $_POST['maTK'];
        require 'model/TaiKhoan.php';
        $each = (new TaiKhoan())->find($maTK);
        require 'model/KhachHang.php';
        $khachhangs = (new KhachHang())->all();
        require 'view/TaiKhoan/edit.php';
    }
    public function update() {
        require 'model/TaiKhoan.php';
        (new TaiKhoan())->update($_POST);

        $_SESSION['code'] = "success";
        $_SESSION['status'] = "Sửa thành công";
        header('location: index.php?controller=taikhoan');
    }

    public function delete() {
        $maTK = $_GET['maTK'];
        require 'model/TaiKhoan.php';
        (new TaiKhoan())->delete($maTK);

        $_SESSION['code'] = "success";
        $_SESSION['status'] = "Xóa thành công";
        header('location: index.php?controller=taikhoan');
    }
}