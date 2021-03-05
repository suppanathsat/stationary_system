<?php
extract($_POST);
//เช็คว่ามีในตารางหรือไม่
include 'obj/staff.php';
include_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();
    
$Staff = new Staff($db);
$Staff->username = $username;
$Staff->password = $password;

$isLogin = $Staff->checkLogin();
if($isLogin){
    echo 'login success';
    $_SESSION["staff_id"] = $Staff->getStaffID() ;
    $_SESSION["auth_id"] = $Staff->getAuth();
    $_SESSION["fullname"] = $Staff->getFullname();
    $_SESSION["dept_id"] = $Staff->getDept();
    print_r($_SESSION);
    header('Location:index.php');
}else{
    echo 'login fail';
    header('Location:login.php');
}


?>