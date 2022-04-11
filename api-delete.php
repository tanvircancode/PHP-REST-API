<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
// header('Access-Control-Allow-headers: Access-Control-Allow-headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



//special format to read json data and convert to an array
$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data['sid'];

include('config.php');

$sql = "delete from students where id = {$student_id}";
 

if(mysqli_query($conn , $sql)){
    echo json_encode(array('message' => 'Deleted Successfully' , 'status' => true));
}else{
    echo json_encode(array('message' => 'Cannot Delete Id' , 'status' => false));
}

?>