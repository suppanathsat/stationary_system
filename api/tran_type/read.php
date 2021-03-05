<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/tran_type.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Obj = new TranType($db);
    
    
$stmt = $Obj->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $Obj_arr=array();
    $Obj_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $Obj_item=array(
            "id" => $tran_type_id,
            "name" => $tran_name,
        );
 
        array_push($Obj_arr["records"], $Obj_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($Obj_arr);
}
 
?>
