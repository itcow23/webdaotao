<?php

require_once "model/connect.php";
require "model/BaiHocObject.php";

class BaiHoc{
    public function all(){
        $sql = "select baihoc.*, noidungkhoahoc.noiDungKhoaHoc as noiDungKhoaHoc, khoahoc.tenKhoaHoc as tenKhoaHoc,lop.tenLop as tenLop
        from baihoc inner join noidungkhoahoc on noidungkhoahoc.maNoiDung=baihoc.maNoiDung
        inner join khoahoc on khoahoc.maKhoaHoc=noidungkhoahoc.maKhoaHoc  inner join lop on lop.maLop=baihoc.maLop";
        $result = (new Connection())->select($sql);
        $arr=[];
        foreach($result as $row){
            $object = new BaiHocObject($row);
            $arr[]=$object;
        }
        return $arr;
    }
    public function create($params){
        $object=new BaiHocObject($params);
        $sql = "insert into BAIHOC(tenBaiHoc,tieuDe,moTa,video,maKhoaHoc,maNoiDung) 
        values('" . $object->get_tenBaiHoc()."',
        '" . $object->get_tieuDe()."',
        '" . $object->get_moTa()."',
        '" . $object->get_video()."',
        '" . $object->get_maKhoaHoc()."',
        '" . $object->get_maNoiDung()."')";
        (new Connection())->excute($sql);
    }

    public function find($maBaiHoc){
        $sql = "select * from BAIHOC where maBaiHoc='".$maBaiHoc."'";
        $result = (new Connection())->select($sql);
        $each = mysqli_fetch_array($result);
        return new BaiHocObject($each);
    }

    public function update($params){
        $object=new BaiHocObject($params);
        $sql = "update BAIHOC 
        set tenBaiHoc='".$object->get_tenBaiHoc()."',
        tieuDe='".$object->get_tieuDe()."',
        moTa='".$object->get_moTa()."',
        video='".$object->get_video()."',
        maKhoaHoc='".$object->get_maKhoaHoc()."',
        maNoiDung='".$object->get_maNoiDung()."'
        where maBaiHoc='".$object->get_maBaiHoc()."'";
        (new Connection())->excute($sql);
    }

    public function delete($maBaiHoc){
        $sql = "delete from BAIHOC where maBaiHoc='".$maBaiHoc."'";
        (new Connection())->excute($sql);
    }
}