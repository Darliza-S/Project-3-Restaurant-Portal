-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 07:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_reservations`
--

-- --------------------------------------------------------

--
-- Table structure for table `diningpreferences`
--

CREATE TABLE `diningpreferences` (
  `preferenceId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `favoriteTable` varchar(35) DEFAULT NULL,
  `dietaryRestrictions` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diningpreferences`
--

INSERT INTO `diningpreferences` (`preferenceId`, `customerId`, `favoriteTable`, `dietaryRestrictions`) VALUES
(1, 1, 'Table 5', 'N/A'),
(2, 2, 'Table 3', 'Gluten-free'),
(3, 3, 'Table 12', 'N/A'),
(4, 4, 'Table 8', 'Nut allergy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diningpreferences`
--
ALTER TABLE `diningpreferences`
  ADD PRIMARY KEY (`preferenceId`),
  ADD UNIQUE KEY `preferenceId` (`preferenceId`),
  ADD KEY `customerId` (`customerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diningpreferences`
--
ALTER TABLE `diningpreferences`
  MODIFY `preferenceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diningpreferences`
--
ALTER TABLE `diningpreferences`
  ADD CONSTRAINT `diningpreferences_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;