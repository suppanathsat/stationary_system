<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/status_type.php';
    include_once '../../obj/issue_status.php';
    $database = new Database();
    $db = $database->getConnection();
    
    $Status = new StatusType($db);
    
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
                $Issue = new IssueStatus($db);
                echo "countFK = ".$Issue->countFK('status_type_id',$id);
            if($Issue->countFK('status_type_id',$id)>0){
                    $msg = "มี FK ในตาราง issue status ลบ/แก้ไข ไม่ได้"; 
            }
            else{ 


                    // set property values
                    $Issue->status_name = $name; 
                    $Issue->status_type_id = $id;
                    // create the product
                    if($Status->update()){
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
    header("location:../../master.php?msg=".$msg."&active=status_type");  
?>