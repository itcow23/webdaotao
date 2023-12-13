<?php
class DangKyKhoaHocController{
        public function index(){
            require 'model/DangKyKhoaHoc.php';
            $arr = (new DangKyKhoaHoc())->all();
            require 'view/DangKyKhoaHoc/index.php';
        }
        public function delete(){
            $maDangKy=$_GET['maDangKy'];
            require 'model/DangKyKhoaHoc.php';
            (new DangKyKhoaHoc())->delete($maDangKy);
    
            $_SESSION['code'] = "success";
            $_SESSION['status'] = "Xóa thành công";
            header('location: index.php?controller=dangkykhoahoc');
        }
}