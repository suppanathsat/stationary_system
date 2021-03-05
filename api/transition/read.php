<?php
   // get database connection
    include '../../config/database.php';
        
    // instantiate product object
    include '../../obj/transition.php';

    
    $database = new Database();
    $db = $database->getConnection();

    $Transition = new Transition($db);
    // query products
    $stmt = $Transition->read();
    $num = $stmt->rowCount();
    // check if more than 0 record found
    if($num>0){
    
        // products array
        $Transition_arr=array();
        $Transition_arr["records"]=array();
    
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            try {
                
                $Transition_item=array(
                    "tran_id" => $row['tran_id'],
                    "tran_date" => $row['tran_date'],
                    "sta_name" => $row['sta_name'],
                    "unit_name" => $row['unit_name'],
                    "color_name" => $row['color_name'],
                    "sta_amount" => $row['sta_amount'],
                    "brand_name" => $row['brand_name'],
                    "amount" => $row['amount'],
                    "is_receive" => $row['is_receive'],
                    "price" => $row['price'],
                    "receive_num" => $row['receive_num'],
                    "fname" => $row['fname'],
                    "lname" => $row['lname'],
                );
        
                array_push($Transition_arr["records"], $Transition_item);
            } catch (\Throwable $th) {
                //throw $th;
            }
           
            
        }
    
        // set response code - 200 OK
        http_response_code(200);
    
        // show products data in json format
        echo json_encode($Transition_arr);
    }
    
    // no products found will be here
?>