-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 02:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `name`, `type`, `size`, `deposit_cost`, `rental_cost`, `quantity`, `owner_id`, `in_stock`, `is_active`, `photo`, `description`) VALUES
(61, 'sdfsd34', 'suit', '234.00', '2342.00', '34.00', 1, 7, 1, 0, '', ''),
(62, '3sdfsd', 'gown', '34.00', '3232.00', '324.00', 1, 7, 1, 0, '', ''),
(63, 'asdf', 'gown', '34.00', '23432.00', '234.00', 1, 7, 1, 0, '', ''),
(64, 'sasf', 'gown', '234.00', '324.00', '32432.00', 1, 7, 1, 0, '', ''),
(65, '234', 'gown', '234.00', '234.00', '23432.00', 1, 7, 1, 0, '', ''),
(66, 'Jhon', 'gown', '324.00', '32432.00', '23432.00', 1, 7, 1, 0, '', ''),
(67, 'Jhon', 'gown', '32.00', '32.00', '324.00', 1, 7, 1, 0, '', ''),
(68, 'another item', 'gown', '21.00', '23.00', '20.00', 1, 6, 1, 0, '', ''),
(69, 'Hikoo', 'suit', '32.00', '23.00', '43.00', 1, 6, 0, 0, '', ''),
(70, 'hgaha', 'suit', NULL, '32.00', '23.00', 0, 7, 1, 0, 'dumb&toopid.png', ''),
(71, 'White Gown', 'gown', '0.00', '200.00', '250.00', 0, 7, 1, 0, 'gown1.jpeg', 'asdfsdf sf sad'),
(72, 'black suit', 'suit', NULL, '200.00', '250.00', 0, 7, 1, 0, 'suit3.jpeg', 'sdaf'),
(73, 'red suit', 'suit', NULL, '250.00', '300.00', 0, 7, 1, 0, 'suit1.jpeg', 'testing description'),
(74, 'white gown', 'gown', NULL, '200.00', '300.00', 0, 7, 1, 0, 'gown1.jpeg', 'description'),
(75, 'red suit', 'suit', NULL, '200.00', '300.00', 0, 7, 1, 0, 'suit1.jpeg', 'ahaha'),
(76, 'red suit', 'suit', NULL, '300.00', '200.00', 0, 7, 1, 1, 'suit1.jpeg', 'haha'),
(77, 'white gown', 'gown', NULL, '200.00', '300.00', 0, 6, 1, 0, 'gown1.jpeg', 'haha'),
(78, 'white gown', 'gown', NULL, '200.00', '300.00', 0, 6, 1, 0, 'gown1.jpeg', 'ahaha'),
(79, 'white gown', 'gown', NULL, '200.00', '300.00', 0, 6, 1, 0, 'gown1.jpeg', 'haha'),
(80, 'white gown', 'gown', NULL, '200.00', '300.00', 0, 7, 1, 1, 'gown1.jpeg', 'Size 2'),
(81, 'Purple Gown', 'gown', NULL, '200.00', '200.00', 0, 19, 1, 1, 'gown5.jpeg', 'Introducing our stunning purple gown, a must-have for anyone looking to make a statement at their next special event. This gown boasts a luxurious, deep purple hue that radiates elegance and sophistication. Crafted from high-quality fabric, it drapes beau'),
(82, 'Cool Suit', 'suit', NULL, '300.00', '300.00', 0, 19, 1, 1, 'suit6.jpeg', '\r\nStep into style with our sleek and modern cool suit, designed for those who appreciate both comfort and sophistication. The suit features a tailored fit that flatters your figure while offering maximum mobility, making it perfect for both professional s'),
(83, 'Blue Gown', 'gown', NULL, '250.00', '300.00', 0, 19, 1, 1, 'gown6.jpeg', 'Discover the elegance of our blue gown, designed to captivate and leave a lasting impression. This gown features a rich, vibrant shade of blue that exudes both beauty and sophistication, making it the perfect choice for any formal occasion. '),
(84, 'Wedding Gown', 'gown', NULL, '100.00', '120.00', 0, 19, 1, 1, 'gown3.jpeg', 'Step into your dream wedding with our exquisite wedding gown, designed to make your special day truly unforgettable.'),
(85, 'Interview Suit', 'suit', NULL, '200.00', '400.00', 0, 19, 1, 1, 'suit3.jpeg', 'Make a lasting impression with our sophisticated interview suit, designed to exude confidence and professionalism. Crafted from high-quality fabric, this suit offers a tailored, sharp fit that ensures you look polished and ready for any important intervie'),
(86, 'Navy blue', 'suit', NULL, '600.00', '200.00', 0, 19, 1, 1, 'suit5.jpeg', 'Step into sophistication with our Navy suit, a versatile and timeless piece perfect for any occasion. The rich navy color exudes confidence, professionalism, and elegance, making it an ideal choice for business meetings, formal events, or a night out. '),
(87, 'Wife dress', 'gown', NULL, '500.00', '200.00', 0, 19, 1, 1, 'gown2.jpeg', 'Wedding dress');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` enum('unread','read') DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rental_schedule`
--

INSERT INTO `rental_schedule` (`schedule_id`, `start_date`, `return_date`, `borrower_id`, `lender_id`, `item_id`, `status`, `created_at`, `cost`, `method`, `delivery_address`) VALUES
(82, '2024-12-09', '2024-12-19', 4, 7, 67, 'canceled', '2024-12-08 05:45:26', '3240.00', NULL, NULL),
(83, '2024-12-09', '2024-12-10', 4, 7, 64, 'finished', '2024-12-08 05:46:22', '32432.00', NULL, NULL),
(84, '2024-12-09', '2024-12-11', 4, 7, 67, 'finished', '2024-12-08 10:55:30', '648.00', NULL, NULL),
(85, '2024-12-10', '2024-12-12', 4, 6, 69, 'canceled', '2024-12-08 17:33:52', '86.00', NULL, NULL),
(86, '2024-12-10', '2024-12-11', 4, 7, 70, 'canceled', '2024-12-08 21:44:03', '23.00', NULL, NULL),
(87, '2024-12-10', '2024-12-12', 4, 7, 70, 'canceled', '2024-12-08 21:49:47', '46.00', NULL, NULL),
(88, '2024-12-10', '2024-12-11', 4, 7, 73, 'canceled', '2024-12-08 23:25:03', '300.00', NULL, NULL),
(89, '2024-12-10', '2024-12-12', 4, 7, 71, 'canceled', '2024-12-09 00:21:32', '500.00', NULL, NULL),
(90, '2024-12-10', '2024-12-12', 4, 7, 73, 'canceled', '2024-12-09 00:57:12', '600.00', NULL, NULL),
(91, '2024-12-13', '2024-12-17', 4, 7, 73, 'canceled', '2024-12-09 01:23:04', '1200.00', NULL, NULL),
(92, '0000-00-00', '0000-00-00', 4, 7, 73, 'canceled', '2024-12-09 03:50:46', '0.00', 'pickup', NULL),
(93, '2024-12-10', '2024-12-11', 4, 7, 72, 'canceled', '2024-12-09 04:07:32', '250.00', 'delivery', NULL),
(94, '2024-12-09', '2024-12-10', 4, 7, 73, 'canceled', '2024-12-09 04:08:42', '300.00', 'delivery', 'Recodo '),
(95, '2024-12-09', '2024-12-10', 4, 7, 73, 'canceled', '2024-12-09 04:15:50', '720.00', 'delivery', 'Recodo'),
(96, '2024-12-09', '2024-12-11', 5, 7, 72, 'canceled', '2024-12-09 04:26:43', '870.00', 'delivery', 'Ayala'),
(97, '2024-12-09', '2024-12-10', 5, 7, 73, 'canceled', '2024-12-09 05:01:21', '550.00', 'pickup', ''),
(98, '2024-12-16', '2024-12-17', 4, 7, 76, 'overdue', '2024-12-16 09:03:33', '500.00', 'pickup', ''),
(99, '2024-12-16', '2024-12-17', 4, 6, 79, 'canceled', '2024-12-16 09:49:50', '500.00', 'pickup', ''),
(100, '2024-12-17', '2024-12-19', 4, 7, 80, 'canceled', '2024-12-16 10:06:35', '800.00', 'pickup', ''),
(101, '2024-12-17', '2024-12-19', 4, 7, 80, 'canceled', '2024-12-16 10:16:33', '800.00', 'pickup', ''),
(102, '2024-12-16', '2024-12-17', 4, 7, 80, 'canceled', '2024-12-16 10:33:33', '500.00', 'pickup', ''),
(103, '2025-01-04', '2025-01-05', 4, 7, 76, 'canceled', '2025-01-02 21:39:25', '670.00', 'delivery', 'recodo'),
(104, '2025-01-08', '2025-01-10', 4, 19, 81, 'finished', '2025-01-07 12:02:56', '770.00', 'delivery', 'Recodo'),
(105, '2025-01-10', '2025-01-13', 4, 19, 87, 'finished', '2025-01-07 12:37:27', '1270.00', 'delivery', 'Recodo Zamboang City');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `successful_lends` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `middle_name`, `last_name`, `email`, `username`, `password`, `type`, `successful_lends`, `is_active`) VALUES
(1, 'Jhon Laden', 'Bayle', 'Adjaluddin', 'jhonladen@yahoo.com', 'Jhon', 'haha', 'lender', 0, 1),
(4, 'Isaac', 'Bayle', 'Adjaluddin', 'isaac@gmail.com', 'IsaacRaddi', '123', 'client', 0, 1),
(5, 'edil khann', 'bayle', 'adjaluddin', 'eidil@yahoo.com', 'Eidil', '123', 'client', 0, 1),
(6, 'admin', '', 'admin', 'admin@admin.com', 'admin', 'admin', 'admin', 0, 1),
(7, 'zaccc', 'b', 'bandahala', 'a@yahoo.com', 'a', '1', 'lender', 0, 1),
(8, 'Isaac', '', 'Adjaluddin', 'isaacradjaluddin@gmail.com', 'sf', 'sf', 'client', 0, 1),
(9, 'lender created', '', 'Adjaluddin', 'isaacrasfsdadjaluddin@gmail.com', 'haha', 'haha', 'lender', 0, 1),
(10, 'Isaac', '', 'Adjaluddinasfd', 'isaasdfsdacradjaluddin@gmail.com', 'asdfsda', 'asfsd', 'lender', 0, 1),
(11, 'asdfsda', '', 'asfsad', 'afsadf@gmail.com', 'asfd', 'asfsad', 'lender', 0, 0),
(12, 'asdfsda', '', 'asfsad', 'afsafdsadf@gmail.com', 'asfd', 'asfsad', 'lender', 0, 0),
(13, 'Isaacasdf', '', 'Adjaluddinasdf', 'isaacradasdfsdajaluddin@gmail.com', 'asdf', 'asdf', 'lender', 0, 0),
(14, 'test lender', '', 'haah', 'haha@gmail.com', 'haha', 'haha', 'lender', 0, NULL),
(15, 'yesy', 'a', 'test', 'my@gmail.com', 'test', 'tetst', 'lender', 0, NULL),
(16, 'Isaac', 'test', 'Adjaluddin', 'aaa@gmail.com', 'thisisusername', 'ThisisMycomplex_password123', 'lender', 0, NULL),
(17, 'last test', '', 'afsd', 'aaaa@email.com', 'myusername', 'Mypassword_123', 'lender', 0, 0),
(18, 'lender test', '', 'lastname', 'lender@gmail.com', 'lender', 'Lender_123', 'lender', 0, 1),
(19, 'my first name', '', 'lender last name', 'lender2@gmail.com', 'thisisusername', 'Thisispassword_123', 'lender', 0, 1);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rental_schedule`
--
ALTER TABLE `rental_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_owner` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

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
