<?php
    // get database connection
    include_once 'config/database.php';
    print_r($_POST);
    
    $database = new Database();
    $conn =  $database->getConnection();
    $receive_date = $_POST['date'];
    $w_id = $_POST['w_id'];
    $query = "UPDATE withdraw SET receive_date = '$receive_date',approve_id = 1 WHERE w_id = $w_id";
    $stmt = $conn->prepare( $query );
    if($stmt->execute()){
        echo 'update success';
    }

    header( "Location: withdrawRequest.php" );
 
?>
