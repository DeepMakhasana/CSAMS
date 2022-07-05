-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2014 at 07:47 PM
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
-- Table structure for table `studentregister`
--

CREATE TABLE `studentregister` (
  `id` int(11) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `enrollment` varchar(12) NOT NULL,
  `sem` int(11) NOT NULL,
  `division` varchar(10) NOT NULL,
  `term` int(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bdate` date NOT NULL,
  `department` varchar(50) NOT NULL,
  `sphone` varchar(10) NOT NULL,
  `pphone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `rpassword` varchar(255) NOT NULL,
  `type` int(1) DEFAULT 0,
  `rdate` timestamp NULL DEFAULT current_timestamp(),
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentregister`
--

INSERT INTO `studentregister` (`id`, `sname`, `enrollment`, `sem`, `division`, `term`, `gender`, `bdate`, `department`, `sphone`, `pphone`, `email`, `cpassword`, `rpassword`, `type`, `rdate`, `otp`) VALUES
(9, 'php developer', '196290319048', 6, '6C2', 212, 'M', '2003-10-13', 'Mechanical', '7086345676', '9565487689', '7890deep@gmail.com', '$2y$10$ejDyn2wXBbOBWWPlSkAdvOiW.FIhbB1p29QSVjRu9nO583flTVqNq', '$2y$10$yAD9TLGCSecsgxkZhuV/5uKkKGlyhsVxsNN94BQY2YBK9oebv2Ocm', 0, '2022-01-23 14:01:56', 118714),
(10, 'Patel Bhargav Dhirubhai', '196290319068', 6, '6C2', 212, 'M', '2000-10-31', 'Mechanical', '7489657890', '9876543217', '9068@gpvalsad.ac.in', '$2y$10$VawrTOJvElBAFG3rdBI2EODMo0v8z7prtyIbzPB8SQrq7WMq8fuk.', '$2y$10$oVsbEZfpuaENKMet0wAsMOjcgbwKAkcG4wt1JIekDFHz3yBqT3UHK', 0, '2022-02-05 13:10:52', 0),
(11, 'Gupata Sandip Kishorbhai', '196290319028', 6, '6C2', 212, 'M', '2003-08-06', 'Mechanical', '7098654321', '9087654321', '9028@gpvalsad.ac.in', '$2y$10$LuehoIHCXtRO01bwXXi8jOkVRgMb.2f4YoId6u1dgwiPHbf4Jo79.', '$2y$10$42MkXUAyxeE.JZURBIMlEO4U5f6C0HzWCo6HfMedKuP7n5zrY5gPS', 0, '2022-02-05 13:22:58', 0),
(12, 'Chodhari Jayesh Ishlambhai', '196290319015', 6, '6C2', 212, 'M', '2003-04-16', 'Mechanical', '8000654396', '9087654321', '9015@gpvalsad.ac.in', '$2y$10$IZa7RmA1Zr1cz5q2XQ7gy.IxcLHjChfycueZUtKOa6cA48.xhSZxK', '$2y$10$2kfokRYHJNZhXSfI7kkql.TXKMb3srB45QBsHC7j/b6j4qWa1vXWe', 0, '2022-02-08 13:17:45', 0),
(13, 'Nisadh Rohit k.', '196290319056', 6, '6C2', 212, 'M', '2000-09-12', 'Mechanical', '7456893456', '9067895434', '9056@gpvalsad.ac.in', '$2y$10$6kn5iRc5lvWTUV6Oph6//ePGrXT/QDW7HIFSRr7Y67rtN7JpC9PR2', '$2y$10$VMp1TA/05Tzn2Q0mnBQaTehqoaetdmQJkF1rhSyG9f2XARVYWWw46', 0, '2022-03-08 13:43:19', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentregister`
--
ALTER TABLE `studentregister`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentregister`
--
ALTER TABLE `studentregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
