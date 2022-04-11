<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

//special format to read json data and convert to an array
// $data = json_decode(file_get_contents("php://input"), true);
// $search_value = $data['sname'];

$search_value = isset($_GET['search']) ? $_GET['search'] : die();

include('config.php');

$sql = "select * from students where student_name like '%{$search_value}%' ";
$result = mysqli_query($conn , $sql) or die("SQL query Faled.");

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array('message' => 'No records Found' , 'status' => false));
}

?>