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

$sql = "SELECT * FROM congty";
$result = $conn->query($sql);

// Tạo mảng dữ liệu
$data = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $id = $row['ct_id'];
    $ten = $row['ct_ten'];
   // $icon = $row['ct_icon'];

    // Truy vấn danh sách các điểm bán lẻ của công ty
    $sql_diembanle = "SELECT a.dbl_id, a.dbl_ten, a.dbl_diachi,a.dbl_sdt,a.dbl_vido,a.dbl_kinhdo,concat(c.d_ten,' ', d.px_ten,' ',e.qh_ten) as thongtin FROM diembanle a, congty b, duong c, phuong_xa d, quan_huyen e WHERE a.d_id =c.d_id and a.px_id = d.px_id and a.ct_id= b.ct_id and a.qh_ma= e.qh_ma AND b.ct_id= '$id'";
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
        $thongtin_dbl = $row_retailer['thongtin'];

        // Truy vấn danh sách các điểm bán lẻ của công ty
        $sql_xangdau = "SELECT c.xd_id,c.xd_ten FROM diembanle a, banhang b , loaixangdau c WHERE a.dbl_id= b.dbl_id AND b.xd_id = c.xd_id AND a.dbl_id = '$id_dbl'";
        $result_xangdau = $conn->query($sql_xangdau);

        $loaixangdau_dbl = array();
        if($result_xangdau->num_rows > 0 ){
          while($row_xangdau = $result_xangdau->fetch_assoc()){
            $id_xangdau = $row_xangdau['xd_id'];
            $ten_xangdau = $row_xangdau['xd_ten'];
            $loaixangdau_dbl[]= array(
              'id' => $id_xangdau,
              'ten' => $ten_xangdau
            );
          }
        }
        $diembanle[] = array(
          'id' => $id_dbl,
          'ten' => $ten_dbl,
          'diachi' => $diachi_dbl,
          'sdt' => $sdt_dbl,
          'thongtin' => $thongtin_dbl,
          'vido' => $vido_dbl,
          'kinhdo' => $kinhdo_dbl,
          'loaixangdau' => $loaixangdau_dbl
        );
      }
    }
    $data[] = array(
      'id' => $id,
      'ten' => $ten,
      'icon' => $icon,
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
