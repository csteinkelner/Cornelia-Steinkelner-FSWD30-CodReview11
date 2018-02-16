-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Feb 2018 um 13:58
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_cornelia_steinkenler_php_car_rental`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `fk_cartype_id` int(11) DEFAULT NULL,
  `fk_status_id` int(11) DEFAULT NULL,
  `fk_location_id` int(11) DEFAULT NULL,
  `fk_office_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `car`
--

INSERT INTO `car` (`car_id`, `fk_cartype_id`, `fk_status_id`, `fk_location_id`, `fk_office_id`) VALUES
(1, 4, 2, 5, 3),
(2, 6, 1, 3, 2),
(3, 6, 2, 4, 2),
(4, 1, 1, 6, 4),
(6, 3, 1, 1, 4),
(7, 6, 1, 2, 1),
(8, 6, 1, 3, 6),
(9, 5, 1, 1, 4),
(10, 2, 2, 4, 2),
(11, 1, 1, 6, 3),
(12, 3, 1, 2, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cartype`
--

CREATE TABLE `cartype` (
  `cartype_id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cartype`
--

INSERT INTO `cartype` (`cartype_id`, `type`) VALUES
(1, 'VW Arteon'),
(2, 'VW Bus'),
(3, 'BMW 1'),
(4, 'BMW 4er'),
(5, 'Mercedes-Benz CL'),
(6, 'Mercedes-Benz GLC');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `car_location`
--

CREATE TABLE `car_location` (
  `location_id` int(11) NOT NULL,
  `location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `car_location`
--

INSERT INTO `car_location` (`location_id`, `location`) VALUES
(1, 'Margaretenstraße 108-110, 1050 Wien'),
(2, 'Kalmusweg 125, 1220 Wien'),
(3, 'Unnamed Road, 2333 Leopoldsdorf bei Wien'),
(4, 'Favoritenstraße 56, 1040 Wien'),
(5, 'Grinzinger Allee 17, 1190 Wien'),
(6, 'Mr. Alfred Bastar, Franz-Josefs-Kai 43, 1010 Wien');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `car_status`
--

CREATE TABLE `car_status` (
  `status_id` int(11) NOT NULL,
  `car_status` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `car_status`
--

INSERT INTO `car_status` (`status_id`, `car_status`) VALUES
(1, 'rented'),
(2, 'free');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(30) NOT NULL,
  `customerEmail` varchar(60) NOT NULL,
  `customerPass` varchar(255) NOT NULL,
  `fk_car_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `office`
--

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `office`
--

INSERT INTO `office` (`office_id`, `address`) VALUES
(1, 'Löwengasse 33, Landstraße Wien'),
(2, 'Favoritenstraße 56, 1040 Wien'),
(3, 'Erlaaer Str. 56A, 1230 Wien'),
(4, 'Wilhelminenstraße 112-134, 1160 Wien'),
(5, 'Lautenschlägergasse, 1110 Wien'),
(6, 'Krummbaumgasse 5, 1020 Wien');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_cartype_id` (`fk_cartype_id`),
  ADD KEY `fk_status_id` (`fk_status_id`),
  ADD KEY `fk_office_id` (`fk_office_id`),
  ADD KEY `car_ibfk_3` (`fk_location_id`);

--
-- Indizes für die Tabelle `cartype`
--
ALTER TABLE `cartype`
  ADD PRIMARY KEY (`cartype_id`);

--
-- Indizes für die Tabelle `car_location`
--
ALTER TABLE `car_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indizes für die Tabelle `car_status`
--
ALTER TABLE `car_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indizes für die Tabelle `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD UNIQUE KEY `customerEmail` (`customerEmail`),
  ADD KEY `fk_car_id` (`fk_car_id`);

--
-- Indizes für die Tabelle `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`fk_cartype_id`) REFERENCES `cartype` (`cartype_id`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`fk_status_id`) REFERENCES `car_status` (`status_id`),
  ADD CONSTRAINT `car_ibfk_3` FOREIGN KEY (`fk_location_id`) REFERENCES `car_location` (`location_id`),
  ADD CONSTRAINT `car_ibfk_4` FOREIGN KEY (`fk_office_id`) REFERENCES `office` (`office_id`);

--
-- Constraints der Tabelle `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`fk_car_id`) REFERENCES `car` (`car_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
