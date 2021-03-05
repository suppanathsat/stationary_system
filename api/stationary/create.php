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
    $price = $_POST["price"];
    $balance = $_POST["balance"];
    $min = $_POST["min"];
    $color_id = $_POST["color_id"];
    $unit_id = $_POST["unit_id"];
    $sta_amount = $_POST["sta_amount"];
    $brand_id = $_POST["brand_id"];
    $receiveNum = $_POST["receiveNum"];


    $staff_id = $_SESSION["staff_id"];

        $image=!empty($_FILES["image"]["name"])
        ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
        $Sta->sta_pic = $image;

        echo "sta_pic = ".$Sta->sta_pic; 

        
       
//-----EXCUTE------
    if(
        isset($type_id) &&
        isset($sta_name) &&
        isset($price) &&
        isset($balance) &&
        isset($min) &&
        isset($brand_id) &&
        isset($color_id) &&
        isset($unit_id) &&
        isset($sta_amount) &&
        isset($receiveNum)
    ){
        echo "create";
        // set product property values
        $Sta->type_id = $type_id;
        $Sta->sta_name = $sta_name;
        $Sta->price = $price;
        $Sta->balance = $balance;
        $Sta->min = $min;
        $Sta->color_id = $color_id;
        $Sta->brand_id = $brand_id;
        $Sta->staff_id = $_SESSION['staff_id'];
        $Sta->unit_id = $unit_id;
        $Sta->sta_amount = $sta_amount;
        $Sta->receive_num = $receiveNum;

        // create the product
        if($Sta->create()){
            $Sta->uploadPhoto();
    
            // tell the user
            $msg = "เพิ่มอุปกรณ์สำเร็จ";
            
        }else{
    
            // tell the user
            $msg = "ไม่สามารถเพิ่มอุปกรณ์ได้";
        }

    }else{      
        // tell the user
        $msg = "กรุณากรอกข้อมูลให้ครบ";
    }
  
    echo $msg;
    header("location:../../index.php?msg=".$msg);   
 
?>