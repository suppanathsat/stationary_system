<?php
   // get database connection
    include '../../config/database.php';
        
    // instantiate product object
    include '../../obj/issue_status.php';
    session_start();

    $status_name = $_GET['status_name'];
    $database = new Database();
    $db = $database->getConnection();

    $Issue = new IssueStatus($db);
    $Issue->status_name = $status_name;
    $Issue->staff_id = $_SESSION['staff_id'];
    $stmt = $Issue->staffSearchByStatus();
    $num = $stmt->rowCount();
    // check if more than 0 record found
    if($num>0){
    
        // products array
        $Issue_arr=array();
        $Issue_arr["records"]=array();
    
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            try {
                $Issue_item=array(
                    "tran_id" => $row['tran_id'],
                    "status_name" => $row['status_name'],
                    "amount" => $row['amount'],
                    "sta_name" => $row['sta_name'],
                    "type_name" => $row['type_name'],
                    "brand_name" => $row['brand_name'],
                    "color_name" => $row['color_name'],
                    "sta_amount" => $row['sta_amount'],
                    "unit_name" => $row['unit_name'],
                    "balance" => $row['balance'],
                );
        
                array_push($Issue_arr["records"], $Issue_item);
            } catch (\Throwable $th) {
                //throw $th;
            }
           
            
        }
    
        // set response code - 200 OK
        http_response_code(200);
    
        // show products data in json format
        echo json_encode($Issue_arr);
    }
    
    // no products found will be here
?>