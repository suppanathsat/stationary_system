<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/type.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Type = new Types($db);
    
    
$stmt = $Type->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $Type_arr=array();
    $Type_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $Type_item=array(
            "id" => $type_id,
            "name" => $type_name,
            "code" => $type_code,
        );
 
        array_push($Type_arr["records"], $Type_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($Type_arr);
}
 
?>
