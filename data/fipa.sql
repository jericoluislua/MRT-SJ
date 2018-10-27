-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 10:26 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrtsj`
--

-- --------------------------------------------------------

--
-- Table structure for table `fipa`
--

CREATE TABLE `fipa` (
  `fipaid` int(11) NOT NULL,
  `element_left` varchar(50) NOT NULL,
  `element_right` varchar(50) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fipa`
--

INSERT INTO `fipa` (`fipaid`, `element_left`, `element_right`, `points`) VALUES
(1, 'L1', 'R1', 10),
(2, 'L2', 'R2', 10),
(3, 'L3', 'R3', 10),
(4, 'L4', 'R4', 10),
(5, 'L5', 'R5', 10),
(6, 'L6', 'R6', 10),
(7, 'L7', 'R7', 10),
(8, 'L8', 'R8', 10),
(9, 'L9', 'R9', 10),
(10, 'L10', 'R10', 10),
(11, 'L11', 'R11', 10),
(12, 'L12', 'R12', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fipa`
--
ALTER TABLE `fipa`
  ADD PRIMARY KEY (`fipaid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fipa`
--
ALTER TABLE `fipa`
  MODIFY `fipaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
