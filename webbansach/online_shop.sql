-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2025 at 10:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `useradmin` varchar(50) NOT NULL,
  `passadmin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`useradmin`, `passadmin`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e'),
('admin2', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_donhang`
--

CREATE TABLE `chitiet_donhang` (
  `idchitietdon` int(11) NOT NULL,
  `idsach` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `iddonhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `iddonhang` int(11) NOT NULL,
  `ngaymua` date DEFAULT NULL,
  `nguoimua` varchar(50) NOT NULL,
  `nguoiduyet` varchar(50) NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 0,
  `isDelete` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `maloai` varchar(5) NOT NULL,
  `tentenloai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`maloai`, `tentenloai`) VALUES
('ML001', 'Du Lich'),
('ML002', 'Cong Nghe');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `gioitinh` bit(2) NOT NULL,
  `ngaysinh` date NOT NULL,
  `quocgia` varchar(30) NOT NULL,
  `hinhdaidien` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`username`, `password`, `hoten`, `gioitinh`, `ngaysinh`, `quocgia`, `hinhdaidien`) VALUES
('user01', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyen Thi A', b'01', '2003-11-11', 'Viet Nam', 'pictures/avatar1'),
('user02', 'e10adc3949ba59abbe56e057f20f883e', 'Ho Van B', b'00', '2004-12-10', 'Viet Nam', 'pictures/avatar2'),
('user03', 'e10adc3949ba59abbe56e057f20f883e', 'Tran Thi C', b'00', '2004-04-01', 'Viet Nam', 'pictures/avatar3');

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `idsach` int(11) NOT NULL,
  `tensach` varchar(100) NOT NULL,
  `tacgia` varchar(100) NOT NULL,
  `mota` text NOT NULL,
  `gia` int(11) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhsach` text NOT NULL,
  `maloai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`idsach`, `tensach`, `tacgia`, `mota`, `gia`, `sotrang`, `soluong`, `hinhsach`, `maloai`) VALUES
(1, 'Ky Thuat So', 'Tran Thi B', 'sach hay', 100000, 50, 3, 'images/73900', 'ML001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`useradmin`);

--
-- Indexes for table `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD PRIMARY KEY (`idchitietdon`),
  ADD KEY `chitiet_sach_FK` (`idsach`),
  ADD KEY `chitiet_donhang_FK` (`iddonhang`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`iddonhang`),
  ADD KEY `donhang_FK` (`nguoimua`),
  ADD KEY `duyet_FK` (`nguoiduyet`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`idsach`),
  ADD KEY `maloai` (`maloai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  MODIFY `idchitietdon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `iddonhang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sach`
--
ALTER TABLE `sach`
  MODIFY `idsach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD CONSTRAINT `chitiet_donhang_FK` FOREIGN KEY (`iddonhang`) REFERENCES `donhang` (`iddonhang`),
  ADD CONSTRAINT `chitiet_sach_FK` FOREIGN KEY (`idsach`) REFERENCES `sach` (`idsach`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_FK` FOREIGN KEY (`nguoimua`) REFERENCES `nguoidung` (`username`),
  ADD CONSTRAINT `duyet_FK` FOREIGN KEY (`nguoiduyet`) REFERENCES `admin` (`useradmin`);

--
-- Constraints for table `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
