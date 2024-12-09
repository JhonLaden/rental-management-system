-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 09:01 AM
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
  `is_active` tinyint(1) DEFAULT 1,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `name`, `type`, `size`, `deposit_cost`, `rental_cost`, `quantity`, `owner_id`, `in_stock`, `is_active`, `photo`, `description`) VALUES
(61, 'sdfsd34', 'suit', 234.00, 2342.00, 34.00, 1, 7, 1, 0, '', ''),
(62, '3sdfsd', 'gown', 34.00, 3232.00, 324.00, 1, 7, 1, 0, '', ''),
(63, 'asdf', 'gown', 34.00, 23432.00, 234.00, 1, 7, 1, 0, '', ''),
(64, 'sasf', 'gown', 234.00, 324.00, 32432.00, 1, 7, 1, 0, '', ''),
(65, '234', 'gown', 234.00, 234.00, 23432.00, 1, 7, 1, 0, '', ''),
(66, 'Jhon', 'gown', 324.00, 32432.00, 23432.00, 1, 7, 1, 0, '', ''),
(67, 'Jhon', 'gown', 32.00, 32.00, 324.00, 1, 7, 1, 0, '', ''),
(68, 'another item', 'gown', 21.00, 23.00, 20.00, 1, 6, 1, 0, '', ''),
(69, 'Hikoo', 'suit', 32.00, 23.00, 43.00, 1, 6, 0, 0, '', ''),
(70, 'hgaha', 'suit', NULL, 32.00, 23.00, 0, 7, 1, 0, 'dumb&toopid.png', ''),
(71, 'White Gown', 'gown', NULL, 200.00, 250.00, 0, 7, 1, 1, 'gown1.jpeg', ''),
(72, 'black suit', 'suit', NULL, 200.00, 250.00, 0, 7, 1, 1, 'suit4.jpeg', ''),
(73, 'red suit', 'suit', NULL, 250.00, 300.00, 0, 7, 0, 1, 'suit1.jpeg', 'testing description');

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
  `status` enum('pending','rented','canceled','overdue','finished') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cost` decimal(11,2) NOT NULL DEFAULT 0.00,
  `method` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental_schedule`
--

INSERT INTO `rental_schedule` (`schedule_id`, `start_date`, `return_date`, `borrower_id`, `lender_id`, `item_id`, `status`, `created_at`, `cost`, `method`, `delivery_address`) VALUES
(82, '2024-12-09', '2024-12-19', 4, 7, 67, 'canceled', '2024-12-08 05:45:26', 3240.00, NULL, NULL),
(83, '2024-12-09', '2024-12-10', 4, 7, 64, 'finished', '2024-12-08 05:46:22', 32432.00, NULL, NULL),
(84, '2024-12-09', '2024-12-11', 4, 7, 67, 'finished', '2024-12-08 10:55:30', 648.00, NULL, NULL),
(85, '2024-12-10', '2024-12-12', 4, 6, 69, 'pending', '2024-12-08 17:33:52', 86.00, NULL, NULL),
(86, '2024-12-10', '2024-12-11', 4, 7, 70, 'canceled', '2024-12-08 21:44:03', 23.00, NULL, NULL),
(87, '2024-12-10', '2024-12-12', 4, 7, 70, 'canceled', '2024-12-08 21:49:47', 46.00, NULL, NULL),
(88, '2024-12-10', '2024-12-11', 4, 7, 73, 'canceled', '2024-12-08 23:25:03', 300.00, NULL, NULL),
(89, '2024-12-10', '2024-12-12', 4, 7, 71, 'canceled', '2024-12-09 00:21:32', 500.00, NULL, NULL),
(90, '2024-12-10', '2024-12-12', 4, 7, 73, 'canceled', '2024-12-09 00:57:12', 600.00, NULL, NULL),
(91, '2024-12-13', '2024-12-17', 4, 7, 73, 'canceled', '2024-12-09 01:23:04', 1200.00, NULL, NULL),
(92, '0000-00-00', '0000-00-00', 4, 7, 73, 'canceled', '2024-12-09 03:50:46', 0.00, 'pickup', NULL),
(93, '2024-12-10', '2024-12-11', 4, 7, 72, 'canceled', '2024-12-09 04:07:32', 250.00, 'delivery', NULL),
(94, '2024-12-09', '2024-12-10', 4, 7, 73, 'canceled', '2024-12-09 04:08:42', 300.00, 'delivery', 'Recodo '),
(95, '2024-12-09', '2024-12-10', 4, 7, 73, 'canceled', '2024-12-09 04:15:50', 720.00, 'delivery', 'Recodo'),
(96, '2024-12-09', '2024-12-11', 5, 7, 72, 'canceled', '2024-12-09 04:26:43', 870.00, 'delivery', 'Ayala'),
(97, '2024-12-09', '2024-12-10', 5, 7, 73, 'pending', '2024-12-09 05:01:21', 550.00, 'pickup', '');

--
-- Triggers `rental_schedule`
--
DELIMITER $$
CREATE TRIGGER `update_status_to_overdue` BEFORE UPDATE ON `rental_schedule` FOR EACH ROW BEGIN
    IF OLD.status = 'rented' AND NEW.return_date < CURDATE() THEN
        SET NEW.status = 'overdue';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `trigger_debug`
--

CREATE TABLE `trigger_debug` (
  `debug_message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `rental_schedule`
--
ALTER TABLE `rental_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

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
