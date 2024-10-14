-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 08:32 PM
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
  `owner_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `name`, `type`, `size`, `deposit_cost`, `rental_cost`, `quantity`, `owner_id`) VALUES
(7, 'sadfsa', 'gown', 21.00, 234.00, 3242.00, 1, 1),
(9, 'tuxedo', 'suit', 23.00, 343.00, 212.00, 1, 1),
(12, 'black suit', 'suit', 21.00, 2342.00, 1324.00, 1, 4),
(13, 'asdf', 'suit', 21.00, 324.00, 21.00, 1, 4),
(14, 'Hikoo', 'suit', 123.00, 1234.00, 122.00, 1, 4),
(15, 'black suit', 'suit', 21.00, 32.00, 12.00, 1, 5),
(16, 'white gown', 'gown', 21.00, 123.00, 324.00, 1, 5),
(19, 'Jhon', 'gown', 21.00, 23432.00, 12312.00, 1, 1),
(20, 'sdfsd', 'gown', 21.00, 23432.00, 3300.00, 1, 1),
(22, 'Red Velvet', 'gown', 21.00, 500.00, 500.00, 1, 4);

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
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental_schedule`
--

INSERT INTO `rental_schedule` (`schedule_id`, `start_date`, `return_date`, `borrower_id`, `lender_id`, `item_id`) VALUES
(11, '2024-10-17', '2024-10-19', 1, 1, 9),
(12, '2024-10-16', '2024-10-26', 1, 4, 12),
(13, '2024-10-25', '2024-10-26', 1, 4, 12),
(14, '2024-10-16', '2024-11-01', 1, 4, 12),
(15, '2024-10-08', '2024-10-19', 1, 5, 16),
(16, '2024-10-16', '2024-10-25', 1, 5, 16),
(17, '2024-10-23', '2024-10-26', 1, 4, 12),
(18, '2024-10-18', '2024-10-25', 1, 5, 16),
(19, '2024-10-15', '2024-10-19', 1, 4, 22),
(20, '2024-10-18', '2024-10-26', 1, 4, 12),
(21, '2024-10-16', '2024-10-18', 1, 4, 14);

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
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `middle_name`, `last_name`, `email`, `username`, `password`) VALUES
(1, 'Jhon Laden', 'Bayle', 'Adjaluddin', 'jhonladen@yahoo.com', 'Jhon', '123'),
(4, 'Isaac', 'Bayle', 'Adjaluddin', 'isaac@gmail.com', 'IsaacRaddi', '123'),
(5, 'edil khan', 'bayle', 'adjaluddin', 'eidil@yahoo.com', 'Eidil', '123'),
(6, 'admin', '', 'admin', 'admin@admin.com', 'admin', 'admin');

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rental_schedule`
--
ALTER TABLE `rental_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
