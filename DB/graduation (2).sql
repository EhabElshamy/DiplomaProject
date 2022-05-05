-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 02:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graduation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `stage_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `stage_code`) VALUES
(4, 'class 1 ', 'KG1'),
(5, 'Class 1', 'KG2'),
(6, 'Class 1', 'PM1'),
(7, 'Class 1', 'PM2'),
(8, 'Class 1', 'PM3'),
(9, 'Class 1', 'PM4'),
(10, 'Class 1', 'PM5'),
(11, 'Class 1', 'PM6'),
(12, 'Class 1', 'PP1'),
(13, 'Class 1', 'PP2'),
(14, 'Class 1', 'PP3'),
(15, 'Class 1', 'SC1'),
(16, 'Class 1', 'SC2'),
(17, 'Class 1', 'SC3'),
(19, 'Class 2 ', 'KG1'),
(20, 'Class 2', 'KG2'),
(21, 'Class 2', 'SC2'),
(22, 'Class 3 ', 'PM5'),
(23, 'Class 3 ', 'KG1');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `stage` varchar(25) NOT NULL,
  `level` varchar(15) NOT NULL,
  `class` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `stage`, `level`, `class`) VALUES
(2, 'Arabic Level 1 ', 'Native Arabic for begginers', 'Primary', 'One', 'class 1'),
(4, 'English', 'Basic English', 'Primary', 'One', ''),
(5, 'Math', 'Basic Math one ', 'Kindergarden', 'One', '');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `name`, `level`, `code`) VALUES
(1, 'Kindergarden', 'one', 'KG1'),
(2, 'Kindergarden', 'two', 'KG2'),
(3, 'Primary', 'one', 'PM1'),
(4, 'Primary', 'two', 'PM2'),
(5, 'Primary', 'three', 'PM3'),
(6, 'Primary', 'four', 'PM4'),
(7, 'Primary', 'five', 'PM5'),
(8, 'Primary', 'six', 'PM6'),
(9, 'Preparatory', 'one', 'PP1'),
(10, 'Preparatory', 'two', 'PP2'),
(11, 'Preparatory', 'three', 'PP3'),
(12, 'Secondary', 'one', 'SC1'),
(13, 'Secondary', 'two', 'SC2'),
(14, 'Secondary', 'three', 'SC3');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `guardian_name` varchar(100) NOT NULL,
  `guardian_phone` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `stage` varchar(25) NOT NULL,
  `level` varchar(10) NOT NULL,
  `class` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `guardian_name`, `guardian_phone`, `birthdate`, `stage`, `level`, `class`) VALUES
(10, 'Ehab', 'Mohamed', 1141513524, '1996-02-06', 'Secondary', 'two', ''),
(11, 'esmail', 'mohamed ', 1027857131, '1996-10-02', 'Kindergarden', 'One', '');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `qualifications` varchar(100) NOT NULL,
  `stage` varchar(20) NOT NULL,
  `level` varchar(15) NOT NULL,
  `class` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `phone`, `birthdate`, `qualifications`, `stage`, `level`, `class`) VALUES
(2, 'Ehab Mohamed ', 1141513524, '1996-07-12', 'Bachelor', 'Kindergarden', 'One', 'Class 2'),
(3, 'Esmail ', 114225423, '1996-10-26', 'Master', 'Secondary', 'two', 'Class 2'),
(4, 'Shaher', 2147483647, '1997-10-20', 'Diploma', 'Kindergarden', 'One', 'Class 3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
