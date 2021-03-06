-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 09:42 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reportcard`
--

-- --------------------------------------------------------

--
-- Table structure for table `bca_1yr`
--

CREATE TABLE `bca_1yr` (
  `stu_name` varchar(50) NOT NULL,
  `stu_enrollNo` varchar(50) NOT NULL,
  `stu_rollNo` varchar(50) NOT NULL,
  `stu_class` enum('BCA I yr','BCA II yr','BCA III yr') NOT NULL,
  `stu_faName` varchar(50) NOT NULL,
  `stu_moName` varchar(50) NOT NULL,
  `stu_sess` varchar(10) NOT NULL,
  `stu_mobileNo` bigint(20) UNSIGNED NOT NULL,
  `Mid_BCA111` tinyint(3) UNSIGNED NOT NULL,
  `Mid_BCA112` tinyint(3) UNSIGNED NOT NULL,
  `Mid_BCA113` tinyint(3) UNSIGNED NOT NULL,
  `Mid_BCA114` tinyint(3) UNSIGNED NOT NULL,
  `Mid_BCA115` tinyint(3) UNSIGNED NOT NULL,
  `Mid_BCA116` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA111` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA112` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA113` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA114` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA115` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA116` tinyint(3) UNSIGNED NOT NULL,
  `Mid_Total` smallint(4) UNSIGNED NOT NULL,
  `Ann_Total` smallint(4) UNSIGNED NOT NULL,
  `Mid_Perc` decimal(5,2) UNSIGNED NOT NULL,
  `Ann_Perc` decimal(5,2) UNSIGNED NOT NULL,
  `Overall_Perc` decimal(5,2) UNSIGNED NOT NULL,
  `Result` enum('PASS','FAIL','PROMOTE','ABSENT') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bca_1yr`
--

INSERT INTO `bca_1yr` (`stu_name`, `stu_enrollNo`, `stu_rollNo`, `stu_class`, `stu_faName`, `stu_moName`, `stu_sess`, `stu_mobileNo`, `Mid_BCA111`, `Mid_BCA112`, `Mid_BCA113`, `Mid_BCA114`, `Mid_BCA115`, `Mid_BCA116`, `Ann_BCA111`, `Ann_BCA112`, `Ann_BCA113`, `Ann_BCA114`, `Ann_BCA115`, `Ann_BCA116`, `Mid_Total`, `Ann_Total`, `Mid_Perc`, `Ann_Perc`, `Overall_Perc`, `Result`) VALUES
('Amit Singh', 'BCA11001', '11001', 'BCA I yr', 'Amit Ke Papa', 'Amit Ki Mummy', '2020-2021', 1212121212, 24, 24, 24, 23, 23, 23, 45, 45, 45, 45, 45, 45, 141, 270, '78.33', '64.29', '71.31', 'PASS'),
('Ojas Soni', 'BCA11002', '11002', 'BCA I yr', 'Ojas Ke Papa', 'Ojas Ki Mummy	', '2020-2021', 8560842664, 25, 25, 25, 25, 25, 25, 52, 52, 52, 52, 52, 52, 150, 312, '83.33', '74.29', '78.81', 'PASS'),
('Tanveer', 'BCA11003', '11003', 'BCA I yr', 'Tanveer Ke Papa', 'Tanveer Ki Mummy	', '2021-2022', 1313131313, 10, 10, 10, 10, 10, 10, 25, 25, 25, 25, 25, 25, 60, 150, '33.33', '35.71', '34.52', 'FAIL'),
('Zishaan', 'BCA11004', '11004', 'BCA I yr', 'Zishaan Ke Papa', 'Zishaan Ki Mummy	', '2020-2021', 2344556454, 12, 21, 30, 23, 29, 23, 48, 70, 48, 69, 22, 23, 138, 280, '76.67', '66.67', '71.67', 'PASS');

-- --------------------------------------------------------

--
-- Table structure for table `bca_2yr`
--

CREATE TABLE `bca_2yr` (
  `stu_name` varchar(50) NOT NULL,
  `stu_enrollNo` varchar(50) NOT NULL,
  `stu_rollNo` varchar(50) NOT NULL,
  `stu_class` enum('BCA I yr','BCA II yr','BCA III yr') NOT NULL,
  `stu_faName` varchar(50) NOT NULL,
  `stu_moName` varchar(50) NOT NULL,
  `stu_sess` varchar(10) NOT NULL,
  `stu_mobileNo` bigint(20) UNSIGNED NOT NULL,
  `Mid_BCA221` tinyint(3) UNSIGNED NOT NULL,
  `Mid_BCA222` tinyint(3) UNSIGNED NOT NULL,
  `Mid_BCA223` tinyint(3) UNSIGNED NOT NULL,
  `Mid_BCA224` tinyint(3) UNSIGNED NOT NULL,
  `Mid_BCA225` tinyint(3) UNSIGNED NOT NULL,
  `Mid_BCA226` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA221` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA222` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA223` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA224` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA225` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA226` tinyint(3) UNSIGNED NOT NULL,
  `Mid_Total` smallint(4) UNSIGNED NOT NULL,
  `Ann_Total` smallint(4) UNSIGNED NOT NULL,
  `Mid_Perc` decimal(5,2) NOT NULL,
  `Ann_Perc` decimal(5,2) NOT NULL,
  `Overall_Perc` decimal(5,2) NOT NULL,
  `Result` enum('PASS','FAIL','PROMOTE','ABSENT') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bca_2yr`
--

INSERT INTO `bca_2yr` (`stu_name`, `stu_enrollNo`, `stu_rollNo`, `stu_class`, `stu_faName`, `stu_moName`, `stu_sess`, `stu_mobileNo`, `Mid_BCA221`, `Mid_BCA222`, `Mid_BCA223`, `Mid_BCA224`, `Mid_BCA225`, `Mid_BCA226`, `Ann_BCA221`, `Ann_BCA222`, `Ann_BCA223`, `Ann_BCA224`, `Ann_BCA225`, `Ann_BCA226`, `Mid_Total`, `Ann_Total`, `Mid_Perc`, `Ann_Perc`, `Overall_Perc`, `Result`) VALUES
('Aman Singh', 'BCA22001', '22001', 'BCA II yr', 'Aman Ke Papa', 'Aman Ki Mummy	', '2021-2022', 5555555556, 25, 25, 25, 25, 25, 25, 70, 70, 70, 70, 70, 70, 150, 420, '83.33', '100.00', '91.67', 'PASS'),
('Armaan', 'BCA22002', '22002', 'BCA II yr', 'Armaan Ke Papa', 'Armaan Ki Mummy	', '2020-2021', 8989898998, 28, 28, 28, 28, 28, 28, 69, 69, 69, 69, 69, 69, 168, 414, '93.33', '98.57', '95.95', 'PASS'),
('Bhawar Singh', 'BCA22003', '22003', 'BCA II yr', 'Bhawar Ke Papa', 'Bhawar Ki Mummy', '2021-2022', 7656545432, 23, 23, 30, 23, 23, 23, 64, 64, 64, 23, 67, 64, 145, 346, '80.56', '82.38', '81.47', 'PASS');

-- --------------------------------------------------------

--
-- Table structure for table `bca_3yr`
--

CREATE TABLE `bca_3yr` (
  `stu_name` varchar(50) NOT NULL,
  `stu_enrollNo` varchar(50) NOT NULL,
  `stu_rollNo` varchar(50) NOT NULL,
  `stu_class` enum('BCA I yr','BCA II yr','BCA III yr') NOT NULL,
  `stu_faName` varchar(50) NOT NULL,
  `stu_moName` varchar(50) NOT NULL,
  `stu_sess` varchar(15) NOT NULL,
  `stu_mobileNo` bigint(20) UNSIGNED NOT NULL,
  `Mid_BCA331` tinyint(3) UNSIGNED NOT NULL,
  `Mid_BCA332` tinyint(3) UNSIGNED NOT NULL,
  `Mid_BCA333` tinyint(3) UNSIGNED NOT NULL,
  `Mid_BCA334` tinyint(3) UNSIGNED NOT NULL,
  `Mid_BCA335` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA331` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA332` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA333` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA334` tinyint(3) UNSIGNED NOT NULL,
  `Ann_BCA335` tinyint(3) UNSIGNED NOT NULL,
  `Mid_Total` smallint(4) UNSIGNED NOT NULL,
  `Ann_Total` smallint(4) UNSIGNED NOT NULL,
  `Mid_Perc` decimal(5,2) NOT NULL,
  `Ann_Perc` decimal(5,2) NOT NULL,
  `Overall_Perc` decimal(5,2) NOT NULL,
  `Result` enum('PASS','FAIL','PROMOTE','ABSENT') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bca_3yr`
--

INSERT INTO `bca_3yr` (`stu_name`, `stu_enrollNo`, `stu_rollNo`, `stu_class`, `stu_faName`, `stu_moName`, `stu_sess`, `stu_mobileNo`, `Mid_BCA331`, `Mid_BCA332`, `Mid_BCA333`, `Mid_BCA334`, `Mid_BCA335`, `Ann_BCA331`, `Ann_BCA332`, `Ann_BCA333`, `Ann_BCA334`, `Ann_BCA335`, `Mid_Total`, `Ann_Total`, `Mid_Perc`, `Ann_Perc`, `Overall_Perc`, `Result`) VALUES
('Anil', 'BCA33001', '33001', 'BCA III yr', 'Anil Ke Papa', 'Anil Ki Mummy', '2021-2022', 8888888888, 23, 30, 30, 29, 30, 70, 70, 70, 70, 70, 142, 350, '94.67', '100.00', '97.33', 'PASS'),
('Bhavesh', 'BCA33002', '33002', 'BCA III yr', 'Bhavesh Ke Papa', 'Bhavesh Ki Mummy	', '2021-2022', 3434343434, 23, 23, 23, 23, 23, 64, 64, 64, 64, 64, 115, 320, '76.67', '91.43', '84.05', 'PASS'),
('Navya', 'BCA33003', '33003', 'BCA III yr', 'Navya Ke Papa', 'Navya Ki Mummy	', '2021-2022', 5451214841, 26, 24, 30, 20, 25, 68, 55, 70, 50, 49, 125, 292, '83.33', '83.43', '83.38', 'PASS'),
('Pushpa', 'BCA33004', '33004', 'BCA III yr', 'Pushpa Ke Papa', 'Pushpa Ki Mummy	', '2021-2022', 4545554444, 30, 30, 30, 20, 30, 70, 70, 70, 70, 70, 140, 350, '93.33', '100.00', '96.67', 'PASS'),
('Sourabh', 'BCA33005', '33005', 'BCA III yr', 'xyzaa', 'xyzaa	', '2007-2008', 1234567890, 12, 23, 12, 23, 23, 56, 56, 56, 56, 56, 93, 280, '62.00', '80.00', '71.00', 'PASS');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `teacherOf` enum('BCA I yr','BCA II yr','BCA III yr') NOT NULL,
  `teacherMob_number` bigint(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_name`, `username`, `email`, `teacherOf`, `teacherMob_number`, `password`) VALUES
('admin', 'admin', 'admin@gmail.com', 'BCA III yr', 1234567890, '$2y$10$wfBm0t72l4Xa3cQR6L75e.dXaZgUPldCM391ZcTtR2gnT6Yf9QMEC'),
('Monika Kumhar', 'monikakumhar', 'monikakumhar00@gmail.com', 'BCA I yr', 9001243131, '$2y$10$o85ui2hvG9/yTc5ZOp.tJu0IwGs/dJ7UFzzo1O6QkmzTM7FjhVjMi'),
('Sourabh Kumhar', 'sourabhkumhar', 'mr.sourabhkumhar@gmail.com', 'BCA II yr', 8560842664, '$2y$10$9dif81DD/v6vNv0dSoP6W.LNck/ejfYXasScpAvswNNQ3ElmfBXYe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bca_1yr`
--
ALTER TABLE `bca_1yr`
  ADD PRIMARY KEY (`stu_enrollNo`),
  ADD UNIQUE KEY `stu_rollNo` (`stu_rollNo`);

--
-- Indexes for table `bca_2yr`
--
ALTER TABLE `bca_2yr`
  ADD PRIMARY KEY (`stu_enrollNo`),
  ADD UNIQUE KEY `stu_rollNo` (`stu_rollNo`);

--
-- Indexes for table `bca_3yr`
--
ALTER TABLE `bca_3yr`
  ADD PRIMARY KEY (`stu_enrollNo`),
  ADD UNIQUE KEY `stu_rollNo` (`stu_rollNo`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
