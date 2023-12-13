<?php

class BaiTapObject{
    private $maBaiTap;
    private $tenLop;
    private $tenBaiHoc;
    private $tenKhoaHoc;
    private $moTa;
    private $hanNop;
    private $file;

    public function __construct($row){
        $this->maBaiTap = $row['maBaiTap'] ?? '';
        $this->tenLop = $row['tenLop'] ?? '';
        $this->tenBaiHoc = $row['tenBaiHoc'] ?? '';
        $this->tenKhoaHoc = $row['tenKhoaHoc'] ?? '';
        $this->moTa = $row['moTa'] ?? '';
        $this->hanNop = $row['hanNop'] ?? '';
        $this->file = $row['file_homework'] ?? '';
    }

    public function get_maBaiTap(){
        return  $this->maBaiTap;
    }
    public function set_maBaiTap($var){
        $this ->  maBaiTap = $var;
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
    public function get_moTa(){
        return $this -> moTa;
    }
    public function set_moTa($var){
        $this -> moTa = $var;
    }
    public function get_hanNop(){
        return  $this-> hanNop;
    }
    public function set_hanNop($var){
        $this ->  hanNop = $var;
    }
    public function get_file(){
        return $this -> file;
    }
    public function set_file($var){
        $this -> file = $var;
    }
}
