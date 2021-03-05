-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 12:36 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stationarysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `authen`
--

CREATE TABLE `authen` (
  `auth_id` int(11) NOT NULL,
  `auth_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authen`
--

INSERT INTO `authen` (`auth_id`, `auth_name`) VALUES
(1, 'staff'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'hp'),
(2, 'ตราม้า'),
(7, 'ตราช้าง'),
(8, '3M'),
(9, 'มาม่า'),
(10, 'Double A');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color_name`) VALUES
(1, 'ดำ'),
(2, 'ขาว'),
(3, 'แดง'),
(4, 'น้ำเงิน'),
(5, 'ม่วง'),
(6, 'ส้ม'),
(8, 'เขียว'),
(10, 'ชมพู');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'ไอที'),
(2, 'ทรัพยากรณ์บุคคล'),
(3, 'การเงิน'),
(4, 'การขาย'),
(5, 'การตลาด');

-- --------------------------------------------------------

--
-- Table structure for table `issue_status`
--

CREATE TABLE `issue_status` (
  `status_id` int(11) NOT NULL,
  `tran_id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `status_type_id` int(11) NOT NULL,
  `status_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `issue_status`
--

INSERT INTO `issue_status` (`status_id`, `tran_id`, `status_type_id`, `status_date`) VALUES
(1, 'TS000031', 3, '2020-04-03 16:01:34'),
(2, 'TS000032', 2, '2020-04-03 15:46:56'),
(3, 'TS000033', 4, '2020-04-03 16:01:23'),
(4, 'TS000034', 4, '2020-04-07 17:48:53'),
(5, 'TS000036', 2, '2020-04-07 10:22:06'),
(6, 'TS000037', 3, '2020-04-07 17:48:45'),
(7, 'TS000038', 1, '2020-04-08 08:07:04'),
(8, 'TS000039', 3, '2020-04-27 10:24:10'),
(9, 'TS000040', 4, '2020-04-15 13:03:59'),
(10, 'TS000041', 2, '2020-04-27 10:24:07'),
(11, 'TS000044', 2, '2020-05-03 07:07:07'),
(12, 'TS000045', 1, '2020-04-29 17:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `auth_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `username`, `password`, `fname`, `lname`, `auth_id`, `dept_id`) VALUES
(1, 'IT0001', '1234', 'Suppanath', 'Sattayarath', 2, 1),
(2, 'ST0001', '1234', 'tony', 'stark', 1, 1),
(4, 'IT0002', '1234', 'tom', 'hank', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stationary`
--

CREATE TABLE `stationary` (
  `sta_id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `sta_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(11) NOT NULL,
  `staff_id` int(6) NOT NULL,
  `sta_pic` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `min` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `brand_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `sta_amount` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stationary`
--

INSERT INTO `stationary` (`sta_id`, `sta_name`, `balance`, `staff_id`, `sta_pic`, `min`, `type_id`, `createDate`, `brand_id`, `color_id`, `sta_amount`, `unit_id`) VALUES
('EX0006', 'บะหมี่กึ่งสำเร็จรูป', 0, 1, '8612003060756530fb88f77fb3ea46e47011c8d7-download.jpg', 2, 5, '2020-04-08 18:14:25', 9, 3, 1, 7),
('IT0001', 'ปริ๊นเตอร์', 13, 1, '48800b6ee881cb6a0b9a9c3ded587afa8106c33a-hp-gt5820.jpg', 1, 1, '2020-04-02 20:26:56', 1, 1, 1, 1),
('OF0002', 'แมคเย็บกระดาษ', 2, 1, 'fee01872c7fbaba7e7995d7fc547abc0c534bc65-mag.jpg', 1, 4, '2020-04-07 17:48:52', 8, 10, 1, 7),
('OF0003', 'กระดาษ A4', 10, 1, '897ab2fc4e78f2c2da1344f74f6402294b18bb1a-F14_ream_04.jpg', 1, 4, '2020-04-03 15:42:05', 10, 2, 1, 8),
('OF0004', 'แฟ้มใส่เอกสารแบบหนา', 7, 1, 'd8fd4b0d2726f71e568d5de4754b56ea74e928a5-sheet.jpg', 2, 4, '2020-04-15 13:03:58', 7, 1, 1, 7),
('ST0005', 'ดินสอ', 6, 1, '217707a7ac7b232d9279eab4df086503cd79bba7-pencil.jpg', 1, 2, '2020-03-11 05:57:01', 2, 1, 1, 4),
('ST0007', 'ปากกา', 12, 1, 'adea111a702b26868c5a221e74ef027aef024743-images.jpg', 2, 2, '2021-01-13 14:05:40', 2, 4, 4, 2);

--
-- Triggers `stationary`
--
DELIMITER $$
CREATE TRIGGER `addSta` AFTER INSERT ON `stationary` FOR EACH ROW UPDATE varible SET value = value + 1 WHERE var_name = 'max_sta'
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `status_type`
--

CREATE TABLE `status_type` (
  `status_type_id` int(11) NOT NULL,
  `status_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_type`
--

INSERT INTO `status_type` (`status_type_id`, `status_name`) VALUES
(1, 'กำลังพิจารณา'),
(2, 'อนุมัติ'),
(3, 'ไม่อนุมัติ'),
(4, 'รับของแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `sta_type`
--

CREATE TABLE `sta_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type_code` char(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sta_type`
--

INSERT INTO `sta_type` (`type_id`, `type_name`, `type_code`) VALUES
(1, 'อุปกรณ์ไอที', 'IT'),
(2, 'เครื่องเขียน', 'ST'),
(4, 'อุปกรณ์สำนักงาน', 'OF'),
(5, 'อุปกรณ์ฝุ่มเฟือย', 'EX'),
(6, 'ทดลอง', 'TE');

-- --------------------------------------------------------

--
-- Table structure for table `transition`
--

CREATE TABLE `transition` (
  `tran_id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `sta_id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `is_receive` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float NOT NULL,
  `staff_id` int(8) NOT NULL,
  `tran_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `receive_num` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transition`
--

INSERT INTO `transition` (`tran_id`, `sta_id`, `is_receive`, `amount`, `price`, `staff_id`, `tran_date`, `receive_num`) VALUES
('TR000030', 'EX0006', 1, 5, 12, 1, '2020-04-02 20:30:10', 'T001'),
('TR000035', 'EX0006', 1, 3, 15, 1, '2020-04-07 10:20:56', 'T0015'),
('TR000046', 'ST0007', 1, 2, 150, 1, '2021-01-13 14:05:40', 'T001'),
('TS000031', 'EX0006', 0, 3, 0, 1, '2020-04-02 20:30:39', ''),
('TS000032', 'OF0003', 0, 9, 0, 1, '2020-04-02 22:13:29', ''),
('TS000033', 'EX0006', 0, 1, 0, 2, '2020-04-03 15:59:17', ''),
('TS000034', 'OF0002', 0, 2, 0, 2, '2020-04-03 16:00:47', ''),
('TS000036', 'EX0006', 0, 6, 0, 1, '2020-04-07 10:21:33', ''),
('TS000037', 'IT0001', 0, 1, 0, 2, '2020-04-07 10:24:06', ''),
('TS000038', 'OF0003', 0, 3, 0, 2, '2020-04-07 11:33:17', ''),
('TS000039', 'OF0004', 0, 4, 0, 2, '2020-04-08 18:09:16', ''),
('TS000040', 'OF0004', 0, 2, 0, 1, '2020-04-15 13:00:02', ''),
('TS000041', 'IT0001', 0, 2, 0, 2, '2020-04-15 13:04:40', ''),
('TS000042', 'OF0002', 0, 1, 0, 1, '2020-04-29 16:09:31', ''),
('TS000043', 'ST0007', 0, 1, 0, 1, '2020-04-29 16:16:01', ''),
('TS000044', 'ST0007', 0, 1, 0, 1, '2020-04-29 16:36:04', ''),
('TS000045', 'EX0006', 0, 1, 0, 1, '2020-04-29 17:04:19', '');

--
-- Triggers `transition`
--
DELIMITER $$
CREATE TRIGGER `addTran` AFTER INSERT ON `transition` FOR EACH ROW UPDATE varible SET value = value + 1 WHERE var_name = 'max_tran'
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, 'เครื่อง'),
(2, 'แท่ง'),
(5, 'โหล'),
(7, 'อัน'),
(8, 'แผ่น'),
(9, 'ชิ้น');

-- --------------------------------------------------------

--
-- Table structure for table `varible`
--

CREATE TABLE `varible` (
  `var_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `varible`
--

INSERT INTO `varible` (`var_name`, `value`) VALUES
('max_sta', 12),
('max_tran', 46);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authen`
--
ALTER TABLE `authen`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `issue_status`
--
ALTER TABLE `issue_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `stationary`
--
ALTER TABLE `stationary`
  ADD PRIMARY KEY (`sta_id`);

--
-- Indexes for table `status_type`
--
ALTER TABLE `status_type`
  ADD PRIMARY KEY (`status_type_id`);

--
-- Indexes for table `sta_type`
--
ALTER TABLE `sta_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `transition`
--
ALTER TABLE `transition`
  ADD PRIMARY KEY (`tran_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `varible`
--
ALTER TABLE `varible`
  ADD PRIMARY KEY (`var_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authen`
--
ALTER TABLE `authen`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `issue_status`
--
ALTER TABLE `issue_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_type`
--
ALTER TABLE `status_type`
  MODIFY `status_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sta_type`
--
ALTER TABLE `sta_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
