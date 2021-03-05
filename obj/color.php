<?php

 class Color{
    // database connection and table name
    private $conn;
    private $table_name = "color";
 
    // object properties
    public $color_id,$color_name;

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
        $query = "INSERT ".$this->table_name."(color_name) values('".$this->color_name."')";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
  
    function update(){
        $query = "UPDATE ".$this->table_name;
        $query .= " SET color_name = '$this->color_name' ";
        $query .= "WHERE color_id = $this->color_id;";
        echo $query;
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function delete(){
        $query = "DELETE FROM ".$this->table_name." WHERE color_id = $this->color_id;";
        $stmt = $this->conn->prepare( $query );
        echo $query;
        $stmt->execute();
        return $stmt;
    }
 }
 

?>