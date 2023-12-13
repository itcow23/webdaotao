<?php

require_once "model/connect.php";
require "model/BinhLuanObject.php";

class BinhLuan{
    public function all(){
        $sql = "select binhluan.*,khoahoc.tenKhoaHoc as tenKhoaHoc,lop.tenLop as tenLop,khachhang.hoTen as tenUser,baihoc.tenBaiHoc as tenBaiHoc from binhluan inner join lop on binhluan.maLop=lop.maLop inner join khoahoc on lop.maKhoaHoc=khoahoc.maKhoaHoc 
        inner join khachhang on binhluan.maKH = khachhang.maKH inner join baihoc  on binhluan.maBaiHoc = baihoc.maBaiHoc";
        $result = (new Connection())->select($sql);
        $arr=[];
        foreach($result as $row){
            $object = new BinhLuanObject($row);
            $arr[]=$object;
        }
        return $arr;
    }

    public function delete($maBinhLuan){
        $sql = "delete from binhluan where maBinhLuan='".$maBinhLuan."'";
        (new Connection())->excute($sql);
    }
}