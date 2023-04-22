-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 08:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turfmangementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking_id` int(11) NOT NULL,
  `From_Date` date NOT NULL,
  `To_Date` date NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Turf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration`
--

CREATE TABLE `customer_registration` (
  `Customer_id` int(11) NOT NULL,
  `Customer_name` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contact` bigint(20) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_registration`
--

INSERT INTO `customer_registration` (`Customer_id`, `Customer_name`, `Gender`, `Email`, `Address`, `Contact`, `DOB`) VALUES
(2, 'jkjkjkjk', 'female', 'jk@hm.com', 'jjjjj', 7890, '2023-04-29'),
(3, 'jaya', 'female', 'Jaya@we.com', 'wwww', 23456, '2023-04-27'),
(4, 'BNBNBN', 'male', 'BK@gh.com', 'mkmkmk', 567890, '2023-04-20'),
(5, 'vvvvv', 'female', 'vvv@hncom', 'dfghjkl', 34567890, '2023-04-20'),
(6, 'vvvvv', 'female', 'vvv@hncom', 'dfghjkl', 34567890, '2023-04-20'),
(7, 'ffff', 'male', 'ffff@hn.com', 'dfghjkl', 567890, '2023-04-27'),
(8, 'ffff', 'male', 'ffff@hn.com', 'dfghjkl', 567890, '2023-04-27'),
(9, 'ffff', 'male', 'ffff@hn.com', 'dfghjkl', 567890, '2023-04-27'),
(10, 'qwert', 'male', 'hj@hn.com', 'sdfghjk', 34567, '2023-04-21'),
(11, 'qwert', 'male', 'hj@hn.com', 'sdfghjk', 34567, '2023-04-21'),
(12, 'qwert', 'male', 'hj@hn.com', 'sdfghjk', 34567, '2023-04-21'),
(13, 'qwert', 'male', 'hj@hn.com', 'sdfghjk', 34567, '2023-04-21'),
(14, 'qwert', 'male', 'hj@hn.com', 'sdfghjk', 34567, '2023-04-21'),
(15, 'qwert', 'male', 'hj@hn.com', 'sdfghjk', 34567, '2023-04-21'),
(16, 'tttt', 'male', 'tt@we,com', 'errtyuio', 456789, '2023-04-27'),
(17, 'tttt', 'male', 'tt@we,com', 'errtyuio', 456789, '2023-04-27'),
(18, 'bbbbb', 'male', 'bb@bb.com', 'asdfghjkl;', 12345678, '2023-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feed_id` int(11) NOT NULL,
  `Message` text NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `Password`, `type`) VALUES
(2, 'jk@hm.com', 'lmlmlm', 'user'),
(3, 'Jaya@we.com', 'rrrrrrr', 'user'),
(4, 'BK@gh.com', 'bnbnbnbn', 'user'),
(5, 'vvv@hncom', 'ffffff', 'user'),
(6, 'vvv@hncom', 'ffffff', 'user'),
(7, 'ffff@hn.com', 'ssssss', 'user'),
(8, 'ffff@hn.com', 'ssssss', 'user'),
(9, 'ffff@hn.com', 'ssssss', 'user'),
(10, 'hj@hn.com', 'erty', 'user'),
(11, 'hj@hn.com', 'erty', 'user'),
(12, 'hj@hn.com', 'erty', 'user'),
(13, 'hj@hn.com', 'erty', 'user'),
(14, 'hj@hn.com', 'erty', 'user'),
(15, 'hj@hn.com', 'erty', 'user'),
(16, 'tt@we,com', 'qwertyu', 'user'),
(17, 'tt@we,com', 'qwertyu', 'user'),
(18, 'bb@bb.com', '123456', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Notification_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Notification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner_registration`
--

CREATE TABLE `owner_registration` (
  `Owner_id` int(11) NOT NULL,
  `Owner_iname` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Customer_name` int(11) NOT NULL,
  `Amound` float NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `turf`
--

CREATE TABLE `turf` (
  `Turf_id` int(11) NOT NULL,
  `Turf_name` varchar(50) NOT NULL,
  `Turf_place` varchar(50) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Amound` float NOT NULL,
  `Payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking_id`);

--
-- Indexes for table `customer_registration`
--
ALTER TABLE `customer_registration`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feed_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`Notification_id`);

--
-- Indexes for table `owner_registration`
--
ALTER TABLE `owner_registration`
  ADD PRIMARY KEY (`Owner_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_id`);

--
-- Indexes for table `turf`
--
ALTER TABLE `turf`
  ADD PRIMARY KEY (`Turf_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_registration`
--
ALTER TABLE `customer_registration`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feed_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `Notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owner_registration`
--
ALTER TABLE `owner_registration`
  MODIFY `Owner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `turf`
--
ALTER TABLE `turf`
  MODIFY `Turf_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
