<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/status_type.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Obj = new StatusType($db);
    
    // get posted data
    print_r($_POST);
    extract($_POST);
    // make sure data is not empty
    echo $status_name;
    if(
        !empty($status_name) 
    ){
        // set property values
        $Obj->status_name = $status_name; 
        // create the product
        if($Obj->create()){
            // tell the user
            $msg = "เพิ่มสถานะสำเร็จ";
        }else{
    
    
            // tell the user
            $msg = "ไม่สามารถเพิ่มสถานะได้";
        }

        
    }else{
    
        // tell the user
        $msg = "กรุณากรอกข้อมูลให้ครบ";
    }
  
    header("location:../../master.php?msg=".$msg."&active=status_type");  
?>