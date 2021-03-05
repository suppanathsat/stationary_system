<?php
 session_start();
 class Staff{
    // database connection and table name
    private $conn;
    private $table_name = "staff";
 
    // object properties
    public $staff_id,$dept_id,$username,$password,$fname,$lname,$auth;



    public function __construct($db){
        $this->conn = $db;
    }

    

    

    // ------CRUD---------
    // used by select drop-down list
    function create(){
        $query = "INSERT INTO ".$this->table_name."(dept_id,username,password,fname,lname,auth_id)";
        $query .= " VALUES("."'$this->dept_id',"."'$this->username',"."'$this->password',"."'$this->fname',"."'$this->lname',"."'$this->auth_id');";
        echo $query;
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function read(){
        $query = "SELECT department.dept_name,staff.staff_id,staff.username,staff.fname,staff.lname,authen.auth_name FROM ".$this->table_name;
        $query .= " INNER JOIN department on department.dept_id = staff.dept_id";
        $query .= " INNER JOIN authen on authen.auth_id = staff.auth_id";
        $query .= " ORDER BY staff.staff_id";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function readOne($id){
        $query = "SELECT department.dept_id,department.dept_name,staff.staff_id,staff.username,staff.password,staff.fname,staff.lname,authen.auth_name,authen.auth_id FROM ".$this->table_name;
        $query .= " INNER JOIN department on department.dept_id = staff.dept_id";
        $query .= " INNER JOIN authen on authen.auth_id = staff.auth_id";
        $query .= " WHERE staff.staff_id = $id";
        $query .= " ORDER BY staff.staff_id";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function search($dept_id,$search,$searchBy){
        if($dept_id==0){$dept_id="staff.dept_id";}
        $query = "SELECT department.dept_id,department.dept_name,staff.staff_id,staff.username,staff.password,staff.fname,staff.lname,authen.auth_name,authen.auth_id FROM ".$this->table_name;
        $query .= " INNER JOIN department on department.dept_id = staff.dept_id";
        $query .= " INNER JOIN authen on authen.auth_id = staff.auth_id";
        $query .= " WHERE staff.dept_id = $dept_id and staff.$searchBy LIKE '%$search%'";
        $query .= " ORDER BY staff.staff_id";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function update(){
        $query = "UPDATE staff SET ";
        $query .= "dept_id = $this->dept_id, ";
        $query .= "fname = '$this->fname', ";
        $query .= "lname = '$this->lname', ";
        $query .= "auth_id = $this->auth_id, ";
        $query .= "username = '$this->username', ";
        $query .= "password = '$this->password' ";
        $query .= "WHERE staff_id = $this->staff_id;";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
 
    function delete(){
        $query = "DELETE from staff where staff_id = $this->staff_id";
        echo $query;
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function checkLogin(){
        $query = "SELECT count(*) FROM ".$this->table_name." WHERE username = "."'$this->username'"." and password = "."'$this->password'".";";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $rownum = $stmt->fetchColumn(); 
        if($rownum==1){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
        
    }

    

    function getStaffID(){
        $query = "SELECT staff_id FROM ".$this->table_name." WHERE username = "."'$this->username'"." and password = "."'$this->password'".";";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $staff_id = $stmt->fetchColumn();
        return $staff_id;
    }

    function getAuth(){
        $query = "SELECT auth_id FROM ".$this->table_name." WHERE username = "."'$this->username'"." and password = "."'$this->password'".";";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $auth_id = $stmt->fetchColumn();
        return $auth_id;
    }

    function getFullname(){
        $query = "SELECT fname,lname FROM ".$this->table_name." WHERE username = "."'$this->username'"." and password = "."'$this->password'".";";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $fullname = $row->fname." ".$row->lname;
        return $fullname;
    }

    function getDept(){
        $query = "SELECT dept_id FROM ".$this->table_name." WHERE username = '$this->username' and password = '$this->password'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row->dept_id;
    }

  

 }
 
?>