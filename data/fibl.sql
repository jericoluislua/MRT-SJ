-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Okt 2018 um 21:32
-- Server-Version: 10.1.34-MariaDB
-- PHP-Version: 7.2.8

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
  `answer` varchar(50) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `fibl`
--

INSERT INTO `fibl` (`fiblid`, `exc_path`, `answer`, `points`) VALUES
(1, '/images/fibl/FiBl_placeholder.jpg', 'test1', 10),
(2, '/images/fibl/FiBl_placeholder.jpg', 'test2', 10),
(3, '/images/fibl/FiBl_placeholder.jpg', 'test3', 10),
(4, '/images/fibl/FiBl_placeholder.jpg', 'test4 ', 10);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `fibl`
--
ALTER TABLE `fibl`
  ADD PRIMARY KEY (`fiblid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `fibl`
--
ALTER TABLE `fibl`
  MODIFY `fiblid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
