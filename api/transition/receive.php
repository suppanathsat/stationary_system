<?php
    session_start();
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/transition.php';
    $database = new Database();
    $db = $database->getConnection();
    
    $Tran = new Transition($db);
    print_r($_POST);
    // get posted data

    // make sure data is not empty
    $sta_id = $_POST["sta_id"];
    $receive_num = $_POST['receive_num'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $staff_id = $_SESSION['staff_id'];

       
        
       
//-----EXCUTE------
    if(
        isset($sta_id) &&
        isset($receive_num) &&
        isset($price) &&
        isset($amount) &&
        isset($staff_id) 
    ){
        $Tran->sta_id = $sta_id;
        $Tran->receive_num = $receive_num;
        $Tran->price = $price;
        $Tran->amount = $amount;
        $Tran->staff_id = $staff_id;
        // create the product
        if($Tran->receive()){
    
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