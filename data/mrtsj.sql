-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 05:43 PM
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
-- Table structure for table `fibl`
--

CREATE TABLE `fibl` (
  `fiblid` int(11) NOT NULL,
  `exc_path` varchar(50) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fibl`
--

INSERT INTO `fibl` (`fiblid`, `exc_path`, `answer`, `points`) VALUES
(5, '/images/fibl/FiBl_img/1.png', 'Location: /choice', 5),
(6, '/images/fibl/FiBl_img/2.png', 'include', 5),
(7, '/images/fibl/FiBl_img/3.png', 'require', 5),
(8, '/images/fibl/FiBl_img/4.png', '$_POST[\'username\'];', 10),
(9, '/images/fibl/FiBl_img/5.png', '$_GET[\'answer\'];', 10),
(10, '/images/fibl/FiBl_img/6.png', 'session_start();', 10),
(11, '/images/fibl/FiBl_img/7.png', 'session_unset', 5),
(12, '/images/fibl/FiBl_img/8.png', 'new MySQLi($host, $username, $password, $database);', 15),
(13, '/images/fibl/FiBl_img/9.png', 'htmlspecialchars', 5),
(14, '/images/fibl/FiBl_img/10.png', 'array_fill', 5);

-- --------------------------------------------------------

--
-- Table structure for table `fipa`
--

CREATE TABLE `fipa` (
  `fipaid` int(11) NOT NULL,
  `element_1` varchar(50) NOT NULL,
  `element_2` varchar(50) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fipa`
--

INSERT INTO `fipa` (`fipaid`, `element_1`, `element_2`, `points`) VALUES
(13, 'GET variables', '$_GET[“example”]', 10),
(14, 'POST variables', '$_POST[“example”]', 10),
(15, 'start a session', 'session_start();', 10),
(16, 'SESSION variable', '$_SESSION[“example”]', 10),
(17, 'clear session variable', 'session_unset();', 10),
(18, 'destroy the session', 'session_destroy();', 10),
(19, 'convert HTML entities', 'htmlspecialchars($input);', 5),
(20, 'prepared SQL statement', '$conn->prepare($query);', 5),
(21, 'hash the password', 'password_hash($password);', 5),
(22, 'verify the password ', 'password_verify($password,$hash);', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mucho`
--

CREATE TABLE `mucho` (
  `muchoid` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mucho`
--

INSERT INTO `mucho` (`muchoid`, `question`, `answer`, `points`) VALUES
(6, 'Illegal DB-Access, through entering SQL-Queries into Input-Fields.', 'SQL-Injection', 10),
(7, 'Illegal Data-Access, through inserting malicious scripts.', 'Cross-Site-Scripting', 10),
(8, 'Illegal Data-Access, through stealing a session.', 'Session Hijacking', 10),
(9, 'Illegal Data-Access, through assigning a session to the user.', 'Session Fixation', 10),
(10, 'Illegal Data-Access or damage to the Web-App, through accessing the Directory-Structure.', 'Directory Traversal', 10),
(11, 'Network-Attack, through getting access to the Network and taking over a Client.', 'Man-in-the-Middle / Man-in-the-Browser', 10),
(12, 'Session-Takeover, through changing the HTTP-Response and the SESSION_COOKIES.', 'HTTP Response Splitting', 10),
(13, 'Illegally controlling the client, through sending malicious requests to the server.', 'Cross Site Request Forgery', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `pw`, `score`, `isAdmin`) VALUES
(2, 'SVRNM', '$2y$10$WCAFcsG8kVdNpnEIvDyQEOKscr0wmZxQo25vbhfv3bigQChGpuF1y', 100, 1),
(3, 'jericoluislua', '$2y$10$jwn87JjTWbKpwLwZ3tSe6ut.4FmrV.602RMisOnBsPxh7yjbPxR1.', NULL, 1),
(4, 'gibbix4life', '$2y$10$vm/eMCs.OY9dMpQ/52f3ve4xM.kmXNfz35oI0QxBGky0Ce5s3NyLG', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fibl`
--
ALTER TABLE `fibl`
  ADD PRIMARY KEY (`fiblid`);

--
-- Indexes for table `fipa`
--
ALTER TABLE `fipa`
  ADD PRIMARY KEY (`fipaid`);

--
-- Indexes for table `mucho`
--
ALTER TABLE `mucho`
  ADD PRIMARY KEY (`muchoid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fibl`
--
ALTER TABLE `fibl`
  MODIFY `fiblid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fipa`
--
ALTER TABLE `fipa`
  MODIFY `fipaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mucho`
--
ALTER TABLE `mucho`
  MODIFY `muchoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
