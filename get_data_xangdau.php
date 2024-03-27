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

$sql = "SELECT * FROM loaixangdau";
$result = $conn->query($sql);

// Tạo mảng dữ liệu
$data = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $id = $row['xd_id'];
    $ten = $row['xd_ten'];
    $gia = $row['xd_gia'];

    // Truy vấn danh sách các điểm bán lẻ của công ty
    $sql_diembanle = "SELECT c.ct_icon ,a.dbl_id, a.dbl_ten, a.dbl_diachi,a.dbl_sdt,a.dbl_vido,a.dbl_kinhdo FROM diembanle a, (SELECT a.dbl_id, b.xd_ten  FROM banhang a, loaixangdau b WHERE a.xd_id = b.xd_id AND b.xd_id ='$id') b,congty c WHERE a.dbl_id = b.dbl_id AND a.ct_id = c.ct_id";
    $result_diembanle = $conn->query($sql_diembanle);

    // Tạo mảng chứa thông tin các điểm bán lẻ của công ty
    $diembanle = array();
    if ($result_diembanle->num_rows > 0) {
      while($row_retailer = $result_diembanle->fetch_assoc()) {
        $id_dbl = $row_retailer['dbl_id'];
        $ten_dbl = $row_retailer['dbl_ten'];
        $diachi_dbl = $row_retailer['dbl_diachi'];
        $sdt_dbl = $row_retailer['dbl_sdt'];
        $vido_dbl = $row_retailer['dbl_vido'];
        $kinhdo_dbl = $row_retailer['dbl_kinhdo'];
        $icon_ct = $row_retailer['ct_icon'];
        $diembanle[] = array(
          'id' => $id_dbl,
          'ten' => $ten_dbl,
          'diachi' => $diachi_dbl,
          'sdt' => $sdt_dbl,
          'icon' => $icon_ct,
          'vido' => $vido_dbl,
          'kinhdo' => $kinhdo_dbl
        );
      }
    }
    $data[] = array(
      'id' => $id,
      'ten' => $ten,
      'gia' => $gia,
      'diembanle' => $diembanle
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
