<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/unit.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Unit = new Unit($db);
    
    // get posted data
    print_r($_POST);
    extract($_POST);
    // make sure data is not empty
    echo $unit_name;
  
    if(
        !empty($unit_name) 
    ){
        // set product property values
        $Unit->unit_name = $unit_name; 
        // create the product
        if($Unit->create()){
            // tell the user
            $msg = "เพิ่มหน่วยสำเร็จ";
            
        }else{
    
    
            // tell the user
            $msg = "ไม่สามารถเพิ่มหน่วยได้";
        }

        
    }else{
    
        // tell the user
        $msg = "กรุณากรอกข้อมูลให้ครบ";   
    }
  
    header("location:../../master.php?msg=".$msg."&active=unit_type");  
?>