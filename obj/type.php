<?php

 class Types{
    // database connection and table name
    private $conn;
    private $table_name = "sta_type";
 
    // object properties
    public $type_id,$type_name,$type_code;

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
        $query = "INSERT ".$this->table_name."(type_name,type_code) values('".$this->type_name."','".$this->type_code."')";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function update(){
        $query = "UPDATE ".$this->table_name;
        $query .= " SET type_name = '$this->type_name',";
        $query .= " type_code = '$this->type_code' ";
        $query .= "WHERE type_id = $this->type_id;";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function delete(){
        $query = "DELETE FROM ".$this->table_name." WHERE type_id = $this->type_id;";
        $stmt = $this->conn->prepare( $query );
        echo $query;
        $stmt->execute();
        return $stmt;
    }
  
 }
 
 
?>