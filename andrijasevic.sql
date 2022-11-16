-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 10:58 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andrijasevic`
--

-- --------------------------------------------------------

--
-- Table structure for table `gume`
--

CREATE TABLE `gume` (
  `id` int(11) NOT NULL,
  `naziv` varchar(20) NOT NULL,
  `dimenzija` varchar(20) NOT NULL,
  `kolicina` int(10) NOT NULL,
  `vrsta` bigint(255) NOT NULL,
  `cijena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gume`
--

INSERT INTO `gume` (`id`, `naziv`, `dimenzija`, `kolicina`, `vrsta`, `cijena`) VALUES
(5, 'Tigar', '235/55 R18 104H', 100, 1, '11.800 RSD'),
(16, 'Michelin', '195/65 R15 91T', 12, 2, '12.400 RSD'),
(30, 'Continental', '275/40 R19 105H', 4, 2, '11.700 RSD'),
(40, 'Sava', '155/65 R14 75T', 5, 1, '18.600 RSD'),
(41, 'Kleber', '235/40 R19 96V', 5, 3, '17.600 RSD'),
(42, 'GoodYear', '255/55 R18 105T', 3, 2, '12.000 RSD'),
(43, 'Dunlop', '195/50 R15 82H', 2, 2, '13.300 RSD'),
(44, 'Hankook', '205/45 R17 88V', 2, 2, '17.700 RSD'),
(45, 'GoodYear', '205/55 R16 91H', 1, 1, '10.900 RSD');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(50) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lozinka` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `username`, `email`, `lozinka`) VALUES
(1, 'a', 'a', 'a@a.co', 'a'),
(2, 'Nina Andrijasevic', 'nina', 'nina@elab.com', 'nina1'),
(3, 'ni', 'ni', 'ni@al.ck', 'aa'),
(4, 'Nikola', 'nikola', 'nikola@elab.com', 'nik'),
(5, 'Neda', 'neda', 'neda@elab.com', 'neda1');

-- --------------------------------------------------------

--
-- Table structure for table `sezona`
--

CREATE TABLE `sezona` (
  `id` bigint(255) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sezona`
--

INSERT INTO `sezona` (`id`, `naziv`) VALUES
(1, 'Ljeto'),
(2, 'Zima'),
(3, 'Za sve sezone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gume`
--
ALTER TABLE `gume`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Sezona` (`vrsta`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sezona`
--
ALTER TABLE `sezona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gume`
--
ALTER TABLE `gume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sezona`
--
ALTER TABLE `sezona`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gume`
--
ALTER TABLE `gume`
  ADD CONSTRAINT `Sezona` FOREIGN KEY (`vrsta`) REFERENCES `sezona` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
