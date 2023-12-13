<?php

class LopObject{
    private $maLop;
    private $tenLop;
    private $maKhoaHoc;
    private $maTK;
    private $tenGV;
    private $tenKhoaHoc;

    public function __construct($row){
        $this->maLop = $row['maLop'] ?? '';
        $this->tenLop = $row['tenLop'];
        $this->maKhoaHoc = $row['maKhoaHoc'];
        $this->maTK = $row['maTK'];
        $this->tenGV = $row['tenGV'] ?? '';
        $this->tenKhoaHoc = $row['tenKhoaHoc'] ?? '';
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
}
