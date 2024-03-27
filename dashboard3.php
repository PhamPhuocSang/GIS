

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
    $sql="SELECT COALESCE(COUNT(a.qh_ma), 0) as tongcx, b.qh_ten FROM quan_huyen b LEFT JOIN diembanle a ON a.qh_ma = b.qh_ma GROUP BY b.qh_ma, b.qh_ten ORDER BY b.qh_ten ASC";
    
    $result = $conn->query($sql);
    // print_r($result);
    $sluongcx = array();
    $tenqh = array();
    // $categories = array('7 ngày trước', '6 ngày trước', '5 ngày trước', '4 ngày trước', '3 ngày trước', '2 ngày trước', 'Hôm nay');
    while ($row = mysqli_fetch_assoc($result)) {


        array_push($sluongcx, (int) $row['tongcx']);
        array_push($tenqh, $row['qh_ten']);
    }

    
    $result = $conn->query("SELECT b.qh_ma, b.qh_ten, IFNULL(COUNT(a.ct_id), 0) as soluongct
    FROM quan_huyen b
    LEFT JOIN diembanle a ON b.qh_ma = a.qh_ma AND a.ct_id = 1
    LEFT JOIN congty c ON a.ct_id = c.ct_id 
    GROUP BY b.qh_ma
    ORDER BY b.qh_ten ASC;");
    $numRow = $result->num_rows;

    $ct1 = array();
    if ($numRow > 0) {
        while ($row = $result->fetch_assoc()) {
            $detail = array(
                'soluongct' => $row['soluongct'],
                'qhten' => $row['qh_ten'],
                'idqh' => $row['qh_ma'],
            );
            $ct1[] = $detail;
        }
    } else {
        $ct1[] = array('type' => 'Error');
    }
    // print_r($details);
    
    $datact1 = array();
    for ($i = 0; $i < count($ct1); $i++) {
        array_push($datact1,$ct1[$i]['soluongct']);
    }
    // print_r($datact1);

    $result = $conn->query("SELECT b.qh_ma, b.qh_ten, IFNULL(COUNT(a.ct_id), 0) as soluongct
    FROM quan_huyen b
    LEFT JOIN diembanle a ON b.qh_ma = a.qh_ma AND a.ct_id = 2
    LEFT JOIN congty c ON a.ct_id = c.ct_id 
    GROUP BY b.qh_ma
    ORDER BY b.qh_ten ASC;");
    $numRow = $result->num_rows;

    $ct2 = array();
    if ($numRow > 0) {
        while ($row = $result->fetch_assoc()) {
            $detail = array(
                'soluongct' => $row['soluongct'],
                'qhten' => $row['qh_ten'],
                'idqh' => $row['qh_ma'],
            );
            $ct2[] = $detail;
        }
    } else {
        $ct2[] = array('type' => 'Error');
    }
    // print_r($details);
    $datact2 = array();
    for ($i = 0; $i < count($ct2); $i++) {
        array_push($datact2,$ct2[$i]['soluongct']);
    }
    // print_r($datact2);


    $result = $conn->query("SELECT b.qh_ma, b.qh_ten, IFNULL(COUNT(a.ct_id), 0) as soluongct
    FROM quan_huyen b
    LEFT JOIN diembanle a ON b.qh_ma = a.qh_ma AND a.ct_id = 3
    LEFT JOIN congty c ON a.ct_id = c.ct_id 
    GROUP BY b.qh_ma
    ORDER BY b.qh_ten ASC;");
    $numRow = $result->num_rows;

    $ct3 = array();
    if ($numRow > 0) {
        while ($row = $result->fetch_assoc()) {
            $detail = array(
                'soluongct' => $row['soluongct'],
                'qhten' => $row['qh_ten'],
                'idqh' => $row['qh_ma'],
            );
            $ct3[] = $detail;
        }
    } else {
        $ct3[] = array('type' => 'Error');
    }
    // print_r($details);
    
    $datact3 = array();
    for ($i = 0; $i < count($ct3); $i++) {
        array_push($datact3,$ct3[$i]['soluongct']);
    }
    // print_r($datact3);

    $options = array(
        'series' => array(
            array(
                'name' => 'Công ty 1',
                'data' => $datact1
            ),
            array(
                'name' => 'Công ty 2',
                'data' => $datact2
            ),
            array(
                'name' => 'Công ty 3',
                'data' => $datact3
            ),
        ),
        'chart' => array(
            'height' => 350,
            'type' => 'bar',
            'parentHeightOffset' => 0,
            'fontFamily' => 'Poppins, sans-serif',
            'toolbar' => array(
                'show' => false,
            ),
        ),
        'colors' => ['#1b00ff', '#f56767', '#66FF33'],
        'grid' => array(
            'borderColor' => '#c7d2dd',
            'strokeDashArray' => 5,
        ),
        'plotOptions' => array(
            'bar' => array(
                'horizontal' => false,
                'columnWidth' => '25%',
                'endingShape' => 'rounded'
            ),
        ),
        'dataLabels' => array(
            'enabled' => false
        ),
        'stroke' => array(
            'show' => true,
            'width' => 2,
            'colors' => ['transparent']
        ),
        'xaxis' => array(
            'categories' => $tenqh,
            'labels' => array(
                'style' => array(
                    'colors' => ['#353535'],
                ),
            ),
            'axisBorder' => array(
                'color' => '#8fa6bc',
            )
        ),
        'yaxis' => array(
            'title' => array(
                'text' => ''
            ),
            'labels' => array(
                'style' => array(
                    'colors' => '#353535',
                    'fontSize' => '16px',
                ),
            ),
            'axisBorder' => array(
                'color' => '#f00',
            )
        ),
        'legend' => array(
            'horizontalAlign' => 'right',
            'position' => 'top',
            'fontSize' => '16px',
            'offsetY' => 0,
            'labels' => array(
                'colors' => '#353535',
            ),
            'markers' => array(
                'width' => 10,
                'height' => 10,
                'radius' => 15,
            ),
            'itemMargin' => array(
                'vertical' => 0
            ),
        ),
        'fill' => array(
            'opacity' => 1
        ),
        'tooltip' => array(
            'style' => array(
                'fontSize' => '15px',
                'fontFamily' => 'Poppins, sans-serif',
            ),
            'y' => array(
                'formatter' => 'function (val) {
                    return val
                }'
            )
        )
    );

    $json_data = json_encode($options);

    // Thiết lập tiêu đề cho phản hồi HTTP
    header('Content-Type: application/json');

    // Trả về chuỗi JSON
    echo $json_data;
?>