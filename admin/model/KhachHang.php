<?php
require_once "model/connect.php";
require "model/KhachHangObject.php";

class KhachHang{
    public function all(){
        $sql = "select * from KHACHHANG";
        $result = (new Connection())->select($sql);
        $arr=[];

        foreach($result as $row ){
            $object = new KhachHangObject($row);
            $arr[]=$object;
        }
        return $arr;
    }
    public function GV(){
        $sql = "select * from TAIKHOAN inner join khachhang on taikhoan.id = khachhang.maTK where level='2'";
        $result = (new Connection())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $object = new KhachHangObject($row);
            $arr[] = $object;
        }
        return $arr;
    }
    public function create($params){
        $object=new KhachHangObject($params);
        if($object->get_photo()['size']>0)
        {
            $folder = 'public/photos/khachhang/';
            $file_extension = explode('.',$object->get_photo()["name"])[1];
            $file_name = time() . '.' . $file_extension;
            $path_file = $folder . $file_name;
            move_uploaded_file($object->get_photo()["tmp_name"], $path_file);
    
            $sql = "insert into khachhang(hoTen,ngaySinh,gioiTinh,soDienThoai,diaChi,avatar,maTK) 
            values('" . $object->get_hoTen()."',
            '" . $object->get_ngaySinh()."',
            '" . $object->get_gioiTinh()."',
            '" . $object->get_soDienThoai()."',
            '" . $object->get_diaChi()."',
            '" . $file_name . "',
            '" . $object->get_maTK()."') ";
    
            (new Connection())->excute($sql);
        }
        else
        {
            $sql = "insert into khachhang(hoTen,ngaySinh,gioiTinh,soDienThoai,diaChi,avatar,maTK) 
            values('" . $object->get_hoTen()."',
            '" . $object->get_ngaySinh()."',
            '" . $object->get_gioiTinh()."',
            '" . $object->get_soDienThoai()."',
            '" . $object->get_diaChi()."',
            'null',
            '" . $object->get_maTK()."') ";
    
            (new Connection())->excute($sql);
        }
    }
    public function find($maKH){
        $sql = "select * from KHACHHANG where maKH='".$maKH."'";
        $result = (new Connection())->select($sql);
        $each = mysqli_fetch_array($result);

        return new KhachHangObject($each);
    }
    public function update($params){
        $object=new KhachHangObject($params);
        if($object->get_photo_new()['size']>0){
            $folder = 'public/photos/khachhang/';
            $file_extension = explode('.',$object->get_photo_new()["name"])[1];
            $file_name = time() . '.' . $file_extension;
            $path_file = $folder . $file_name;
            move_uploaded_file($object->get_photo_new()["tmp_name"], $path_file);
        }
        else{
            $file_name = $object->get_photo_old();
        }
        $sql = "update KHACHHANG 
        set hoTen='".$object->get_hoTen()."',
        ngaySinh='".$object->get_ngaySinh()."',
        gioiTinh='".$object->get_gioiTinh()."',
        soDienThoai='".$object->get_soDienThoai()."',
        diaChi='".$object->get_diaChi()."',
        avatar='".$file_name."',
        maTK='".$object->get_maTK()."'
        where maKH='".$object->get_maKH()."'";

        (new Connection())->excute($sql);
    }
    public function delete($maKH){
        $sql = "delete from KHACHHANG where maKH='".$maKH."'";
        (new Connection())->excute($sql);
    }
}