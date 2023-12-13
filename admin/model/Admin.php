<?php
require_once "model/connect.php";
class Admin {
    public function process($email,$password) {
        $sql="select * from admin where email='$email' and password='$password'";
        $result = (new Connection())->select($sql);
        if(mysqli_num_rows($result)==1){
            $each = mysqli_fetch_array($result);
            session_start();
        
            $_SESSION['id'] = $each['id'];
            $_SESSION['name'] = $each['name'];
            $_SESSION['level_ad'] = $each['level_ad'];
        
            header("location:?controller=baihoc");
            exit;
        }
        else{
            session_start();
            $_SESSION['error'] = "Sai tên đăng nhập hoặc mật khẩu";
            header("location:?controller=login");
            exit;
        }
    }
}