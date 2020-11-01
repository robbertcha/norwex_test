-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 01, 2020 at 12:25 PM
-- Server version: 5.7.11
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `norwex`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerId` int(16) NOT NULL,
  `CustomerStatusId` int(16) NOT NULL,
  `Name` varchar(32) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerId`, `CustomerStatusId`, `Name`) VALUES
(1, 1, 'John'),
(2, 1, 'James'),
(3, 2, 'Jack'),
(4, 1, 'Chloe'),
(5, 1, 'Jethro'),
(6, 2, 'Patrick'),
(7, 2, 'Marco'),
(8, 1, 'Noah'),
(9, 1, 'Alex'),
(10, 1, 'Melinda');

-- --------------------------------------------------------

--
-- Table structure for table `customerstatus`
--

CREATE TABLE `customerstatus` (
  `CustomerStatusId` int(11) NOT NULL,
  `Code` varchar(32) CHARACTER SET utf8 NOT NULL,
  `Name` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerstatus`
--

INSERT INTO `customerstatus` (`CustomerStatusId`, `Code`, `Name`) VALUES
(1, 'AC', 'Active '),
(2, 'RE', 'Removed ');

-- --------------------------------------------------------

--
-- Table structure for table `custorder`
--

CREATE TABLE `custorder` (
  `OrderId` int(16) NOT NULL,
  `CustomerId` int(16) NOT NULL,
  `OrderStatus` varchar(16) CHARACTER SET utf8 NOT NULL,
  `OrderTotal` int(16) NOT NULL DEFAULT '0',
  `CreatedDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custorder`
--

INSERT INTO `custorder` (`OrderId`, `CustomerId`, `OrderStatus`, `OrderTotal`, `CreatedDateTime`) VALUES
(1, 1, 'New', 70, '2020-09-30 22:58:11'),
(2, 2, 'Shipped', 20, '2016-10-01 22:58:11'),
(3, 3, 'On Hold', 80, '2020-10-02 22:58:36'),
(4, 4, 'Completed', 900, '2020-10-03 22:58:36'),
(5, 5, 'Cancelled', 440, '2020-10-04 23:00:04'),
(6, 2, 'Failed', 70, '2017-09-05 23:00:04'),
(7, 7, 'Completed', 300, '2020-10-06 23:01:27'),
(8, 8, 'Processed', 440, '2020-10-07 23:01:27'),
(9, 9, 'Completed', 520, '2020-10-08 23:01:58'),
(10, 6, 'Shipped', 990, '2020-10-09 23:01:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `customerstatus`
--
ALTER TABLE `customerstatus`
  ADD PRIMARY KEY (`CustomerStatusId`);

--
-- Indexes for table `custorder`
--
ALTER TABLE `custorder`
  ADD PRIMARY KEY (`OrderId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerId` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customerstatus`
--
ALTER TABLE `customerstatus`
  MODIFY `CustomerStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `custorder`
--
ALTER TABLE `custorder`
  MODIFY `OrderId` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
