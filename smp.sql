-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 03:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smp`
--

-- --------------------------------------------------------

--
-- Table structure for table `antaret`
--

CREATE TABLE `antaret` (
  `antariid` int(11) NOT NULL,
  `emri` varchar(50) NOT NULL,
  `mbiemri` varchar(50) NOT NULL,
  `telefoni` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `fjalekalimi` varchar(30) DEFAULT NULL,
  `roli` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antaret`
--

INSERT INTO `antaret` (`antariid`, `emri`, `mbiemri`, `telefoni`, `email`, `fjalekalimi`, `roli`) VALUES
(1, 'Rinas', 'DrenicaA', '044555878', 'rinasdrenica@gmail.com', '123456', b'1'),
(2, 'Ragip', 'Gjinovcii', '044123457', 'ragipgjinovci@probitacademy.co', '123456', b'0'),
(3, 'Leon', 'Abimi', '044999999', 'leonabimi@probitacademy.com ', '123456', b'0'),
(4, 'Kastriot', 'Bislimi', '044696999', 'kastriotb@probitacademy.com ', '123456', b'0'),
(5, 'Arian', 'Shala', '044999999', 'arianshala@probitacademy.com', '123456', b'0'),
(6, 'Marigona', 'Mazreku', '044899999', 'marigonam@gmail.com', '123456', b'0'),
(7, 'Altin', 'Bejta', '044599999', 'altinbejta@gmail.com', '123456', b'0'),
(8, 'Lum', 'Pireva', '044999999', 'lumpireva@tick-ks.com', '123456', b'0'),
(11, 'Kastriot', 'Krasniqi', '049493450', 'krasniqikastriot01@gmail.com', '12345', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `projektet`
--

CREATE TABLE `projektet` (
  `projektiid` int(11) NOT NULL,
  `emri` varchar(50) NOT NULL,
  `pershkrimi` text DEFAULT NULL,
  `datafillimit` date NOT NULL,
  `datambarimit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projektet`
--

INSERT INTO `projektet` (`projektiid`, `emri`, `pershkrimi`, `datafillimit`, `datambarimit`) VALUES
(1, 'PROBIT', 'Web faqja per probit', '2019-01-17', '2019-10-03'),
(2, 'Mini Financa', 'Projekti per menaxhimin e financave', '2019-01-17', '2021-10-03'),
(3, 'Probit Academy', 'Projekti per menaxhimin e studentave', '2020-01-17', '2022-10-03'),
(4, 'Student Project', 'Projekti per publikimin e punëve te studentave', '2019-01-17', '2022-10-03'),
(5, 'Probit Web ', 'Projekti per publikimin e informatve per shkollen ', '2016-01-17', '2017-10-03'),
(6, 'PROBIT', 'Projeket per klientat', '2019-01-17', '2021-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `punet`
--

CREATE TABLE `punet` (
  `punaid` int(11) NOT NULL,
  `antariid` int(11) NOT NULL,
  `projektiid` int(11) DEFAULT NULL,
  `data` datetime NOT NULL,
  `pershkrimi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `punet`
--

INSERT INTO `punet` (`punaid`, `antariid`, `projektiid`, `data`, `pershkrimi`) VALUES
(1, 2, 1, '2019-07-16 00:00:00', 'permirsimi i html csss'),
(3, 3, 5, '2020-10-20 00:00:00', 'Krijimi i DB'),
(4, 3, 5, '2020-10-21 00:00:00', 'Kodimi i pjeses per shtimin modifikimin dhe fshirjen e studentit'),
(5, 3, 5, '2020-10-23 00:00:00', 'Kodimi i pjeses per shtimin modifikimin dhe fshirjen e projekteve'),
(6, 3, 5, '2020-10-25 00:00:00', 'Kodimi i pjeses per shtimin modifikimin dhe fshirjen e trajnimeve'),
(7, 3, 5, '2020-10-30 00:00:00', 'Kodimi i home page per paraqitjen e shenimeve'),
(8, 4, 5, '2020-11-20 00:00:00', 'Analizimi i kerkesave te reja'),
(9, 3, 5, '2020-11-30 00:00:00', 'Kodimi i faqes per paraqitjen e projekteve per nje student'),
(10, 3, 5, '2020-12-05 00:00:00', 'Kodimi i faqes per paraqitjen e nje projekti per nje student'),
(11, 5, 1, '2019-07-17 00:00:00', 'Filtrime me jquery'),
(12, 3, 1, '2019-07-16 00:00:00', 'Formen per regjistrimin e antareve'),
(13, 1, 1, '2019-07-18 00:00:00', '                        krijimin e databazes                    '),
(14, 4, 1, '2019-07-19 00:00:00', 'permirsimi i db'),
(16, 5, 1, '2019-07-21 00:00:00', 'pyetsor per anetaret CRUD'),
(17, 5, 1, '2019-07-21 00:00:00', 'PHP funksionet per CRUD te anetaret'),
(18, 6, 1, '2019-07-16 00:00:00', 'PHP permirsime te anetaretTT'),
(19, 2, 1, '2019-07-16 00:00:00', 'permirsimi i db'),
(20, 3, 1, '2019-07-16 00:00:00', 'permirsimi i html css');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antaret`
--
ALTER TABLE `antaret`
  ADD PRIMARY KEY (`antariid`);

--
-- Indexes for table `projektet`
--
ALTER TABLE `projektet`
  ADD PRIMARY KEY (`projektiid`);

--
-- Indexes for table `punet`
--
ALTER TABLE `punet`
  ADD PRIMARY KEY (`punaid`),
  ADD KEY `antariid` (`antariid`),
  ADD KEY `projektiid` (`projektiid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antaret`
--
ALTER TABLE `antaret`
  MODIFY `antariid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `projektet`
--
ALTER TABLE `projektet`
  MODIFY `projektiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `punet`
--
ALTER TABLE `punet`
  MODIFY `punaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `punet`
--
ALTER TABLE `punet`
  ADD CONSTRAINT `punet_ibfk_1` FOREIGN KEY (`antariid`) REFERENCES `antaret` (`antariid`),
  ADD CONSTRAINT `punet_ibfk_2` FOREIGN KEY (`projektiid`) REFERENCES `projektet` (`projektiid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
