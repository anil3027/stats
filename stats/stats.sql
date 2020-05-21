-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 05:08 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stats`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(30) NOT NULL,
  `create_id` varchar(150) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `class_year` int(30) NOT NULL,
  `class_term` varchar(30) NOT NULL,
  `class_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `create_id`, `class_name`, `class_year`, `class_term`, `class_level`) VALUES
(327, '5ebe0435394a4', '2A', 2022, 'Christmas Term', 'Level 7'),
(328, '5ebe0435394a4', '1A', 2021, 'Christmas Term', 'Level 7'),
(329, '5ebe0435394a4', '1D', 2021, 'Christmas Term', 'Level 7'),
(346, '5ebe04edbc2fd', '3A', 2021, 'Christmas Term', 'Level 9'),
(347, '5ebe04edbc2fd', '3B', 2021, 'Christmas Term', 'Level 9'),
(348, '5ebe04edbc2fd', '3D', 2021, 'Christmas Term', 'Level 9'),
(350, '5ebe0512efc27', '2A', 2021, 'Christmas Term', 'Level 8'),
(351, '5ebe0512efc27', '2B', 2021, 'Christmas Term', 'Level 8'),
(352, '5ebe0512efc27', '2C', 2021, 'Christmas Term', 'Level 8'),
(353, '5ebe0512efc27', '2D', 2021, 'Christmas Term', 'Level 8'),
(354, '5ec08a4d3337b', '1Q', 2021, 'Christmas Term', 'Level 7');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrol_id` int(30) NOT NULL,
  `class_id` int(30) NOT NULL,
  `year` int(30) NOT NULL,
  `term` varchar(50) NOT NULL,
  `week` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `boys` int(10) NOT NULL,
  `girls` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_table`
--

CREATE TABLE `main_table` (
  `id` int(30) NOT NULL,
  `class_id` int(30) NOT NULL,
  `year` int(30) NOT NULL,
  `term` int(30) NOT NULL,
  `week` int(30) NOT NULL,
  `date` date NOT NULL,
  `boys_0` int(50) NOT NULL,
  `girls_0` int(50) NOT NULL,
  `boys_1` int(50) NOT NULL,
  `girls_1` int(50) NOT NULL,
  `boys_2` int(50) NOT NULL,
  `girls_2` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `constraint_name` (`class_name`,`class_year`,`class_term`,`class_level`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrol_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `main_table`
--
ALTER TABLE `main_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=355;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `main_table`
--
ALTER TABLE `main_table`
  ADD CONSTRAINT `main_table_ibfk_6` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
