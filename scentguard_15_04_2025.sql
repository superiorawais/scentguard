-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2025 at 07:32 AM
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
-- Database: `sg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullName` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` text NOT NULL,
  `isActive` bit(1) NOT NULL DEFAULT b'1',
  `createdDateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullName`, `email`, `pass`, `isActive`, `createdDateTime`) VALUES
(1, 'Admin', 'admin@gmail.com', '249dc4c72bbb595692fd426b8dad3675', b'1', '2025-03-05 09:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `alternatives_master`
--

CREATE TABLE `alternatives_master` (
  `AlternativeID` int(11) NOT NULL,
  `AlternativeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatives_master`
--

INSERT INTO `alternatives_master` (`AlternativeID`, `AlternativeName`) VALUES
(1, 'pure balck'),
(2, 'havoc');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients_master`
--

CREATE TABLE `ingredients_master` (
  `IngredientID` int(11) NOT NULL,
  `IngredientName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients_master`
--

INSERT INTO `ingredients_master` (`IngredientID`, `IngredientName`) VALUES
(1, 'jasmine'),
(2, 'rose'),
(3, 'alchohal');

-- --------------------------------------------------------

--
-- Table structure for table `perfumecomments`
--

CREATE TABLE `perfumecomments` (
  `CommentID` int(11) NOT NULL,
  `PerfumeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CommentText` varchar(500) NOT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perfumecomments`
--

INSERT INTO `perfumecomments` (`CommentID`, `PerfumeID`, `UserID`, `CommentText`, `CreatedAt`) VALUES
(1, 1, 1, 'test test test test test test test', '2025-03-12 12:00:20'),
(2, 1, 1, 'shan chulll', '2025-03-12 12:13:33'),
(3, 1, 1, 'im shan', '2025-03-12 12:48:49'),
(4, 1, 1, 'chul', '2025-03-12 12:49:14'),
(5, 1, 2, 'shan', '2025-03-12 12:52:13'),
(6, 1, 2, 'shan', '2025-03-12 12:53:39'),
(7, 1, 1, 'ok', '2025-03-12 13:26:58'),
(8, 1, 1, 'hakeem luka', '2025-03-29 10:56:17'),
(9, 1, 1, 'papi chulu', '2025-03-29 10:56:55'),
(10, 1, 5, 'raymondavis', '2025-04-04 16:49:53'),
(11, 6, 5, 'good i tried', '2025-04-04 16:54:46'),
(12, 1, 6, 'good one', '2025-04-04 16:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `perfumeratings`
--

CREATE TABLE `perfumeratings` (
  `RatingID` int(11) NOT NULL,
  `PerfumeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL CHECK (`Rating` between 1 and 5),
  `CreatedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perfumeratings`
--

INSERT INTO `perfumeratings` (`RatingID`, `PerfumeID`, `UserID`, `Rating`, `CreatedAt`) VALUES
(1, 1, 1, 5, '2025-03-12 12:00:09'),
(2, 1, 1, 4, '2025-03-12 12:13:40'),
(3, 1, 1, 3, '2025-03-12 13:27:02'),
(4, 1, 1, 5, '2025-03-29 10:56:21'),
(5, 1, 1, 5, '2025-03-29 10:56:25'),
(6, 1, 5, 3, '2025-04-04 16:49:41'),
(7, 6, 5, 5, '2025-04-04 16:54:49'),
(8, 1, 6, 4, '2025-04-04 16:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `perfumes`
--

CREATE TABLE `perfumes` (
  `PerfumeID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perfumes`
--

INSERT INTO `perfumes` (`PerfumeID`, `Name`, `Image`) VALUES
(1, 'havoc pure ll', '1743244700_dirham.jpg'),
(5, 'Pure Black', '1743244909_CL-Pure-Black-Intense.jpg'),
(6, 'Do It', '1743244924_doit.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `perfume_alternatives`
--

CREATE TABLE `perfume_alternatives` (
  `PerfumeID` int(11) NOT NULL,
  `AlternativeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perfume_alternatives`
--

INSERT INTO `perfume_alternatives` (`PerfumeID`, `AlternativeID`) VALUES
(1013, 1),
(1013, 2),
(1014, 1),
(1014, 2),
(1015, 2),
(1016, 1),
(1016, 2),
(1, 1),
(1, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `perfume_ingredients`
--

CREATE TABLE `perfume_ingredients` (
  `PerfumeID` int(11) NOT NULL,
  `IngredientID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perfume_ingredients`
--

INSERT INTO `perfume_ingredients` (`PerfumeID`, `IngredientID`) VALUES
(1013, 1),
(1013, 2),
(1013, 3),
(1014, 1),
(1014, 2),
(1014, 3),
(1015, 3),
(1016, 1),
(1016, 2),
(1016, 3),
(1, 1),
(1, 2),
(1, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `perfume_risks`
--

CREATE TABLE `perfume_risks` (
  `PerfumeID` int(11) NOT NULL,
  `RiskID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perfume_risks`
--

INSERT INTO `perfume_risks` (`PerfumeID`, `RiskID`) VALUES
(1013, 1),
(1013, 2),
(1014, 1),
(1014, 2),
(1015, 2),
(1016, 1),
(1016, 2),
(1, 1),
(1, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `risks_master`
--

CREATE TABLE `risks_master` (
  `RiskID` int(11) NOT NULL,
  `RiskDescription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `risks_master`
--

INSERT INTO `risks_master` (`RiskID`, `RiskDescription`) VALUES
(1, 'sneezing'),
(2, 'skin alergy'),
(7, 'flu'),
(8, 'heahache'),
(9, 'eye infect'),
(10, 'echiting');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `risks` text NOT NULL,
  `isActive` bit(1) NOT NULL DEFAULT b'1',
  `createdDateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `pass`, `dob`, `gender`, `risks`, `isActive`, `createdDateTime`, `updatedDateTime`) VALUES
(1, 'Awais23', 'Ahmad2', 'superior.awais@gmail.com', '249dc4c72bbb595692fd426b8dad3675', '2000-01-03', 'Male', '', b'1', '2025-03-12 06:55:55', '0000-00-00 00:00:00'),
(2, 'Muhammad', 'Shan', 'shan@gmail.com', '249dc4c72bbb595692fd426b8dad3675', '2002-01-01', 'Male', '', b'1', '2025-03-10 10:47:30', '0000-00-00 00:00:00'),
(4, 'Papi', 'Chulu', 'papi@chulu.com', '249dc4c72bbb595692fd426b8dad3675', '2001-01-11', 'Male', '', b'1', '2025-03-11 10:34:11', '0000-00-00 00:00:00'),
(5, 'Test', 'Test', 'test@gmail.org', '249dc4c72bbb595692fd426b8dad3675', '2002-01-01', 'Male', '2,7,8,9', b'1', '2025-04-14 09:03:48', '0000-00-00 00:00:00'),
(6, 'Muhammad', 'Shan', 'shan.muhammad@gmail.com', '249dc4c72bbb595692fd426b8dad3675', '1999-01-04', 'Male', '1,2,7,8', b'1', '2025-04-04 11:56:23', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alternatives_master`
--
ALTER TABLE `alternatives_master`
  ADD PRIMARY KEY (`AlternativeID`);

--
-- Indexes for table `ingredients_master`
--
ALTER TABLE `ingredients_master`
  ADD PRIMARY KEY (`IngredientID`);

--
-- Indexes for table `perfumecomments`
--
ALTER TABLE `perfumecomments`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `perfumeratings`
--
ALTER TABLE `perfumeratings`
  ADD PRIMARY KEY (`RatingID`);

--
-- Indexes for table `perfumes`
--
ALTER TABLE `perfumes`
  ADD PRIMARY KEY (`PerfumeID`);

--
-- Indexes for table `risks_master`
--
ALTER TABLE `risks_master`
  ADD PRIMARY KEY (`RiskID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alternatives_master`
--
ALTER TABLE `alternatives_master`
  MODIFY `AlternativeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ingredients_master`
--
ALTER TABLE `ingredients_master`
  MODIFY `IngredientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `perfumecomments`
--
ALTER TABLE `perfumecomments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `perfumeratings`
--
ALTER TABLE `perfumeratings`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `perfumes`
--
ALTER TABLE `perfumes`
  MODIFY `PerfumeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `risks_master`
--
ALTER TABLE `risks_master`
  MODIFY `RiskID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
