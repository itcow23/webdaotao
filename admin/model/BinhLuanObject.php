<?php

class BinhLuanObject{
    private $maBinhLuan;
    private $tenLop;
    private $tenBaiHoc;
    private $tenKhoaHoc;
    private $tenUser;
    private $noiDung;
    private $ngayDang;

    public function __construct($row){
        $this->maBinhLuan = $row['maBinhLuan'] ?? '';
        $this->tenLop = $row['tenLop'] ?? '';
        $this->tenBaiHoc = $row['tenBaiHoc'] ?? '';
        $this->tenKhoaHoc = $row['tenKhoaHoc'] ?? '';
        $this->tenUser = $row['tenUser'] ?? '';
        $this->noiDung = $row['noiDung'] ?? '';
        $this->ngayDang = $row['ngayDang'] ?? '';
    }

    public function get_maBinhLuan(){
        return  $this->maBinhLuan;
    }
    public function set_maBinhLuan($var){
        $this ->  maBinhLuan = $var;
    }
    public function get_tenLop(){
        return  $this-> tenLop;
    }
    public function set_tenLop($var){
        $this ->  tenLop = $var;
    }
    public function get_tenBaiHoc(){
        return $this ->  tenBaiHoc;
    }
    public function set_tenBaiHoc($var){
        $this -> tenBaiHoc = $var;
    }
    public function get_tenKhoaHoc(){
        return $this ->  tenKhoaHoc;
    }
    public function set_tenKhoaHoc($var){
        $this -> tenKhoaHoc = $var;
    }
    public function get_tenUser(){
        return $this -> tenUser;
    }
    public function set_tenUser($var){
        $this -> tenUser = $var;
    }
    public function get_noiDung(){
        return  $this-> noiDung;
    }
    public function set_noiDung($var){
        $this ->  noiDung = $var;
    }
    public function get_ngayDang(){
        return $this -> ngayDang;
    }
    public function set_ngayDang($var){
        $this -> ngayDang = $var;
    }
}
