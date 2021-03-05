<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/department.php';
    include_once '../../obj/authen.php';
    $database = new Database();
    $db = $database->getConnection();
    
    $Dept = new Department($db);
    
    // get posted data
    print_r($_POST);
    extract($_POST);
    //user_id=asf password=DSFA password2=DFDAS fname=SDFAS lname=Saf
    // make sure data is not empty
    
    echo $id."<br>";
    if(
        !empty($id)
    ){
         //ดุว่าลบหรือแก้ไขได้มั้ย
         $Auth = new Authen($db);
         echo "countFK = ".$Auth->countFK('dept_id',$id);
        if($Auth->countFK('dept_id',$id)>0){
             $msg = "มี FK ในตาราง staff ลบ/แก้ไข ไม่ได้";
        }
        else{
            // set property values
            
            $Dept->dept_id = $id;
            // create the product
            if($Dept->delete()){
                // tell the user
                $msg = "ลบข้อมูลสำเร็จ";
                
            }else{
        
        
                // tell the user
                $msg = "ไม่สามารถลบข้อมูลได้";
            }
        }
        
    }else{
    
        // tell the user
        $msg = "ไม่สามารถลบข้อมูลได้ "; 
    }
    echo $msg;
    header("location:../../master.php?msg=".$msg."&active=dept_type");  
?>