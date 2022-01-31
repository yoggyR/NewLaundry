-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 03:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `bridge`
--

CREATE TABLE `bridge` (
  `pk_id_bridge` int(11) NOT NULL,
  `fk_id_packages` int(11) DEFAULT NULL,
  `fk_id_items` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bridge`
--

INSERT INTO `bridge` (`pk_id_bridge`, `fk_id_packages`, `fk_id_items`) VALUES
(334, 41, 22),
(335, 41, 23),
(336, 41, 24),
(337, 41, 25),
(338, 41, 26),
(339, 41, 27),
(340, 41, 28),
(341, 41, 29),
(342, 41, 30),
(343, 41, 31),
(344, 41, 32),
(345, 41, 33),
(346, 41, 41),
(352, 46, 22),
(353, 46, 24),
(354, 46, 25),
(355, 46, 26),
(356, 46, 27),
(357, 46, 28),
(358, 46, 29),
(359, 46, 30),
(360, 46, 32),
(361, 46, 33);

-- --------------------------------------------------------

--
-- Table structure for table `m_items`
--

CREATE TABLE `m_items` (
  `pk_id_items` int(11) NOT NULL,
  `name_item` varchar(100) NOT NULL,
  `price_per_item` decimal(10,0) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_items`
--

INSERT INTO `m_items` (`pk_id_items`, `name_item`, `price_per_item`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(22, 'Jeans', '2000', '2022-01-07', '2022-01-07', 'yoggyAdmin', 'yoggyAdmin'),
(23, 'Leather jacket', '2500', '2022-01-07', '2022-01-07', 'yoggyAdmin', 'yoggyAdmin'),
(24, 'Sweater', '1500', '2022-01-07', '2022-01-07', 'yoggyAdmin', 'yoggyAdmin'),
(25, 'Coat', '2000', '2022-01-07', '2022-01-07', 'yoggyAdmin', 'yoggyAdmin'),
(26, 'Denim jacket', '2000', '2022-01-07', '2022-01-07', 'yoggyAdmin', 'yoggyAdmin'),
(27, 'T-shirt', '1000', '2022-01-07', '2022-01-07', 'yoggyAdmin', 'yoggyAdmin'),
(28, 'Hoodies', '1500', '2022-01-07', '2022-01-07', 'yoggyAdmin', 'yoggyAdmin'),
(29, 'Bed cover', '4000', '2022-01-07', '2022-01-07', 'yoggyAdmin', 'yoggyAdmin'),
(30, 'Curtain', '4000', '2022-01-07', '2022-01-07', 'yoggyAdmin', 'yoggyAdmin'),
(31, 'Carpet', '5000', '2022-01-07', '2022-01-07', 'yoggyAdmin', 'yoggyAdmin'),
(32, 'Gown', '3000', '2022-01-07', '2022-01-07', 'yoggyAdmin', 'yoggyAdmin'),
(33, 'Wearpack', '3000', '2022-01-07', '2022-01-07', 'yoggyAdmin', 'yoggyAdmin'),
(36, 'Sneakers', '3000', '2022-01-08', '2022-01-08', 'yoggyAdmin', 'yoggyAdmin'),
(37, 'Boots', '4000', '2022-01-08', '2022-01-08', 'yoggyAdmin', 'yoggyAdmin'),
(38, 'Pantofel', '3000', '2022-01-08', '2022-01-08', 'yoggyAdmin', 'yoggyAdmin'),
(39, 'Half face helmet', '5000', '2022-01-08', '2022-01-08', 'yoggyAdmin', 'yoggyAdmin'),
(40, 'Full face helmet', '8000', '2022-01-08', '2022-01-08', 'yoggyAdmin', 'yoggyAdmin'),
(41, 'Blanket', '2500', '2022-01-08', '2022-01-08', 'yoggyAdmin', 'yoggyAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `m_packages`
--

CREATE TABLE `m_packages` (
  `pk_id_packages` int(11) NOT NULL,
  `name_package` varchar(100) NOT NULL,
  `package_price` decimal(10,0) NOT NULL,
  `processing_time` int(11) NOT NULL,
  `min_weight` float NOT NULL,
  `max_weight` float NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_packages`
--

INSERT INTO `m_packages` (`pk_id_packages`, `name_package`, `package_price`, `processing_time`, `min_weight`, `max_weight`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(41, 'Regular', '5000', 5, 1, 50, '2022-01-21', '2022-01-23', 'yoggyAdmin', 'yoggyAdmin'),
(46, 'Iron', '2000', 2, 1, 20, '2022-01-27', '2022-01-27', 'yoggyAdmin', 'yoggyAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `m_positions`
--

CREATE TABLE `m_positions` (
  `pk_id_positions` int(11) NOT NULL,
  `position_name` varchar(100) NOT NULL,
  `status` enum('Employee','Client') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_positions`
--

INSERT INTO `m_positions` (`pk_id_positions`, `position_name`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Admin', 'Employee', '2022-01-01 17:00:00', '2022-01-07 01:27:00', 'Yoggy Rachmawan', 'Yoggy Rachmawan'),
(5, 'Cashier', 'Employee', '2022-01-03 04:14:16', '2022-01-03 04:14:58', 'Yoggy Rachmawan', 'Yoggy Rachmawan'),
(7, 'Customer', 'Client', '2022-01-14 01:54:10', '2022-01-14 06:30:21', 'Yoggy Rachmawan', 'Yoggy Rachmawan');

-- --------------------------------------------------------

--
-- Table structure for table `m_users`
--

CREATE TABLE `m_users` (
  `pk_id_users` int(11) NOT NULL,
  `fk_id_positions` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `place_of_brith` varchar(100) DEFAULT NULL,
  `date_of_brith` date DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_users`
--

INSERT INTO `m_users` (`pk_id_users`, `fk_id_positions`, `username`, `place_of_brith`, `date_of_brith`, `gender`, `phone_number`, `email`, `address`, `password`, `photo`, `created_at`, `updated_at`, `created_by`, `updated_by`, `full_name`) VALUES
(45, 1, 'yoggyAdmin', 'Prabumulih', '1997-01-10', 'Male', '0895801121100', 'yoggyrachmawan12@gmail.com', 'Jl. Mekar Sari,  No.105, Kota Prabumulih', '41e19649a3f5880d37e85b3eeca6593e268c0741973524a51ffa2dfb9d3cb1be', 'FOTO.jpg', '2022-01-06', '2022-01-07', 'yoggyAdmin', 'yoggyAdmin', 'Yoggy Rachmawan'),
(48, 5, 'JhonC', 'Bekasi', '1993-06-16', 'Male', '082371658471 ', 'wagimanjhon@gmail.com', 'Jl. Kebenaran, No.17, Kota Bekasi', 'b05c795b89f37b931a14d46065daa20e7111af18560e03002235257367952406', '4. IJAZAH_Yoggy Rachmawan.jpg', '2022-01-06', '2022-01-06', 'yoggyAdmin', 'yoggyAdmin', 'Jhon Wagiman'),
(49, 5, 'CepuC', 'Pati', '1990-10-30', 'Male', '0812546371261', 'koecepu@gmail.com', 'Jl. Ahha, No.10, Kota Pati', '36507bcacc810c57dd2e95eff39c34515ab32d32ddd0d27017c3b8533a2c4d64', 'FB_IMG_1597613277071.jpg', '2022-01-06', '2022-01-06', 'yoggyAdmin', 'yoggyAdmin', 'Cepu Koe'),
(55, 7, NULL, NULL, NULL, 'Male', '0871645241896', NULL, 'Jl. Bukit, No.102, Kota Lumpur', NULL, NULL, '2022-01-14', '2022-01-14', 'yoggyAdmin', 'yoggyAdmin', 'Akmal'),
(56, 7, NULL, NULL, NULL, 'Female', '0871645329181', NULL, 'Jl. cacam, No.17, Kota Hanoi', NULL, NULL, '2022-01-14', '2022-01-14', 'yoggyAdmin', 'yoggyAdmin', 'Aling'),
(66, 5, 'RobinCashier', 'London', '1994-09-21', 'Male', '0891746512436', 'robinrobson@gmail.com', 'Jl. arsenal, No.45, Kota London', '287782ef42356ef3d6551590f1ef0117b71d876df0f9b3eb58d088864770c74c', 'erik-lucatero-d2MSDujJl2g-unsplash.jpg', '2022-01-14', '2022-01-27', 'yoggyAdmin', 'RobinCashier', 'Robin Robson'),
(69, 7, NULL, NULL, NULL, 'Male', '0895801121100', NULL, 'Jl. Mekar Sari, No.105, RT/RW 003/004, Kel. Majasari, Kec. Prabumulih Selatan, Kota Prabumulih', NULL, NULL, '2022-01-15', '2022-01-25', 'yoggyAdmin', 'yoggyAdmin', 'Yoggy Rachmawan'),
(70, 7, NULL, NULL, NULL, 'Female', '071648361721', NULL, 'Jl. Queen, No.111, RT/RW 001/009, Kel. King, Kec. Prince, Kota Zombie ', NULL, NULL, '2022-01-27', '2022-01-27', 'RobinCashier', 'RobinCashier', 'Tina');

-- --------------------------------------------------------

--
-- Table structure for table `t_details`
--

CREATE TABLE `t_details` (
  `pk_id_details` int(11) NOT NULL,
  `fk_id_header` int(11) NOT NULL,
  `fk_id_bridge` int(11) NOT NULL,
  `units` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_details`
--

INSERT INTO `t_details` (`pk_id_details`, `fk_id_header`, `fk_id_bridge`, `units`) VALUES
(2291, 266, 352, 1),
(2292, 266, 353, 0),
(2293, 266, 354, 0),
(2294, 266, 355, 0),
(2295, 266, 356, 0),
(2296, 266, 357, 0),
(2297, 266, 358, 0),
(2298, 266, 359, 0),
(2299, 266, 360, 0),
(2300, 266, 361, 0),
(2301, 267, 352, 0),
(2302, 267, 353, 0),
(2303, 267, 354, 0),
(2304, 267, 355, 0),
(2305, 267, 356, 0),
(2306, 267, 357, 0),
(2307, 267, 358, 0),
(2308, 267, 359, 0),
(2309, 267, 360, 0),
(2310, 267, 361, 0),
(2311, 268, 352, 1),
(2312, 268, 353, 0),
(2313, 268, 354, 0),
(2314, 268, 355, 0),
(2315, 268, 356, 0),
(2316, 268, 357, 0),
(2317, 268, 358, 0),
(2318, 268, 359, 0),
(2319, 268, 360, 0),
(2320, 268, 361, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_header`
--

CREATE TABLE `t_header` (
  `pk_id_header` int(11) NOT NULL,
  `fk_id_packages` int(11) NOT NULL,
  `fk_id_users` int(11) NOT NULL,
  `transaction_code` varchar(100) NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  `date_order` date NOT NULL,
  `date_estimate` date NOT NULL,
  `date_finished` date NOT NULL,
  `weight` float DEFAULT NULL,
  `laundry_status` enum('On process','Finished','Taken') DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `already` decimal(10,0) DEFAULT NULL,
  `remainder` decimal(10,0) DEFAULT NULL,
  `pay_now` decimal(10,0) DEFAULT NULL,
  `date_laundry_status` date DEFAULT NULL,
  `created_at_header` date NOT NULL,
  `updated_at_header` date NOT NULL,
  `created_by_header` varchar(100) NOT NULL,
  `updated_by_header` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_header`
--

INSERT INTO `t_header` (`pk_id_header`, `fk_id_packages`, `fk_id_users`, `transaction_code`, `note`, `date_order`, `date_estimate`, `date_finished`, `weight`, `laundry_status`, `price`, `already`, `remainder`, `pay_now`, `date_laundry_status`, `created_at_header`, `updated_at_header`, `created_by_header`, `updated_by_header`) VALUES
(266, 46, 69, 'LNY-210080', '', '2022-01-31', '2022-02-02', '2022-01-31', 1, 'Taken', '6000', '6000', '0', '3000', '2022-01-31', '2022-01-31', '2022-01-31', 'CepuC', 'CepuC'),
(267, 46, 70, 'LNY-728551', '', '2022-01-31', '2022-02-02', '2022-01-31', 1, 'On process', '2000', '1000', '1000', '1000', '2022-01-31', '2022-01-31', '2022-01-31', 'CepuC', 'CepuC'),
(268, 46, 56, 'LNY-603628', '', '2022-01-31', '2022-02-02', '2022-01-31', 0, 'Finished', '4000', '4000', '0', '4000', '2022-01-31', '2022-01-31', '2022-01-31', 'CepuC', 'CepuC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bridge`
--
ALTER TABLE `bridge`
  ADD PRIMARY KEY (`pk_id_bridge`),
  ADD KEY `bridge_ibfk_2` (`fk_id_items`),
  ADD KEY `bridge_ibfk_3` (`fk_id_packages`);

--
-- Indexes for table `m_items`
--
ALTER TABLE `m_items`
  ADD PRIMARY KEY (`pk_id_items`);

--
-- Indexes for table `m_packages`
--
ALTER TABLE `m_packages`
  ADD PRIMARY KEY (`pk_id_packages`);

--
-- Indexes for table `m_positions`
--
ALTER TABLE `m_positions`
  ADD PRIMARY KEY (`pk_id_positions`);

--
-- Indexes for table `m_users`
--
ALTER TABLE `m_users`
  ADD PRIMARY KEY (`pk_id_users`),
  ADD KEY `m_users_FK` (`fk_id_positions`);

--
-- Indexes for table `t_details`
--
ALTER TABLE `t_details`
  ADD PRIMARY KEY (`pk_id_details`),
  ADD KEY `fk_id_header` (`fk_id_header`),
  ADD KEY `fk_id_bridge` (`fk_id_bridge`);

--
-- Indexes for table `t_header`
--
ALTER TABLE `t_header`
  ADD PRIMARY KEY (`pk_id_header`),
  ADD KEY `fk_id_users` (`fk_id_users`),
  ADD KEY `fk_id_packages` (`fk_id_packages`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bridge`
--
ALTER TABLE `bridge`
  MODIFY `pk_id_bridge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT for table `m_items`
--
ALTER TABLE `m_items`
  MODIFY `pk_id_items` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `m_packages`
--
ALTER TABLE `m_packages`
  MODIFY `pk_id_packages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `m_positions`
--
ALTER TABLE `m_positions`
  MODIFY `pk_id_positions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_users`
--
ALTER TABLE `m_users`
  MODIFY `pk_id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `t_details`
--
ALTER TABLE `t_details`
  MODIFY `pk_id_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2321;

--
-- AUTO_INCREMENT for table `t_header`
--
ALTER TABLE `t_header`
  MODIFY `pk_id_header` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bridge`
--
ALTER TABLE `bridge`
  ADD CONSTRAINT `bridge_ibfk_2` FOREIGN KEY (`fk_id_items`) REFERENCES `m_items` (`pk_id_items`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `bridge_ibfk_3` FOREIGN KEY (`fk_id_packages`) REFERENCES `m_packages` (`pk_id_packages`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `m_users`
--
ALTER TABLE `m_users`
  ADD CONSTRAINT `m_users_FK` FOREIGN KEY (`fk_id_positions`) REFERENCES `m_positions` (`pk_id_positions`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t_details`
--
ALTER TABLE `t_details`
  ADD CONSTRAINT `t_details_ibfk_1` FOREIGN KEY (`fk_id_header`) REFERENCES `t_header` (`pk_id_header`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_details_ibfk_2` FOREIGN KEY (`fk_id_bridge`) REFERENCES `bridge` (`pk_id_bridge`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t_header`
--
ALTER TABLE `t_header`
  ADD CONSTRAINT `t_header_ibfk_2` FOREIGN KEY (`fk_id_users`) REFERENCES `m_users` (`pk_id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_header_ibfk_3` FOREIGN KEY (`fk_id_packages`) REFERENCES `m_packages` (`pk_id_packages`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
