<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/department.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Department = new Department($db);
    
    // get posted data
    print_r($_POST);
    extract($_POST);
    //user_id=asf password=DSFA password2=DFDAS fname=SDFAS lname=Saf
    // make sure data is not empty
    echo $dept_name;
  
    if(
        !empty($dept_name) 
    ){
        // set product property values
        $Department->dept_name = $dept_name; 
        // create the product
        if($Department->create()){
            // tell the user
            $msg = "เพิ่มแผนกสำเร็จ";
            
        }else{
    
    
            // tell the user
            $msg = "ไม่สามารถเพิ่มแผนกได้";
        }

        
    }else{
    
        // tell the user
        $msg = "กรุณากรอกข้อมูลให้ครบ"; 
    }
    echo $msg;
    header("location:../../master.php?msg=".$msg."&active=dept_type");  
 
?>