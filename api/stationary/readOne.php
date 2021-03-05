<?php
    // get database connection
    include_once '../../config/database.php';
        
    // instantiate product object
    include_once '../../obj/stationary.php';

    $database = new Database();
    $db = $database->getConnection();

    $Stationary = new Stationary($db);

    // query products
    $id = $_GET['id'];
    $stmt = $Stationary->readOne($id);
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
                    "sta_name" => $row['sta_name'],
                    "balance" => $row['balance'],
                    "staff_id" => $row['staff_id'],
                    "fname" => $row['fname'],
                    "lname" => $row['lname'],
                    "sta_pic" => $row['sta_pic'],
                    "min" => $row['min'],
                    "type_name" => $row['type_name'],
                    "type_id" => $row['type_id'],
                    "type_name" => $row['type_name'],
                    "brand_id" => $row['brand_id'],
                    "brand_name" => $row['brand_name'],
                    "color_id" => $row['color_id'],
                    "color_name" => $row['color_name'],
                    "brand_id" => $row['brand_id'],
                    "brand_name" => $row['brand_name'],
                    "unit_id" => $row['unit_id'],
                    "unit_name" => $row['unit_name'],
                    "sta_amount" => $row['sta_amount']
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