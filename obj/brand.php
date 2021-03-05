<?php

 class Brand{
    // database connection and table name
    private $conn;
    private $table_name = "brand";
 
    // object properties
    public $brand_id,$brand_name;

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
        $query = "INSERT ".$this->table_name."(brand_name) values('".$this->brand_name."')";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function update(){
        $query = "UPDATE ".$this->table_name;
        $query .= " SET brand_name = '$this->brand_name' ";
        $query .= "WHERE brand_id = $this->brand_id;";
        echo $query;
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function delete(){
        $query = "DELETE FROM ".$this->table_name." WHERE brand_id = $this->brand_id;";
        $stmt = $this->conn->prepare( $query );
        echo $query;
        $stmt->execute();
        return $stmt;
    }
  
 }
 

?>