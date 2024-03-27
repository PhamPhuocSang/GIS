<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "diali";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ tham số tìm kiếm
$query = $_GET['query'];

// Truy vấn dữ liệu
$sql = "SELECT * FROM locations WHERE name LIKE '%$query%'";
$result = $conn->query($sql);

// Tạo mảng dữ liệu
$data = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $data[] = array(
      'name' => $row['name'],
      'latitude' => $row['latitude'],
      'longitude' => $row['longitude']
    );
  }
}

// Trả về dữ liệu dạng JSON
header('Content-Type: application/json');
echo $_GET['callback'] . '(' . json_encode($data) . ')';

// Đóng kết nối
$conn->close();
?>
