<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/authen.php';
    include_once '../../obj/authen.php';
    $database = new Database();
    $db = $database->getConnection();
    
    $Auth = new Authen($db);
    
    // get posted data
    print_r($_POST);
    extract($_POST);
    //user_id=asf password=DSFA password2=DFDAS fname=SDFAS lname=Saf
    // make sure data is not empty
    echo $name."<br>";
    echo $id."<br>";
    if(
        !empty($name) &&
        !empty($id)
    ){
        //ดุว่าลบหรือแก้ไขได้มั้ย
        $Auth = new Authen($db);
        echo "countFK = ".$Auth->countFK('auth_id',$id);
       if($Auth->countFK('auth_id',$id)>0){
            $msg = "มี FK ในตาราง staff ลบ/แก้ไข ไม่ได้";
       }
       else{
            // set property values
            $Auth->auth_name = $name; 
            $Auth->auth_id = $id;
            // create the product
            if($Auth->update()){
                // tell the user
                $msg = "แก้ไขสำเร็จ";
                
            }else{
                // tell the user
                $msg = "ไม่สามารถแก้ไขได้";
            }

        }
    }else{
    
        // tell the user
        $msg = "กรุณากรอกข้อมูลให้ครบ"; 
    }
    header("location:../../master.php?msg=".$msg."&active=auth_type");  
?>