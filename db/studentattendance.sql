-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2014 at 07:52 PM
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
-- Table structure for table `studentattendance`
--

CREATE TABLE `studentattendance` (
  `id` int(11) NOT NULL,
  `enrollment` int(11) NOT NULL,
  `sname` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `tol` int(11) NOT NULL,
  `ldate` int(11) NOT NULL,
  `stime` int(11) NOT NULL,
  `etime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentattendance`
--

INSERT INTO `studentattendance` (`id`, `enrollment`, `sname`, `subject`, `division`, `tol`, `ldate`, `stime`, `etime`) VALUES
(1, 9, 6, 6, 6, 6, 6, 6, 6),
(2, 9, 4, 4, 4, 4, 4, 4, 4),
(3, 9, 5, 5, 5, 5, 5, 5, 5),
(4, 9, 8, 8, 8, 8, 8, 8, 8),
(5, 9, 7, 7, 7, 7, 7, 7, 7),
(9, 9, 10, 10, 10, 10, 10, 10, 10),
(10, 10, 10, 10, 10, 10, 10, 10, 10),
(13, 11, 10, 10, 10, 10, 10, 10, 10),
(14, 9, 11, 11, 11, 11, 11, 11, 11),
(15, 11, 11, 11, 11, 11, 11, 11, 11),
(16, 10, 11, 11, 11, 11, 11, 11, 11),
(17, 12, 11, 11, 11, 11, 11, 11, 11),
(18, 9, 12, 12, 12, 12, 12, 12, 12),
(19, 10, 12, 12, 12, 12, 12, 12, 12),
(23, 9, 15, 15, 15, 15, 15, 15, 15),
(24, 12, 17, 17, 17, 17, 17, 17, 17),
(25, 12, 18, 18, 18, 18, 18, 18, 18),
(26, 11, 17, 17, 17, 17, 17, 17, 17),
(27, 11, 18, 18, 18, 18, 18, 18, 18),
(28, 9, 17, 17, 17, 17, 17, 17, 17),
(29, 9, 18, 18, 18, 18, 18, 18, 18),
(30, 10, 17, 17, 17, 17, 17, 17, 17),
(31, 10, 18, 18, 18, 18, 18, 18, 18),
(32, 9, 19, 19, 19, 19, 19, 19, 19),
(33, 9, 20, 20, 20, 20, 20, 20, 20),
(34, 10, 21, 21, 21, 21, 21, 21, 21),
(38, 11, 21, 21, 21, 21, 21, 21, 21),
(39, 11, 22, 22, 22, 22, 22, 22, 22),
(40, 11, 27, 27, 27, 27, 27, 27, 27),
(41, 11, 23, 23, 23, 23, 23, 23, 23),
(42, 9, 32, 32, 32, 32, 32, 32, 32),
(43, 13, 31, 31, 31, 31, 31, 31, 31),
(44, 13, 30, 30, 30, 30, 30, 30, 30),
(45, 9, 28, 28, 28, 28, 28, 28, 28),
(46, 9, 29, 29, 29, 29, 29, 29, 29),
(47, 9, 30, 30, 30, 30, 30, 30, 30),
(48, 9, 31, 31, 31, 31, 31, 31, 31),
(49, 9, 33, 33, 33, 33, 33, 33, 33),
(50, 12, 21, 21, 21, 21, 21, 21, 21),
(51, 13, 34, 34, 34, 34, 34, 34, 34),
(52, 11, 39, 39, 39, 39, 39, 39, 39),
(53, 11, 40, 40, 40, 40, 40, 40, 40),
(54, 11, 41, 41, 41, 41, 41, 41, 41),
(57, 9, 41, 41, 41, 41, 41, 41, 41);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentattendance`
--
ALTER TABLE `studentattendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrollment` (`enrollment`),
  ADD KEY `fname` (`sname`),
  ADD KEY `subject` (`subject`),
  ADD KEY `division` (`division`),
  ADD KEY `tol` (`tol`),
  ADD KEY `ldate` (`ldate`),
  ADD KEY `stime` (`stime`),
  ADD KEY `etime` (`etime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentattendance`
--
ALTER TABLE `studentattendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentattendance`
--
ALTER TABLE `studentattendance`
  ADD CONSTRAINT `studentattendance_ibfk_1` FOREIGN KEY (`enrollment`) REFERENCES `studentregister` (`id`),
  ADD CONSTRAINT `studentattendance_ibfk_2` FOREIGN KEY (`sname`) REFERENCES `classcreate` (`id`),
  ADD CONSTRAINT `studentattendance_ibfk_3` FOREIGN KEY (`subject`) REFERENCES `classcreate` (`id`),
  ADD CONSTRAINT `studentattendance_ibfk_4` FOREIGN KEY (`division`) REFERENCES `classcreate` (`id`),
  ADD CONSTRAINT `studentattendance_ibfk_5` FOREIGN KEY (`tol`) REFERENCES `classcreate` (`id`),
  ADD CONSTRAINT `studentattendance_ibfk_6` FOREIGN KEY (`ldate`) REFERENCES `classcreate` (`id`),
  ADD CONSTRAINT `studentattendance_ibfk_7` FOREIGN KEY (`stime`) REFERENCES `classcreate` (`id`),
  ADD CONSTRAINT `studentattendance_ibfk_8` FOREIGN KEY (`etime`) REFERENCES `classcreate` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
