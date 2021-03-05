<?php

 class StatusType{
    // database connection and table name
    private $conn;
    private $table_name = "status_type";
 
    // object properties
    public $status_type_id,$status_name;

    public function __construct($db){
        $this->conn = $db;
    }

    //use with dropdown
    function read(){
        $query = "SELECT * FROM ".$this->table_name;
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function create(){
        $query = "INSERT ".$this->table_name."(status_name) values('".$this->status_name."')";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function update(){
        $query = "UPDATE ".$this->table_name;
        $query .= " SET status_name = '$this->status_name' ";
        $query .= "WHERE status_type_id = $this->status_type_id;";
        echo $query;
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function delete(){
        $query = "DELETE FROM ".$this->table_name." WHERE status_type_id = $this->status_type_id;";
        $stmt = $this->conn->prepare( $query );
        echo $query;
        $stmt->execute();
        return $stmt;
    }
  
    
 }
 
 
?>