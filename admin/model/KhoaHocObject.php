<?php

class KhoaHocObject{
    private $maKhoaHoc;
    private $tenKhoaHoc;
    private $moTa;
    private $thoiGian;
    private $anh;
    private $photo;
    private $photo_new;
    private $photo_old;

    public function __construct($row){
        $this->maKhoaHoc = $row['maKhoaHoc'] ?? '';
        $this->tenKhoaHoc = $row['tenKhoaHoc'];
        $this->moTa = $row['moTa'];
        $this->thoiGian = $row['thoiGian'];
        $this->photo_new = $_FILES['anhMoi'] ?? "";
        $this->photo_old = $row['anhCu'] ?? " ";
        $this->anh = $row['anh']?? " ";
        $this->photo = $_FILES['anh']?? " ";
    }

    public function get_maKhoaHoc(){
        return $this->maKhoaHoc;
    }

    public function set_makhoaHoc($var){
        $this->maKhoaHoc = $var;
    }
    public function get_tenKhoaHoc(){
        return $this->tenKhoaHoc;
    }

    public function set_tenKhoaHoc($var){
        $this->tenKhoaHoc = $var;
    }
    public function get_moTa(){
        return $this->moTa;
    }

    public function set_moTa($var){
        $this->moTa = $var;
    }
    public function get_thoiGian(){
        return $this->thoiGian;
    }
    public function set_thoiGian($var){
        $this->thoiGian = $var;
    }
    public function get_anh(){
        return $this->anh;
    }
    public function set_anh($var){
        $this-> anh= $var;
    }
    public function get_photo(){
        return $this->photo;
    }
    public function get_photo_new()
    {
        return $this->photo_new;
    }
    public function get_photo_old()
    {
        return $this->photo_old;;
    }
}
