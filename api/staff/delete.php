<?php
    
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/staff.php';

    print_r($_POST);
     
    $database = new Database();
    $db = $database->getConnection();
    
    $Staff = new Staff($db);
    $staff_id = $_POST['staff_id'];
    $Staff->staff_id = $staff_id;
//-----EXCUTE------
    if($Staff->delete()){
        $msg = "ลบพนักงานสำเร็จ";
    }else{      
        $msg = "ลบพนักงานไม่สำเร็จ";
    }
  
    header("location:../../staff.php?msg=".$msg);   
 
?>