<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-headers: Access-Control-Allow-headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


//special format to read json data and convert to an array
$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data['sid'];
$student_name = $data['sname'];
$student_age = $data['sage'];
$student_city = $data['scity'];



include('config.php');

$sql = "update students set student_name = '{$student_name}', age = {$student_age} , city = '{$student_city}' where id={$student_id}";

if(mysqli_query($conn , $sql)){
    echo json_encode(array('message' => 'Student record Updated' , 'status' => true));
}else{
    echo json_encode(array('message' => 'Student record not Updated' , 'status' => false));
}

?>