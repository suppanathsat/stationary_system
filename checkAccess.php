<?php
    session_start();
    $isLogin = isset($_SESSION["staff_id"]) && isset($_SESSION["auth_id"]) && isset($_SESSION["fullname"]); 
    if(!$isLogin){
        header('Location:login.php'); 
    }
?>