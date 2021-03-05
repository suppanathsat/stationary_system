<?php

 class Transition{
    // database connection and table name
    private $conn;
    private $table_name = "transition";
 
    // object properties
    public $tran_id,$sta_id,$is_receive,$amount,$staff_id,$tran_date,$receive_num,$price,$status_type_id;

    public function __construct($db){
        $this->conn = $db;
    }

    //use with dropdown
    function read(){
        $query = "SELECT ";
        $query .= "transition.tran_id, ";
        $query .= "stationary.sta_name, ";
        $query .= "unit.unit_name, ";
        $query .= "color.color_name, ";
        $query .= "brand.brand_name, ";
        $query .= "stationary.sta_amount, ";
        $query .= "transition.amount, ";
        $query .= "transition.is_receive, ";
        $query .= "transition.price, ";
        $query .= "transition.receive_num, ";
        $query .= "transition.tran_date, ";
        $query .= "staff.fname, ";
        $query .= "staff.lname ";
        $query .= "FROM transition ";
        $query .= "inner join stationary on transition.sta_id = stationary.sta_id ";
        $query .= "inner join unit on stationary.unit_id = unit.unit_id ";
        $query .= "inner join color on stationary.color_id = color.color_id ";
        $query .= "inner join brand on stationary.brand_id = brand.brand_id ";
        $query .= "inner join staff on transition.staff_id = staff.staff_id ";
        $query .= "order by transition.tran_date DESC;";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function numToStr($max_sta,$length){
        $len = strlen($max_sta);
        while($len<$length){
            $max_sta = "0".$max_sta;
            $len += 1;
        }
        return $max_sta;
    }

    function receive(){
        //รับค่า maxtran
        $query = "SELECT value FROM varible WHERE var_name = 'max_tran';";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $Arr = $stmt->fetch(PDO::FETCH_ASSOC);
        //ตั้งค่า 
        $tran_id = $Arr['value'] + 1;
        echo "tran_id = ".$tran_id;
        $tran_code = "TR";
        $this->tran_id = $tran_code.$this->numToStr($tran_id,6);
        $this->is_receive = 1; // นำเข้าเป็นจริง
        //เพิ่มรายการลงใน transition เป็นแบบ receive
        $query = "INSERT INTO transition"."(tran_id,sta_id,is_receive,amount,staff_id,receive_num,price)";
        $query .= " VALUES("."'$this->tran_id',"."'$this->sta_id',"."$this->is_receive,"."$this->amount,"."'$this->staff_id',"."'$this->receive_num',"."$this->price".");";
        $stmt = $this->conn->prepare( $query );
        echo "<br>".$query;
        $stmt->execute();
        //อัพเดท balance
        $query = "UPDATE stationary SET balance = balance + $this->amount WHERE sta_id = '$this->sta_id';";
        $stmt = $this->conn->prepare( $query );
        echo "<br>".$query;
        $stmt->execute();
        return $stmt;
    }

    function issue(){
        //รับค่า maxtran
        $query = "SELECT value FROM varible WHERE var_name = 'max_tran';";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $Arr = $stmt->fetch(PDO::FETCH_ASSOC);
        //ตั้งค่า 
        $tran_id = $Arr['value'] + 1;
        echo "tran_id = ".$tran_id;
        $tran_code = "TS";
        $this->tran_id = $tran_code.$this->numToStr($tran_id,6);
        $this->is_receive = 0; // นำเข้าเป็นเท็จ(เบิกออกไป)
        //เพิ่มรายการลงใน transition เป็นแบบ issue 
        $query = "INSERT INTO transition"."(tran_id,sta_id,is_receive,amount,staff_id)";
        $query .= " VALUES("."'$this->tran_id',"."'$this->sta_id',"."$this->is_receive,"."$this->amount,"."'$this->staff_id'".");";
        $stmt = $this->conn->prepare( $query );
        echo "<br>".$query;
        $stmt->execute();
        //เพิ่มรายการลงใน issue table โดยที่ status_type_id = 1 คือ กำลังพิจารณา
        $query = "INSERT INTO issue_status"."(tran_id,status_type_id)";
        $query .= " VALUES("."'$this->tran_id',"."1".");";
        echo $query;
        $stmt = $this->conn->prepare( $query );
        echo "<br>".$query;
        $stmt->execute();

        //ไม่ต้องอัพเดท balance เพราะเมื่อเบิกจะมีสถานะเป็น กำลังพิจารณา ซึ่งยังไม่ตัดจากสต๊อค
        return $stmt;
    }
  
 }
 
 
?>