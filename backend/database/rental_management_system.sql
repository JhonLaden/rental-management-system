-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 05:33 AM
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
-- Database: `rental_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` decimal(11,2) DEFAULT NULL,
  `deposit_cost` decimal(11,2) DEFAULT NULL,
  `rental_cost` decimal(11,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `owner_id` int(11) DEFAULT NULL,
  `in_stock` tinyint(1) DEFAULT 1,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `name`, `type`, `size`, `deposit_cost`, `rental_cost`, `quantity`, `owner_id`, `in_stock`, `is_active`) VALUES
(61, 'sdfsd34', 'suit', 234.00, 2342.00, 34.00, 1, 7, 1, 0),
(62, '3sdfsd', 'gown', 34.00, 3232.00, 324.00, 1, 7, 1, 0),
(63, 'asdf', 'gown', 34.00, 23432.00, 234.00, 1, 7, 1, 0),
(64, 'sasf', 'gown', 234.00, 324.00, 32432.00, 1, 7, 0, 1),
(65, '234', 'gown', 234.00, 234.00, 23432.00, 1, 7, 0, 1),
(66, 'Jhon', 'gown', 324.00, 32432.00, 23432.00, 1, 7, 0, 1),
(67, 'Jhon', 'gown', 32.00, 32.00, 324.00, 1, 7, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rental_schedule`
--

CREATE TABLE `rental_schedule` (
  `schedule_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `borrower_id` int(11) DEFAULT NULL,
  `lender_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental_schedule`
--

INSERT INTO `rental_schedule` (`schedule_id`, `start_date`, `return_date`, `borrower_id`, `lender_id`, `item_id`, `status`) VALUES
(32, '2024-11-28', '2024-11-30', 4, 7, 61, 'canceled'),
(33, '2024-11-29', '2024-11-30', 7, 7, 65, 'canceled'),
(34, '2024-11-30', '2024-12-01', 7, 7, 63, 'canceled'),
(35, '2024-11-29', '2024-11-30', 7, 7, 63, 'canceled'),
(36, '2024-11-28', '2024-12-01', 7, 7, 64, 'canceled'),
(37, '2024-11-28', '2024-11-30', 7, 7, 64, 'canceled'),
(38, '2024-11-28', '2024-11-23', 7, 7, 67, 'canceled'),
(39, '2024-11-29', '2024-11-30', 7, 7, 67, 'rented'),
(40, '2024-12-01', '2024-11-30', 7, 7, 67, 'pending'),
(41, '2024-11-29', '2024-11-30', 7, 7, 64, 'pending'),
(42, '2024-11-29', '2024-11-30', 7, 7, 67, 'canceled'),
(43, '2024-11-29', '2024-11-30', 7, 7, 65, 'canceled'),
(44, '2024-11-28', '2024-11-29', 7, 7, 65, 'canceled'),
(45, '2024-11-28', '2024-11-28', 7, 7, 65, 'canceled'),
(46, '2024-11-29', '2024-11-30', 7, 7, 65, 'canceled'),
(47, '2024-11-29', '2024-11-30', 7, 7, 65, 'canceled'),
(48, '2024-11-29', '2024-11-30', 7, 7, 65, 'rented'),
(49, '2024-11-29', '2024-11-30', 7, 7, 65, 'pending'),
(50, '2024-11-29', '2024-11-30', 7, 7, 65, 'pending'),
(51, '2024-11-29', '2024-11-30', 7, 7, 65, 'pending'),
(52, '2024-11-29', '2024-11-30', 7, 7, 65, 'pending'),
(53, '2024-11-28', '2024-11-29', 7, 7, 65, 'pending'),
(54, '2024-11-29', '2024-11-30', 7, 7, 65, 'pending'),
(55, '2024-11-28', '2024-11-28', 7, 7, 66, 'pending'),
(56, '2024-11-29', '2024-11-30', 7, 7, 66, 'pending'),
(57, '2024-11-30', '2024-12-01', 7, 7, 66, 'pending'),
(58, '2024-11-30', '2024-12-01', 7, 7, 66, 'pending'),
(59, '2024-11-29', '2024-11-22', 7, 7, 66, 'pending'),
(60, '2024-11-29', '2024-11-30', 7, 7, 66, 'pending'),
(61, '2024-11-29', '2024-11-30', 7, 7, 66, 'pending'),
(62, '2024-11-29', '2024-11-30', 7, 7, 67, 'pending'),
(63, '2024-11-29', '2024-11-30', 7, 7, 64, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` enum('admin','lender','client') DEFAULT 'client',
  `successful_lends` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `middle_name`, `last_name`, `email`, `username`, `password`, `type`, `successful_lends`) VALUES
(1, 'Jhon Laden', 'Bayle', 'Adjaluddin', 'jhonladen@yahoo.com', 'Jhon', '123', 'lender', 0),
(4, 'Isaac', 'Bayle', 'Adjaluddin', 'isaac@gmail.com', 'IsaacRaddi', '123', 'client', 0),
(5, 'edil khan', 'bayle', 'adjaluddin', 'eidil@yahoo.com', 'Eidil', '123', 'client', 0),
(6, 'admin', '', 'admin', 'admin@admin.com', 'admin', 'admin', 'admin', 0),
(7, 'zac', 'b', 'bandahala', 'a@yahoo.com', 'a', '1', 'lender', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_owner` (`owner_id`);

--
-- Indexes for table `rental_schedule`
--
ALTER TABLE `rental_schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `borrower_id` (`borrower_id`),
  ADD KEY `lender_id` (`lender_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `rental_schedule`
--
ALTER TABLE `rental_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_owner` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `rental_schedule`
--
ALTER TABLE `rental_schedule`
  ADD CONSTRAINT `rental_schedule_ibfk_1` FOREIGN KEY (`borrower_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `rental_schedule_ibfk_2` FOREIGN KEY (`lender_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `rental_schedule_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
