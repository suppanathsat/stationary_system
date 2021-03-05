<?php
    
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/staff.php';
     
    $database = new Database();
    $db = $database->getConnection();
    
    $Staff = new Staff($db);
    print_r($_POST);
    // get posted data
    
    // make sure data is not empty
        $staff_id = $_POST["staff_id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $username = $_POST["username"];
        $auth_id = $_POST["auth_id"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];
        $dept_id = $_POST["dept_id"];
     
       
//-----EXCUTE------
    if(
        isset($staff_id) &&
        isset($fname) &&
        isset($lname) &&
        isset($username) &&
        isset($auth_id) &&
        $password1 === $password2
    ){
        // set  property values
        $Staff->staff_id = $staff_id;
        $Staff->fname = $fname;
        $Staff->lname = $lname;
        $Staff->username = $username;
        $Staff->password = $password1;
        $Staff->auth_id = $auth_id;
        $Staff->dept_id = $dept_id;
        // create the product
        if($Staff->update()){
            //กรณีมีการแก้ไขรูปภาพ
            
            // tell the user
            $msg = "แก้ไขข้อมูลอุปกรณ์สำเร็จ";
            
        }else{
            // tell the user
            $msg = "ไม่สามารถแก้ไขข้อมูลอุปกรณ์ได้";
        }

        
    }else{      
        // tell the user
        $msg = "กรุณากรอกข้อมูลให้ครบ";
    }
  
     header("location:../../staff.php?msg=".$msg);   
 
?>