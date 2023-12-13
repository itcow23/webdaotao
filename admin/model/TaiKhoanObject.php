<?php

class TaiKhoanObject{
    private $id;
    private $email;
    private $matKhau;
    private $level;

    public function __construct($row){
        $this->id = $row['id'] ?? '';
        $this->email = $row['email'];
        $this->matKhau = $row['matKhau'];
        $this->level = $row['level'];
    }

    public function get_id(){
        return $this->id;
    }
    public function set_id($var){
        $this->id = $var;
    }
    public function get_email(){
        return $this->email;
    }
    public function set_email($var){
        $this->email = $var;
    }
    public function get_matKhau(){
        return $this->matKhau;
    }
    public function set_matKhau($var){
        $this->matKhau = $var;
    }
    public function get_level(){
        return $this->level;
    }
    public function set_level($var){
        $this->level = $var;
    }
}