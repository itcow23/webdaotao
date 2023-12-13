<?php

session_start();

if(!isset($_SESSION['level_ad'])){
    header("location:?controller=login");
}