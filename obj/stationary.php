<?php
    session_start();
    class Stationary{
       // database connection and table name
       private $conn;
       private $table_name = "stationary";
    
       // object properties
       public $sta_id,$sta_name,$price,$min,$balance,$type_id,$dept_id,$sta_pic,$brand_id,$color_id,$unit_id,$staff_id,$createDate,$receive_num;
        
   
   
       public function __construct($db){
           $this->conn = $db;
       }
   
      function uploadPhoto(){
        $result_message="";
 
        // now, if image is not empty, try to upload the image
        if($this->sta_pic){
            // sha1_file() function is used to make a unique file name
            $target_directory = "uploads/";
            $target_file = $target_directory . $this->sta_pic;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
     
            // error message is empty
            $file_upload_error_messages="";
            // make sure that file is a real image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check!==false){
                // submitted file is an image
            }else{
                $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
            }
            
            // make sure certain file types are allowed
            $allowed_file_types=array("jpg", "jpeg", "png", "gif");
            if(!in_array($file_type, $allowed_file_types)){
                $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
            }
            
            // make sure file does not exist
            if(file_exists($target_file)){
                $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
            }
            
            // make sure submitted file is not too large, can't be larger than 1 MB
            if($_FILES['image']['size'] > (1024000)){
                $file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
            }
            
            // make sure the 'uploads' folder exists
            // if not, create it
            if(!is_dir($target_directory)){
                mkdir($target_directory, 0777, true);
            }
        }

        // if $file_upload_error_messages is still empty
        if(empty($file_upload_error_messages)){
            // it means there are no errors, so try to upload the file
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                // it means photo was uploaded
            }else{
                $result_message.="<div class='alert alert-danger'>";
                    $result_message.="<div>Unable to upload photo.</div>";
                    $result_message.="<div>Update the record to upload photo.</div>";
                $result_message.="</div>";
            }
        }
        
        // if $file_upload_error_messages is NOT empty
        else{
            // it means there are some errors, so show them to user
            $result_message.="<div class='alert alert-danger'>";
                $result_message.="{$file_upload_error_messages}";
                $result_message.="<div>Update the record to upload photo.</div>";
            $result_message.="</div>";
        }
     
        return $result_message;
      }
   
      function numToStr($max_sta,$length){
        $len = strlen($max_sta);
        while($len<$length){
            $max_sta = "0".$max_sta;
            $len += 1;
        }
        return $max_sta;
    }

     
       // ------CRUD---------
       // used by select drop-down list
       function create(){
           //ดึงค่า maxSta จาก varible
           $query = "SELECT value FROM varible WHERE var_name = 'max_sta';";
           $stmt = $this->conn->prepare( $query );
           $stmt->execute();
           $Arr = $stmt->fetch(PDO::FETCH_ASSOC);
           //ตั้งค่า sta_id
           $max_sta = $Arr['value'] + 1;
            echo "max_sta = ".$max_sta;
           //ดึงค่า type_code จาก sta_type
           $query = "SELECT type_code FROM sta_type WHERE type_id = ".$this->type_id.";";
           $stmt = $this->conn->prepare( $query );
           $stmt->execute();
           $Arr = $stmt->fetch(PDO::FETCH_ASSOC);
           //ตั้งค่า type_code
           $type_code = $Arr['type_code'];
           echo "type_code = ".$type_code."<br>";
           $this->sta_id = $type_code.$this->numToStr($max_sta,4);
           echo "sta_id = ".$this->sta_id;
           
           //สร้างอุปกรณ์ใหม่
           $query = "INSERT INTO ".$this->table_name."(sta_id,sta_name,balance,staff_id,sta_pic,min,type_id,brand_id,color_id,unit_id,sta_amount)";
           $query .= " VALUES('"."$this->sta_id',"."'$this->sta_name',"."$this->balance,"."'$this->staff_id','"."$this->sta_pic',"."$this->min,"."$this->type_id,"."$this->brand_id,"."$this->color_id,"."$this->unit_id,"."$this->sta_amount)";
           $stmt = $this->conn->prepare( $query );
           echo $query."<br>";
           $stmt->execute();
            
           //รับค่า maxtran
           $query = "SELECT value FROM varible WHERE var_name = 'max_tran';";
           $stmt = $this->conn->prepare( $query );
           $stmt->execute();
           $Arr = $stmt->fetch(PDO::FETCH_ASSOC);
           //ตั้งค่า 
           $tran_id = $Arr['value'] + 1;
           echo "tran_id = ".$tran_id."<br>";
           $tran_code = "TR";
           $this->tran_id = $tran_code.$this->numToStr($tran_id,6);
           //เพิ่มรายการลงใน transition เป็นแบบ receive
           $query = "INSERT INTO transition"."(tran_id,sta_id,is_receive,amount,staff_id,receive_num,price)";
           $query .= " VALUES("."'$this->tran_id',"."'$this->sta_id',"."1,"."$this->balance,"."'$this->staff_id',"."'$this->receive_num',"."$this->price".");";
           $stmt = $this->conn->prepare( $query );
           echo "<br>".$query;
           $stmt->execute();
           return $stmt;
           
       }

  

       function read(){
           $query = "SELECT stationary.sta_id,";
           $query .= "stationary.sta_name,";
           $query .= "stationary.balance,";
           $query .= "staff.fname,";
           $query .= "staff.lname,";
           $query .= "stationary.sta_pic,";
           $query .= "stationary.min,";
           $query .= "sta_type.type_name,";
           $query .= "stationary.createDate,";
           $query .= "brand.brand_name,";
           $query .= "color.color_name,";
           $query .= "stationary.sta_amount,";
           $query .= "unit.unit_name";
           $query .= " FROM stationary ";
           $query .= "INNER JOIN sta_type ON sta_type.type_id = stationary.type_id ";
           $query .= "INNER JOIN staff ON staff.staff_id = stationary.staff_id ";
           $query .= "INNER JOIN brand ON brand.brand_id = stationary.brand_id ";
           $query .= "INNER JOIN color ON color.color_id = stationary.color_id ";
           $query .= "INNER JOIN unit ON unit.unit_id = stationary.unit_id ORDER BY sta_type.type_name desc;";
           $stmt = $this->conn->prepare( $query );
           $stmt->execute();
           return $stmt;
       }

      
       function delete($sta_id){
        $query = "DELETE FROM stationary WHERE sta_id = '$sta_id';";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
       }

       function readOne($id){
        $query = "SELECT stationary.sta_id,";
        $query .= "stationary.sta_name,";
        $query .= "stationary.sta_amount,";
        $query .= "stationary.balance,";
        $query .= "staff.staff_id,";
        $query .= "staff.fname,";
        $query .= "staff.lname,";
        $query .= "stationary.sta_pic,";
        $query .= "stationary.min,";
        $query .= "sta_type.type_id,";
        $query .= "sta_type.type_name,";
        $query .= "brand.brand_id,";
        $query .= "brand.brand_name,";
        $query .= "color.color_id,";
        $query .= "color.color_name,";
        $query .= "unit.unit_id,";
        $query .= "unit.unit_name";
        $query .= " FROM stationary ";
        $query .= "INNER JOIN sta_type ON sta_type.type_id = stationary.type_id ";
        $query .= "INNER JOIN staff ON staff.staff_id = stationary.staff_id ";
        $query .= "INNER JOIN brand ON brand.brand_id = stationary.brand_id ";
        $query .= "INNER JOIN color ON color.color_id = stationary.color_id ";
        $query .= "INNER JOIN unit ON unit.unit_id = stationary.unit_id ";
        $query .= "WHERE stationary.sta_id = '$id';";
        
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            return $stmt;
       }

       function update(){
        $query = "UPDATE stationary ";
        $query .= "SET sta_name = '".$this->sta_name."', ";
        $query .= "type_id = ".$this->type_id.", ";
        $query .= "min = ".$this->min.", ";
        $query .= "color_id = ".$this->color_id.", ";
        $query .= "unit_id = ".$this->unit_id.", ";
        $query .= "sta_amount = ".$this->sta_amount.", ";
        $query .= "brand_id = ".$this->brand_id." ";
        if($this->sta_pic!="")$query .= "sta_pic = '".$this->sta_pic."', ";
        $query .= "WHERE stationary.sta_id = '".$this->sta_id."';";
        echo $query;
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
        }

       function search($type_id,$search,$searchBy){
           //set if select all
           
           if($type_id==0){
            $type_id = "sta_type.type_id";
           }
           $query = "SELECT stationary.sta_id,";
           $query .= "stationary.sta_name,";
           $query .= "stationary.balance,";
           $query .= "staff.fname,";
           $query .= "staff.lname,";
           $query .= "stationary.sta_pic,";
           $query .= "stationary.min,";
           $query .= "sta_type.type_name,";
           $query .= "stationary.createDate,";
           $query .= "brand.brand_name,";
           $query .= "color.color_name,";
           $query .= "stationary.sta_amount,";
           $query .= "unit.unit_name";
           $query .= " FROM stationary ";
           $query .= "INNER JOIN sta_type ON sta_type.type_id = stationary.type_id ";
           $query .= "INNER JOIN staff ON staff.staff_id = stationary.staff_id ";
           $query .= "INNER JOIN brand ON brand.brand_id = stationary.brand_id ";
           $query .= "INNER JOIN color ON color.color_id = stationary.color_id ";
           $query .= "INNER JOIN unit ON unit.unit_id = stationary.unit_id ";
           $query .= "WHERE sta_type.type_id=$type_id and stationary.$searchBy LIKE '%$search%';";
        $stmt = $this->conn->prepare( $query );
           $stmt->execute();
           return $stmt;
       }

       function readNearlyOutOfStock(){
            $query = "SELECT stationary.sta_id,";
            $query .= "stationary.sta_name,";
            $query .= "stationary.balance,";
            $query .= "staff.fname,";
            $query .= "staff.lname,";
            $query .= "stationary.sta_pic,";
            $query .= "stationary.min,";
            $query .= "sta_type.type_name,";
            $query .= "stationary.createDate,";
            $query .= "brand.brand_name,";
            $query .= "color.color_name,";
            $query .= "stationary.sta_amount,";
            $query .= "unit.unit_name";
            $query .= " FROM stationary ";
            $query .= "INNER JOIN sta_type ON sta_type.type_id = stationary.type_id ";
            $query .= "INNER JOIN staff ON staff.staff_id = stationary.staff_id ";
            $query .= "INNER JOIN brand ON brand.brand_id = stationary.brand_id ";
            $query .= "INNER JOIN color ON color.color_id = stationary.color_id ";
            $query .= "INNER JOIN unit ON unit.unit_id = stationary.unit_id ";
            $query .= "Where stationary.balance <= stationary.min and 0 < stationary.balance;";
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            return $stmt;
       }

       function readOutOfStock(){
            $query = "SELECT stationary.sta_id,";
            $query .= "stationary.sta_name,";
            $query .= "stationary.balance,";
            $query .= "staff.fname,";
            $query .= "staff.lname,";
            $query .= "stationary.sta_pic,";
            $query .= "stationary.min,";
            $query .= "sta_type.type_name,";
            $query .= "stationary.createDate,";
            $query .= "brand.brand_name,";
            $query .= "color.color_name,";
            $query .= "stationary.sta_amount,";
            $query .= "unit.unit_name";
            $query .= " FROM stationary ";
            $query .= "INNER JOIN sta_type ON sta_type.type_id = stationary.type_id ";
            $query .= "INNER JOIN staff ON staff.staff_id = stationary.staff_id ";
            $query .= "INNER JOIN brand ON brand.brand_id = stationary.brand_id ";
            $query .= "INNER JOIN color ON color.color_id = stationary.color_id ";
            $query .= "INNER JOIN unit ON unit.unit_id = stationary.unit_id ";
            $query .= "Where stationary.balance = 0;";
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            return $stmt;
        }

        function readStaffIssue(){
            $query = "SELECT transition.tran_id,";
            $query .= "stationary.sta_name,";
            $query .= "stationary.sta_pic,";
            $query .= "stationary.min,";
            $query .= "brand.brand_name,";
            $query .= "color.color_name,";
            $query .= "stationary.sta_amount,";
            $query .= "unit.unit_name,";
            $query .= "transition.amount,";

            $query .= "issue_status.status_type_id,";
            $query .= "status_type.status_name,";
            
            $query .= "staff.fname,";
            $query .= "staff.lname,";
            $query .= "transition.tran_date ";
            $query .= "FROM transition ";
            $query .= "INNER JOIN stationary ON stationary.sta_id = transition.sta_id ";
            $query .= "INNER JOIN staff ON staff.staff_id = transition.staff_id ";

            $query .= "INNER JOIN issue_status ON issue_status.tran_id = transition.tran_id ";
            $query .= "INNER JOIN status_type ON issue_status.status_type_id = status_type.status_type_id ";

            $query .= "INNER JOIN brand ON brand.brand_id = stationary.brand_id ";
            $query .= "INNER JOIN color ON color.color_id = stationary.color_id ";
            $query .= "INNER JOIN unit ON unit.unit_id = stationary.unit_id ";
            $query .= "Where MONTH(DATE(transition.tran_date)) = MONTH(CURDATE()) and is_receive = 0;";
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            return $stmt;
        }

       function countFK($fk,$id){
        $table_name = "stationary";
        $query = "SELECT count(*) FROM $table_name Where $fk = $id";
        echo $query;
        $stmt = $this->conn->prepare( $query );
           $stmt->execute();
           $Arr = $stmt->fetch(PDO::FETCH_ASSOC);
           return $Arr["count(*)"];
       }

    
    }   

   

?>