-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 07:11 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addReservation` (IN `customerNameInput` VARCHAR(50), IN `contactInfoInput` VARCHAR(200), IN `reservationTimeInput` DATETIME, IN `numberOfGuestsInput` INT, IN `specialRequestsInput` VARCHAR(150))   BEGIN
    DECLARE customerIdVar INT;

    SELECT customerId INTO customerIdVar
    FROM Customers
    WHERE customerName = customerNameInput AND contactInfo = contactInfoInput
    LIMIT 1;

    IF customerIdVar IS NULL THEN
        INSERT INTO Customers (customerName, contactInfo)
        VALUES (customerNameInput, contactInfoInput);
        SET customerIdVar = LAST_INSERT_ID();
    END IF;

    INSERT INTO Reservations (customerId, reservationTime, numberOfGuests, specialRequests)
    VALUES (customerIdVar, reservationTimeInput, numberOfGuestsInput, specialRequestsInput);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addSpecialRequest` (IN `reservationId` INT, IN `requests` VARCHAR(200))   BEGIN
    UPDATE Reservations
    SET specialRequests = requests
    WHERE reservationId = reservationId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findReservations` (IN `customerId` INT)   BEGIN
    SELECT * FROM Reservations
    WHERE customerId = customerId;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `contactInfo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `customerName`, `contactInfo`) VALUES
(4, 'Aaron Taylor Johnson', 'ATJ8@egmail.com'),
(2, 'Brenda Espejel', '8667404531'),
(1, 'Darliza Sanchez', 'darlizasan@gmail.com'),
(5, 'Dua Lipa', '8005882300'),
(10, 'Jay Kubz', '9856552500'),
(3, 'Will neff', 'WillN@hotmail.com');

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

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `reservationTime` datetime NOT NULL,
  `numberOfGuests` int(11) NOT NULL,
  `specialRequests` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationId`, `customerId`, `reservationTime`, `numberOfGuests`, `specialRequests`) VALUES
(1, 1, '2024-12-05 19:00:00', 2, 'Window seat'),
(2, 2, '2024-12-06 18:30:00', 4, 'High chair needed'),
(3, 3, '2024-12-07 19:30:00', 5, 'Booth');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`),
  ADD UNIQUE KEY `customerId` (`customerId`),
  ADD UNIQUE KEY `customerName` (`customerName`,`contactInfo`);

--
-- Indexes for table `diningpreferences`
--
ALTER TABLE `diningpreferences`
  ADD PRIMARY KEY (`preferenceId`),
  ADD UNIQUE KEY `preferenceId` (`preferenceId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationId`),
  ADD UNIQUE KEY `reservationId` (`reservationId`),
  ADD KEY `customerId` (`customerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `diningpreferences`
--
ALTER TABLE `diningpreferences`
  MODIFY `preferenceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diningpreferences`
--
ALTER TABLE `diningpreferences`
  ADD CONSTRAINT `diningpreferences_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
