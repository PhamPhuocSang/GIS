-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 22, 2023 lúc 04:53 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cay xang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congty`
--

CREATE TABLE `congty` (
  `ct_id` int(11) NOT NULL,
  `ct_ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `congty`
--

INSERT INTO `congty` (`ct_id`, `ct_ten`) VALUES
(1, 'Công Ty 1'),
(2, 'Công Ty 2'),
(3, 'Công Ty 3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diembanle`
--

CREATE TABLE `diembanle` (
  `dbl_id` int(11) NOT NULL,
  `dbl_ten` varchar(50) NOT NULL,
  `dbl_diachi` varchar(50) NOT NULL,
  `dbl_sdt` varchar(50) NOT NULL,
  `dbl_vido` varchar(50) NOT NULL,
  `dbl_kinhdo` varchar(50) NOT NULL,
  `d_id` int(11) NOT NULL,
  `px_id` int(11) NOT NULL,
  `qh_id` int(11) NOT NULL,
  `ct_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diembanle`
--

INSERT INTO `diembanle` (`dbl_id`, `dbl_ten`, `dbl_diachi`, `dbl_sdt`, `dbl_vido`, `dbl_kinhdo`, `d_id`, `px_id`, `qh_id`, `ct_id`) VALUES
(1, 'Cửa hàng xăng dầu 207', '58, Đường 3/2 , Phường Hung Loi, Quận Ninh Kieu', '0443335678', '105.74852585769321', '10.016461361849075', 1, 1, 1, 1),
(2, 'Đại Lý Xăng Dầu Hoàng Đua', '146, Đường 3/2, Quận Ninh Kiều,Tp Cần Thơ,Hưng Lợi', '1234567899', '105.75333237621312', '10.019842241838461', 2, 2, 2, 2),
(3, 'Cửa Hàng Xăng Dầu Số 10 - Petrolimex Cần Thơ ', '79 Ba Tháng Hai,Hưng Lợi,Ninh Kiều, Cần Thơ', '124567894', '105.7595879900591', '10.017065919647397', 3, 3, 3, 3),
(4, 'Đại Lý Xăng Dầu Lê Uyên', '313 QL1A, Lê Bình, Cái Răng, Cái Răng Cần Thơ', '1233344567', '105.75409837768022', '10.000396454575945', 1, 1, 1, 1),
(5, 'Chinh Giang 8 Petroleum Store', '26/2,Đường Vo Tanh,Quận Cai Rang,Can Tho ', '2325456246', '105.74656272973162', '10.005843056481334', 2, 2, 2, 2),
(6, 'Trạm Xăng Bến Xe Bến xe khách Trung Tâm thành phố ', 'Bến xe khách trung tâm TP,Hưng Thành,Cần Thơ', '1243546787', '105.772140274948', '10.006857357293452', 3, 3, 3, 3),
(7, 'Petrolimex Cửa Hàng 11', '113, Phước Thới, Ô Môn, Cần Thơ, Việt Nam', '3454235667', '105.69803171471426', '10.1106391464633', 1, 1, 1, 1),
(8, 'Trạm xăng Hoàng Yến 11', '3MV6+HC9, Phước Thới, Ô Môn, Cần Thơ, Việt Nam', '9876543256', '105.66040992635965', '10.100360134740873', 2, 2, 2, 2),
(9, 'Cửa Hàng Xăng Dầu Nam Việt Oil', '597 QL91, Phước Thới, Ô Môn, Cần Thơ, Việt Nam', '0923344567', '105.6519126882402', '10.123596929612512', 3, 3, 3, 3),
(10, 'Trạm Cấp Phát Xăng Dầu Cục Hậu Cần', '109, Đường Cách Mạng Tháng 8,Quận Bình Thủy', '0123455443', '105.75782320953499', '10.06772362031498', 1, 1, 1, 1),
(11, 'Petrolimex Bình Thủy', '135 Đ.Cách Mạng Tháng 8,An Thới, Bình Thủy,Cần Thơ', '2345647333', '105.75569272015984', '10.07289630379433', 2, 2, 2, 2),
(12, 'Cửa hàng Xăng Dầu số 3 Petrolimex', '248 Đ. Cách Mạng Tháng 8, Bùi Hữu Nghĩa, Bình Thủy', '2312345678', ' 105.76564908005297', '10.061234030949702', 3, 3, 3, 3),
(13, 'Trạm Xăng Dầu Cam Thủy 7', '7C4C+VVH, QL80, Thạnh Mỹ, Vĩnh Thạnh, Cần Thơ', '1234567890', '105.42256202064505', '10.2640300186986', 1, 1, 1, 1),
(14, 'Cửa Hàng Xăng Dầu Số 39 Dương Trí', 'Vĩnh Trinh, Vĩnh Thạnh, Cần Thơ, Việt Nam', '1234321567', '105.44144477197328', '10.289028345695616', 2, 2, 2, 2),
(15, 'Cửa Hàng Xăng Dầu Số 7-PETROLIMEX CẦN THƠ', 'Ấp Vĩnh Qui,Xã Vĩnh Trinh,huyện Thốt Nốt,Tp.Ct', '1236578954', '105.45620765045082', '10.299162238980813', 3, 3, 3, 3),
(16, 'Cây xăng An Bình', 'XM7W+G4R, Nhơn Nghĩa,Phong Điền, Cần Thơ, Việt Nam', '1545421111', '105.70145076524369', ' 9.991918797389017', 1, 1, 1, 1),
(17, 'Trạm Xăng Phong', 'XPF3+3XW, Nhơn Nghĩa, Phong Điền,Cần Thơ, Việt Nam', '6567890876', '105.70754138496687', '9.981343911940591', 2, 2, 2, 2),
(18, 'Trạm xăng THANH LONG PHÚC', 'WMXG+8H6, Ấp Nhơn Thuận1, Phong Điền,Cần Thơ', '0998767890', '105.67575735891323', '9.956571694930277', 3, 3, 3, 3),
(19, 'Cây xăng CAO ĐÀNG ( cửa hàng số 1)', '3CXJ+XH7, TT. Cờ Đỏ, Cờ Đỏ, Cần Thơ, Việt Nam', '0956434567', '105.43003400696736', '10.13708441649763', 1, 1, 1, 1),
(20, 'Trạm xăng dầu cờ đỏ', 'Thới Xuân, Cờ Đỏ, Cần Thơ, Việt Nam', '0923412343', '105.43552717099013', '10.110046213165836', 2, 2, 2, 2),
(21, 'Cây Xăng Đông Nam', '3CCW+367, Thới Xuân, Cờ Đỏ, Cần Thơ, Việt Nam', '0967765656', '105.445762156915', ' 10.075804343944199', 3, 3, 3, 3),
(22, 'Cửa Hàng Xăng Dầu Cam Thủy - Pv Oil', '7G5V+PQW, QL91, Trung Kiên, Thốt Nốt, Cần Thơ', '0234433422', '105.5486948664572', '10.275348253678864', 1, 1, 1, 1),
(23, 'Đại lý xăng dầu DNTN Mai Trinh', '628 QL91, Trung Kiên, Thốt Nốt, Cần Thơ, Việt Nam', '09456766555', '105.54737734052193', '10.256012725796044', 2, 2, 2, 2),
(24, 'Trạm Xăng Dầu Trung Kiên ( TFC )', '628 QL91, Trung Kiên, Thốt Nốt, Cần Thơ, Việt Nam', '0211223456', '105.54731684953072', '10.2544055611209', 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duong`
--

CREATE TABLE `duong` (
  `d_id` int(11) NOT NULL,
  `d_ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `duong`
--

INSERT INTO `duong` (`d_id`, `d_ten`) VALUES
(1, 'Đường 3/2'),
(2, 'Đường 30/4'),
(3, 'Đường Nguyễn Văn Linh'),
(4, 'Nguyễn Văn Cừ'),
(5, 'Đường Võ Nguyên Giáp'),
(6, 'Đường Quốc Lộ 1A'),
(7, 'Đường Vũ Đình Liệu'),
(8, 'Đường Trần Chiên'),
(9, 'Đường 923'),
(10, 'Quốc Lộ 91B'),
(11, 'Đường Tôn Đức Thắng'),
(12, 'Đường Bùi Hữu Nghĩa'),
(13, 'Đường Đinh Công Chánh'),
(14, 'Nguyễn Thị Tạo'),
(15, 'Nguyễn Văn Xuân'),
(16, 'Đường Phú Đông Thiên Vương'),
(17, 'Đường Cao Tốc Lộ Tẻ'),
(18, 'Đường Bốn Tổng - Một Ngàn'),
(19, 'Đường Quốc Lộ 80'),
(20, 'Đường 926'),
(21, 'Lộ Vòng Cung'),
(22, 'Đường Phan Văn Trị'),
(23, 'Nguyễn Thái Bình'),
(24, 'Đường Nguyễn Văn Nhung'),
(25, 'Đường Lê Đức Thọ'),
(26, 'Đường Tuyến Tránh Thốt Nốt'),
(27, 'Đường 91'),
(28, 'Đường Nguyễn Trọng Quyền'),
(29, 'Đường Thới Thuận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaixangdau`
--

CREATE TABLE `loaixangdau` (
  `xd_id` int(11) NOT NULL,
  `xd_ten` varchar(50) NOT NULL,
  `xd_gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaixangdau`
--

INSERT INTO `loaixangdau` (`xd_id`, `xd_ten`, `xd_gia`) VALUES
(1, 'Xăng E5RON92', 21.02),
(2, ' Xăng RON95-III', 21.807),
(3, 'Dầu DIESEL', 22.151),
(4, 'Dầu Hỏa', 22.166);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuong_xa`
--

CREATE TABLE `phuong_xa` (
  `px_id` int(11) NOT NULL,
  `px_ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phuong_xa`
--

INSERT INTO `phuong_xa` (`px_id`, `px_ten`) VALUES
(1, 'Phường Hưng Lợi'),
(2, 'Phường An Phường'),
(3, 'Phường An Cư'),
(4, 'Phường An Hòa'),
(5, 'Phường An Khánh'),
(6, 'Phường An Nghiệp'),
(7, 'Phường An Phú'),
(8, 'Phường Cái Khế'),
(9, 'Phường Tân An'),
(10, 'Phường Thới Bình'),
(11, 'Phường Xuân Khánh'),
(12, 'Phường Bình Thủy'),
(13, 'Phường Trà An'),
(14, 'Phường Thới An Đông'),
(15, 'Phường Trà Nóc'),
(16, 'Phường Bùi Hữu Nghĩa'),
(17, 'Phường Long Hòa'),
(18, 'Phường An Thới'),
(19, 'Phường Long Tuyền'),
(20, 'Phường Lê Bình'),
(21, 'Phường Ba Láng'),
(22, 'Phường Phú Thứ'),
(23, 'Phường Hưng Thạnh'),
(24, 'Phường Hưng Phú'),
(25, 'Phường Thường Thạnh'),
(26, 'Phường Tân Thạnh'),
(27, 'Phường Châu Văn Liêm'),
(28, 'Phường Phước Thới'),
(29, 'Phường Thới An'),
(30, 'Phường Thới Long'),
(31, 'Phường Thới Hòa'),
(32, 'Phường Long Hưng'),
(33, 'Phường Trường Lạc'),
(34, 'Phường Thốt Nốt'),
(35, 'Phường Tân Lộc'),
(36, 'Phường Tân Hưng'),
(37, 'Phường Thới Thuận'),
(38, 'Phường Thuận Hưng '),
(39, 'Phường Thuận An'),
(40, 'Phường Thạnh Hòa'),
(41, 'Phường Trung Nhất'),
(42, 'Phường Trung Kiên'),
(43, 'Xã Trung An'),
(44, 'Xã Trung Hưng'),
(45, 'Xã Trung Thạnh'),
(46, 'Xã Đông Thắng'),
(47, 'Xã Đông Nghiệp'),
(48, 'Xã Thạnh Phú'),
(49, 'Xã Thới Đông'),
(50, 'Xã Thới Xuân'),
(51, 'Xã Định Môn'),
(52, 'Xã Đông Thuận'),
(53, 'Xã Đông Bình'),
(54, 'Xã Thới Tân'),
(55, 'Thị Trấn Phong Điền'),
(56, 'Xã Nhơn Ái'),
(57, 'Xã Nhơn Nghĩa'),
(58, 'Xã Mỹ Khánh'),
(59, 'Thị Trấn Vĩnh Thạnh'),
(60, 'Xã Thạnh Lộc'),
(61, 'Xã Thạnh An'),
(62, 'Xã Thạnh Lợi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_huyen`
--

CREATE TABLE `quan_huyen` (
  `qh_ma` int(11) NOT NULL,
  `qh_ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quan_huyen`
--

INSERT INTO `quan_huyen` (`qh_ma`, `qh_ten`) VALUES
(1, 'Quận Ninh Kiều'),
(2, 'Quận Cái Răng'),
(3, 'Quận Bình Thủy'),
(4, 'Quận Ô Môn'),
(5, 'Huyện Vĩnh Thạnh'),
(6, 'Huyện Phong Điền'),
(7, 'Huyện Thốt Nốt'),
(8, 'Huyện Cờ Đỏ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `congty`
--
ALTER TABLE `congty`
  ADD PRIMARY KEY (`ct_id`);

--
-- Chỉ mục cho bảng `diembanle`
--
ALTER TABLE `diembanle`
  ADD PRIMARY KEY (`dbl_id`);

--
-- Chỉ mục cho bảng `duong`
--
ALTER TABLE `duong`
  ADD PRIMARY KEY (`d_id`);

--
-- Chỉ mục cho bảng `loaixangdau`
--
ALTER TABLE `loaixangdau`
  ADD PRIMARY KEY (`xd_id`);

--
-- Chỉ mục cho bảng `phuong_xa`
--
ALTER TABLE `phuong_xa`
  ADD PRIMARY KEY (`px_id`);

--
-- Chỉ mục cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD PRIMARY KEY (`qh_ma`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `congty`
--
ALTER TABLE `congty`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `diembanle`
--
ALTER TABLE `diembanle`
  MODIFY `dbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `duong`
--
ALTER TABLE `duong`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `loaixangdau`
--
ALTER TABLE `loaixangdau`
  MODIFY `xd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phuong_xa`
--
ALTER TABLE `phuong_xa`
  MODIFY `px_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  MODIFY `qh_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
