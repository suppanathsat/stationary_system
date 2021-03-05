<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/type.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Type = new Types($db);
    
    // get posted data
    print_r($_POST);
    extract($_POST);
    //user_id=asf password=DSFA password2=DFDAS fname=SDFAS lname=Saf
    // make sure data is not empty
    echo $type_name;
    echo $type_code;
    if(
        !empty($type_name) &&
        !empty($type_code)
    ){
        // set property values
        $Type->type_name = $type_name; 
        $Type->type_code = $type_code; 
        // create the product
        if($Type->create()){
            // tell the user
            $msg = "เพิ่มประเภทอุปกรณ์สำเร็จ";
            
        }else{
    
    
            // tell the user
            $msg = "ไม่สามารถเพิ่มประเภทอุปกรณ์ได้";
        }

        
    }else{
    
        // tell the user
        $msg = "กรุณากรอกข้อมูลให้ครบ"; 
    }
  
    header("location:../../master.php?msg=".$msg."&active=sta_type");  
?>