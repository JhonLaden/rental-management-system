-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 07:02 AM
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
(8, 'white gown', 'gown', 21.00, 3432.00, 23423.00, 1, 1),
(9, 'tuxedo', 'suit', 23.00, 343.00, 212.00, 1, 1),
(10, 'Jhon', 'suit', 21.00, 342.00, 234.00, 1, 1),
(11, 'black suit', 'suit', 21.00, 23.00, 23.00, 1, 1),
(12, 'black suit', 'suit', 21.00, 2342.00, 1324.00, 1, 4),
(13, 'asdf', 'suit', 21.00, 324.00, 21.00, 1, 4),
(14, 'Hikoo', 'suit', 123.00, 1234.00, 122.00, 1, 4),
(15, 'black suit', 'suit', 21.00, 32.00, 12.00, 1, 5),
(16, 'white gown', 'gown', 21.00, 123.00, 324.00, 1, 5);

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
(5, 'edil khan', 'bayle', 'adjaluddin', 'eidil@yahoo.com', 'Eidil', '123');

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_owner` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
