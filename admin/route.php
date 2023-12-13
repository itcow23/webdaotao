<?php
require "controller/KhoaHocController.php";
require "controller/Controller.php";
require "controller/KhachHangController.php";
require "controller/TaiKhoanController.php";
require "controller/BaiHocController.php";
require "controller/AdminController.php";
require "controller/NoiDungKhoaHocController.php";
require "controller/LopController.php";
require "controller/DangKyKhoaHocController.php";
require "controller/BinhLuanController.php";
require "controller/NopBaiTapController.php";
require "controller/BaiTapController.php";
$action = $_GET['action'] ?? 'index';
$controller = $_GET['controller'] ?? 'login';

switch ($controller){
    case 'login':
        (new Controller())->loginadmin();
        break;
    case 'admin_process':
        (new AdminController())->process();
    case 'admin_logout':
        (new AdminController())->logout();
    case 'khoahoc':
        (new AdminController())->checkadmin();
        switch ($action) {
            case 'index':
                (new KhoaHocController())->index();
                break;
            case 'create':
                (new KhoaHocController())->create();
                break;
            case 'store':
                (new KhoaHocController())->store();
                break;
            case 'edit':
                (new KhoaHocController())->edit();
                break;
            case 'update':
                (new KhoaHocController())->update();
                break;
            case 'delete':
                (new KhoaHocController)->delete();
                break;
            default:
                echo 'What are you doing?';
                break;
        }
        break;
    case 'khachhang':
        (new AdminController())->checkadmin();
        switch ($action) {
            case 'index':
                (new KhachHangController())->index();
                break;
            case 'create':
                (new KhachHangController())->create();
                break;
            case 'store':
                (new KhachHangController())->store();
                break;
            case 'edit':
                (new KhachHangController())->edit();
                break;
            case 'update':
                (new KhachHangController())->update();
                break;
            case 'delete':
                (new KhachHangController())->delete();
                break;
            default:
                echo 'What are you doing?';
                break;
        }
        break;
    case 'taikhoan':
        (new AdminController())->checkadmin();
        switch ($action) {
            case 'index':
                (new TaiKhoanController())->index();
                break;
            case 'create':
                (new TaiKhoanController())->create();
                break;
            case 'store':
                (new TaiKhoanController())->store();
                break;
            case 'edit':
                (new TaiKhoanController())->edit();
                break;
            case 'update':
                (new TaiKhoanController())->update();
                break;
            case 'delete':
                (new TaiKhoanController())->delete();
                break;
            default:
                echo 'What are you doing?';
                break;
        }
        break;
    case 'baihoc':
        (new AdminController())->checkadmin();
        switch ($action) {
            case 'index':
                (new BaiHocController())->index();
                break;
            case 'create':
                (new BaiHocController())->create();
                break;
            case 'store':
                (new BaiHocController())->store();
                break;
            case 'edit':
                (new BaiHocController())->edit();
                break;
            case 'update':
                (new BaiHocController())->update();
                break;
            case 'delete':
                (new BaiHocController())->delete();
                break;
            default:
                echo 'What are you doing?';
                break;
        }
        break;
    case 'noidung':
        (new AdminController())->checkadmin();
        switch ($action) {
            case 'index':
                (new NoiDungKhoaHocController())->index();
                break;
            case 'create':
                (new NoiDungKhoaHocController())->create();
                break;
            case 'store':
                (new NoiDungKhoaHocController())->store();
                break;
            case 'edit':
                (new NoiDungKhoaHocController())->edit();
                break;
            case 'update':
                (new NoiDungKhoaHocController())->update();
                break;
            case 'delete':
                (new NoiDungKhoaHocController())->delete();
                break;
            default:
                echo 'What are you doing??';
                break;
        }
        break;
    case 'lop':
        (new AdminController())->checkadmin();
        switch ($action) {
            case 'index':
                (new LopController())->index();
                break;
            case 'create':
                (new LopController())->create();
                break;
            case 'store':
                (new LopController())->store();
                break;
            case 'edit':
                (new LopController())->edit();
                break;
            case 'update':
                (new LopController())->update();
                break;
            case 'delete':
                (new LopController())->delete();
                break;
            default:
                echo 'What are you doing??';
                break;
            }
        break;
    case 'dangkykhoahoc':
        (new AdminController())->checkadmin();
        switch ($action) {
            case 'index':
                (new DangKyKhoaHocController())->index();
                break;
            case 'delete':
                (new DangKyKhoaHocController())->delete();
                break;
            default:
                echo 'What are you doing??';
                break;
            }
            break;
    case 'binhluan':
        (new AdminController())->checkadmin();
        switch ($action) {
            case 'index':
                (new BinhLuanController())->index();
                break;
            case 'delete':
                (new BinhLuanController())->delete();
                break;
            default:
                echo 'What are you doing??';
                break;
                }
        break;
        case 'baitap':
            (new AdminController())->checkadmin();
            switch ($action) {
                case 'index':
                    (new BaiTapController())->index();
                    break;
                case 'delete':
                    (new BaiTapController())->delete();
                    break;
                default:
                    echo 'What are you doing??';
                    break;
                    }
            break;
            case 'nopbaitap':
                (new AdminController())->checkadmin();
                switch ($action) {
                    case 'index':
                        (new NopBaiTapController())->index();
                        break;
                    case 'delete':
                        (new NopBaiTapController())->delete();
                        break;
                    default:
                        echo 'What are you doing??';
                        break;
                        }
                break;
    default:
        echo 'What are you doing?';
        break;
}
