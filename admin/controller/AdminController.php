<?php

class AdminController {
    public function process(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        require 'model/Admin.php';
        (new Admin())->process($email,$password);
    }
    public function checkadmin(){
        require 'model/check_login_admin.php';
    }
    public function logout(){
        session_start();
        session_destroy();
        header("location:?controller=login");
    }
}