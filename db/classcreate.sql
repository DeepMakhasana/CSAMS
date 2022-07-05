-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2014 at 07:44 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gpvattendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `classcreate`
--

CREATE TABLE `classcreate` (
  `id` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `division` varchar(10) NOT NULL,
  `term` int(5) NOT NULL,
  `tol` varchar(10) NOT NULL,
  `ldate` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `scode` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classcreate`
--

INSERT INTO `classcreate` (`id`, `sname`, `subject`, `division`, `term`, `tol`, `ldate`, `stime`, `etime`, `scode`) VALUES
(4, 'BNP', 'PPE', '6M1', 0, 'LAB', '2022-01-27', '15:10:00', '16:10:00', '4A0B87'),
(5, 'BNP', 'CAM', '6M1', 0, 'LECTURE', '2022-01-27', '10:30:00', '11:30:00', '330576'),
(6, 'BNP', 'TOOL', '6M2', 0, 'LECTURE', '2022-01-27', '10:00:00', '11:00:00', '99869F'),
(7, 'BNP', 'IM', '6M3', 0, 'LECTURE', '2003-01-31', '10:30:00', '11:30:00', '2AAE79'),
(8, 'BNP', 'CAM', '6M1', 0, 'LAB', '2022-02-10', '13:00:00', '14:00:00', '4095DA'),
(10, 'BNP', 'TOOL', '6M1', 0, 'LAB', '2022-02-10', '13:00:00', '15:00:00', 'DA50E7'),
(11, 'BNP', 'PPE', '6M1', 212, 'LECTURE', '2022-02-05', '10:30:00', '11:30:00', 'D7D123'),
(12, 'BNP', 'IM', '6M1', 0, 'LECTURE', '2022-02-09', '10:30:00', '23:30:00', '0655C1'),
(15, 'T.N.ANSARI', 'PPE', '6M1', 0, 'LECTURE', '2022-02-10', '13:00:00', '14:00:00', '8F6850'),
(16, 'BNP', 'CAM', '6M1', 0, 'LECTURE', '2022-02-10', '13:00:00', '14:30:00', 'B7FCDA'),
(17, 'T.N.ANSARI', 'PPE', '6M2', 0, 'LAB', '2022-02-12', '10:30:00', '11:30:00', '776AD9'),
(18, 'T.N.ANSARI', 'PPE', '6M1', 212, 'LECTURE', '2022-02-12', '11:30:00', '12:30:00', '57CEE6'),
(19, 'VRP', 'TSEE', '6M1', 0, 'LECTURE', '2022-02-18', '14:00:00', '15:00:00', 'ABFA53'),
(20, 'BNP', 'CAM', '6M1', 0, 'LECTURE', '2022-02-18', '10:30:00', '11:30:00', '1174DC'),
(21, 'T.N.ANSARI', 'PPE', '6M1', 212, 'LECTURE', '2022-02-25', '10:30:00', '11:30:00', '9AFA2E'),
(22, 'T.N.ANSARI', 'PPE', '6M2', 212, 'LECTURE', '2022-02-25', '02:00:00', '03:00:00', 'DC1AC2'),
(23, 'T.N.ANSARI', 'PPE', '6M1', 212, 'LECTURE', '2022-02-26', '11:30:00', '12:30:00', 'D36697'),
(24, 'T.N.ANSARI', 'PPE', '6M1', 212, 'LECTURE', '2022-02-27', '02:00:00', '03:00:00', '73989D'),
(25, 'T.N.ANSARI', 'PPE', '6M1', 212, 'LECTURE', '2022-02-27', '03:10:00', '04:10:00', '7633FD'),
(26, 'T.N.ANSARI', 'PPE', '6M1', 212, 'LECTURE', '2022-02-28', '10:30:00', '11:30:00', '2E23E5'),
(27, 'T.N.ANSARI', 'PPE', '6M1', 212, 'LECTURE', '2022-03-02', '10:30:00', '11:30:00', 'E4081F'),
(28, 'T.N.ANSARI', 'PPE', '6M1', 212, 'LECTURE', '2022-02-22', '01:00:00', '02:00:00', '5535D6'),
(29, 'T.N.ANSARI', 'PPE', '6M1', 212, 'LECTURE', '2022-03-06', '02:00:00', '03:00:00', '554432'),
(30, 'T.N.ANSARI', 'PPE', '6M1', 212, 'LECTURE', '2022-03-06', '03:10:00', '04:10:00', '4461B2'),
(31, 'T.N.ANSARI', 'PPE', '6M1', 212, 'LECTURE', '2022-03-08', '10:30:00', '11:30:00', 'D8E1F8'),
(32, 'BNP', 'CAM', '6M1', 0, 'LECTURE', '2022-02-28', '10:30:00', '11:30:00', '3740E1'),
(33, 'BNP', 'IM', '6M1', 0, 'LECTURE', '2022-03-08', '11:30:00', '12:30:00', '1AA080'),
(34, 'BNP', 'TOOL', '6M1', 212, 'LECTURE', '2022-03-11', '01:00:00', '02:00:00', 'F26443'),
(38, 'BNP', 'TOOL', '6M1', 212, 'LECTURE', '2022-03-11', '01:00:00', '02:00:00', '6BACE0'),
(39, 'R.M.PIPALIYA', 'TSEE', '6M1', 212, 'LECTURE', '2022-05-02', '02:00:00', '03:00:00', '8AAA9A'),
(40, 'BNP', 'CAM', '6M1', 212, 'LECTURE', '2022-07-03', '03:00:00', '04:00:00', 'CA51E7'),
(41, 'P.C.Makwana', 'PHP', '6C2', 212, 'LECTURE', '2022-07-03', '10:00:00', '11:00:00', '0646B9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classcreate`
--
ALTER TABLE `classcreate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classcreate`
--
ALTER TABLE `classcreate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
