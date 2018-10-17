-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Okt 2018 um 11:07
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
  `answer` varchar(50) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mucho`
--

CREATE TABLE `mucho` (
  `muchoid` int(11) NOT NULL,
  `question` varchar(80) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `pb_path` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`uid`, `uname`, `pw`, `score`, `isAdmin`, `first_name`, `last_name`, `pb_path`) VALUES
(3, 'SVRNM', '$2y$10$4CCYNywwSNckA7bm6f/lM.baQ7zNBobuAqPndwsWWIDCa0JKIBtha', NULL, 1, 'Sivakeerthan', 'Vamanarajasekaran', NULL);

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
  MODIFY `fiblid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `fipa`
--
ALTER TABLE `fipa`
  MODIFY `fipaid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `mucho`
--
ALTER TABLE `mucho`
  MODIFY `muchoid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
