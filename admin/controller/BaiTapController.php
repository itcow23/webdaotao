<?php
class BaiTapController{
        public function index(){
            require 'model/BaiTap.php';
            $arr = (new BaiTap())->all();
            require 'view/BaiTap/index.php';
        }
        public function delete(){
            $maBaiTap=$_GET['maBaiTap'];
            require 'model/BaiTap.php';
            (new BaiTap())->delete($maBaiTap);
    
            $_SESSION['code'] = "success";
            $_SESSION['status'] = "Xóa thành công";
            header('location: index.php?controller=baitap');
        }
}