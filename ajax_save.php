<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "diali";

$conn = new MySQLi($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// $length = count($_POST['ten']);
$ten = $_POST['ten'];
$ten_array = explode(',', $ten);
$length = count($ten_array);
// print_r($length);
foreach ($ten_array as $key => $value) {
    $parma['bh_id'] = NULL;
    $parma['dbl_id'] = $conn->real_escape_string($_POST['id']);
    $parma['xd_id'] = $conn->real_escape_string($value);
    $parma['bh_soluong'] = $conn->real_escape_string($_POST['soluong']);
    $sql = sprintf('INSERT INTO banhang (%s) VALUES ("%s")',implode(',',array_keys($parma)),implode('","',array_values($parma)));
    // print_r($sql);
    $conn->query($sql);
    
}

?>