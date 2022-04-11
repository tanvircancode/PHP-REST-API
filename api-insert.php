<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-headers: Access-Control-Allow-headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


//special format to read json data and convert to an array
$data = json_decode(file_get_contents("php://input"), true);
$student_name = $data['sname'];
$student_age = $data['sage'];
$student_city = $data['scity'];


include('config.php');

$sql = "insert into students(student_name, age, city) values('$student_name',$student_age,'$student_city')";

if(mysqli_query($conn , $sql)){
    echo json_encode(array('message' => 'Student record Inserted' , 'status' => true));
}else{
    echo json_encode(array('message' => 'Student record not Inserted' , 'status' => false));
}

?>