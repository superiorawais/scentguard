-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 09:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `childbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `parentId` int(11) NOT NULL,
  `cardNumber` varchar(20) NOT NULL,
  `cardCVC` int(3) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `cardHolderName` varchar(50) DEFAULT NULL,
  `expiryDate` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `parentId`, `cardNumber`, `cardCVC`, `createdDate`, `cardHolderName`, `expiryDate`) VALUES
(5, 2, '3520222222221115', 123, '2024-09-02 10:53:55', 'Awais Ahmad', 'September 2028');

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `id` int(11) NOT NULL,
  `parentId` int(11) NOT NULL,
  `childId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`id`, `parentId`, `childId`, `status`, `createdDate`) VALUES
(1, 3, 2, 1, '2024-08-28 15:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `id` int(11) NOT NULL,
  `childId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `targetAmount` double NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `goalAmount` double NOT NULL,
  `goalPlanType` varchar(100) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`id`, `childId`, `name`, `targetAmount`, `startDate`, `endDate`, `goalAmount`, `goalPlanType`, `createdDate`, `updatedDate`) VALUES
(1, 1, 'watch', 2500, '2024-08-01', '2024-09-26', 2051, 'Daily Plan: SAR 44.64', '2024-08-29 12:44:08', '2024-05-27 12:44:08'),
(2, 1, 'Awais Ahmad', 52000, '2024-09-06', '2024-12-28', 0, 'Daily Plan: SAR 460.18', '2024-09-02 10:27:26', NULL),
(3, 1, 'test', 5000, '2024-09-03', '2024-10-12', 0, 'Daily Plan: SAR 131.58', '2024-09-03 10:16:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `orderNumber` varchar(250) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `orderNumber`, `productId`, `quantity`, `price`, `amount`, `createdDate`) VALUES
(1, 'order_66cefbb60febf', 8, 1, 125, 125, '2024-08-28 15:28:06'),
(2, 'order_66d1521b30d84', 8, 1, 125, 125, '2024-08-30 10:01:15'),
(3, 'order_66d1533dd5939', 8, 11, 5, 55, '2024-08-30 10:06:05'),
(4, 'order_66d1a1d9b4a4d', 8, 14, 5, 70, '2024-08-30 15:41:29'),
(5, 'order_66d1a1d9b4a4d', 10, 4, 25, 100, '2024-08-30 15:41:29'),
(6, 'order_66d5631b67289', 11, 3, 10, 30, '2024-09-02 12:02:51'),
(7, 'order_66d5631b67289', 8, 1, 5, 5, '2024-09-02 12:02:51'),
(8, 'order_66d57d75ae75b', 11, 1, 10, 10, '2024-09-02 13:55:17'),
(9, 'order_66d57d75ae75b', 10, 1, 25, 25, '2024-09-02 13:55:17'),
(10, 'order_66d5945ad86f5', 11, 1, 10, 10, '2024-09-02 15:32:58'),
(11, 'order_66d69617d8d35', 11, 6, 10, 60, '2024-09-03 09:52:39'),
(12, 'order_66d6b23f75bdf', 11, 5, 10, 50, '2024-09-03 11:52:47'),
(13, 'order_66d6b2616dec5', 11, 8, 10, 80, '2024-09-03 11:53:21'),
(14, 'order_66d7e3d6e4ef6', 11, 5, 10, 50, '2024-09-04 09:36:38'),
(15, 'order_66d7e5817843b', 11, 5, 10, 50, '2024-09-04 09:43:45'),
(16, 'order_66d7ee90c2f6b', 11, 3, 10, 30, '2024-09-04 10:22:24'),
(17, 'order_66d7ee90c2f6b', 8, 1, 5, 5, '2024-09-04 10:22:24'),
(18, 'order_66d7eea3141b8', 11, 3, 10, 30, '2024-09-04 10:22:43'),
(19, 'order_66d7eea3141b8', 10, 1, 25, 25, '2024-09-04 10:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `panel_user`
--

CREATE TABLE `panel_user` (
  `id` bigint(20) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `panel_user`
--

INSERT INTO `panel_user` (`id`, `name`, `user_name`, `email`, `pass`, `phone`, `status`, `created_date`, `updated_date`) VALUES
(2, 'Administrator', 'admin', 'admin@childbank.com', 'e10adc3949ba59abbe56e057f20f883e', '000000000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `image`, `status`, `createdDate`, `updatedDate`) VALUES
(8, 'Smart Watch ', 5, 'Amulated ', 'product-2.jpg', 1, '2024-08-06 16:45:20', '0000-00-00 00:00:00'),
(9, 'Smart Watch ', 15, 'Amulated ', 'product-2.jpg', 1, '2024-08-06 16:45:20', '0000-00-00 00:00:00'),
(10, 'Smart Watch ', 25, 'Amulated ', 'product-2.jpg', 1, '2024-08-06 16:45:20', '0000-00-00 00:00:00'),
(11, 'Smart Watch ', 10, 'Amulated ', 'product-2.jpg', 1, '2024-08-06 16:45:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int(11) NOT NULL,
  `goalId` int(11) NOT NULL,
  `planType` varchar(100) NOT NULL,
  `isRead` tinyint(4) NOT NULL DEFAULT 0,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `goalId`, `planType`, `isRead`, `createdDate`) VALUES
(1, 1, 'Daily Plan: SAR 44.64', 1, '2024-08-28 11:49:04'),
(3, 1, 'Daily Plan: SAR 44.64', 1, '2024-08-29 11:51:11'),
(4, 1, 'Daily Plan: SAR 44.64', 1, '2024-08-30 06:16:19'),
(5, 1, 'Daily Plan: SAR 44.64', 1, '2024-09-02 06:45:24'),
(6, 2, 'Daily Plan: SAR 460.18', 1, '2024-09-02 07:30:07'),
(7, 1, 'Daily Plan: SAR 44.64', 1, '2024-09-03 06:52:18'),
(8, 2, 'Daily Plan: SAR 460.18', 1, '2024-09-03 06:52:18'),
(10, 3, 'Daily Plan: SAR 131.58', 1, '2024-09-03 07:19:00'),
(11, 1, 'Daily Plan: SAR 44.64', 1, '2024-09-04 06:20:29'),
(12, 3, 'Daily Plan: SAR 131.58', 1, '2024-09-04 06:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `requestType` varchar(20) NOT NULL,
  `childId` int(11) NOT NULL,
  `parentId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `orderNumber` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `directPurchase` tinyint(1) NOT NULL DEFAULT 0,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `requestType`, `childId`, `parentId`, `amount`, `orderNumber`, `status`, `directPurchase`, `createdDate`) VALUES
(1, 'purchase', 1, 2, 125, 'order_66cefbb60febf', 4, 0, '2024-08-28 15:28:06'),
(2, 'money', 1, 2, 200, '', 2, 0, '2024-08-29 15:30:24'),
(3, 'money', 1, 2, 11, '', 2, 0, '2024-08-29 15:30:38'),
(4, 'money', 1, 2, 136, '', 2, 0, '2024-08-30 09:59:16'),
(5, 'purchase', 1, 2, 125, 'order_66d1521b30d84', 5, 0, '2024-08-30 10:01:15'),
(6, 'purchase', 1, 2, 55, 'order_66d1533dd5939', 4, 0, '2024-08-30 10:06:05'),
(7, 'money', 1, 2, 20, '', 2, 0, '2024-08-30 12:48:18'),
(8, 'money', 1, 2, 20, '', 2, 0, '2024-08-30 13:14:38'),
(9, 'money', 1, 2, 1, '', 2, 0, '2024-08-30 13:16:10'),
(10, 'money', 1, 2, 2, '', 2, 0, '2024-08-30 13:16:18'),
(11, 'purchase', 1, 2, 170, 'order_66d1a1d9b4a4d', 5, 0, '2024-08-30 15:41:29'),
(12, 'money', 1, 2, 1, '', 2, 0, '2024-08-30 15:44:23'),
(13, 'purchase', 1, 2, 35, 'order_66d5631b67289', 4, 1, '2024-09-02 12:02:51'),
(14, 'purchase', 1, 2, 35, 'order_66d57d75ae75b', 4, 1, '2024-09-02 13:55:17'),
(15, 'purchase', 1, 2, 10, 'order_66d5945ad86f5', 4, 1, '2024-09-02 15:32:58'),
(16, 'purchase', 1, 2, 60, 'order_66d69617d8d35', 2, 0, '2024-09-03 09:52:39'),
(17, 'purchase', 1, 2, 50, 'order_66d6b23f75bdf', 4, 1, '2024-09-03 11:52:47'),
(18, 'purchase', 1, 2, 80, 'order_66d6b2616dec5', 4, 0, '2024-09-03 11:53:21'),
(19, 'purchase', 1, 2, 50, 'order_66d7e3d6e4ef6', 4, 1, '2024-09-04 09:36:38'),
(20, 'purchase', 1, 2, 50, 'order_66d7e5817843b', 4, 1, '2024-09-04 09:43:45'),
(21, 'purchase', 1, 2, 35, 'order_66d7ee90c2f6b', 4, 1, '2024-09-04 10:22:24'),
(22, 'purchase', 1, 2, 55, 'order_66d7eea3141b8', 1, 0, '2024-09-04 10:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `transactionlog`
--

CREATE TABLE `transactionlog` (
  `id` bigint(20) NOT NULL,
  `childId` int(11) NOT NULL,
  `parentId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `transactionType` varchar(20) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactionlog`
--

INSERT INTO `transactionlog` (`id`, `childId`, `parentId`, `amount`, `transactionType`, `createdDate`) VALUES
(1, 1, 2, 50, 'Add', '2024-08-29 11:45:43'),
(2, 1, 2, 250, 'Withdraw', '2024-08-29 11:47:06'),
(3, 1, 2, 10, 'Withdraw', '2024-08-29 11:48:15'),
(4, 1, 2, 1, 'Money', '2024-09-02 11:23:18'),
(5, 1, 2, 2, 'Money', '2024-09-02 11:23:43'),
(6, 1, 2, 20, 'Request Money', '2024-09-02 11:52:24'),
(7, 1, 2, 20, 'Request Money', '2024-09-02 11:52:36'),
(8, 1, 2, 1, 'Request Money', '2024-09-02 11:52:53'),
(10, 1, 2, 50, 'Make Purchase', '2024-09-03 11:52:47'),
(11, 1, 2, 80, 'Make Purchase', '2024-09-03 11:55:01'),
(12, 1, 2, 50, 'Make Purchase', '2024-09-04 09:36:38'),
(13, 1, 2, 50, 'Make Purchase', '2024-09-04 09:43:45'),
(14, 1, 2, 35, 'Make Purchase', '2024-09-04 10:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `firstName` varchar(25) DEFAULT NULL,
  `lastName` varchar(25) DEFAULT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `userType` varchar(15) NOT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `shippingAddress` varchar(250) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `createdDate` datetime DEFAULT current_timestamp(),
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `userName`, `pass`, `dob`, `userType`, `balance`, `shippingAddress`, `status`, `createdDate`, `updatedDate`) VALUES
(1, 'Awais', 'Ahmad', '1234567890', '249dc4c72bbb595692fd426b8dad3675', '2018-02-24', 'child', 105, 'adasdasd', 1, '2024-08-28 15:24:26', NULL),
(2, 'Shan', 'Shan', '1234567891', '249dc4c72bbb595692fd426b8dad3675', '1997-01-01', 'parent', 1233900, '', 1, '2024-08-28 15:25:53', NULL),
(3, 'Awais', 'Ahmad', '1234567899', '249dc4c72bbb595692fd426b8dad3675', '2018-01-05', 'child', 0, 'Punjab Safe Citiesasdasd Authority,Qurban Police Lines,Jail Road , Lahore', 1, '2024-09-02 15:19:48', NULL),
(4, 'Awais', 'Ahmad', '3216549870', '249dc4c72bbb595692fd426b8dad3675', '2018-06-07', 'child', 0, 'edit', 1, '2024-09-02 15:29:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panel_user`
--
ALTER TABLE `panel_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactionlog`
--
ALTER TABLE `transactionlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `goal`
--
ALTER TABLE `goal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `panel_user`
--
ALTER TABLE `panel_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transactionlog`
--
ALTER TABLE `transactionlog`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
