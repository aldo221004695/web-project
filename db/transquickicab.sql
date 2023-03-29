-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 05:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transquickicab`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `Username`, `Email`, `Phone`, `Gender`, `Password`) VALUES
(1, 'admin', 'admin@gmail.com', '0780151067', 'm', 'admin'),
(2, 'belyse', 'belyse@gmail.com', '0788921533', 'f', 'belyse');

-- --------------------------------------------------------

--
-- Table structure for table `bookcar`
--

CREATE TABLE `bookcar` (
  `id` int(11) NOT NULL,
  `clients` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `bookedTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookcar`
--

INSERT INTO `bookcar` (`id`, `clients`, `quantity`, `bookedTime`, `days`) VALUES
(1, '12', 4, '2023-03-13 21:32:10', 1),
(2, '12', 0, '2023-03-13 21:35:07', 0),
(3, '12', 2, '2023-03-13 21:40:07', 13),
(4, '12', 3, '2023-03-13 21:43:43', 1),
(5, '12', 1, '2023-03-13 21:44:10', 1),
(6, '12', 3, '2023-03-13 21:44:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `journeyId` varchar(100) NOT NULL,
  `booktime` datetime NOT NULL,
  `startime` datetime NOT NULL,
  `arrivaltime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `client`, `journeyId`, `booktime`, `startime`, `arrivaltime`) VALUES
(1, 12, 'Rusizi - Nyagatare : 10000', '2023-03-14 01:06:41', '2023-03-15 00:00:00', '2023-03-16 00:00:00'),
(2, 12, 'Kigali - Rusizi : 5000', '2023-03-14 01:21:57', '2023-03-14 00:00:00', '2023-03-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `carcategory`
--

CREATE TABLE `carcategory` (
  `id` int(11) NOT NULL,
  `CategoryTitle` varchar(100) NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carcategory`
--

INSERT INTO `carcategory` (`id`, `CategoryTitle`, `createdTime`) VALUES
(1, 'Bus', '2023-03-12 00:59:33'),
(3, 'Private', '2023-03-12 00:59:45'),
(4, 'Cabs', '2023-03-12 00:59:56'),
(5, 'MVP', '2023-03-12 01:00:03'),
(6, 'Truck', '2023-03-12 01:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `PlateNo` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `PlateNo`, `Type`, `price`, `Quantity`, `createdTime`) VALUES
(1, '4567', 'Bus', '50000', 500, '2023-03-12 01:20:58'),
(3, '5679 RWD', 'BMW', '60000', 10, '2023-03-12 00:22:25'),
(4, '1234 rwf', 'Private', '50000', 20, '2023-03-12 01:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `Username`, `Email`, `Phone`, `Location`, `Password`) VALUES
(11, 'Jolie Jolie', 'jolie@gmail.com', '07892273', 'South', '12345'),
(12, 'belyse', 'belyse@gmail.com', '0780151067', 'Kigali', '123');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `BusNo` varchar(100) NOT NULL,
  `Pasword` varchar(100) NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `Username`, `Email`, `Phone`, `Gender`, `BusNo`, `Pasword`, `createdTime`) VALUES
(2, 'Mike Ross', 'mikee@gmail.com', '0789483292', 'F', 'Private', 'admin', '2023-03-12 20:02:37'),
(3, 'Donna Pauls', 'donna@gmail.com', '0789123456', 'M', 'BMW', '373383838', '2023-03-12 19:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `journey`
--

CREATE TABLE `journey` (
  `id` int(11) NOT NULL,
  `startTravel` varchar(100) NOT NULL,
  `arrivalTravel` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journey`
--

INSERT INTO `journey` (`id`, `startTravel`, `arrivalTravel`, `Price`, `createdTime`) VALUES
(1, 'Rusizi', 'Nyagatare', 10000, '2023-03-12 02:28:13'),
(3, 'Kigali', 'Rusizi', 5000, '2023-03-12 02:23:25'),
(4, 'Muhanga', 'Nyagatare', 6000, '2023-03-12 02:23:40'),
(5, 'Kigali', 'Muhanga', 1000, '2023-03-13 23:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `Name`, `createdTime`) VALUES
(1, 'Kigali', '2023-03-12 01:43:21'),
(2, 'Muhanga', '2023-03-12 01:37:22'),
(4, 'Kamonyi', '2023-03-12 02:10:45'),
(5, 'Rusizi', '2023-03-12 02:22:54'),
(6, 'Karongi', '2023-03-12 02:23:06'),
(7, 'Nyagatare', '2023-03-12 02:23:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookcar`
--
ALTER TABLE `bookcar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carcategory`
--
ALTER TABLE `carcategory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CategoryTitle` (`CategoryTitle`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journey`
--
ALTER TABLE `journey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookcar`
--
ALTER TABLE `bookcar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carcategory`
--
ALTER TABLE `carcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `journey`
--
ALTER TABLE `journey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
