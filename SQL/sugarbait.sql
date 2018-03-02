-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 09:06 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sugarbait`
--

-- --------------------------------------------------------

--
-- Table structure for table `companyinfo`
--

CREATE TABLE `companyinfo` (
  `id` int(11) NOT NULL,
  `bankaccount` varchar(55) NOT NULL,
  `globenum` varchar(25) NOT NULL,
  `smartnum` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companyinfo`
--

INSERT INTO `companyinfo` (`id`, `bankaccount`, `globenum`, `smartnum`) VALUES
(1, '435324862345', '09171111111', '09482222222');

-- --------------------------------------------------------

--
-- Table structure for table `depositslip`
--

CREATE TABLE `depositslip` (
  `id` int(11) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depositslip`
--

INSERT INTO `depositslip` (`id`, `firstname`, `lastname`, `image`) VALUES
(7, 'Archie', 'De Guzman', '20180121_173147.png'),
(8, 'Archie', 'De Guzman', 'sblogo.png'),
(9, 'Archie', 'De Guzman', 'bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(7, '20180121_172943.png'),
(8, '20180121_173147.png'),
(9, 'received_1439806962705824.jpeg'),
(10, '20180121_173114.png'),
(11, 'FB_IMG_1516528982821.jpg'),
(12, 'sblogo.png'),
(13, 'sblogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` int(11) NOT NULL,
  `packageID` int(11) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `packageID`, `firstname`, `lastname`) VALUES
(1, 12, 'Archie', 'De Guzman');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `include` varchar(50) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  `price` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `image`, `name`, `include`, `capacity`, `price`) VALUES
(21, 'p1.png', 'Package 1', '4 types of candies', '30 persons', '3000'),
(22, 'p2.png', 'Package 2', 'AAA', '5', '10'),
(23, 'p3.png', 'Package 3', '4 types of candies', '80 persons', '4000'),
(24, 'p4.png', 'Package 4', '5 types of Candy', '50 persons', ''),
(25, 'p5.png', 'Package 5', '8 types of Candy', '60 persons', ''),
(26, 'sblogo.png', 'Package 6', 'Pop', '5', '10');

-- --------------------------------------------------------

--
-- Table structure for table `reservepackage`
--

CREATE TABLE `reservepackage` (
  `id` int(11) NOT NULL,
  `packagenum` varchar(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `request` varchar(100) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservepackage`
--

INSERT INTO `reservepackage` (`id`, `packagenum`, `date`, `firstname`, `lastname`, `request`, `status`) VALUES
(10, 'Package 4', '14 February 2018', 'Archie', 'De Guzman', 'adwdawdwad', 2),
(11, 'Package 6', '01 March 2018', 'Archie', 'De Guzman', 'test', 2),
(12, 'Package 3', '2018-04-30', 'Archie', 'De Guzman', 'sample', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slip`
--

CREATE TABLE `slip` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  `contact` varchar(55) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `address`, `contact`, `role`) VALUES
(1, 'Archie', 'De Guzman', 'user', '12345', 'Mabini', '09069411487', 'user'),
(3, 'Maricel', 'Malabanan', 'admin', '12345', 'Batangas', '09363312267', 'admin'),
(4, 'Archie', 'De Guzman', 'chichi', '55555', 'Maligaya Compound', '09752186608', 'admin'),
(5, 'Chester', 'Gaspar', 'batman', 'batman', 'Calamba', '1234567890', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `depositslip`
--
ALTER TABLE `depositslip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservepackage`
--
ALTER TABLE `reservepackage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `depositslip`
--
ALTER TABLE `depositslip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reservepackage`
--
ALTER TABLE `reservepackage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
