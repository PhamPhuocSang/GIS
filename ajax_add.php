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

    $parma['dbl_id'] = NULL;
    $parma['dbl_ten'] = $conn->real_escape_string($_POST['ten_dbl']);
    $parma['dbl_diachi'] = $conn->real_escape_string($_POST['diachi']);
    $parma['dbl_sdt'] = $conn->real_escape_string($_POST['sdt']);
    $parma['dbl_vido'] = $conn->real_escape_string($_POST['vido']);
    $parma['dbl_kinhdo'] = $conn->real_escape_string($_POST['kinhdo']);
    $parma['d_id'] = $conn->real_escape_string($_POST['ten_duong']);
    $parma['px_id'] = $conn->real_escape_string($_POST['ten_phuongxa']);
    $parma['qh_ma'] = $conn->real_escape_string($_POST['ten_quanhuyen']);
    $parma['ct_id'] = $conn->real_escape_string($_POST['ten_congty']);
    
    $sql = sprintf('INSERT INTO diembanle (%s) VALUES ("%s")',implode(',',array_keys($parma)),implode('","',array_values($parma)));
    $conn->query($sql);
     if($conn->insert_id){
         $sql = $conn->query(" SELECT * FROM diembanle WHERE dbl_id =(SELECT MAX(dbl_id) FROM diembanle )");
             $numRow = $sql->num_rows;
             if($numRow > 0){
                 $row = $sql->fetch_array();
                 $detail = array(
                 'dbl_id'=>$row['dbl_id'],
                 'dbl_ten'=>$row['dbl_ten'],
                 'dbl_diachi'=>$row['dbl_diachi'],
                 'dbl_vido'=>$row['dbl_vido'],
                 'dbl_kinhdo'=>$row['dbl_kinhdo'],
                 'd_id'=>$row['d_id'],
                 'px_id'=>$row['px_id'],
                 'qh_ma'=>$row['qh_ma'],
                 'ct_id'=>$row['ct_id']);
                 echo json_encode($detail);	
             }else{
                 $detail = array('type'=>'Error');
                 echo json_encode($detail);
             }
         
     }else{
         echo "Lỗi!!";
     }
 

?>