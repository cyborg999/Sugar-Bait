-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2018 at 07:04 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(9, 'Archie', 'De Guzman', 'bg.jpg'),
(10, 'jordan', 'sadiwa', 'bestseller-dk.png');

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
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `userid` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` int(11) DEFAULT '0',
  `seenby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `content`, `userid`, `adminid`, `date`, `seen`, `seenby`) VALUES
(89, 'hi', 6, 3, '2018-03-04 16:41:18', 1, 'admin'),
(90, 'hello', 6, 3, '2018-03-04 16:48:28', 1, 'user'),
(91, 'asdada', 6, 3, '2018-03-04 16:48:32', 1, 'admin'),
(92, 'tangina gumana din', 6, 3, '2018-03-04 16:48:39', 1, 'admin'),
(93, 'hi', 6, 3, '2018-03-04 16:56:12', 1, 'admin'),
(94, 'uy ol', 6, 3, '2018-03-04 16:56:17', 1, 'user'),
(95, 'hahaha', 6, 3, '2018-03-04 16:56:22', 1, 'admin'),
(96, 'last', 6, 3, '2018-03-04 16:58:20', 1, 'user'),
(97, 'last2', 6, 3, '2018-03-04 17:00:30', 1, 'admin'),
(98, 'last3', 6, 3, '2018-03-04 17:00:42', 1, 'user'),
(99, 'last4', 6, 3, '2018-03-04 17:04:01', 1, 'user'),
(100, 'last5', 6, 3, '2018-03-04 17:04:09', 1, 'user'),
(101, 'fromadmin', 6, 3, '2018-03-04 17:06:53', 1, 'user'),
(102, 'asdsa', 6, 3, '2018-03-04 17:08:04', 1, 'user'),
(103, 'hi', 6, 3, '2018-03-04 17:08:11', 1, 'admin'),
(104, 'hsdfsdhfhsdf', 6, 3, '2018-03-04 17:08:27', 1, 'user'),
(105, 'gumana din kingina', 6, 3, '2018-03-04 17:08:32', 1, 'user'),
(106, 'ok', 6, 3, '2018-03-04 17:08:38', 1, 'admin'),
(107, 'test', 6, 3, '2018-03-04 17:21:24', 1, 'admin'),
(108, 'hi', 6, 3, '2018-03-04 17:23:09', 1, 'user'),
(109, 'oy', 6, 3, '2018-03-04 17:24:19', 1, 'admin'),
(110, 'hi', 6, 3, '2018-03-04 17:25:09', 1, 'admin'),
(111, 'test1', 6, 3, '2018-03-04 17:27:01', 1, 'user'),
(112, 'test2', 6, 3, '2018-03-04 17:27:12', 1, 'admin'),
(113, 'hiasd', 6, 3, '2018-03-04 17:27:41', 1, 'user'),
(114, 'jordanpogi', 6, 3, '2018-03-04 17:28:14', 1, 'user');

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
(1, 12, 'Archie', 'De Guzman'),
(2, 14, 'jordan', 'sadiwa');

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
(14, '21', '2018-03-07', 'jordan', 'sadiwa', 'test package 1 new', 0),
(15, '21', '2018-03-07', 'jordan', 'sadiwa', 'test package 1 new', 1),
(16, '22', '2018-04-07', 'jordan', 'sadiwa', 'test package 1 new', 1),
(17, '23', '2018-05-07', 'jordan3', 'sadiwa', 'test package 1 new', 0),
(18, '24', '2018-03-07', 'jordan24', 'sadiwa', 'test package 1 new', 1),
(19, '24', '2017-03-07', 'jordan24', 'sadiwa', 'test package 1 new', 1),
(20, '24', '2017-03-07', 'jordan24', 'sadiwa', 'test package 1 new', 2),
(21, '21', '2018-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(22, '21', '2018-03-07', 'jordan', 'sadiwa', 'test package 1 new', 1),
(23, '21', '2018-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(24, '21', '2019-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(25, '21', '2020-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(26, '21', '2020-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(27, '21', '2020-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(28, '21', '2016-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(29, '21', '2016-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(30, '21', '2016-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(31, '21', '2016-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(32, '22', '2016-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(33, '22', '2016-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(34, '22', '2017-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(35, '22', '2017-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(36, '22', '2017-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(37, '22', '2018-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(38, '22', '2018-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(39, '22', '2018-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(40, '24', '2018-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(41, '24', '2018-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(42, '24', '2019-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(43, '24', '2019-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(44, '24', '2019-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(45, '24', '2019-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(46, '24', '2019-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(47, '24', '2019-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(48, '24', '2019-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(49, '24', '2019-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(50, '24', '2019-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(51, '24', '2019-03-07', 'jordan', 'sadiwa', 'test package 1 new', 2),
(52, '24', '2017-03-07', 'jordan24', 'sadiwa', 'test package 1 new', 0);

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
(5, 'Chester', 'Gaspar', 'batman', 'batman', 'Calamba', '1234567890', ''),
(6, 'jordan', 'sadiwa', 'cyborg999', 'aaaaaa', 'pili santa mes', '0928474', 'user');

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
-- Indexes for table `message`
--
ALTER TABLE `message`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `reservepackage`
--
ALTER TABLE `reservepackage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
