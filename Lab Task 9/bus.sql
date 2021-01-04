-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 04:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `type` varchar(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `type`, `name`, `email`, `mobile`) VALUES
(1, 'admin', '1234', 'customer', 'ria', 'ria@gmail.com', '0178655633'),
(4, 'ria999', '1234', 'customer', 'nahida ria', 'ria@gmail.com', '+8801778578'),
(5, 'ria', '1234', 'customer', 'ria rahman', 'ria@gmail.com', '+8801778578'),
(7, 'hasib999', '1234', 'customer', 'MD. HASIBUL ISLAM', 'hasibsanto0@gmail.com', '+8801778578'),
(8, 'ria11', '1234', 'customer', 'ria rahman', 'ria@gmail.com', '01778578380'),
(10, 'seajan@gmai', '1234', 'customer', 'SEAJAN ', 'seajanshariar@gmail.com', 'ww'),
(12, 'seajan', '12345', 'customer', 'seajan', 'seajan@gmail.com', '00001111'),
(14, 'shariar', '123456', 'lecturer', 'SEAJAN ', 'seajanshariar@gmail.com', 'abbbrrr');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(100) NOT NULL,
  `busname` varchar(100) NOT NULL,
  `route` varchar(100) NOT NULL,
  `busdate` varchar(100) NOT NULL,
  `bustime` varchar(100) NOT NULL,
  `placename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `busname`, `route`, `busdate`, `bustime`, `placename`) VALUES
(1, 'hanif', 'dhaka', '01/03/2021', '07:00am', 'rangpur'),
(2, 'hanif', 'dhaka', '01/03/2021', '07:00am', 'rangpur'),
(3, 'shamoli', 'Rajsahi', '01/05/2021', '05:00am ', 'Dhaka'),
(4, 'shamoli', 'Rajsahi', '01/05/2021', '05:00am ', 'Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
