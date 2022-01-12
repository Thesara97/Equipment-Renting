-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2022 at 03:17 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18045840_equipment`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowequipment`
--

CREATE TABLE `borrowequipment` (
  `id` int(11) NOT NULL,
  `equipmentid` varchar(255) DEFAULT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `issuedate` varchar(255) DEFAULT NULL,
  `returndate` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowequipment`
--

INSERT INTO `borrowequipment` (`id`, `equipmentid`, `userid`, `issuedate`, `returndate`, `status`) VALUES
(56, '36', '13', '2022-01-12', '2022-01-14', 'finish'),
(58, '38', '18', '2022-01-12', '2022-01-26', 'active'),
(60, '37', '18', '2022-01-12', '2022-01-19', 'finish'),
(61, '37', '13', '2022-01-12', '2022-01-10', 'finish'),
(62, '36', '18', '2022-01-12', '2022-01-19', 'finish'),
(63, '37', '18', '2022-01-12', '2022-01-12', 'active'),
(64, '36', '18', '2022-01-12', '2022-01-19', 'finish'),
(65, '36', '18', '2022-01-12', '2022-01-05', 'finish');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `equipment` varchar(255) DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `equipment`, `manufacturer`, `price`, `category`, `status`) VALUES
(34, 'Axe', 'HDK', '1000', 'Hand Tools', 'available'),
(36, 'Hydraulic Lift ', 'H&S', '2000', 'Automotive Tools', 'available'),
(37, 'Hand Grinder 100R', 'Saw Lanka', '500', 'Hand Tools', 'notavailable'),
(38, 'Cutter 100x', 'Hans', '100', 'Hand Tools', 'notavailable');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `borrowid` varchar(255) DEFAULT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `borrowid`, `userid`, `amount`, `date`, `status`) VALUES
(46, '56', '13', '2000', '2022-01-12', 'paid'),
(47, '58', '18', '100', '2022-01-12', 'paid'),
(48, '60', '18', '500', '2022-01-12', 'paid'),
(49, '61', '13', '500', '2022-01-12', 'paid'),
(50, '62', '18', '2000', '2022-01-12', 'paid'),
(51, '63', '18', '500', '2022-01-12', 'paid'),
(52, '64', '18', '2000', '2022-01-12', 'paid'),
(53, '65', '18', '2000', '2022-01-12', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `paneltyfee` varchar(255) DEFAULT NULL,
  `currentpanelty` varchar(255) DEFAULT NULL,
  `totalpanelty` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `paneltyfee`, `currentpanelty`, `totalpanelty`) VALUES
(1, '1000', '0', '11000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `nic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `mobile`, `address`, `nic`) VALUES
(13, 'John Doe', '0770000000', 'No 145 Padukka', '991122344V'),
(15, 'Jananath Bandara', '0775294617', 'No 34, Awissawella', '982643957V'),
(17, 'Aditha Imasha', '07164928635', 'No 85, gall road', '976548263V'),
(18, 'david beckham', '0755111222', 'No 145 America road', '200041594565');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowequipment`
--
ALTER TABLE `borrowequipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowequipment`
--
ALTER TABLE `borrowequipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
