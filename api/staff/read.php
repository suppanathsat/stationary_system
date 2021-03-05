<?php
   // get database connection
    include '../../config/database.php';
        
    // instantiate product object
    include '../../obj/staff.php';

    
    $database = new Database();
    $db = $database->getConnection();

    $Staff = new Staff($db);
    // query products
    $stmt = $Staff->read();
    $num = $stmt->rowCount();
    // check if more than 0 record found
    if($num>0){
    
        // products array
        $Staff_arr=array();
        $Staff_arr["records"]=array();
    
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            try {
                
                $Staff_item=array(
                    "staff_id" => $row['staff_id'],
                    "username" => $row['username'],
                    "dept_name" => $row['dept_name'],
                    "fname" => $row['fname'],
                    "lname" => $row['lname'],
                    "auth_name" => $row['auth_name']
                );
        
                array_push($Staff_arr["records"], $Staff_item);
            } catch (\Throwable $th) {
                //throw $th;
            }
           
            
        }
    
        // set response code - 200 OK
        http_response_code(200);
    
        // show products data in json format
        echo json_encode($Staff_arr);
    }
    
    // no products found will be here
?>