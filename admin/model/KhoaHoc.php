<?php
require_once "model/connect.php";
require "model/KhoaHocObject.php";
class KhoaHoc{
    public function all(){
        $sql = "select * from KHOAHOC";
        $result = (new Connection())->select($sql);
        $arr=[];

        foreach($result as $row){
            $object = new KhoaHocObject($row);
            $arr[]=$object;
        }
        return $arr;
    }
    public function create($params){
        $object=new KhoaHocObject($params);
        $folder = 'public/photos/khoahoc/';
        $file_extension = explode('.',$object->get_photo()["name"])[1];
        $file_name = time() . '.' . $file_extension;
        $path_file = $folder . $file_name;
        move_uploaded_file($object->get_photo()["tmp_name"], $path_file);
        $sql = "insert into KHOAHOC(tenKhoaHoc,moTa,thoiGian,anh) 
        values('" . $object->get_tenKhoaHoc()."','" . $object->get_moTa()."','" . $object->get_thoiGian()."','$file_name')";
        (new Connection())->excute($sql);
    }
    public function find($maKhoaHoc){
        $sql = "select * from KHOAHOC where maKhoaHoc='".$maKhoaHoc."'";
        $result = (new Connection())->select($sql);
        $each = mysqli_fetch_array($result);

        return new KhoaHocObject($each);
    }
    public function update($params){
        $object=new KhoaHocObject($params);
        if($object->get_photo_new()['size']>0){
            $folder = 'public/photos/khoahoc/';
            $file_extension = explode('.',$object->get_photo_new()["name"])[1];
            $file_name = time() . '.' . $file_extension;
            $path_file = $folder . $file_name;
            move_uploaded_file($object->get_photo_new()["tmp_name"], $path_file);
        }
        else{
            $file_name = $object->get_photo_old();
        }
        $sql = "update KHOAHOC 
        set tenKhoaHoc='".$object->get_tenKhoaHoc()."',
        moTa='".$object->get_moTa()."',
        thoiGian='".$object->get_thoiGian()."',
        anh='$file_name'
        where maKhoaHoc='".$object->get_maKhoaHoc()."'";
        (new Connection())->excute($sql);
    }
    public function delete($maKhoaHoc){
        $sql = "delete from KHOAHOC where maKhoaHoc='".$maKhoaHoc."'";
        (new Connection())->excute($sql);
    }
}