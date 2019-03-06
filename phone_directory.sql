-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2019 at 11:23 PM
-- Server version: 10.1.37-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prepdevserver5_hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `phone_directory`
--

CREATE TABLE `phone_directory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone_directory`
--

INSERT INTO `phone_directory` (`id`, `name`, `phone_number`, `deleted`) VALUES
(1, 'Ashutosh', '7873779222', 0),
(2, 'Gagag', '8977662622', 0),
(3, 'Book', '7878895984', 0),
(4, 'Ash', '7878895984', 0),
(6, 'Book', 'sd', 0),
(7, 'Book', '9778', 0),
(8, 'Yogesh1', '7878895984', 0),
(9, 'Ash', '7878895984', 0),
(10, 'Ashwani', '7878895984', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phone_directory`
--
ALTER TABLE `phone_directory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phone_directory`
--
ALTER TABLE `phone_directory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
