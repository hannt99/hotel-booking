-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th4 17, 2023 lúc 07:50 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `khachsan`
--
CREATE DATABASE IF NOT EXISTS `khachsan` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `khachsan`;
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datphong`
--

CREATE TABLE `datphong` (
  `madp` int(11) NOT NULL,
  `tenkh` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `sophong` varchar(3) NOT NULL,
  `tenphong` varchar(20) NOT NULL,
  `dichvu` varchar(20) NOT NULL,
  `ngayden` date NOT NULL,
  `ngaydi` date NOT NULL,
  `sotien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `datphong`
--

INSERT INTO `datphong` (`madp`, `tenkh`, `email`, `sdt`, `sophong`, `tenphong`, `dichvu`, `ngayden`, `ngaydi`, `sotien`) VALUES
(1, 'Long Vũ', '52100821@student.tdtu.edu.vn', '0235689741', '102', 'Phòng cao cấp', 'Đưa đón, Ăn sáng', '2023-04-21', '2023-04-25', 2200000),
(2, 'Duy Nguyễn', 'duynll@gmail.com', '0936897979', '102', 'Phòng cao cấp', 'Ăn sáng', '2023-04-23', '2023-04-27', 2100000),
(3, 'Quỳnh Giang', 'giangquynh@gmail.com', '0774345888', '103', 'Phòng View', 'Đưa đón, Ăn sáng', '2023-04-26', '2023-04-29', 2600000),
(4, 'Long', 'longvu123@gmail.com', '0892289999', '105', 'Phòng VIP', 'Đưa đón, Ăn sáng', '2023-04-22', '2023-04-24', 4200000),
(5, 'Long', 'longvu123@gmail.com', '0892289999', '104', 'Phòng Suite', 'Đưa đón, Ăn sáng', '2023-05-04', '2023-05-07', 4700000),
(6, 'Thu', 'thupham@gmail.com', '0851247059', '101', 'Phòng tiêu chuẩn', '', '2023-04-22', '2023-04-23', 300000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `email` varchar(30) NOT NULL,
  `taikhoan` varchar(20) NOT NULL,
  `matkhau` varchar(20) NOT NULL,
  `tenkh` varchar(20) NOT NULL,
  `sdt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`email`, `taikhoan`, `matkhau`, `tenkh`, `sdt`) VALUES
('longvu123@gmail.com', 'longvu', 'longvu', 'Long', '0892289999'),
('52100821@student.tdtu.edu.vn', 'lv123', 'long123', 'Long Vũ', '0832959397');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `sophong` varchar(3) NOT NULL,
  `tenphong` varchar(20) NOT NULL,
  `gia` int(11) NOT NULL,
  `songuoi` int(11) NOT NULL,
  `chitiet` text NOT NULL,
  `anh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`sophong`, `tenphong`, `gia`, `songuoi`, `chitiet`, `anh`) VALUES
('101', 'Phòng tiêu chuẩn', 300000, 2, 'Phòng thông thường với diện tích trung bình, cơ bản được trang bị đầy đủ tiện nghi như giường ngủ, tủ quần áo, tivi, máy lạnh,...', 'phongtieuchuan.jpg'),
('102', 'Phòng cao cấp', 500000, 2, 'Phòng cao cấp là loại phòng có thiết kế hiện đại, trang thiết bị tiên tiến và nội thất sang trọng. Thường có diện tích lớn hơn, view đẹp hơn, dịch vụ phục vụ phòng cao cấp và các tiện nghi khác,...', 'phongcaocap.jpg'),
('103', 'Phòng View', 800000, 2, 'Phòng view là loại phòng trong khách sạn được bố trí ở vị trí có tầm nhìn đẹp, thường là những phòng ở tầng cao, với cửa sổ hoặc ban công hướng ra một cảnh quan nổi bật như biển, sông, núi, thành phố, vườn hoa, hồ bơi,...', 'phongview.jpg'),
('104', 'Phòng Suite', 1500000, 5, 'Phòng suite là loại phòng rộng rãi và sang trọng trong khách sạn, thường có diện tích lớn, bao gồm một phòng ngủ và một phòng khách riêng biệt. Nội thất của phòng suite được thiết kế đẹp mắt và tiện nghi, trang bị đầy đủ các tiện ích hiện đại,...', 'phongsuite.jpg'),
('105', 'Phòng VIP', 2000000, 2, 'Phòng VIP là loại phòng cao cấp nhất trong khách sạn, được thiết kế độc đáo, sang trọng và có diện tích rộng rãi. Thường được bố trí ở các tầng cao và có view đẹp, tầm nhìn rộng mở...', 'phongVIP.jpg'),
('106', 'Phòng đôi', 500000, 4, 'Phòng đôi là loại phòng trong khách sạn được thiết kế với 2 giường đơn hoặc 2 giường đôi, thích hợp cho nhóm bạn hoặc gia đình có từ 2 đến 4 người. Nội thất của phòng được thiết kế đơn giản nhưng tiện nghi, tạo cảm giác thoải mái cho khách khi nghỉ ngơi. ', 'phong2giuong.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TenTK` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `LoaiTK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`TenTK`, `MatKhau`, `LoaiTK`) VALUES
('admin', '123456', 'Admin'),
('admin1', '123', 'Admin'),
('longvu', 'longvu', 'Admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `datphong`
--
ALTER TABLE `datphong`
  ADD PRIMARY KEY (`madp`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TenTK`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `datphong`
--
ALTER TABLE `datphong`
  MODIFY `madp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
