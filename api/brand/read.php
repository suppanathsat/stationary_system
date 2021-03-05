<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/brand.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Brand = new Brand($db);
    
    
$stmt = $Brand->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $Brand_arr=array();
    $Brand_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        $Brand_item=array(
            "id" => $brand_id,
            "name" => $brand_name,
        );
 
        array_push($Brand_arr["records"], $Brand_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($Brand_arr);
}
 
?>
