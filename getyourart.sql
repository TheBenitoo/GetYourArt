-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Feb 2021 um 00:01
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `getyourart`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `addresses`
--

CREATE TABLE `addresses` (
  `AddressID` int(11) NOT NULL,
  `Street` varchar(80) NOT NULL,
  `StreetNumber` varchar(10) NOT NULL,
  `Postcode` varchar(12) NOT NULL,
  `City` varchar(85) NOT NULL,
  `Country` varchar(60) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `addresses`
--

INSERT INTO `addresses` (`AddressID`, `Street`, `StreetNumber`, `Postcode`, `City`, `Country`, `UserID`) VALUES
(1, 'Rohdaer Weg', '30', '99098', 'Erfurt', 'Deutschland', 1),
(2, 'Rohdaer Weg', '30', '99098', 'Erfurt', 'Deutschland', 2),
(3, 'Miles Street', '2', '99099', 'Erfurt', 'Deutschland', 3),
(4, 'test', '1', '1', 'test', 'test', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Created` date NOT NULL DEFAULT current_timestamp(),
  `shipping_street` varchar(255) NOT NULL,
  `shipping_number` int(5) NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  `shipping_postcode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cart`
--

INSERT INTO `cart` (`CartID`, `UserID`, `Created`, `shipping_street`, `shipping_number`, `shipping_city`, `shipping_postcode`) VALUES
(2, 0, '2021-02-24', 'Rohdaer Weg', 30, 'Erfurt', 99098),
(3, 0, '2021-02-24', 'Rohdaer Weg', 30, 'Erfurt', 99098),
(4, 0, '2021-02-24', 'Rohdaer Weg', 30, 'Erfurt', 99098),
(5, 0, '2021-02-24', 'Rohdaer Weg', 30, 'Erfurt', 99098),
(6, 0, '2021-02-24', 'Rohdaer Weg', 30, 'Erfurt', 99098),
(7, 0, '2021-02-24', 'Rohdaer Weg', 30, 'Erfurt', 99098),
(8, 1, '2021-02-24', 'Rohdaer Weg', 30, 'Erfurt', 99098),
(9, 1, '2021-02-24', 'Rohdaer Weg', 30, 'Erfurt', 99098),
(10, 2, '2021-02-24', 'Rohdaer Weg', 30, 'Erfurt', 99098),
(11, 2, '2021-02-24', 'Rohdaer Weg', 30, 'Erfurt', 99098);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cartitems`
--

CREATE TABLE `cartitems` (
  `CartItemsID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `CartID` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Created` date NOT NULL DEFAULT current_timestamp(),
  `price` decimal(9,2) NOT NULL,
  `pricesum` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cartitems`
--

INSERT INTO `cartitems` (`CartItemsID`, `ProductID`, `CartID`, `Quantity`, `Created`, `price`, `pricesum`) VALUES
(1, 1, 0, 1, '2021-02-24', '200.00', '200.00'),
(2, 3, 0, 2, '2021-02-24', '299.00', '598.00'),
(3, 1, 0, 2, '2021-02-24', '200.00', '400.00'),
(4, 3, 0, 1, '2021-02-24', '299.00', '299.00'),
(5, 20, 0, 1, '2021-02-24', '49.00', '49.00'),
(6, 22, 0, 2, '2021-02-24', '40.00', '80.00'),
(7, 5, 0, 2, '2021-02-24', '20.00', '40.00'),
(8, 20, 0, 1, '2021-02-24', '49.00', '49.00'),
(9, 8, 0, 1, '2021-02-24', '30.00', '30.00'),
(10, 1, 10, 1, '2021-02-24', '200.00', '200.00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `payment_methods`
--

CREATE TABLE `payment_methods` (
  `PaymentID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CCNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `ProductCategory` varchar(20) DEFAULT NULL,
  `ProductDescription` varchar(400) DEFAULT NULL,
  `ImageSource` varchar(50) DEFAULT NULL,
  `ProductStock` int(11) DEFAULT NULL,
  `ProductPrice` decimal(7,2) DEFAULT NULL,
  `ProductRetail` decimal(7,2) DEFAULT NULL,
  `creator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `ProductCategory`, `ProductDescription`, `ImageSource`, `ProductStock`, `ProductPrice`, `ProductRetail`, `creator`) VALUES
(1, 'Der Schrei', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/300px-The_Scream.jpg', 10000, '200.00', '0.00', 'Peter Parker'),
(2, 'Mona Lisa', 'Artwork', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/mona_lisa.jpg', 100000, '99.00', '0.00', 'Peter Parker'),
(3, 'Eisblumen', 'Artwork', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/eisblumen.jpg', 10000, '299.00', '0.00', 'Peter Parker'),
(4, 'Berge als Frau', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop1.jpg', 100000, '40.00', '40.00', 'Lena Landhut'),
(5, 'Bunte Blume', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop2.jpg', 100000, '20.00', '20.00', 'Lena Landhut'),
(6, 'Mann mit Bart', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop3.jpg', 100000, '80.00', '80.00', 'Lena Landhut'),
(7, 'Baum im Nirgendwo', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop4.jpg', 100000, '12.00', '12.00', 'Lena Landhut'),
(8, 'Gruenes Etwas', 'Abstract', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop5.jpg', 100000, '30.00', '30.00', 'Lena Landhut'),
(9, 'Blaues Etwas', 'Abstract', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop6.jpg', 100000, '56.00', '56.00', 'Jasper Jochen'),
(10, 'Was ist das?', 'Abstract', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop7.jpg', 100000, '45.00', '45.00', 'Jasper Jochen'),
(11, 'Alter Mann', 'Abstract', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop8.jpg', 100000, '50.00', '50.00', 'Jasper Jochen'),
(12, 'Wiese', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop9.jpg', 100000, '12.00', '12.00', 'Jasper Jochen'),
(13, 'Blumen', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop10.jpg', 100000, '34.00', '34.00', 'Jasper Jochen'),
(14, 'Mann mit Hut', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop11.jpg', 100000, '76.00', '76.00', 'Sven Sieger'),
(15, 'Simba', 'Painting', 'Ein sehr Lieber und feiner Schnuff <3', '../assets/images/IMG_3429.jpg', 1, '99999.99', '99999.99', 'A Hoppe'),
(16, 'Dame', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop13.jpg', 100000, '45.00', '45.00', 'Sven Sieger'),
(17, 'Dorf', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop14.jpg', 100000, '34.00', '34.00', 'Sven Sieger'),
(18, 'Grüne Berge', 'Abstract', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop15.jpg', 100000, '24.00', '24.00', 'Peter Parker'),
(19, 'Dackel', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop16.jpg', 100000, '62.00', '62.00', 'Peter Parker'),
(20, 'Schwarzes gekrizzel', 'Abstrakt', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop17.jpg', 100000, '49.00', '49.00', 'Peter Parker'),
(21, 'Schwarze Würfel', 'Abstract', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop18.jpg', 100000, '30.00', '30.00', 'Peter Parker'),
(22, 'Berge als Frau', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop1.jpg', 1000000, '40.00', '40.00', 'Lena Landhut'),
(23, 'Bunte Blume', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop2.jpg', 100000, '20.00', '20.00', 'Lena Landhut'),
(24, 'Mann mit Bart', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop3.jpg', 100000, '80.00', '80.00', 'Lena Landhut'),
(25, 'Baum im Nirgendwo', 'Painting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', '../assets/images/Bild_Shop4.jpg', 100000, '12.00', '12.00', 'Lena Landhut'),
(26, 'Gruenes Etwas', 'Abstract', '', '../assets/images/Bild_Shop5.jpg', 100000, '30.00', '30.00', 'Lena Landhut'),
(27, 'Blaues Etwas', 'Abstract', NULL, '../assets/images/Bild_Shop6.jpg', 100000, '56.00', '56.00', 'Jasper Jochen'),
(28, 'Was ist das?', 'Abstract', NULL, '../assets/images/Bild_Shop7.jpg', 100000, '45.00', '45.00', 'Jasper Jochen'),
(29, 'Alter Mann', 'Abstract', NULL, '../assets/images/Bild_Shop8.jpg', 100000, '50.00', '50.00', 'Jasper Jochen'),
(30, 'Wiese', 'Painting', NULL, '../assets/images/Bild_Shop9.jpg', 100000, '12.00', '12.00', 'Jasper Jochen'),
(31, 'Blumen', 'Painting', NULL, '../assets/images/Bild_Shop10.jpg', 100000, '34.00', '34.00', 'Jasper Jochen'),
(32, 'Mann mit Hut', 'Painting', NULL, '../assets/images/Bild_Shop11.jpg', 100000, '76.00', '76.00', 'Sven Sieger'),
(33, 'Simba', 'Painting', NULL, '../assets/images/IMG_3429.jpg', 1, '99999.99', '99999.99', 'A Hoppe'),
(34, 'Dame', 'Painting', NULL, '../assets/images/Bild_Shop13.jpg', 100000, '45.00', '45.00', 'Sven Sieger'),
(35, 'Dorf', 'Painting', NULL, '../assets/images/Bild_Shop14.jpg', 100000, '34.00', '34.00', 'Sven Sieger'),
(36, 'Grüne Berge', 'Abstract', NULL, '../assets/images/Bild_Shop15.jpg', 100000, '24.00', '24.00', 'Peter Parker'),
(37, 'Dackel', 'Painting', NULL, '../assets/images/Bild_Shop16.jpg', 100000, '62.00', '62.00', 'Peter Parker'),
(38, 'Schwarzes gekrizzel', 'Abstrakt', NULL, '../assets/images/Bild_Shop17.jpg', 100000, '49.00', '49.00', 'Peter Parker'),
(39, 'Schwarze Würfel', 'Abstract', NULL, '../assets/images/Bild_Shop18.jpg', 100000, '30.00', '30.00', 'Peter Parker');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(256) DEFAULT NULL,
  `LastName` varchar(256) NOT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `AddressID` int(11) NOT NULL,
  `created At` timestamp NOT NULL DEFAULT '2021-02-08 12:45:01',
  `updated at` timestamp NULL DEFAULT NULL,
  `profileImage` varchar(60) NOT NULL DEFAULT '../assets/images/kuenstler.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `PASSWORD`, `Email`, `AddressID`, `created At`, `updated at`, `profileImage`) VALUES
(1, 'Benito', 'Grauel', '$2y$10$ixBco8JOdqLaDyIBF1TnL.pSd1rMzLk96JQPWfpjWJhNxEMqLjkcO', 'benitograuel@googlemail.com', 0, '2021-02-08 12:45:01', NULL, '../assets/images/kuenstler.jpeg'),
(2, 'Benito', 'Grauel', '$2y$10$7iGxqYAWiZPDug.OIfTiP.J6daFt9kPYjws7VjiLu3pgidJTc2PhS', 'benito.grauel@fh-erfurt.de', 2, '2021-02-08 12:45:01', NULL, '../assets/images/kuenstler.jpeg'),
(3, 'Milly', 'Miles', '$2y$10$GMIkSRJj1mpYjphFaxDh/eEpsm0bZimYeW7mzGjy2eDlmawsPIadO', 'milly@gmail.com', 0, '2021-02-08 12:45:01', NULL, '../assets/images/kuenstler.jpeg'),
(4, 'test', 'test', '$2y$10$v838ClO3zpnQuazQljlrcOfYXzu/.O6Ce3XxRt15G35CO0FswzMve', 'test@gmail.com', 0, '2021-02-08 12:45:01', NULL, '../assets/images/kuenstler.jpeg');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`AddressID`),
  ADD KEY `FOREIGN` (`UserID`) USING BTREE;

--
-- Indizes für die Tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indizes für die Tabelle `cartitems`
--
ALTER TABLE `cartitems`
  ADD PRIMARY KEY (`CartItemsID`);

--
-- Indizes für die Tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `FOREIGN` (`AddressID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `addresses`
--
ALTER TABLE `addresses`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `cartitems`
--
ALTER TABLE `cartitems`
  MODIFY `CartItemsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
