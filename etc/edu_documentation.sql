-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Jan 2020 um 12:30
-- Server-Version: 10.4.10-MariaDB
-- PHP-Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `edu_documentation`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `day`
--

CREATE TABLE `day` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_of_day` date NOT NULL,
  `description` varchar(400) COLLATE utf8_german2_ci NOT NULL,
  `hours` int(11) NOT NULL DEFAULT 0,
  `totalHours` int(11) NOT NULL DEFAULT 0,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, '~°ABWESEND°~'),
(2, 'Fachenglisch'),
(3, 'Wirtschafts- und Sozialkunde '),
(4, ' Netzwerktechnik'),
(5, 'IT-Systemtechnik 1 (Linux)'),
(6, 'Ferien'),
(7, 'Bewerbungstraining'),
(8, 'IT-Systemtechnik 2 (GLProgrammierung)'),
(9, 'Planung und Entwicklung (DB)'),
(10, 'IT-Systemtechnik 3 (Python | PHP | C# | C++)'),
(11, 'Fachunterricht 1 (Kernqualifikationen)'),
(12, 'Fachunterricht 2 (Kernqualifikationen)'),
(13, 'Planung und Entwicklung (PM | HTML | CSS)'),
(14, 'Fachunterricht 2 (Anwendungentwicklung)'),
(15, 'Praktikum'),
(16, 'Prüfungsvorbereitung (Doku / Präsentation)'),
(17, 'Prüfungsvorbereitung (schriftliche Prüfung)'),
(18, 'IHK Prüfung'),
(19, 'Prüfungsvorbereitung (mündliche Prüfung)');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notice_date` date NOT NULL,
  `notice` varchar(400) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(45) COLLATE utf8_german2_ci NOT NULL,
  `lastName` varchar(45) COLLATE utf8_german2_ci NOT NULL,
  `passWord` varchar(45) COLLATE utf8_german2_ci NOT NULL,
  `education_start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `passWord`, `education_start_date`) VALUES
(4, 'Frank', 'Haha', 'FrankHaha', '2020-01-15');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indizes für die Tabelle `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `day`
--
ALTER TABLE `day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT für Tabelle `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `day`
--
ALTER TABLE `day`
  ADD CONSTRAINT `day_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `day_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- Constraints der Tabelle `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
