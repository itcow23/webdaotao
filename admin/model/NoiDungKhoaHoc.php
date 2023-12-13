<?php
require_once 'model/connect.php';
require 'model/NoiDungKhoaHocObject.php';

class NoiDungKhoaHoc {
    public function all() {
        $sql = "Select noidungkhoahoc.*, khoahoc.tenKhoaHoc as tenKhoaHoc,lop.tenLop as tenLop
        from noidungkhoahoc inner join khoahoc on khoahoc.maKhoaHoc=noidungkhoahoc.maKhoaHoc  inner join lop on lop.maLop=noidungkhoahoc.maLop";
        $result = (new Connection())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $object = new NoiDungKhoaHocObject($row);
            $arr[] = $object;
        }
        return $arr;
    }

    public function create($params) {
        $object = new NoiDungKhoaHocObject($params);
        $sql = "insert into noidungkhoahoc(maKhoaHoc,noiDungKhoaHoc) 
        values('" . $object->get_maKhoaHoc() . "','" . $object->get_noiDungKhoaHoc() . "')";
        (new Connection())->excute($sql);
    }

    public function find($maNoiDung) {
        $sql = "Select * from noidungkhoahoc where maNoiDung='" . $maNoiDung . "'";       
        $result = (new Connection())->select($sql);
        $each = mysqli_fetch_array($result);

        return new NoiDungKhoaHocObject($each);
    }

    public function update($params) {
        $object = new NoiDungKhoaHocObject($params);
        $sql = "update noidungkhoahoc 
        set maKhoaHoc='" . $object->get_maKhoaHoc() . "',
        noiDungKhoaHoc='" . $object->get_noiDungKhoaHoc() . "'
        where maNoiDung='" . $object->get_maNoiDung() . "'";
        (new Connection())->excute($sql);
    }

    public function delete($maNoiDung) {
        $sql = "delete from noidungkhoahoc where maNoiDung='" . $maNoiDung . "'";
        (new Connection())->excute($sql);
    }
}