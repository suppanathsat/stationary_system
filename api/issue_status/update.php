<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/issue_status.php';
    $database = new Database();
    $conn = $database->getConnection();
    
    // get posted data
    print_r($_GET);
    extract($_GET);
    //รับค่า old_status
            $query = "SELECT status_type.status_name from issue_status ";
            $query .= "inner join transition on  transition.tran_id = issue_status.tran_id ";
            $query .= "inner join status_type on  status_type.status_type_id = issue_status.status_type_id ";
            $query .= "where issue_status.tran_id = '$tran_id'; ";
            $stmt = $conn->prepare( $query );
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                $old_status = $row[0];
            }
    echo $old_status;
    
    //กรณีเหมือนอันเก่า
    if($old_status==$new_status){

    }else{
        
        if($old_status=="รับของแล้ว"){//กรณีอันเก่าอนุมัติไปแล้ว
            //รับค่า amount
            $query = "SELECT transition.amount,transition.sta_id from issue_status ";
            $query .= "inner join transition on  transition.tran_id = issue_status.tran_id ";
            $query .= "where issue_status.tran_id = '$tran_id'; ";
            $stmt = $conn->prepare( $query );
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                $amount = $row[0];
                $sta_id = $row[1];
            }
            //เพิ่ม balance เท่ากับที่ amount เบิกมา
            $query = "UPDATE stationary SET balance = balance + $amount WHERE sta_id='$sta_id';";
            $stmt = $conn->prepare( $query );
            $stmt->execute();

            //อัพเดท status
            if($new_status == "กำลังพิจารณา"){
                $new_status = 1;
            }elseif($new_status == "อนุมัติ"){
                $new_status = 2;
            }elseif($new_status == "ไม่อนุมัติ"){
                $new_status = 3;
            }

            $query = "UPDATE issue_status SET status_type_id = $new_status WHERE tran_id='$tran_id';";
            $stmt = $conn->prepare( $query );
            $stmt->execute();
        }elseif($new_status=="รับของแล้ว"){
            //รับค่า amount 
            $query = "SELECT transition.amount,transition.sta_id from issue_status ";
            $query .= "inner join transition on  transition.tran_id = issue_status.tran_id ";
            $query .= "where issue_status.tran_id = '$tran_id'; ";
            $stmt = $conn->prepare( $query );
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                $amount = $row[0];
                $sta_id = $row[1];
            }
            //ลบ balance เท่ากับที่ amount เบิกมา
            $query = "UPDATE stationary SET balance = balance - $amount WHERE sta_id='$sta_id';";
            $stmt = $conn->prepare( $query );
            $stmt->execute();
            //อัพเดท status

            $query = "UPDATE issue_status SET status_type_id = 4 WHERE tran_id='$tran_id';";
            $stmt = $conn->prepare( $query );
            $stmt->execute();
        }else{
            if($new_status == "กำลังพิจารณา"){
                $new_status = 1;
            }elseif($new_status == "อนุมัติ"){
                $new_status = 2;
            }elseif($new_status == "ไม่อนุมัติ"){
                $new_status = 3;
            }
            $query = "UPDATE issue_status SET status_type_id = $new_status WHERE tran_id='$tran_id';";
            $stmt = $conn->prepare( $query );
            $stmt->execute();
        }
    }
    
    header("location:../../issueStatus.php");  
  
?>