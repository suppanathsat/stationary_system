<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/staff.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Staff = new Staff($db);
    
    // get posted data
    print_r($_POST);
    extract($_POST);
    //user_id=asf password=DSFA password2=DFDAS fname=SDFAS lname=Saf
    // make sure data is not empty
    echo $password1;
    echo $password2;
    echo $fname;
    echo $lname;
    echo $auth_id;
    echo $dept_id;
  
    if(
        !empty($password1) &&
        !empty($password2) &&
        !empty($fname) &&
        !empty($lname) &&
        !empty($auth_id) &&
        !empty($dept_id) &&
        $password1 === $password2
    ){
        // set product property values
        $Staff->username = $username; 
        $Staff->password = $password1;
        $Staff->dept_id = $dept_id;
        $Staff->fname = $fname; 
        $Staff->lname = $lname;
        $Staff->auth_id = $dept_id;
        // create the product
        if($Staff->create()){
    
        
            // tell the user
            $msg = "เพิ่มพนักงานสำเร็จ";
            header("location:../../staff.php?msg=".$msg);   
            
        }else{
    
    
            // tell the user
            $msg = "ไม่สามารถเพิ่มพนักงานได้";
        }

        
    }else{
    
        // tell the user
        $msg = "กรุณากรอกข้อมูลให้ครบ";
        header("location:../../staff.php?msg=".$msg);   
    }
  
 
?>