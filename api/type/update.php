<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/type.php';
    include_once '../../obj/stationary.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Type = new Types($db);
    
    // get posted data
    print_r($_POST);
    extract($_POST);
    //user_id=asf password=DSFA password2=DFDAS fname=SDFAS lname=Saf
    // make sure data is not empty
    echo $name."<br>";
    echo $code."<br>";
    echo $id."<br>";
    if(
        !empty($name) &&
        !empty($code) &&
        !empty($id)
    ){

        //ดุว่าลบหรือแก้ไขได้มั้ย
        $Sta = new Stationary($db);
        echo "countFK = ".$Sta->countFK('type_id',$id);
       if($Sta->countFK('type_id',$id)>0){
            $msg = "มี FK ในตาราง stationary ลบ/แก้ไข ไม่ได้"; 
       }
       else{
            // set property values
            $Type->type_name = $name; 
            $Type->type_code = $code; 
            $Type->type_id = $id;
            // create the product
            if($Type->update()){
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
    echo $msg;
    header("location:../../master.php?msg=".$msg."&active=sta_type");  
?>