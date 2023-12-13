<?php

class DangKyKhoaHocObject{
    private $maDangKy;
    private $maKhoaHoc;
    private $tenKhoaHoc;
    private $maLop;
    private $tenLop;
    private $tenGV;
    private $tenHV;
    private $maTK;
    private $ngayDangKy;

    public function __construct($row){
        $this->maDangKy = $row['maDangKy'] ?? '';
        $this->maLop = $row['maLop'] ?? '';
        $this->tenLop = $row['tenLop'];
        $this->maKhoaHoc = $row['maKhoaHoc'];
        $this->tenKhoaHoc = $row['tenKhoaHoc'] ?? '';
        $this->maTK = $row['maTK'];
        $this->tenGV = $row['tenGV'] ?? '';
        $this->tenHV = $row['tenHV'] ?? '';
        $this->ngayDangKy = $row['ngayDangKy'] ?? '';
    }

    public function get_maLop(){
        return $this->maLop;
    }

    public function set_maLop($var){
        $this->maLop = $var;
    }
    public function get_tenLop(){
        return $this->tenLop;
    }
    public function set_tenLop($var){
        $this ->  tenLop = $var;
    }
    public function get_maKhoaHoc(){
        return $this->maKhoaHoc;
    }
    public function set_maKhoaHoc($var){
        $this ->  maKhoaHoc = $var;
    }
    public function get_maTK(){
        return $this->maTK;
    }
    public function set_maTK($var){
        $this ->  maTK = $var;
    }
    public function get_tenGV(){
        return $this->tenGV;
    }
    public function set_tenGV($var){
        $this ->  tenGV = $var;
    }
    public function get_tenKhoaHoc(){
        return $this->tenKhoaHoc;
    }
    public function set_tenKhoaHoc($var){
        $this->tenKhoaHoc = $var;
    }
    public function get_tenHV(){
        return $this->tenHV;
    }
    public function set_tenHV($var){
        $this->tenHV = $var;
    }
    public function get_maDangKy(){
        return $this->maDangKy;
    }
    public function set_maDangKy($var){
        $this->maDangKy = $var;
    }
    public function get_ngayDangKy(){
        return $this->ngayDangKy;
    }
    public function set_ngayDangKy($var){
        $this->ngayDangKy = $var;
    }
}
