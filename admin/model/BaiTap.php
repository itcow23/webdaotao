<?php

require_once "model/connect.php";
require "model/BaiTapObject.php";

class BaiTap{
    public function all(){
        $sql = "select baitap.*, lop.tenLop as tenLop, khoahoc.tenKhoaHoc as tenKhoaHoc, baihoc.tenBaiHoc as tenBaiHoc from
        baitap inner join lop on baitap.maLop=lop.maLop inner join khoahoc on lop.maKhoaHoc=khoahoc.maKhoaHoc inner join baihoc on baitap.maBaiHoc=baihoc.maBaiHoc";
        $result = (new Connection())->select($sql);
        $arr=[];
        foreach($result as $row){
            $object = new BaiTapObject($row);
            $arr[]=$object;
        }
        return $arr;
    }

    public function delete($maBaiTap){
        $sql = "delete from BaiTap where maBaiTap='".$maBaiTap."'";
        (new Connection())->excute($sql);
    }
}