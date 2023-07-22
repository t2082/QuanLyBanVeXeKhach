-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 06:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbanvexe`
--

-- --------------------------------------------------------

--
-- Table structure for table `benxe`
--

CREATE TABLE `benxe` (
  `MABX` varchar(5) NOT NULL,
  `MAQUANHUYEN` varchar(5) NOT NULL,
  `TENBEN` varchar(20) DEFAULT NULL,
  `DIACHI` varchar(30) DEFAULT NULL,
  `SDT_BX` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benxe`
--

INSERT INTO `benxe` (`MABX`, `MAQUANHUYEN`, `TENBEN`, `DIACHI`, `SDT_BX`) VALUES
('BAG1', 'TB', 'Bến AG', '123abc, Tịnh Biên, An Giang', 90807011),
('BAG2', 'TB', 'Bến AG2', '23d, Tịnh Biên , An Giang', 987573812),
('BAT1', '65AT', 'Bến An Thới 1', ' An Thới 1', 938210),
('BAT2', '65AT', 'Bến An Thới 2', 'An Thới 2', 1984302),
('BBT1', '65BT', 'Bến Bình Thủy 1', 'Bình Thủy 1', 938210),
('BBT2', '65BT', 'Bến Bình Thủy 2', 'Bình Thủy 2', 1984302),
('BCM1', 'NC', 'Bến Năm Căn 1', '12A, Năm Căn, Cà Mau', 90823113),
('BCN1', '04CN', 'Bến Cái Nước 1', 'Bến Cái Nước 1', 938210),
('BCN2', '04CN', 'Bến Cái Nước 2', 'Bến Cái Nước 2', 1984302),
('BCT1', 'CR', 'Bến Cái Răng 1', '12A, Ninh Kiều, Cần Thơ', 90807123),
('BCT2', 'CR', 'Bến Cái Răng 2', '2E, Ninh Kiều, Cần Thơ', 987546372),
('BHG1', 'CTA', 'Bến HG', '12a, Châu Thành A, Hậu Giang', 98768221),
('BKG1', 'RG', 'Bến KG', '3abc, Gạch Giá, Kiên Giang', 987639234),
('BKG3', 'RG', 'Bến KG', '12A, Rạch Giá', 968362942),
('BNC2', 'NC', 'Bến Năm Căn 2', 'Bến Năm Căn 2', 938210),
('BNK1', 'NK', 'Bến Ninh Kiều 1', '123abc, Cần Thơ', 978537283),
('BNK2', 'NK', 'Bến Ninh Kiều 2', 'Ninh Kiều 2', 938210),
('BOM1', '65OM', 'Bến Ô Môn 1', 'Ô Môn 1', 938210),
('BOM2', '65OM', 'Bến Ô Môn 2', 'Ô Môn 2', 1984302),
('BPT1', '04PT', 'Bến Phú Tân 1', 'Phú Tân 1', 938210),
('BPT2', '04PT', 'Bến Phú Tân 2', 'Phú Tân 2', 1984302),
('BSC1', 'NM', 'Bến ST', '45n, Ngã Năm, Sóc Trăng', 987387264),
('BSG1', 'Q1', 'Bến SG', '12a, Quận 1, TPHCM', 987463268),
('BSG2', 'Q1', 'Bến SG2', '23h, Quanja1, TPHCM', 978564227),
('BST3', 'NM', 'Bến ST', '12A, Ngã Năm, ST', 8735280213),
('BTB1', '04TB', 'Bến Thới Bình 1', 'Thới Bình 1', 938210),
('BTB2', '04TB', 'Bến Thới Bình 2', 'Thới Bình 2', 1984302);

-- --------------------------------------------------------

--
-- Table structure for table `chuyenxe`
--

CREATE TABLE `chuyenxe` (
  `ID_CHUYENXE` varchar(5) NOT NULL,
  `BIENSO` varchar(10) NOT NULL,
  `ID_TUYEN` varchar(5) NOT NULL,
  `TENCHUYENXE` varchar(20) DEFAULT NULL,
  `THOIDIEMDITT` datetime DEFAULT NULL,
  `THOIDIEMDENTT` datetime DEFAULT NULL,
  `TGDUKIENDEN` datetime DEFAULT NULL,
  `TGDUKIENKHOIHANH` datetime DEFAULT NULL,
  `GIA` decimal(9,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `EMAIL` varchar(40) NOT NULL,
  `SDT` varchar(15) DEFAULT NULL,
  `HOTEN` varchar(20) DEFAULT NULL,
  `CCCD` varchar(15) DEFAULT NULL,
  `GIOITINH` varchar(5) DEFAULT NULL,
  `NAMSINH` date DEFAULT NULL,
  `DIACHI` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(40) DEFAULT '202cb962ac59075b964b07152d234b70',
  `MAQUYEN` int(11) DEFAULT 3,
  `SoTaiKhoan` varchar(20) DEFAULT NULL,
  `MaNganHang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`EMAIL`, `SDT`, `HOTEN`, `CCCD`, `GIOITINH`, `NAMSINH`, `DIACHI`, `PASSWORD`, `MAQUYEN`, `SoTaiKhoan`, `MaNganHang`) VALUES
('aib2011957@student.ctu.edu.vn', '0932019827', 'Huỳnh Thị Mỹ Ái', '', 'nu', '2001-03-18', '123abc, Cần Thơ', '202cb962ac59075b964b07152d234b70', 1, '1234', 'VCB'),
('B23@gmail.com', '0932019822', 'Trần Ngọc Duy', '99999999999', 'Nam', '1990-02-26', '123b, Cần Thơ', 'NV123', 3, '', 'VCB'),
('Ban2312@gmail.com', '928239299', 'Nguyễn Trần Minh Quâ', '097733274724', 'Nam', '1990-02-26', '123 Hậu Giang', 'NV123', 3, '', 'VCB'),
('duybii922002@gmail.com', '986788756', 'Trần Ngọc Duy', '990897', 'Nam', '2002-04-06', 'Bến Năm Căn 2', '202cb962ac59075b964b07152d234b70', 3, '', 'VCB'),
('huynham2015@gmail.com', '090809889', 'Lương Lưu Minh Tân', '09283631123', 'Nam', '2000-02-26', '123a, Ninh Kiều Cần Thơ', '202cb962ac59075b964b07152d234b70', 2, '', 'VCB'),
('qip33377@cuoly.com', '0932019827', 'Lê Văn Tâm', '0933010000', 'Nam', '2001-03-09', '123a, Hậu Giang', '202cb962ac59075b964b07152d234b70', 3, '', 'VCB'),
('test1111@cuoly.com', '976547982', 'Nguyễn Văn A', '97654798', 'Nam', '2002-04-28', '123a, NK,Cân thơ', '202cb962ac59075b964b07152d234b70', 3, '', 'VCB'),
('tyhanh22@gmail.com', 'Chưa cập n', 'Chưa cập nhật', 'Chưa cập nhật', 'Chưa ', '1990-02-26', 'Chưa cập nhật', 'NV123', 2, '', 'VCB');

-- --------------------------------------------------------

--
-- Table structure for table `loaixe`
--

CREATE TABLE `loaixe` (
  `ID_LOAI` varchar(5) NOT NULL,
  `TENLOAI` varchar(20) DEFAULT NULL,
  `SOGHE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaixe`
--

INSERT INTO `loaixe` (`ID_LOAI`, `TENLOAI`, `SOGHE`) VALUES
('LX01', 'Ghế ngồi', 30),
('LX02', 'Giường nằm', 10);

-- --------------------------------------------------------

--
-- Table structure for table `nganhang`
--

CREATE TABLE `nganhang` (
  `MaNganHang` varchar(20) NOT NULL,
  `TenNganHang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nganhang`
--

INSERT INTO `nganhang` (`MaNganHang`, `TenNganHang`) VALUES
('AGB', 'Agribank'),
('HDB', 'HDbank'),
('TCB', 'Techcombank'),
('TPB', 'TBbank'),
('VCB', 'Vietcombank');

-- --------------------------------------------------------

--
-- Table structure for table `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MAQUYEN` int(11) NOT NULL,
  `TENQUYEN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phanquyen`
--

INSERT INTO `phanquyen` (`MAQUYEN`, `TENQUYEN`) VALUES
(1, 'ADMIN'),
(2, 'NHÂN VIÊN'),
(3, 'KHÁCH HÀNG');

-- --------------------------------------------------------

--
-- Table structure for table `phieudatve`
--

CREATE TABLE `phieudatve` (
  `MAPHIEU` varchar(5) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `NGAYLAP` date DEFAULT NULL,
  `TongTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieudatve`
--

INSERT INTO `phieudatve` (`MAPHIEU`, `EMAIL`, `NGAYLAP`, `TongTien`) VALUES
('P10', 'qip33377@cuoly.com', '2023-03-13', 0),
('P12', 'huynham2015@gmail.com', '2023-03-06', 0),
('P14', 'huynham2015@gmail.com', '2023-03-13', 0),
('P237', 'duybii922002@gmail.com', '2023-04-13', 350),
('P29', 'qip33377@cuoly.com', '2023-04-05', 678),
('P3', 'huynham2015@gmail.com', '2023-03-05', 0),
('P383', 'duybii922002@gmail.com', '2023-04-14', 350),
('P39', 'test1111@cuoly.com', '2023-04-13', 550),
('P5', 'Ban2312@gmail.com', '2023-02-15', 0),
('P6', 'Ban2312@gmail.com', '2023-02-01', 0),
('P649', 'duybii922002@gmail.com', '2023-04-13', 350),
('P9', 'tyhanh22@gmail.com', '2023-02-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `MAQUANHUYEN` varchar(5) NOT NULL,
  `MATINH` varchar(5) NOT NULL,
  `TENQUANHUYEN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quanhuyen`
--

INSERT INTO `quanhuyen` (`MAQUANHUYEN`, `MATINH`, `TENQUANHUYEN`) VALUES
('04CN', 'CM04', 'Cái Nước'),
('04PT', 'CM04', 'Phú Tân'),
('04TB', 'CM04', ' Thới Bình'),
('65AT', 'CT65', 'An Thới'),
('65BT', 'CT65', 'Bình Thủy'),
('65OM', 'CT65', 'Ô Môn'),
('CR', 'CT65', 'Cái Răng'),
('CTA', 'HG95', 'Châu Thành A'),
('NC', 'CM04', 'Năm Căn'),
('NK', 'CT65', 'Ninh Kiều'),
('NM', 'ST03', 'Ngã Năm'),
('Q1', 'SG59', 'Quận 1'),
('RG', 'KG02', 'Rạch Giá'),
('TB', 'AG01', 'Tịnh Biên');

-- --------------------------------------------------------

--
-- Table structure for table `tinhthanh`
--

CREATE TABLE `tinhthanh` (
  `MATINH` varchar(5) NOT NULL,
  `TENTINH` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tinhthanh`
--

INSERT INTO `tinhthanh` (`MATINH`, `TENTINH`) VALUES
('AG01', 'An Giang'),
('CM04', 'Cà Mau'),
('CT65', 'Cần Thơ'),
('HG95', 'Hậu Giang'),
('KG02', 'Kiên Giang'),
('SG59', 'Hồ Chí Minh'),
('ST03', 'Sóc Trăng');

-- --------------------------------------------------------

--
-- Table structure for table `tuyenxe`
--

CREATE TABLE `tuyenxe` (
  `ID_TUYEN` varchar(5) NOT NULL,
  `MABX` varchar(5) NOT NULL,
  `BEN_MABX` varchar(5) NOT NULL,
  `TENTUYEN` varchar(20) DEFAULT NULL,
  `SONGAYTRONGTUANCHAY` int(11) DEFAULT NULL,
  `SOCHUYENTRONGNGAY` int(11) DEFAULT NULL,
  `TGDICHUYENTB` float DEFAULT NULL,
  `GIAHIENHANH` decimal(8,0) DEFAULT NULL,
  `QUANGDUONG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vexe`
--

CREATE TABLE `vexe` (
  `ID_VE` varchar(5) NOT NULL,
  `ID_CHUYENXE` varchar(5) NOT NULL,
  `MAPHIEU` varchar(5) NOT NULL,
  `ID_VITRI` varchar(5) NOT NULL,
  `TENVE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vitrighe`
--

CREATE TABLE `vitrighe` (
  `ID_VITRI` varchar(5) NOT NULL,
  `BIENSO` varchar(10) NOT NULL,
  `TENVITRI` varchar(20) DEFAULT NULL,
  `TRANGTHAI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vitrighe`
--

INSERT INTO `vitrighe` (`ID_VITRI`, `BIENSO`, `TENVITRI`, `TRANGTHAI`) VALUES
('X10G1', '65D1-50360', 'H10', 0),
('X10G6', '65D1-50360', 'H06', 0),
('X10G7', '65D1-50360', 'H07', 0),
('X10G8', '65D1-50360', 'H08', 0),
('X10G9', '65D1-50360', 'H09', 0),
('X1G1', '65D1-50351', 'H01', 0),
('X1G10', '65D1-50351', 'H10', 0),
('X1G11', '65D1-50351', 'H11', 0),
('X1G12', '65D1-50351', 'H12', 0),
('X1G13', '65D1-50351', 'H13', 0),
('X1G14', '65D1-50351', 'H14', 0),
('X1G15', '65D1-50351', 'H15', 0),
('X1G16', '65D1-50351', 'H16', 0),
('X1G17', '65D1-50351', 'H17', 0),
('X1G18', '65D1-50351', 'H18', 0),
('X1G19', '65D1-50351', 'H19', 0),
('X1G2', '65D1-50351', 'H02', 0),
('X1G20', '65D1-50351', 'H20', 0),
('X1G21', '65D1-50351', 'H21', 0),
('X1G22', '65D1-50351', 'H22', 0),
('X1G23', '65D1-50351', 'H23', 0),
('X1G24', '65D1-50351', 'H24', 0),
('X1G25', '65D1-50351', 'H25', 0),
('X1G26', '65D1-50351', 'H26', 0),
('X1G27', '65D1-50351', 'H27', 0),
('X1G28', '65D1-50351', 'H28', 0),
('X1G29', '65D1-50351', 'H29', 0),
('X1G3', '65D1-50351', 'H03', 0),
('X1G30', '65D1-50351', 'H30', 0),
('X1G4', '65D1-50351', 'H04', 0),
('X1G5', '65D1-50351', 'H05', 0),
('X1G6', '65D1-50351', 'H06', 0),
('X1G7', '65D1-50351', 'H07', 0),
('X1G8', '65D1-50351', 'H08', 0),
('X1G9', '65D1-50351', 'H09', 0),
('X2G1', '65D1-50352', 'H01', 0),
('X2G10', '65D1-50352', 'H10', 0),
('X2G2', '65D1-50352', 'H02', 0),
('X2G3', '65D1-50352', 'H03', 0),
('X2G4', '65D1-50352', 'H04', 0),
('X2G5', '65D1-50352', 'H05', 0),
('X2G6', '65D1-50352', 'H06', 0),
('X2G7', '65D1-50352', 'H07', 0),
('X2G8', '65D1-50352', 'H08', 0),
('X2G9', '65D1-50352', 'H09', 0),
('X3G1', '65D1-50353', 'H01', 0),
('X3G10', '65D1-50353', 'H10', 0),
('X3G2', '65D1-50353', 'H02', 0),
('X3G3', '65D1-50353', 'H03', 0),
('X3G4', '65D1-50353', 'H04', 0),
('X3G5', '65D1-50353', 'H05', 0),
('X3G6', '65D1-50353', 'H06', 0),
('X3G7', '65D1-50353', 'H07', 0),
('X3G8', '65D1-50353', 'H08', 0),
('X3G9', '65D1-50353', 'H09', 0),
('X4G1', '65D1-50354', 'H01', 0),
('X4G10', '65D1-50354', 'H10', 0),
('X4G2', '65D1-50354', 'H02', 0),
('X4G3', '65D1-50354', 'H03', 0),
('X4G4', '65D1-50354', 'H04', 0),
('X4G5', '65D1-50354', 'H05', 0),
('X4G6', '65D1-50354', 'H06', 0),
('X4G7', '65D1-50354', 'H07', 0),
('X4G8', '65D1-50354', 'H08', 0),
('X4G9', '65D1-50354', 'H09', 0),
('X5G1', '65D1-50355', 'H01', 0),
('X5G10', '65D1-50355', 'H10', 0),
('X5G2', '65D1-50355', 'H02', 0),
('X5G3', '65D1-50355', 'H03', 0),
('X5G4', '65D1-50355', 'H04', 0),
('X5G5', '65D1-50355', 'H05', 0),
('X5G6', '65D1-50355', 'H06', 0),
('X5G7', '65D1-50355', 'H07', 0),
('X5G8', '65D1-50355', 'H08', 0),
('X5G9', '65D1-50355', 'H09', 0),
('X6G1', '65D1-50356', 'H01', 0),
('X6G10', '65D1-50356', 'H10', 0),
('X6G2', '65D1-50356', 'H02', 0),
('X6G3', '65D1-50356', 'H03', 0),
('X6G4', '65D1-50356', 'H04', 0),
('X6G5', '65D1-50356', 'H05', 0),
('X6G6', '65D1-50356', 'H06', 0),
('X6G7', '65D1-50356', 'H07', 0),
('X6G8', '65D1-50356', 'H08', 0),
('X6G9', '65D1-50356', 'H09', 0),
('X7G1', '65D1-50357', 'H01', 0),
('X7G10', '65D1-50357', 'H10', 0),
('X7G2', '65D1-50357', 'H02', 0),
('X7G3', '65D1-50357', 'H03', 0),
('X7G4', '65D1-50357', 'H04', 0),
('X7G5', '65D1-50357', 'H05', 0),
('X7G6', '65D1-50357', 'H06', 0),
('X7G7', '65D1-50357', 'H07', 0),
('X7G8', '65D1-50357', 'H08', 0),
('X7G9', '65D1-50357', 'H09', 0),
('X8G1', '65D1-50358', 'H01', 0),
('X8G10', '65D1-50358', 'H10', 0),
('X8G2', '65D1-50358', 'H02', 0),
('X8G3', '65D1-50358', 'H03', 0),
('X8G4', '65D1-50358', 'H04', 0),
('X8G5', '65D1-50358', 'H05', 0),
('X8G6', '65D1-50358', 'H06', 0),
('X8G7', '65D1-50358', 'H07', 0),
('X8G8', '65D1-50358', 'H08', 0),
('X8G9', '65D1-50358', 'H09', 0),
('X9G1', '65D1-50359', 'H01', 0),
('X9G10', '65D1-50359', 'H10', 0),
('X9G2', '65D1-50359', 'H02', 0),
('X9G3', '65D1-50359', 'H03', 0),
('X9G4', '65D1-50359', 'H04', 0),
('X9G5', '65D1-50359', 'H05', 0),
('X9G6', '65D1-50359', 'H06', 0),
('X9G7', '65D1-50359', 'H07', 0),
('X9G8', '65D1-50359', 'H08', 0),
('X9G9', '65D1-50359', 'H09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `xe`
--

CREATE TABLE `xe` (
  `BIENSO` varchar(10) NOT NULL,
  `ID_LOAI` varchar(5) NOT NULL,
  `TENXE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xe`
--

INSERT INTO `xe` (`BIENSO`, `ID_LOAI`, `TENXE`) VALUES
('65D1-50351', 'LX01', 'Xe khách 1'),
('65D1-50352', 'LX01', 'Xe khách 2'),
('65D1-50353', 'LX01', 'Xe khách 3'),
('65D1-50354', 'LX01', 'Xe khách 4'),
('65D1-50355', 'LX01', 'Xe khách 5'),
('65D1-50356', 'LX01', 'Xe khách 6'),
('65D1-50357', 'LX01', 'Xe khách 7'),
('65D1-50358', 'LX01', 'Xe khách 8'),
('65D1-50359', 'LX01', 'Xe khách 9'),
('65D1-50360', 'LX02', 'Xe khách 10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benxe`
--
ALTER TABLE `benxe`
  ADD PRIMARY KEY (`MABX`),
  ADD KEY `FK_BENXE_TINHTHANH` (`MAQUANHUYEN`);

--
-- Indexes for table `chuyenxe`
--
ALTER TABLE `chuyenxe`
  ADD PRIMARY KEY (`ID_CHUYENXE`),
  ADD KEY `FK_CHUYEN_XE_CUA_TUYEN` (`ID_TUYEN`),
  ADD KEY `FK_THUOCCHUYENXE` (`BIENSO`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`EMAIL`),
  ADD KEY `MAQUYEN` (`MAQUYEN`),
  ADD KEY `MaNganHang` (`MaNganHang`);

--
-- Indexes for table `loaixe`
--
ALTER TABLE `loaixe`
  ADD PRIMARY KEY (`ID_LOAI`);

--
-- Indexes for table `nganhang`
--
ALTER TABLE `nganhang`
  ADD PRIMARY KEY (`MaNganHang`);

--
-- Indexes for table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MAQUYEN`);

--
-- Indexes for table `phieudatve`
--
ALTER TABLE `phieudatve`
  ADD PRIMARY KEY (`MAPHIEU`),
  ADD KEY `FK_HDCUAKHACH` (`EMAIL`);

--
-- Indexes for table `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`MAQUANHUYEN`),
  ADD KEY `FK_HUYENTHUOC` (`MATINH`);

--
-- Indexes for table `tinhthanh`
--
ALTER TABLE `tinhthanh`
  ADD PRIMARY KEY (`MATINH`);

--
-- Indexes for table `tuyenxe`
--
ALTER TABLE `tuyenxe`
  ADD PRIMARY KEY (`ID_TUYEN`),
  ADD KEY `FK_DIEMDAU` (`MABX`),
  ADD KEY `FK_DIEMDEN` (`BEN_MABX`);

--
-- Indexes for table `vexe`
--
ALTER TABLE `vexe`
  ADD PRIMARY KEY (`ID_VE`),
  ADD KEY `FK_COCHONGOI` (`ID_VITRI`),
  ADD KEY `FK_GOM` (`MAPHIEU`),
  ADD KEY `FK_VEXE_CHUYENXE` (`ID_CHUYENXE`);

--
-- Indexes for table `vitrighe`
--
ALTER TABLE `vitrighe`
  ADD PRIMARY KEY (`ID_VITRI`),
  ADD KEY `FK_COVITRI` (`BIENSO`);

--
-- Indexes for table `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`BIENSO`),
  ADD KEY `FK_THUOC` (`ID_LOAI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `MAQUYEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `benxe`
--
ALTER TABLE `benxe`
  ADD CONSTRAINT `FK_BENXE_TINHTHANH` FOREIGN KEY (`MAQUANHUYEN`) REFERENCES `quanhuyen` (`MAQUANHUYEN`);

--
-- Constraints for table `chuyenxe`
--
ALTER TABLE `chuyenxe`
  ADD CONSTRAINT `FK_CHUYEN_XE_CUA_TUYEN` FOREIGN KEY (`ID_TUYEN`) REFERENCES `tuyenxe` (`ID_TUYEN`),
  ADD CONSTRAINT `FK_THUOCCHUYENXE` FOREIGN KEY (`BIENSO`) REFERENCES `xe` (`BIENSO`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`MAQUYEN`) REFERENCES `phanquyen` (`MAQUYEN`),
  ADD CONSTRAINT `khachhang_ibfk_2` FOREIGN KEY (`MaNganHang`) REFERENCES `nganhang` (`MaNganHang`);

--
-- Constraints for table `phieudatve`
--
ALTER TABLE `phieudatve`
  ADD CONSTRAINT `FK_HDCUAKHACH` FOREIGN KEY (`EMAIL`) REFERENCES `khachhang` (`EMAIL`);

--
-- Constraints for table `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD CONSTRAINT `FK_HUYENTHUOC` FOREIGN KEY (`MATINH`) REFERENCES `tinhthanh` (`MATINH`);

--
-- Constraints for table `tuyenxe`
--
ALTER TABLE `tuyenxe`
  ADD CONSTRAINT `FK_DIEMDAU` FOREIGN KEY (`MABX`) REFERENCES `benxe` (`MABX`),
  ADD CONSTRAINT `FK_DIEMDEN` FOREIGN KEY (`BEN_MABX`) REFERENCES `benxe` (`MABX`);

--
-- Constraints for table `vexe`
--
ALTER TABLE `vexe`
  ADD CONSTRAINT `FK_COCHONGOI` FOREIGN KEY (`ID_VITRI`) REFERENCES `vitrighe` (`ID_VITRI`),
  ADD CONSTRAINT `FK_GOM` FOREIGN KEY (`MAPHIEU`) REFERENCES `phieudatve` (`MAPHIEU`),
  ADD CONSTRAINT `FK_VEXE_CHUYENXE` FOREIGN KEY (`ID_CHUYENXE`) REFERENCES `chuyenxe` (`ID_CHUYENXE`);

--
-- Constraints for table `vitrighe`
--
ALTER TABLE `vitrighe`
  ADD CONSTRAINT `FK_COVITRI` FOREIGN KEY (`BIENSO`) REFERENCES `xe` (`BIENSO`);

--
-- Constraints for table `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `FK_THUOC` FOREIGN KEY (`ID_LOAI`) REFERENCES `loaixe` (`ID_LOAI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
