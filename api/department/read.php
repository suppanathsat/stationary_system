<?php
    // get database connection
    include_once '../../config/database.php';
    
    // instantiate product object
    include_once '../../obj/department.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Department = new Department($db);
    
    
$stmt = $Department->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $Department_arr=array();
    $Department_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $Department_item=array(
            "id" => $dept_id,
            "name" => $dept_name,
        );
 
        array_push($Department_arr["records"], $Department_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($Department_arr);
}
 
?>
