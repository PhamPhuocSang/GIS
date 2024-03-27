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

// Truy vấn dữ liệu
$sql = "SELECT * FROM loaixangdau";
$result = $conn->query($sql);

// Tạo mảng dữ liệu
$data = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $data[] = array(
      'id' => $row['xd_id'],
      'ten' => $row['xd_ten']
    );
  }
}

$json_data = json_encode($data);

// Thiết lập tiêu đề cho phản hồi HTTP
header('Content-Type: application/json');

// Trả về chuỗi JSON
echo $json_data;

// Đóng kết nối
$conn->close();
?>
