-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Jul 2020 um 22:05
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `fh_2020_scm4_s1810307061`
--

CREATE DATABASE IF NOT EXISTS shoppingservice;
USE shoppingservice;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `article`
--

CREATE TABLE `article` (
  `articleId` int(11) NOT NULL,
  `shoppinglistId` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `maxPrice` float NOT NULL,
  `ammount` int(11) NOT NULL,
  `creator` int(60) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `article`
--

INSERT INTO `article` (`articleId`, `shoppinglistId`, `name`, `maxPrice`, `ammount`, `creator`, `deleted`) VALUES
(27, 25, 'Äpfel 1Kg', 3, 1, 1, 0),
(28, 25, 'Birnen', 1.05, 5, 1, 1),
(29, 26, 'Eier', 1, 10, 1, 0),
(30, 26, 'Milch', 0.95, 3, 1, 0),
(31, 26, 'Brot', 2.5, 1, 1, 0),
(32, 26, 'Waschmittel', 5.99, 1, 1, 0),
(33, 27, 'Mehl', 2, 1, 1, 0),
(34, 27, 'Butter', 0.56, 2, 1, 0),
(35, 27, 'Zucker', 0.34, 3, 1, 0),
(36, 25, 'Lauch', 1.56, 2, 1, 0),
(37, 28, 'Laptop', 999, 1, 3, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `log`
--

CREATE TABLE `log` (
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ipAddress` varchar(40) NOT NULL,
  `action` varchar(60) NOT NULL,
  `user` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `log`
--

INSERT INTO `log` (`timestamp`, `ipAddress`, `action`, `user`) VALUES
('2020-07-01 15:49:12', '::1', 'Took care of list 1', '2'),
('2020-07-02 06:59:25', '::1', 'Set list to done: 1', '2'),
('2020-07-02 06:59:27', '::1', 'User logged out', '2'),
('2020-07-02 06:59:36', '::1', 'scm4 attempted login as seeker', ''),
('2020-07-02 07:05:53', '::1', 'Edited Article 17', '1'),
('2020-07-02 07:07:04', '::1', 'Added a list', '1'),
('2020-07-02 07:12:59', '::1', 'User logged out', '1'),
('2020-07-02 07:13:07', '::1', 'volunteer attempted login as seeker', ''),
('2020-07-02 07:13:46', '::1', 'Took care of list 16', '2'),
('2020-07-02 07:23:39', '::1', 'Took care of list 17', '2'),
('2020-07-02 08:36:17', '::1', 'scm4 attempted login as seeker', ''),
('2020-07-02 08:36:21', '::1', 'User logged out', '1'),
('2020-07-02 08:36:26', '::1', ' attempted login as volunteer', ''),
('2020-07-02 08:39:10', '::1', 'Set list to done: 16', '2'),
('2020-07-02 08:39:44', '::1', 'User logged out', '2'),
('2020-07-02 08:39:50', '::1', 'scm4 attempted login as seeker', ''),
('2020-07-02 11:20:50', '192.168.8.106', 'scm4 attempted login as seeker', ''),
('2020-07-02 11:22:07', '192.168.8.106', 'Added an article', '1'),
('2020-07-02 11:23:21', '192.168.8.106', 'User logged out', '1'),
('2020-07-02 11:23:32', '192.168.8.106', 'scm4 attempted login as seeker', ''),
('2020-07-02 11:24:15', '192.168.8.106', 'User logged out', '1'),
('2020-07-02 11:24:24', '192.168.8.106', 'scm4 attempted login as seeker', ''),
('2020-07-02 11:25:30', '192.168.8.106', 'scm4 attempted login as seeker', ''),
('2020-07-02 11:40:02', '192.168.8.106', 'scm4 attempted login as seeker', ''),
('2020-07-02 11:40:25', '192.168.8.106', 'scm4 attempted login as seeker', ''),
('2020-07-02 11:43:41', '192.168.8.106', 'User logged out', '2'),
('2020-07-02 11:43:55', '192.168.8.106', 'User logged out', '1'),
('2020-07-02 11:45:56', '192.168.8.106', 'User logged out', '2'),
('2020-07-02 11:47:47', '192.168.8.106', 'User logged out', '1'),
('2020-07-02 11:48:23', '::1', 'User logged out', '1'),
('2020-07-02 11:49:53', '::1', 'Set list to done: 17', '2'),
('2020-07-02 11:54:16', '::1', 'User logged out', '2'),
('2020-07-02 11:54:42', '::1', 'Took care of list 16', '2'),
('2020-07-02 11:54:43', '::1', 'User logged out', '2'),
('2020-07-02 11:55:30', '::1', 'Took care of list 17', '4'),
('2020-07-02 11:55:33', '::1', 'User logged out', '4'),
('2020-07-02 11:56:10', '::1', 'Set list to done: 16', '2'),
('2020-07-02 11:56:12', '::1', 'User logged out', '2'),
('2020-07-02 12:25:27', '::1', 'User logged out', '1'),
('2020-07-02 12:48:08', '::1', 'Edited Article 3', '1'),
('2020-07-03 07:59:03', '::1', 'User logged out', '1'),
('2020-07-03 07:59:54', '::1', 'User logged out', '2'),
('2020-07-03 08:00:25', '::1', 'Added a list', '1'),
('2020-07-03 08:01:18', '::1', 'Added a list', '1'),
('2020-07-03 08:05:38', '::1', 'Added a list', '1'),
('2020-07-03 08:08:22', '::1', 'Added a list', '1'),
('2020-07-03 08:09:23', '::1', 'Added a list', '1'),
('2020-07-03 08:10:48', '::1', 'Added a list', '1'),
('2020-07-03 08:11:35', '::1', 'Added a list', '1'),
('2020-07-03 08:12:07', '::1', 'Set list with id 23to deleted', '1'),
('2020-07-03 08:13:07', '::1', 'Added an article', '1'),
('2020-07-03 08:13:37', '::1', 'Set article with id 25to deleted', '1'),
('2020-07-03 08:13:40', '::1', 'Set list with id 22to deleted', '1'),
('2020-07-03 08:13:58', '::1', 'Added a list', '1'),
('2020-07-03 08:14:13', '::1', 'Edited Article 26', '1'),
('2020-07-03 08:14:28', '::1', 'User logged out', '1'),
('2020-07-03 08:16:13', '::1', 'Took care of list 24', '2'),
('2020-07-03 08:16:45', '::1', 'Took care of list 24', '2'),
('2020-07-03 08:17:28', '::1', 'Took care of list 24', '2'),
('2020-07-03 08:19:01', '::1', 'Set list to done: 24', '2'),
('2020-07-03 08:19:05', '::1', 'User logged out', '2'),
('2020-07-03 08:29:36', '::1', 'Set list with id 24to deleted', '1'),
('2020-07-03 08:34:08', '::1', 'User logged out', '1'),
('2020-07-03 08:35:46', '::1', 'User logged out', '1'),
('2020-07-03 08:43:52', '::1', 'Added a list', '1'),
('2020-07-03 08:44:42', '::1', 'Edited Article 27', '1'),
('2020-07-03 08:45:15', '::1', 'Added an article', '1'),
('2020-07-03 08:45:23', '::1', 'Set article with id 28to deleted', '1'),
('2020-07-03 08:54:34', '::1', 'Added a list', '1'),
('2020-07-03 08:54:43', '::1', 'User logged out', '1'),
('2020-07-03 08:55:46', '::1', 'Took care of list 26', '2'),
('2020-07-03 08:57:10', '::1', 'Set list to done: 26', '2'),
('2020-07-03 08:57:16', '::1', 'User logged out', '2'),
('2020-07-03 19:27:53', '::1', 'User logged out', '1'),
('2020-07-03 19:28:09', '::1', 'Set list with id 25to deleted', '1'),
('2020-07-03 19:28:13', '::1', 'Set list with id 26to deleted', '1'),
('2020-07-03 19:53:49', '::1', 'User logged out', '1'),
('2020-07-03 20:02:21', '::1', 'Added a list', '1'),
('2020-07-03 20:02:35', '::1', 'Edited Article 27', '1'),
('2020-07-03 20:02:49', '::1', 'Added an article', '1'),
('2020-07-03 20:03:01', '::1', 'User logged out', '1'),
('2020-07-03 20:03:32', '::1', 'Added a list', '3'),
('2020-07-03 20:03:44', '::1', 'User logged out', '3');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shoppinglist`
--

CREATE TABLE `shoppinglist` (
  `shoppinglistId` int(11) NOT NULL,
  `creator` int(40) NOT NULL,
  `completeUntil` date NOT NULL,
  `done` tinyint(1) NOT NULL,
  `totalCost` float NOT NULL,
  `volunteer` int(40) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `shoppinglist`
--

INSERT INTO `shoppinglist` (`shoppinglistId`, `creator`, `completeUntil`, `done`, `totalCost`, `volunteer`, `deleted`) VALUES
(25, 1, '2020-07-04', 0, 0, 0, 0),
(26, 1, '2020-07-15', 1, 5, 2, 1),
(27, 1, '2020-07-10', 0, 0, 0, 0),
(28, 3, '2020-07-16', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `eMail` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `isVolunteer` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userId`, `eMail`, `password`, `fname`, `lname`, `isVolunteer`, `deleted`) VALUES
(0, 'none', 'secret password that is not a hash', 'dummy', 'user', 1, 0),
(1, 'seeker', '1217550c3a2746f786f6d240d5ec8889e98662dd', 'Erwin', 'Nopp', 0, 0),
(2, 'volunteer', '1217550c3a2746f786f6d240d5ec8889e98662dd', 'Winter', 'Anita', 1, 0),
(3, 'seeker1', '1217550c3a2746f786f6d240d5ec8889e98662dd', 'Rudolf', 'Obauer', 0, 0),
(4, 'volunteer1', '1217550c3a2746f786f6d240d5ec8889e98662dd', 'Lisa', 'Andacher', 1, 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`articleId`),
  ADD KEY `fk_shoppinlistIdForArticle` (`shoppinglistId`),
  ADD KEY `fk_ArticleCreator` (`creator`);

--
-- Indizes für die Tabelle `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`timestamp`,`ipAddress`);

--
-- Indizes für die Tabelle `shoppinglist`
--
ALTER TABLE `shoppinglist`
  ADD PRIMARY KEY (`shoppinglistId`) USING BTREE,
  ADD KEY `fk_creator` (`creator`),
  ADD KEY `fk_volunteer` (`volunteer`) USING BTREE;

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `article`
--
ALTER TABLE `article`
  MODIFY `articleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT für Tabelle `shoppinglist`
--
ALTER TABLE `shoppinglist`
  MODIFY `shoppinglistId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_ArticleCreator` FOREIGN KEY (`creator`) REFERENCES `shoppinglist` (`creator`),
  ADD CONSTRAINT `fk_shoppinlistIdForArticle` FOREIGN KEY (`shoppinglistId`) REFERENCES `shoppinglist` (`shoppinglistId`);

--
-- Constraints der Tabelle `shoppinglist`
--
ALTER TABLE `shoppinglist`
  ADD CONSTRAINT `fk_creator` FOREIGN KEY (`creator`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `fk_volunteer` FOREIGN KEY (`volunteer`) REFERENCES `user` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
