-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2021 at 07:05 PM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `csm`
--

CREATE TABLE `csm` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `grade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `csm`
--

INSERT INTO `csm` (`id`, `student_id`, `grade`) VALUES
(1, 1, 6),
(2, 1, 8),
(3, 1, 9),
(4, 2, 5),
(5, 2, 4),
(6, 2, 7),
(7, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `csmb`
--

CREATE TABLE `csmb` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `grade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `csmb`
--

INSERT INTO `csmb` (`id`, `student_id`, `grade`) VALUES
(1, 3, 8),
(2, 3, 7),
(3, 3, 5),
(4, 4, 9),
(5, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `board` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `board`) VALUES
(1, 'William', 'csm'),
(2, 'James', 'csm'),
(3, 'Evelyn', 'csmb'),
(4, 'Harper', 'csmb'),
(5, 'Jackson', ''),
(6, 'Avery', ''),
(7, 'Scarlett', ''),
(8, 'Jack', ''),
(9, 'Madison', ''),
(10, 'Ellie', ''),
(11, 'Hazel', ''),
(12, 'Carter', ''),
(13, 'Grayson', ''),
(14, 'Lincoln', ''),
(15, 'Willow', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csm`
--
ALTER TABLE `csm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `csmb`
--
ALTER TABLE `csmb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csm`
--
ALTER TABLE `csm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `csmb`
--
ALTER TABLE `csmb`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
