-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 06:15 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `aukcija`
--

CREATE TABLE `aukcija` (
  `IdAukcija` int(11) NOT NULL,
  `Ponuda` int(11) NOT NULL,
  `IdProizvod` int(11) NOT NULL,
  `IDKorisnik` int(11) NOT NULL,
  `Korisnik_Email` varchar(45) NOT NULL,
  `IdNacin_placanja` int(11) NOT NULL,
  `IdDostava` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aukcija`
--

INSERT INTO `aukcija` (`IdAukcija`, `Ponuda`, `IdProizvod`, `IDKorisnik`, `Korisnik_Email`, `IdNacin_placanja`, `IdDostava`) VALUES
(36, 1000, 1, 3, 'milorad@gmail.com', 2, 2),
(37, 1200, 2, 3, 'milorad@gmail.com', 1, 1),
(38, 2000, 3, 1, 'kosarkas94@gmail.com', 1, 1),
(41, 300, 1, 2, 'bojana.marcic@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dostava`
--

CREATE TABLE `dostava` (
  `IdDostava` int(11) NOT NULL,
  `Naziv` varchar(45) NOT NULL,
  `Opis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dostava`
--

INSERT INTO `dostava` (`IdDostava`, `Naziv`, `Opis`) VALUES
(1, 'BRZA DOSTAVA', 'DOSTAVA SE NAPLACUJE, PROIZVOD MOZETE OCEKIVATI U ROKU OD 1 DANA.'),
(2, 'EKONOMSKA', 'DOSTAVA JE BESPLATNA< PROIZVOD MOZETE OCEKIVATI U ROKU OD 3 DO 4 DANA.');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `IDKorisnik` int(11) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Ime` varchar(20) NOT NULL,
  `Prezime` varchar(45) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Korisnik_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`IDKorisnik`, `Email`, `Ime`, `Prezime`, `Password`, `Korisnik_status`) VALUES
(1, 'kosarkas94@gmail.com', 'Ivan', 'Nikolic', '$2y$10$p4yMJGZ2J0FhO0hfUkPIlu3fS314IiLQHSxpAHtxfhIcDxBl7NZFK', NULL),
(2, 'bojana.marcic@gmail.com', 'Bojana', 'Marcic', '$2y$10$HuS58T8c5EB0skY1TYO51eiqtHJnwWcEko7zYcUVJuejJ7IawfaR6', NULL),
(3, 'milorad@gmail.com', 'Milorad', 'Nikolic', '$2y$10$AsQyADD6aVh8OZrd/PO6ieFgqW7PNgwjNGvwkrMJT5S2Mp4My48EW', NULL),
(4, 'test@gmail.com', 'test', 'test', '$2y$10$J1Mr7c1GbVGjsoxxfYjkCuwS3KlEmQRSD4i0S98BJOzHMlDCQKWF6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik_status`
--

CREATE TABLE `korisnik_status` (
  `IdKorisnik_status` int(11) NOT NULL,
  `Naziv` varchar(45) NOT NULL,
  `Opis` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik_status`
--

INSERT INTO `korisnik_status` (`IdKorisnik_status`, `Naziv`, `Opis`) VALUES
(1, 'AKTIVAN', 'AKTIVAN'),
(2, 'BANOVAN', 'BANOVAN');

-- --------------------------------------------------------

--
-- Table structure for table `nacin_placanja`
--

CREATE TABLE `nacin_placanja` (
  `IdNacin_placanja` int(11) NOT NULL,
  `Naziv` varchar(45) NOT NULL,
  `Opis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nacin_placanja`
--

INSERT INTO `nacin_placanja` (`IdNacin_placanja`, `Naziv`, `Opis`) VALUES
(1, 'POUZECEM', 'PLATI PRILIKOM ISPORUKE PROIZVODA'),
(2, 'KREDITNOM KARTICOM', 'ONLINE UPLATA'),
(3, 'PREDRACUN', 'PLACANJE PREKO ZIRO RACUNA');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `IdProizvod` int(11) NOT NULL,
  `Opis` varchar(500) DEFAULT NULL,
  `Naziv` varchar(45) NOT NULL,
  `PocetnaCena` int(11) NOT NULL,
  `VremePonude` date NOT NULL,
  `VremeIstekaPonude` date NOT NULL,
  `Slika` varchar(45) DEFAULT NULL,
  `Proizvod_status` int(11) DEFAULT NULL,
  `Id_ProizvodKategorija` int(11) NOT NULL,
  `IDKorisnik` int(11) DEFAULT NULL,
  `Korisnik_Email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`IdProizvod`, `Opis`, `Naziv`, `PocetnaCena`, `VremePonude`, `VremeIstekaPonude`, `Slika`, `Proizvod_status`, `Id_ProizvodKategorija`, `IDKorisnik`, `Korisnik_Email`) VALUES
(1, 'GAMING MIS', 'RAZER MAMBA MIS', 20, '2020-10-15', '2020-10-25', 'images/RAZER.JPG', 1, 1, 1, 'kosarkas94@gmail.com'),
(2, 'Nove patike', 'Air MAX 11', 20, '2020-10-16', '2020-10-26', 'images/AIRMAX11.JPG', 1, 2, 3, 'milorad@gmail.com'),
(3, 'Porodica mirisa ETERNITY Calvin Klein je proslava ljubavi, senzualnosti, intimnosti, moći i lepote koje poseduju prirodni elementi. Lansiranje ETERNITY AIR Calvin Klein dočarava energetsku i uzbudljivu esenciju ovih ETERNITY principa u vidu blistave i smele olfaktorne verzije. Stvarajući nov i svež ETERNITY Calvin Klein potpis, muški i ženski ETERNITY AIR mirisi izražavaju sve različite nijanse akorda sky of the sky – vazdušastog ali gustog – poput laganog treptaja pulsa.\r\n\r\nModerna ženstvena in', 'CALVIN KLEIN', 1000, '2020-10-16', '2020-10-11', 'images/CALVIN.JPG', 1, 4, 1, 'kosarkas94@gmail.com'),
(4, 'Sijalica 12V', 'Sijalica H7 55W HELLA', 50, '2020-10-16', '2020-10-26', 'images/SIJALICA-HELLA-H11-55W-8GH008358-121.J', 1, 5, 2, 'bojana.marcic@gmail.com'),
(5, 'Majica na kratak rukav.', 'Super Dry Majica', 1000, '2020-10-16', '2020-10-26', 'images/IMAGE.JPG', 1, 3, 4, 'test@gmail.com'),
(6, 'Zimska guma', 'TIGAR 175/65 R14 Touring 82H', 1000, '2020-10-16', '2020-10-26', 'images/TIGAR-TOURING.JPG', 1, 5, 1, 'kosarkas94@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod_kategorija`
--

CREATE TABLE `proizvod_kategorija` (
  `IdProizvod_kategorija` int(11) NOT NULL,
  `Naziv` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proizvod_kategorija`
--

INSERT INTO `proizvod_kategorija` (`IdProizvod_kategorija`, `Naziv`) VALUES
(1, 'RACUNARI I OPREMA'),
(2, 'OBUCA'),
(3, 'ODECA'),
(4, 'KOZMETIKA'),
(5, 'MOTO I AUTO');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod_status`
--

CREATE TABLE `proizvod_status` (
  `idProizvod_status` int(11) NOT NULL,
  `Naziv` varchar(45) NOT NULL,
  `Opis` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proizvod_status`
--

INSERT INTO `proizvod_status` (`idProizvod_status`, `Naziv`, `Opis`) VALUES
(1, 'AKTIVAN', 'AKTIVAN NA AUKCIJI'),
(2, 'NEAKTIVAN', 'NEAKTIVAN NA AUKCIJI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aukcija`
--
ALTER TABLE `aukcija`
  ADD PRIMARY KEY (`IdAukcija`),
  ADD KEY `fk_aukcija_Proizvod1_idx` (`IdProizvod`),
  ADD KEY `fk_aukcija_Korisnik1_idx` (`IDKorisnik`,`Korisnik_Email`),
  ADD KEY `fk_aukcija_Nacin_placanja1_idx` (`IdNacin_placanja`),
  ADD KEY `fk_aukcija_Dostava1_idx` (`IdDostava`);

--
-- Indexes for table `dostava`
--
ALTER TABLE `dostava`
  ADD PRIMARY KEY (`IdDostava`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`IDKorisnik`,`Email`),
  ADD KEY `fk_Korisnik_Korisnik_status1_idx` (`Korisnik_status`);

--
-- Indexes for table `korisnik_status`
--
ALTER TABLE `korisnik_status`
  ADD PRIMARY KEY (`IdKorisnik_status`);

--
-- Indexes for table `nacin_placanja`
--
ALTER TABLE `nacin_placanja`
  ADD PRIMARY KEY (`IdNacin_placanja`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`IdProizvod`),
  ADD KEY `fk_Proizvod_Proizvod_status1_idx` (`Proizvod_status`),
  ADD KEY `fk_Proizvod_Proizvod_kategorija1_idx` (`Id_ProizvodKategorija`),
  ADD KEY `fk_Proizvod_Korisnik1_idx` (`IDKorisnik`,`Korisnik_Email`);

--
-- Indexes for table `proizvod_kategorija`
--
ALTER TABLE `proizvod_kategorija`
  ADD PRIMARY KEY (`IdProizvod_kategorija`);

--
-- Indexes for table `proizvod_status`
--
ALTER TABLE `proizvod_status`
  ADD PRIMARY KEY (`idProizvod_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aukcija`
--
ALTER TABLE `aukcija`
  MODIFY `IdAukcija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `dostava`
--
ALTER TABLE `dostava`
  MODIFY `IdDostava` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `IDKorisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnik_status`
--
ALTER TABLE `korisnik_status`
  MODIFY `IdKorisnik_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nacin_placanja`
--
ALTER TABLE `nacin_placanja`
  MODIFY `IdNacin_placanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `IdProizvod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proizvod_kategorija`
--
ALTER TABLE `proizvod_kategorija`
  MODIFY `IdProizvod_kategorija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proizvod_status`
--
ALTER TABLE `proizvod_status`
  MODIFY `idProizvod_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aukcija`
--
ALTER TABLE `aukcija`
  ADD CONSTRAINT `fk_aukcija_Dostava1` FOREIGN KEY (`IdDostava`) REFERENCES `dostava` (`IdDostava`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aukcija_Korisnik1` FOREIGN KEY (`IDKorisnik`,`Korisnik_Email`) REFERENCES `korisnik` (`IDKorisnik`, `Email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aukcija_Nacin_placanja1` FOREIGN KEY (`IdNacin_placanja`) REFERENCES `nacin_placanja` (`IdNacin_placanja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aukcija_Proizvod1` FOREIGN KEY (`IdProizvod`) REFERENCES `proizvod` (`IdProizvod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_Korisnik_Korisnik_status1` FOREIGN KEY (`Korisnik_status`) REFERENCES `korisnik_status` (`IdKorisnik_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `fk_Proizvod_Korisnik1` FOREIGN KEY (`IDKorisnik`,`Korisnik_Email`) REFERENCES `korisnik` (`IDKorisnik`, `Email`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Proizvod_Proizvod_kategorija1` FOREIGN KEY (`Id_ProizvodKategorija`) REFERENCES `proizvod_kategorija` (`IdProizvod_kategorija`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Proizvod_Proizvod_status1` FOREIGN KEY (`Proizvod_status`) REFERENCES `proizvod_status` (`idProizvod_status`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
