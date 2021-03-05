<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/brand.php';
    include_once '../../obj/stationary.php';
    $database = new Database();
    $db = $database->getConnection();
    
    $Brand = new Brand($db);
    
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
        $Sta = new Stationary($db);
        echo "countFK = ".$Sta->countFK('brand_id',$id);
       if($Sta->countFK('brand_id',$id)>0){
            $msg = "มี FK ในตาราง stationary ลบ/แก้ไข ไม่ได้";
            header("location:../../master.php?msg=".$msg."&active=sta_type"); 
       }
       else{
            // set property values
            $Brand->brand_name = $name; 
            $Brand->brand_id = $id;
            // create the product
            if($Brand->update()){
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
    header("location:../../master.php?msg=".$msg."&active=brand_type");  
?>