<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/brand.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Obj = new Brand($db);
    
    // get posted data
    print_r($_POST);
    extract($_POST);
    //user_id=asf password=DSFA password2=DFDAS fname=SDFAS lname=Saf
    // make sure data is not empty
    echo $brand_name;
    if(
        !empty($brand_name) 
    ){
        // set property values
        $Obj->brand_name = $brand_name; 
        // create the product
        if($Obj->create()){
            // tell the user
            $msg = "เพิ่มยี่ห้ออุปกรณ์สำเร็จ";
        }else{
            // tell the user
            $msg = "ไม่สามารถเพิ่มยี่ห้ออุปกรณ์ได้";
        }

        
    }else{
    
        // tell the user
        $msg = "กรุณากรอกข้อมูลให้ครบ";
         
    }
  
    header("location:../../master.php?msg=".$msg."&active=brand_type");  
?>