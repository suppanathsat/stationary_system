<?php
    
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/stationary.php';
     
    $database = new Database();
    $db = $database->getConnection();
    
    $Sta = new Stationary($db);
    print_r($_POST);
    // get posted data

    // make sure data is not empty
    $type_id = $_POST["type_id"];
    $sta_name = $_POST["sta_name"];
    $min = $_POST["min"];
    $sta_id = $_POST["sta_id"];
    $brand_id = $_POST["brand_id"];
    $color_id = $_POST["color_id"];
    $unit_id = $_POST["unit_id"];
    $type_id = $_POST["type_id"];
    $sta_amount = $_POST["sta_amount"];
    
        $image=!empty($_FILES["image"]["name"])
        ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
        $Sta->sta_pic = $image;
   
       
//-----EXCUTE------
    if(
        isset($type_id) &&
        isset($sta_name) &&
        isset($min) &&
        isset($sta_id) &&
        isset($brand_id) &&
        isset($color_id) &&
        isset($type_id) &&
        isset($sta_amount) &&
        isset($unit_id) 
    ){
        // set product property values
        $Sta->type_id = $type_id;
        $Sta->sta_name = $sta_name;
        $Sta->min = $min;
        $Sta->sta_id = $sta_id;
        $Sta->min = $min;
        $Sta->brand_id = $brand_id;
        $Sta->color_id = $color_id;
        $Sta->unit_id = $unit_id;
        $Sta->sta_amount = $sta_amount;

        // create the product
        if($Sta->update()){
            //กรณีมีการแก้ไขรูปภาพ
            if($Sta->sta_pic != ""){
                $Sta->uploadPhoto();
            }
            
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
  
     header("location:../../index.php?msg=".$msg);   
     echo $msg;
?>