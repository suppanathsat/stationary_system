<?php
    class IssueStatus{
    // database connection and table name
    private $conn;
    private $table_name = "issue_status";
 
    // object properties
    public $status_id,$tran_id,$status_type_id,$status_date,$staff_id;



    public function __construct($db){
        $this->conn = $db;
    }

    function countFK($fk,$id){
        $table_name = "issue_status";
        $query = "SELECT count(*) FROM $table_name Where $fk = $id";
        echo $query;
        $stmt = $this->conn->prepare( $query );
           $stmt->execute();
           $Arr = $stmt->fetch(PDO::FETCH_ASSOC);
           return $Arr["count(*)"];
       }

    function read(){
        $query = "SELECT";
        $query .= " issue_status.tran_id,";
        $query .= " status_type.status_name,";

        $query .= " transition.amount,";

        $query .= " ";

        $query .= " stationary.sta_name,";
        $query .= " stationary.balance,";
        $query .= " stationary.sta_amount,";
        $query .= " sta_type.type_name,";
        $query .= " brand.brand_name,";
        $query .= " color.color_name,";
        $query .= " unit.unit_name";
        
        $query .= " FROM issue_status";
        $query .= " inner join status_type on issue_status.status_type_id = status_type.status_type_id";
        $query .= " inner join transition on issue_status.tran_id = transition.tran_id";
        $query .= " inner join stationary on transition.sta_id = stationary.sta_id";
        $query .= " inner join sta_type on stationary.type_id = sta_type.type_id";
        $query .= " inner join brand on stationary.brand_id = brand.brand_id";
        $query .= " inner join color on stationary.color_id = color.color_id";
        $query .= " inner join unit on stationary.unit_id = unit.unit_id where status_type.status_name = 'กำลังพิจารณา' order by transition.tran_id desc";
       $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function readOne(){
        $query = "SELECT";
        $query .= " issue_status.tran_id,";
        $query .= " status_type.status_name,";

        $query .= " transition.tran_id,";
        $query .= " transition.amount,";

        $query .= " ";

        $query .= " stationary.sta_name,";
        $query .= " stationary.balance,";
        $query .= " stationary.sta_amount,";
        $query .= " sta_type.type_name,";
        $query .= " brand.brand_name,";
        $query .= " color.color_name,";
        $query .= " unit.unit_name";
        
        $query .= " FROM issue_status";
        $query .= " inner join status_type on issue_status.status_type_id = status_type.status_type_id";
        $query .= " inner join transition on issue_status.tran_id = transition.tran_id";
        $query .= " inner join stationary on transition.sta_id = stationary.sta_id";
        $query .= " inner join sta_type on stationary.type_id = sta_type.type_id";
        $query .= " inner join brand on stationary.brand_id = brand.brand_id";
        $query .= " inner join color on stationary.color_id = color.color_id";
        $query .= " inner join unit on stationary.unit_id = unit.unit_id";
        $query .= " WHERE transition.tran_id LIKE '%".$this->tran_id."%' order by transition.tran_id desc;";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function readByStatus(){
        $query = "SELECT";
        $query .= " issue_status.tran_id,";
        $query .= " status_type.status_name,";

        $query .= " transition.tran_id,";
        $query .= " transition.amount,";

        $query .= " ";

        $query .= " stationary.sta_name,";
        $query .= " stationary.balance,";
        $query .= " stationary.sta_amount,";
        $query .= " sta_type.type_name,";
        $query .= " brand.brand_name,";
        $query .= " color.color_name,";
        $query .= " unit.unit_name";
        
        $query .= " FROM issue_status";
        $query .= " inner join status_type on issue_status.status_type_id = status_type.status_type_id";
        $query .= " inner join transition on issue_status.tran_id = transition.tran_id";
        $query .= " inner join stationary on transition.sta_id = stationary.sta_id";
        $query .= " inner join sta_type on stationary.type_id = sta_type.type_id";
        $query .= " inner join brand on stationary.brand_id = brand.brand_id";
        $query .= " inner join color on stationary.color_id = color.color_id";
        $query .= " inner join unit on stationary.unit_id = unit.unit_id";
        if($this->status_name == 'ทั้งหมด'){
            $query .= " order by transition.tran_id desc;";
        }else{
            $query .= " WHERE status_type.status_name = '$this->status_name' order by transition.tran_id desc;";
        }
        
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function readByStaffID($staff_id){
        $query = "SELECT";
        $query .= " issue_status.tran_id,";
        $query .= " status_type.status_name,";

        $query .= " transition.tran_id,";
        $query .= " transition.amount,";

        $query .= " ";

        $query .= " stationary.sta_name,";
        $query .= " stationary.balance,";
        $query .= " stationary.sta_amount,";
        $query .= " sta_type.type_name,";
        $query .= " brand.brand_name,";
        $query .= " color.color_name,";
        $query .= " unit.unit_name";

        
        
        $query .= " FROM issue_status";
        $query .= " inner join status_type on issue_status.status_type_id = status_type.status_type_id";
        $query .= " inner join transition on issue_status.tran_id = transition.tran_id";
        $query .= " inner join stationary on transition.sta_id = stationary.sta_id";
        $query .= " inner join sta_type on stationary.type_id = sta_type.type_id";
        $query .= " inner join brand on stationary.brand_id = brand.brand_id";
        $query .= " inner join color on stationary.color_id = color.color_id";
        $query .= " inner join unit on stationary.unit_id = unit.unit_id";
        $query .= " WHERE transition.staff_id = '$staff_id' and status_type.status_name != 'รับของแล้ว' order by transition.tran_id desc";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }

    function staffSearchTran(){
        $query = "SELECT";
        $query .= " issue_status.tran_id,";
        $query .= " status_type.status_name,";

        $query .= " transition.tran_id,";
        $query .= " transition.amount,";

        $query .= " ";

        $query .= " stationary.sta_name,";
        $query .= " stationary.balance,";
        $query .= " stationary.sta_amount,";
        $query .= " sta_type.type_name,";
        $query .= " brand.brand_name,";
        $query .= " color.color_name,";
        $query .= " unit.unit_name";
        
        $query .= " FROM issue_status";
        $query .= " inner join status_type on issue_status.status_type_id = status_type.status_type_id";
        $query .= " inner join transition on issue_status.tran_id = transition.tran_id";
        $query .= " inner join stationary on transition.sta_id = stationary.sta_id";
        $query .= " inner join sta_type on stationary.type_id = sta_type.type_id";
        $query .= " inner join brand on stationary.brand_id = brand.brand_id";
        $query .= " inner join color on stationary.color_id = color.color_id";
        $query .= " inner join unit on stationary.unit_id = unit.unit_id";
        $query .= " WHERE transition.staff_id = '$this->staff_id' and status_type.status_name != 'รับของแล้ว' and transition.tran_id LIKE '%".$this->tran_id."%' order by transition.tran_id desc;";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function staffSearchByStatus(){
        $query = "SELECT";
        $query .= " issue_status.tran_id,";
        $query .= " status_type.status_name,";

        $query .= " transition.tran_id,";
        $query .= " transition.amount,";
        $query .= " transition.staff_id,";

        $query .= " stationary.sta_name,";
        $query .= " stationary.balance,";
        $query .= " stationary.sta_amount,";
        $query .= " sta_type.type_name,";
        $query .= " brand.brand_name,";
        $query .= " color.color_name,";
        $query .= " unit.unit_name";
        
        $query .= " FROM issue_status";
        $query .= " inner join status_type on issue_status.status_type_id = status_type.status_type_id";
        $query .= " inner join transition on issue_status.tran_id = transition.tran_id";
        $query .= " inner join stationary on transition.sta_id = stationary.sta_id";
        $query .= " inner join sta_type on stationary.type_id = sta_type.type_id";
        $query .= " inner join brand on stationary.brand_id = brand.brand_id";
        $query .= " inner join color on stationary.color_id = color.color_id";
        $query .= " inner join unit on stationary.unit_id = unit.unit_id";
        if($this->status_name == 'ทั้งหมด'){
            $query .= " WHERE transition.staff_id = $this->staff_id order by transition.tran_id desc;";
        }else{
            $query .= " WHERE transition.staff_id = $this->staff_id and status_type.status_name = '$this->status_name' order by transition.tran_id desc;";
        }
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function update(){
        $query = "UPDATE issue_status ";
        $query .= "SET status_type_id = $this->status_type_id ";
        $query .= "where tran_id = $this->tran_id ";
    }
  

 }
 
?>