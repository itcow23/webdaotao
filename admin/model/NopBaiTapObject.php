<?php

class NopBaiTapObject{
    private $maNopBaiTap;
    private $tenLop;
    private $tenBaiHoc;
    private $tenKhoaHoc;
    private $tenUser;
    private $ngayNop;
    private $fileNop;

    public function __construct($row){
        $this->maNopBaiTap = $row['maNopBaiTap'] ?? '';
        $this->tenLop = $row['tenLop'] ?? '';
        $this->tenBaiHoc = $row['tenBaiHoc'] ?? '';
        $this->tenKhoaHoc = $row['tenKhoaHoc'] ?? '';
        $this->tenUser = $row['tenUser'] ?? '';
        $this->ngayNop = $row['ngayNop'] ?? '';
        $this->fileNop = $row['fileNop'] ?? '';
    }

    public function get_maNopBaiTap(){
        return  $this->maNopBaiTap;
    }
    public function set_maNopBaiTap($var){
        $this ->  maNopBaiTap = $var;
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
    public function get_ngayNop(){
        return  $this-> ngayNop;
    }
    public function set_ngayNop($var){
        $this ->  ngayNop = $var;
    }
    public function get_fileNop(){
        return $this -> fileNop;
    }
    public function set_fileNop($var){
        $this -> fileNop = $var;
    }
}
