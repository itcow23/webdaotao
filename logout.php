<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['hoTen']);
unset($_SESSION['level']);
unset($_SESSION[ 'maKH_TK' ]);
header('location: login.php');