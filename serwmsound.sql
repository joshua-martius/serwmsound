-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 10. Jan 2021 um 18:36
-- Server-Version: 5.7.32-0ubuntu0.18.04.1
-- PHP-Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `serwmsound`
--
CREATE DATABASE IF NOT EXISTS `serwmsound` DEFAULT CHARACTER SET utf16 COLLATE utf16_german2_ci;
USE `serwmsound`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblUpload`
--

CREATE TABLE `tblUpload` (
  `uID` varchar(32) COLLATE utf16_german2_ci NOT NULL,
  `uUploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uUploaderIP` varchar(32) COLLATE utf16_german2_ci NOT NULL,
  `uInterpret` varchar(32) COLLATE utf16_german2_ci DEFAULT NULL,
  `uName` varchar(32) COLLATE utf16_german2_ci DEFAULT NULL,
  `uHits` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_german2_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tblUpload`
--
ALTER TABLE `tblUpload`
  ADD PRIMARY KEY (`uID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
