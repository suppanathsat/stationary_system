<?php

 class Unit{
    // database connection and table name
    private $conn;
    private $table_name = "unit";
 
    // object properties
    public $unit_id,$unit_name;

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
        $query = "INSERT ".$this->table_name."(unit_name) values('".$this->unit_name."')";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function update(){
        $query = "UPDATE ".$this->table_name;
        $query .= " SET unit_name = '$this->unit_name' ";
        $query .= "WHERE unit_id = $this->unit_id;";
        echo $query;
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function delete(){
        $query = "DELETE FROM ".$this->table_name." WHERE unit_id = $this->unit_id;";
        $stmt = $this->conn->prepare( $query );
        echo $query;
        $stmt->execute();
        return $stmt;
    }
  
 }
 

?>