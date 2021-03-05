<?php

 class Authen{
    // database connection and table name
    private $conn;
    private $table_name = "authen";
 
    // object properties
    public $auth_id,$auth_name;

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
        $query = "INSERT ".$this->table_name."(auth_name) values('".$this->auth_name."')";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function update(){
        $query = "UPDATE ".$this->table_name;
        $query .= " SET auth_name = '$this->auth_name' ";
        $query .= "WHERE auth_id = $this->auth_id;";
        echo $query;
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function delete(){
        $query = "DELETE FROM ".$this->table_name." WHERE auth_id = $this->auth_id;";
        $stmt = $this->conn->prepare( $query );
        echo $query;
        $stmt->execute();
        return $stmt;
    }

    function countFK($fk,$id){
        $table_name = "staff";
        $query = "SELECT count(*) FROM $table_name Where $fk = $id";
        echo $query;
        $stmt = $this->conn->prepare( $query );
           $stmt->execute();
           $Arr = $stmt->fetch(PDO::FETCH_ASSOC);
           return $Arr["count(*)"];
    }
 }
?>