<?php
class BinhLuanController{
        public function index(){
            require 'model/BinhLuan.php';
            $arr = (new BinhLuan())->all();
            require 'view/BinhLuan/index.php';
        }
        public function delete(){
            $maBinhLuan=$_GET['maBinhLuan'];
            require 'model/BinhLuan.php';
            (new BinhLuan())->delete($maBinhLuan);
    
            $_SESSION['code'] = "success";
            $_SESSION['status'] = "Xóa thành công";
            header('location: index.php?controller=binhluan');
        }
}