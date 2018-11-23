-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Nov 2018 um 20:50
-- Server-Version: 10.1.34-MariaDB
-- PHP-Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mrtsj`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fibl`
--

CREATE TABLE `fibl` (
  `fiblid` int(11) NOT NULL,
  `exc_path` varchar(50) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `fibl`
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
-- Tabellenstruktur für Tabelle `fipa`
--

CREATE TABLE `fipa` (
  `fipaid` int(11) NOT NULL,
  `element_1` varchar(50) NOT NULL,
  `element_2` varchar(50) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `fipa`
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
-- Tabellenstruktur für Tabelle `mucho`
--

CREATE TABLE `mucho` (
  `muchoid` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `mucho`
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
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`uid`, `uname`, `pw`, `score`, `isAdmin`) VALUES
(2, 'SVRNM', '$2y$10$WCAFcsG8kVdNpnEIvDyQEOKscr0wmZxQo25vbhfv3bigQChGpuF1y', 5626, 1),
(3, 'Test', '$2y$10$Ys0iG5d4Yc06hrxVN0tBiesXlh6NdeB4aNLYWXyeaZKBGTo4TYgda', NULL, 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `fibl`
--
ALTER TABLE `fibl`
  ADD PRIMARY KEY (`fiblid`);

--
-- Indizes für die Tabelle `fipa`
--
ALTER TABLE `fipa`
  ADD PRIMARY KEY (`fipaid`);

--
-- Indizes für die Tabelle `mucho`
--
ALTER TABLE `mucho`
  ADD PRIMARY KEY (`muchoid`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `fibl`
--
ALTER TABLE `fibl`
  MODIFY `fiblid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `fipa`
--
ALTER TABLE `fipa`
  MODIFY `fipaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT für Tabelle `mucho`
--
ALTER TABLE `mucho`
  MODIFY `muchoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
