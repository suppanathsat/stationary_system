<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/unit.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Unit = new Unit($db);
    
    
$stmt = $Unit->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $Unit_arr=array();
    $Unit_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $Unit_item=array(
            "id" => $unit_id,
            "name" => $unit_name,
        );
 
        array_push($Unit_arr["records"], $Unit_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($Unit_arr);
}
 
?>
