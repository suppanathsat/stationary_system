<?php

 class TranType{
    // database connection and table name
    private $conn;
    private $table_name = "tran_type";
 
    // object properties
    public $tran_type_id,$tran_name;

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
        $query = "INSERT ".$this->table_name."(tran_name) values('".$this->tran_name."')";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
  
 }
 
 
?>