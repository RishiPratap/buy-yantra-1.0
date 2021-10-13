-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 03:23 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datastore`
--

-- --------------------------------------------------------

--
-- Table structure for table `genral`
--

CREATE TABLE `genral` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `userlocation` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `userimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genral`
--

INSERT INTO `genral` (`id`, `username`, `store_name`, `userlocation`, `category`, `userimage`) VALUES
(12, 'admin', 'sweets', 'singrauli', 'sweets', 'Apple-iPhone-X-Face-ID.jpg'),
(13, 'raunak', 'halwai', 'singrauli', 'snaks', 'problem2 (1).PNG'),
(14, 'harshit', 'City Mall', 'Chennai', 'Genral', 'microsoft-to-do-mac-icon-100802168-orig-1.jpg'),
(15, 'sdfs', '', '', '', 'WhatsApp Image 2021-10-03 at 18.22.04.jpeg'),
(16, '', '', '', '', 'WhatsApp Image 2021-10-03 at 18.22.04 (1).jpeg'),
(17, '', '', '', '', 'WhatsApp Image 2021-10-03 at 18.22.04 (1).jpeg'),
(18, 'sd', '', '', '', 'WhatsApp Image 2021-10-03 at 18.22.04.jpeg'),
(19, 'sd', '', '', '', 'WhatsApp Image 2021-10-03 at 18.22.04.jpeg'),
(20, 'rp', 'riyaa cloths', 'singrauli', 'cloths', 'bee2.1.PNG'),
(21, 'rishipratap025', 'sweets', 'singrauli', 'genral', 'Apple-iPhone-X-Face-ID.jpg'),
(22, '', '', '', 'grocerry', 'problem1 (2).PNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genral`
--
ALTER TABLE `genral`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genral`
--
ALTER TABLE `genral`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
