<?php

require_once "model/connect.php";
require "model/TaiKhoanObject.php";

class TaiKhoan {
    public function all() {
        $sql = "select * from TAIKHOAN";
        $result = (new Connection())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $object = new TaiKhoanObject($row);
            $arr[] = $object;
        }

        return $arr;
    }
  
    public function create($params){
        $object=new TaiKhoanObject($params);
        $sql = "select * from TAIKHOAN where email = '" . $object->get_email()."' ";
        $result = (new Connection())->select($sql);
        $num_rows = mysqli_num_rows($result);
        $test_pass = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    if(!filter_var($object->get_email(), FILTER_VALIDATE_EMAIL) || !preg_match($test_pass, $object->get_matKhau()) ||$num_rows != 0)
    {
        if(!filter_var($object->get_email(), FILTER_VALIDATE_EMAIL)){

            $_SESSION['error_email'] = "Email không hợp lệ";
        }
     if(!preg_match($test_pass, $object->get_matKhau())){
            $_SESSION['error_mk'] = "Mật khẩu  phải bao gồm 8 kí tự, 1 chuối, 1 kí tự in hoặc 1 kí tự số";
     }
     if($num_rows != 0){
                $_SESSION['error_email'] = "Email đã tồn tại";
            }
            $_SESSION['email'] = $object->get_email();
            $_SESSION['matKhau'] = $object->get_matKhau();
            $_SESSION['level'] = $object->get_level();
            $_SESSION['status'] = "Thêm không thành công";
            $_SESSION['code'] = "error";
            header("location: index.php?controller=taikhoan");
            exit();
     }else
        {
            $sql = "insert into taikhoan(email,matKhau,level) 
            values('" . $object->get_email()."',
            '" . $object->get_matKhau()."',
            '" . $object->get_level()."')";
            (new Connection())->excute($sql);
        }
    }

    public function find($maTK){
        $sql = "select * from BAIHOC where maBaiHoc='".$maTK."'";
        $result = (new Connection())->select($sql);
        $each = mysqli_fetch_array($result);
        return new TaiKhoanObject($each);
    }

    public function update($params){
        $object=new TaiKhoanObject($params);
        $test_pass_edit = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
     if(!preg_match($test_pass_edit, $object->get_matKhau())){
            $_SESSION['status'] = "Sửa không thành công vui lòng nhập lại mật khẩu";
            $_SESSION['code'] = "error";
            header("location: index.php?controller=taikhoan");
            exit();
     }
     else{
         $sql = "update taikhoan  set email='".$object->get_email()."', 
         matKhau =  '".$object->get_matKhau()."', 
         level='".$object->get_level()."' 
         where id='".$object->get_id()."'";
         (new Connection())->excute($sql);
     }
    }

    public function delete($maTK) {
        $sql = "delete from TAIKHOAN where id='".$maTK."'";
        (new Connection())->excute($sql);
        header('location: index.php?controller=taikhoan');
    }
}