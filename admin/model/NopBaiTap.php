<?php

require_once "model/connect.php";
require "model/NopBaiTapObject.php";

class NopBaiTap{
    public function all(){
        $sql = "select nopbaitap.*, lop.tenLop as tenLop, khoahoc.tenKhoaHoc as tenKhoaHoc, 
        baihoc.tenBaiHoc as tenBaiHoc, khachhang.hoTen as tenUser from nopbaitap 
        inner join lop on nopbaitap.maLop=lop.maLop  
        inner join khoahoc on lop.maKhoaHoc=khoahoc.maKhoaHoc  
        inner join baihoc on nopbaitap.maBaiHoc=baihoc.maBaiHoc
        inner join khachhang on nopbaitap.maTK = khachhang.maTK";

        $result = (new Connection())->select($sql);
        $arr=[];
        foreach($result as $row){
            $object = new NopBaiTapObject($row);
            $arr[]=$object;
        }
        return $arr;
    }

    public function delete($maNopBaiTap){
        $sql = "delete from NopBaiTap where maNopBaiTap='".$maNopBaiTap."'";
        (new Connection())->excute($sql);
    }
}