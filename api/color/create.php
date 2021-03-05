<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/color.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Obj = new Color($db);
    
    // get posted data
    print_r($_POST);
    extract($_POST);
    // make sure data is not empty
    echo $color_name;
    if(
        !empty($color_name) 
    ){
        // set property values
        $Obj->color_name = $color_name; 
        // create the product
        if($Obj->create()){
            // tell the user
            $msg = "เพิ่มสีสำเร็จ";
           
        }else{
    
    
            // tell the user
            $msg = "ไม่สามารถเพิ่มสีได้";
        }

        
    }else{
    
        // tell the user
        $msg = "กรุณากรอกข้อมูลให้ครบ";
       
    }
  
    header("location:../../master.php?msg=".$msg."&active=color_type");  
?>