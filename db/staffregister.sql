-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2014 at 07:46 PM
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
-- Table structure for table `staffregister`
--

CREATE TABLE `staffregister` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `sname` varchar(30) DEFAULT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `department` varchar(50) NOT NULL,
  `tof` varchar(50) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `rpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffregister`
--

INSERT INTO `staffregister` (`id`, `fname`, `sname`, `age`, `gender`, `department`, `tof`, `qualification`, `phone`, `email`, `cpassword`, `rpassword`) VALUES
(1, 'xyztest', 'test', 36, 'M', 'Mechanical', 'Lecturer', 'ME in Mechanical Engineering', '9087654321', 'test@gpvalsad.ac.in', '$2y$10$8SFlx21YEcEt08/k5piLceNDd.Lilve8LDWh7RtwIuoFr76BirZHa', '$2y$10$joJRyez6dU8pHWUG0lp8TuBWUvVqHXo1e2.ALvqaAHSgtefQDa.qC'),
(2, 'BNP', 'BNP', 50, 'M', 'Mechanical', 'HOD', 'ME in Mechanical Engineering', '9878540982', 'test2@gpvalsad.ac.in', '$2y$10$NctjQEuQuZRRJjpoRD/kh.eRadQz.ikDLbjG7qNpDclMAnGKPyoUW', '$2y$10$R/tpXDhv2Az9yJSgqUCdBej6kAbKj12lGggiq7REB3q67G5EN1Kxy'),
(3, 'T.N.ANSARI', 'T.N.ANSARI', 38, 'M', 'Mechanical', 'Lecturer', 'ME in Mechanical Engineering', '7086789876', 'tnansari@gpvalsad.ac.in', '$2y$10$/Qe38HF8kCjRrdypVM3x7OKapxz4baE8j6FoK.Isq/2TSlMjTWEjK', '$2y$10$8Lxnp9G.BlSZYFab2LkJAuDxvXYj2WFYeC4YcQcaSaaYZ.Lw3nfiu'),
(4, 'VIPULKUMAR R. PATEL', 'VRP', 36, 'M', 'Mechanical', 'Lecturer', 'M.E in Mechanical (CAD/CAM)', '7098765432', 'vipulrpatel@gpvalsad.ac.in', '$2y$10$EkSJt7hsvQs7K150P.mO..a57Wg3SY633..BUu/a2XgssR8HDh49K', '$2y$10$JzrxPZXBFYanNzGXD8HvRO1FPyOc3NCGAWiw3zB7Rrej1tVhdwp3y'),
(5, 'Rajnikant Pipaliya', 'R.M.PIPALIYA', 34, 'M', 'Mechanical', 'Lecturer', 'ME in Mechanical Engineering', '9801375768', 'rmpipaliya@gpvalsad.ac.in', '$2y$10$kqNsaE207v0IFA1mFd.rhuzTnA9W/OpoQpZcEvBcHRwEfoTEc9zhe', '$2y$10$zg1guPXiogL3qggh1cEurOtDYXhLzuo.C8OyHVOYGG0mRl8Bz9oca'),
(6, 'P.C.Makwana', 'P.C.Makwana', 35, 'M', 'Mechanical', 'Lecturer', 'M.tech', '9876543210', 'pcmakwana@gpvalsad.ac.in', '$2y$10$jsYO1hh45pcLiQyaYV.1pORLO9eATtX7uCMC3Rwg1prMFubeAQ7Cq', '$2y$10$vbeclNLd/TwyMLNL9RYTneh8AoSozWgYvV1gK/NPLtdlQk7bESVi2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staffregister`
--
ALTER TABLE `staffregister`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staffregister`
--
ALTER TABLE `staffregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
