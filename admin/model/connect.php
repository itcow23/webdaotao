<?php

class Connection {
    private $server ='localhost';
    private $user ='root';
    private $password ='';
    private $db = 'webdaotao';


    public function cnt(){
        $connect = mysqli_connect('localhost','root','','webdaotao');
        mysqli_set_charset($connect,'utf8');

        return $connect;
    }

    public function select($sql){
        $connect = $this->cnt();
        $result = mysqli_query($connect,$sql);

        mysqli_close($connect);

        return $result;
    }

    public function excute($sql){
        $connect = $this->cnt();
        mysqli_query($connect,$sql);
        
        mysqli_close($connect);
    }

}