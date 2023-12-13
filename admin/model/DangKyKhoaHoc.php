<?php

require_once "model/connect.php";
require "model/DangKyKhoaHocObject.php";

class DangKyKhoaHoc{
    public function all(){
        $sql = "select * from dangkykhoahoc inner join lop on dangkykhoahoc.maLop=lop.maLop inner join khoahoc on lop.maKhoaHoc=khoahoc.maKhoaHoc";
        $result = (new Connection())->select($sql);
        $arr=[];
        foreach($result as $row){
            $object = new DangKyKhoaHocObject($row);
            $arr[]=$object;
        }
        return $arr;
    }

    public function delete($maDangKy){
        $sql = "delete from dangkykhoahoc where maDangKy='".$maDangKy."'";
        (new Connection())->excute($sql);
    }
}