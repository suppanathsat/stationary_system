<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/authen.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Obj = new Authen($db);
    
    // get posted data
    print_r($_POST);
    extract($_POST);
    // make sure data is not empty
    echo $auth_name;
    if(
        !empty($auth_name) 
    ){
        // set property values
        $Obj->auth_name = $auth_name; 
        // create the product
        if($Obj->create()){
            // tell the user
            $msg = "เพิ่มสิทธิ์สำเร็จ";
            
        }else{
    
    
            // tell the user
            $msg = "ไม่สามารถเพิ่มสิทธิ์";
        }

        
    }else{
    
        // tell the user
        $msg = "กรุณากรอกข้อมูลให้ครบ";
        
    }
  
    header("location:../../master.php?msg=".$msg."&active=auth_type");   
 
?>