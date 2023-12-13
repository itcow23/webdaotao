<?php
class NopBaiTapController{
        public function index(){
            require 'model/NopBaiTap.php';
            $arr = (new NopBaiTap())->all();
            require 'view/NopBaiTap/index.php';
        }
        public function delete(){
            $maNopBaiTap=$_GET['maNopBaiTap'];
            require 'model/NopBaiTap.php';
            (new NopBaiTap())->delete($maNopBaiTap);
    
            $_SESSION['code'] = "success";
            $_SESSION['status'] = "Xóa thành công";
            header('location: index.php?controller=nopbaitap');
        }
}