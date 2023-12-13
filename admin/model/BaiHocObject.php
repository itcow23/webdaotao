<?php

class BaiHocObject{
    private $maBaiHoc;
    private $tenBaiHoc;
    private $tieuDe;
    private $moTa;
    private $video;
    private $noiDungKhoaHoc;
    private $tenKhoaHoc;
    private $maKhoaHoc;
    private $maNoiDung;
    private $tenLop;

    public function __construct($row){
        $this->maBaiHoc = $row['maBaiHoc'] ?? '';
        $this->tenBaiHoc = $row['tenBaiHoc'];
        $this->tieuDe = $row['tieuDe'];
        $this->moTa = $row['moTa'];
        $this->video = $row['video'];
        $this->noiDungKhoaHoc = $row['noiDungKhoaHoc'] ?? " ";
        $this->tenKhoaHoc = $row['tenKhoaHoc'] ?? " ";
        $this->maKhoaHoc = $row['maKhoaHoc'];
        $this->maNoiDung = $row['maNoiDung'];
        $this->tenLop = $row['tenLop'];
    }

    public function get_maBaiHoc(){
        return $this->maBaiHoc;
    }
    public function set_maBaiHoc($var){
        $this->maBaiHoc = $var;
    }
    public function get_tenBaiHoc(){
        return $this->tenBaiHoc;
    }
    public function set_tenBaiHoc($var){
        $this->tenBaiHoc = $var;
    }
    public function get_tieuDe(){
        return $this->tieuDe;
    }
    public function set_tieuDe($var){
        $this->tieuDe = $var;
    }
    public function get_moTa(){
        return $this->moTa;
    }
    public function set_moTa($var){
        $this->moTa = $var;
    }
    public function get_video(){
        return $this->video;
    }
    public function set_video($var){
        $this->video = $var;
    }
    public function get_noiDungKhoaHoc(){
        return $this->noiDungKhoaHoc;
    }
    public function set_noiDungKhoaHoc($var){
        $this->noiDungKhoaHoc = $var;
    }
    public function get_tenKhoaHoc(){
        return $this->tenKhoaHoc;
    }
    public function set_tenKhoaHoc($var){
        $this->tenKhoaHoc = $var;
    }
    public function get_maKhoaHoc(){
        return $this->maKhoaHoc;
    }
    public function set_maKhoaHoc($var){
        $this->maKhoaHoc = $var;
    }
    public function get_maNoiDung(){
        return $this->maNoiDung;
    }
    public function set_maNoiDung($var){
        $this->maNoiDung = $var;
    }
    public function get_tenLop() {
        return $this->tenLop;
    }
    public function set_tenLop($var) {
        $this->tenLop = $var;
    }
}