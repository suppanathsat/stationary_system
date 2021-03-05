<?php
    
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/stationary.php';

    print_r($_POST);
     
    $database = new Database();
    $db = $database->getConnection();
    
    $Sta = new Stationary($db);
    $sta_id = $_POST['sta_id'];
//-----EXCUTE------
    if($Sta->delete($sta_id)){
        $msg = "ลบอุปกรณ์สำเร็จ";
    }else{      
        $msg = "ลบอุปกรณ์ไม่สำเร็จ";
    }
  
    header("location:../../index.php?msg=".$msg);   
 
?>