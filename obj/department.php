<?php

 class Department{
    // database connection and table name
    private $conn;
    private $table_name = "department";
    
    // object properties
    public $dept_id,$dept_name;

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
        $query = "INSERT ".$this->table_name."(dept_name) values('".$this->dept_name."')";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function update(){
        $query = "UPDATE ".$this->table_name;
        $query .= " SET dept_name = '$this->dept_name',";
        $query .= "WHERE dept_id = $this->dept_id;";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function delete(){
        $query = "DELETE FROM ".$this->table_name." WHERE dept_id = $this->dept_id;";
        $stmt = $this->conn->prepare( $query );
        echo $query;
        $stmt->execute();
        return $stmt;
    }

   

 }
?>