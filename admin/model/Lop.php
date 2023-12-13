<?php

require_once "model/connect.php";
require "model/LopObject.php";

class Lop{
    public function all(){
        $sql = "select lop.*,khachhang.hoTen as tenGV,khoahoc.tenKhoaHoc as tenKhoaHoc from lop inner join taikhoan on lop.maTK=taikhoan.id 
        inner join khachhang on taikhoan.id=khachhang.maTK inner join khoahoc on lop.maKhoaHoc = khoahoc.maKhoaHoc  where taikhoan.level='2'";
        $result = (new Connection())->select($sql);
        $arr=[];
        foreach($result as $row){
            $object = new LopObject($row);
            $arr[]=$object;
        }
        return $arr;
    }
    public function create($params){
        $object=new LopObject($params);
        $sql = "insert into lop(tenLop,maKhoaHoc,maTK) 
        values('" . $object->get_tenLop()."',
        '" . $object->get_maKhoaHoc()."',
        '" . $object->get_maTK()."')";
        (new Connection())->excute($sql);
    }

    public function find($maLop){
        $sql = "select * from lop where maBaiHoc='".$maLop."'";
        $result = (new Connection())->select($sql);
        $each = mysqli_fetch_array($result);
        return new LopObject($each);
    }

    public function update($params){
        $object=new LopObject($params);
        $sql = "update lop 
        set tenLop='".$object->get_tenLop()."',
        maKhoaHoc='".$object->get_maKhoaHoc()."',
        maTK='".$object->get_maTK()."'
        where maLop='".$object->get_maLop()."'";
        (new Connection())->excute($sql);
    }

    public function delete($maLop){
        $sql = "delete from lop where maLop='".$maLop."'";
        (new Connection())->excute($sql);
    }
}