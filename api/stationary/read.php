<?php
   // get database connection
    include '../../config/database.php';
        
    // instantiate product object
    include '../../obj/stationary.php';

    
    $database = new Database();
    $db = $database->getConnection();

    $Stationary = new Stationary($db);
    // query products
    $stmt = $Stationary->read();
    $num = $stmt->rowCount();
    // check if more than 0 record found
    if($num>0){
    
        // products array
        $stationary_arr=array();
        $stationary_arr["records"]=array();
    
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            try {
                
                $stationary_item=array(
                    "sta_id" => $row['sta_id'],
                    "sta_pic" => $row['sta_pic'],
                    "sta_name" => $row['sta_name'],
                    "type_name" => $row['type_name'],
                    "balance" => $row['balance'],
                    "brand" => $row['brand_name'],
                    "color" => $row['color_name'],
                    "sta_amount" => $row['sta_amount'],
                    "unit" => $row['unit_name'],
                    "min" => $row['min'],
                );
        
                array_push($stationary_arr["records"], $stationary_item);
            } catch (\Throwable $th) {
                //throw $th;
            }
           
            
        }
    
        // set response code - 200 OK
        http_response_code(200);
    
        // show products data in json format
        echo json_encode($stationary_arr);
    }
    
    // no products found will be here
?>