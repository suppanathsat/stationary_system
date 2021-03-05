<?php
    // get database connection
    include_once 'config/database.php';
    print_r($_GET);
    
    $database = new Database();
    $conn =  $database->getConnection();
    $w_id = $_GET['w_id'];
    $query = "UPDATE withdraw SET approve_id = 3 WHERE w_id = $w_id";
    $stmt = $conn->prepare( $query );
    if($stmt->execute()){
        echo 'update success';
    }

    header( "Location: withdrawRequest.php" );
 
?>
