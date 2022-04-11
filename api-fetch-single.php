<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

//special format to read json data and convert to an array
$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data['sid'];

include('config.php');

$sql = "select * from students where id = {$student_id}";
$result = mysqli_query($conn , $sql) or die("SQL query Faled.");

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array('message' => 'No records Found' , 'status' => false));
}

?>