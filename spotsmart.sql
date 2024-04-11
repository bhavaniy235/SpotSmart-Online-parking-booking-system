-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 05:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotsmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted_table`
--

CREATE TABLE `accepted_table` (
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `block` varchar(1) NOT NULL,
  `selected_slot` varchar(255) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `BookingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accepted_table`
--

INSERT INTO `accepted_table` (`user_email`, `user_name`, `booking_date`, `start_time`, `end_time`, `block`, `selected_slot`, `total_price`, `customer_name`, `mobile_number`, `vehicle_number`, `BookingID`) VALUES
('user1@gmail.com', 'USER1', '2023-11-24', '05:10:00', '06:10:00', 'C', 'Slot 18', 0, 'satya', '1234567890', 'mp27kx', 12),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-22', '03:30:00', '04:30:00', 'B', 'Slot 1', 50, 'surekha', '9505073083', 'ndaoijweri', 18),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-25', '02:20:00', '03:20:00', 'C', 'Slot 11', 70, 'surekha', '8519945310', 'AP27KX', 22),
('user1@gmail.com', 'USER1', '2023-11-27', '10:50:00', '11:50:00', 'C', 'Slot 14', 0, 'satya', '1234567890', 'hjiaayewq', 37),
('satyasurekhareddymarthala@gmail.com', 'Satya', '2023-11-26', '09:00:00', '10:00:00', 'C', 'Slot 13', 0, 'satya', '9505073083', 'MP27KXZX', 39),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-28', '10:55:00', '11:55:00', 'C', 'Slot 15', 0, 'surekha', '8519945319', 'AP27KX', 40),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-29', '13:47:00', '14:47:00', 'C', 'Slot 19', 0, 'REKHA', '8519945319', 'M27D6KX', 41),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-12-01', '06:15:00', '07:15:00', 'C', 'Slot 17', 0, 'suri', '8519945319', 'M27D6KX', 42),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-29', '06:30:00', '07:30:00', 'A', 'Slot 1', 0, 'satya', '8519945310', 'M27D6KX', 44),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-30', '08:10:00', '10:09:00', 'C', 'Slot 14', 0, 'surekha', '8519945319', 'mp27kx', 46),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-30', '09:20:00', '10:20:00', 'C', 'Slot 15', 0, 'suri', '8519945310', 'hjiaayewq', 48),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-30', '09:45:00', '10:45:00', 'C', 'Slot 17', 0, 'satya', '8519945310', 'hjiaayewq', 50),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-12-01', '10:05:00', '11:05:00', 'C', 'Slot 18', 0, 'surekha', '8519945310', 'ndaoijweri', 52),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-30', '11:25:00', '12:25:00', 'B', 'Slot 18', 0, 'surekha', '8519945319', 'mkdsjlfjlero', 54),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-30', '10:48:00', '11:48:00', 'C', 'Slot 16', 0, 'surekha', '8519945319', 'mkdsjlfjlero', 55),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-30', '08:58:00', '09:58:00', 'A', '1', 0, 'surekha', '8519945310', 'AP27KX', 57),
('satyasurekhareddymarthala@gmail.com', 'Satya', '2023-11-30', '13:55:00', '14:55:00', 'D', '15', 0, 'satya', '8519945319', 'ndaoijweri', 58),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-30', '03:13:00', '04:13:00', 'C', '18', 0, 'surekha', '8519945319', 'hjiaayewq', 60),
('satyasurekhareddymarthala@gmail.com', 'Satya', '2023-11-30', '16:23:00', '17:23:00', 'C', '15', 0, 'satya', '9505073083', 'mp27kx', 62),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-12-02', '08:11:00', '10:12:00', 'D', '17', 0, 'satya', '8519945310', 'M27D6KX', 63),
('satyasurekhareddymarthala@gmail.com', 'Satya', '2023-12-01', '07:45:00', '08:45:00', 'C', '13', 0, 'surekha', '8519945319', 'AP27KX', 64),
('bhavaniy2003@gmail.com', 'bhanu', '2023-12-02', '11:45:00', '12:45:00', 'C', '1', 0, 'bhanu', '8519945310', 'mkdsjlfjlero', 67),
('kumariyelisetti2@gmail.com', 'KUMARI', '2023-12-06', '11:00:00', '12:00:00', 'C', '19', 70, 'KUMARI', '9989289240', 'MP76YT', 69),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-12-03', '23:10:00', '03:10:00', 'B', '18', 200, 'suri', '9515116836', 'mp27kx', 70),
('kumariyelisetti2@gmail.com', 'KUMARI', '2023-12-05', '03:25:00', '04:25:00', 'B', '17', 50, 'bhanu', '9989289240', 'ndaoijweri', 71),
('kumariyelisetti2@gmail.com', 'KUMARI', '2023-12-04', '02:25:00', '03:25:00', 'D', '1', 70, 'kumari', '8519945310', 'AP27KX', 72),
('kumariyelisetti2@gmail.com', 'KUMARI', '2023-12-06', '02:30:00', '03:30:00', 'C', '18', 70, 'satya', '8519945310', 'mkdsjlfjlero', 73),
('satyasurekhareddymarthala@gmail.com', 'Satya', '2023-12-04', '01:30:00', '02:30:00', 'C', '15', 70, 'suri', '9505073083', 'AP27KX', 74),
('satyasurekhareddymarthala@gmail.com', 'Satya', '2023-12-04', '12:42:00', '13:43:00', 'A', '1', 51, 'surekha', '9515116836', 'mp27kx', 75),
('satyasurekhareddymarthala@gmail.com', 'Satya', '2023-12-04', '02:50:00', '03:50:00', 'B', '17', 50, 'satya', '9505073083', 'M27D6KX', 76),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-12-14', '05:10:00', '06:10:00', 'C', '10', 70, 'surekha', '8519945319', 'M27D6KX', 77);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `EMAIL` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`EMAIL`, `PASSWORD`) VALUES
('spotsmartweb@gmail.com', 'spotsmart123');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `block` varchar(1) NOT NULL,
  `selected_slot` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `BookingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`user_email`, `user_name`, `booking_date`, `start_time`, `end_time`, `block`, `selected_slot`, `total_price`, `customer_name`, `mobile_number`, `vehicle_number`, `BookingID`) VALUES
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-12-15', '14:15:00', '15:15:00', 'A', '1', 50.00, 'surekha', '8519945319', 'M27D6KX', 79);

-- --------------------------------------------------------

--
-- Table structure for table `compliants`
--

CREATE TABLE `compliants` (
  `id` int(11) NOT NULL,
  `bookingID` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compliants`
--

INSERT INTO `compliants` (`id`, `bookingID`, `email`, `contactNumber`, `message`, `created_at`) VALUES
(11, '12', 'lakshmiessurekha@gmail.com', '8519945319', 'sauha', '2023-11-23 11:10:16'),
(12, '12', 'lakshmiessurekha@gmail.com', '8519945319', 'testing', '2023-11-24 13:24:38'),
(13, '101', 'kumariyelisetti2@gmail.com', '9989289240', 'HELLOOOO...', '2023-12-01 16:44:33'),
(14, '12', 'lakshmiessurekha@gmail.com', '8519945319', 'My slot got rejected can I know the reason??', '2023-12-15 13:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_table`
--

CREATE TABLE `rejected_table` (
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `block` varchar(1) NOT NULL,
  `selected_slot` varchar(255) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `BookingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rejected_table`
--

INSERT INTO `rejected_table` (`user_email`, `user_name`, `booking_date`, `start_time`, `end_time`, `block`, `selected_slot`, `total_price`, `customer_name`, `mobile_number`, `vehicle_number`, `BookingID`) VALUES
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-25', '2023-11-24', '2023-11-24', 'D', 'Slot 1', 70, 'satya', '8519945319', 'M27D6KX', 21),
('satyasurekhareddymarthala@gmail.com', 'Bhanu', '2023-11-25', '2023-11-24', '2023-11-24', 'B', 'Slot 6', 100, 'bhanu', '9515116836', 'AP12345', 23),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-27', '2023-11-25', '2023-11-25', 'B', 'Slot 16', 0, 'surekha', '8519945319', 'AP27KX', 38),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-29', '2023-11-27', '2023-11-27', 'C', 'Slot 19', 0, 'REKHA', '8519945319', 'M27D6KX', 41),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-29', '2023-11-28', '2023-11-28', 'D', 'Slot 14', 0, 'surekha', '8519945310', 'ndaoijweri', 43),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-29', '2023-11-28', '2023-11-28', 'B', 'Slot 1', 0, 'suri', '9505073083', 'AP27KX', 45),
('satyasurekhareddymarthala@gmail.com', 'Satya', '2023-11-30', '2023-11-29', '2023-11-29', 'C', 'Slot 19', 0, 'satya', '9505073083', 'mkdsjlfjlero', 47),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-30', '2023-12-01', '2023-12-01', 'B', 'Slot 19', 0, 'surekha', '8519945319', 'hjiaayewq', 49),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-30', '2023-12-01', '2023-12-01', 'B', 'Slot 17', 0, 'surekha', '8519945319', 'M27D6KX', 51),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-12-01', '2023-12-01', '2023-12-01', 'C', '19', 0, 'surekha', '8519945319', 'mkdsjlfjlero', 56),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-11-30', '2023-12-01', '2023-12-01', 'A', '1', 0, 'surekha', '8519945310', 'mkdsjlfjlero', 61),
('satyasurekhareddymarthala@gmail.com', 'Satya', '2023-12-04', '2023-12-01', '2023-12-01', 'D', '10', 0, 'surekha', '8519945310', 'ndaoijweri', 65),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-12-02', '2023-12-01', '2023-12-01', 'C', '1', 0, 'surekha', '1234567890', 'ndaoijweri', 66),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-12-02', '2023-12-01', '2023-12-01', 'D', '1', 70, 'surekha', '8519945319', 'mp27kx', 68),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '2023-12-15', '2023-12-14', '2023-12-14', 'A', '1', 50, 'surekha', '9505073083', 'AP27KX', 78);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(70) NOT NULL,
  `code` varchar(30) NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `phone`, `password`, `code`, `updated_time`) VALUES
('bhavaniy2003@gmail.com', 'bhanu', '8179262080', '$2y$10$Oan1utJiGKWnhzpbON6vrucvGB1tdch8mMdIJWoXVy9XxkrrKagS.', '', '2023-12-01 05:13:48'),
('kumariyelisetti2@gmail.com', 'KUMARI', '9989289240', '$2y$10$MtnUd2YQVj.Lopiw3z4HSuHzNTvam3mYUFYXTW1JW47pGCpJ.PFHy', '3R5KTWG91S', '2023-12-01 16:40:43'),
('lakshmiessurekha@gmail.com', 'Surekha Reddy', '8519945319', '$2y$10$Al1Nps4DFxRP0PsCywsLReiVdtRSx/uFgnE2zxo0fSsSQjNmCGl2y', 'DL3W2SFKQC', '2023-11-29 10:39:20'),
('satyasurekhareddymarthala@gmail.com', 'Satya', '9505073083', '$2y$10$uKiABft/kZXiiWgwrzEsauFd.9cl7g76qXmUO8ftC376su6x4TEJ6', '', '2023-11-25 02:27:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_table`
--
ALTER TABLE `accepted_table`
  ADD UNIQUE KEY `BookingID` (`BookingID`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`BookingID`);

--
-- Indexes for table `compliants`
--
ALTER TABLE `compliants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejected_table`
--
ALTER TABLE `rejected_table`
  ADD PRIMARY KEY (`BookingID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `compliants`
--
ALTER TABLE `compliants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
