-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2016 at 10:07 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `C_id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phoneno` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zcode` varchar(10) DEFAULT NULL,
  `country` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`C_id`, `firstname`, `lastname`, `username`, `password`, `email`, `phoneno`, `address`, `city`, `state`, `zcode`, `country`) VALUES
(1001, 'praveen', 'arumalla', 'abc', 'praveen', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1002, '', '', 'bcd', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1003, 'pradeep', 'Arumalla', 'cde', '', 'praveenreddyarumalla@gmail.com', '8168243831', '102 S Warren St', 'Warrensburg', 'Missouri', '64093-3152', 'United States'),
(1004, 'pradeep', 'Arumalla', 'def', '', 'praveenreddyarumalla@gmail.com', '8168243831', '102 S Warren St', 'Warrensburg', 'Missouri', '64093-3152', 'United States'),
(1005, 'pradeep', 'Arumalla', 'efg', '', 'praveenreddyarumalla@gmail.com', '8168243831', '102 S Warren St', 'Warrensburg', 'Missouri', '64093-3152', 'United States'),
(1006, 'Raju', 'S', 'fgh', '', 'raj@gmail.com', '0000000000', 'Las Colinas', 'Irving', 'TX', '000000', 'USA'),
(1007, 'Praveen Reddy', 'Arumalla', 'ghi', '8168243831', 'praveenreddyarumalla@gmail.com', '8168243831', '102 S Warren St', 'Warrensburg', 'Missouri', '64093-3152', 'United States'),
(1008, 'Praveen Reddy', 'Arumalla', 'hij', 'password', 'praveenreddyarumalla@gmail.com', '8168243831', '102 S Warren St', 'Warrensburg', 'Missouri', '64093-3152', 'United States'),
(1009, 'abhiram', 'kalagarla', 'abhi', 'abhi1234', 'abhi@gmail.com', '1234567890', 'texas', 'irving', 'texas', '00000', 'usa'),
(1010, 'balakrishna', 'soura', 'bala', 'bala1234', 'bala@gmail.com', '1234567890', 'texas', 'irving', 'texas', '00000', 'usa');

-- --------------------------------------------------------

--
-- Table structure for table `hosting`
--

CREATE TABLE `hosting` (
  `H_id` varchar(11) NOT NULL,
  `H_Name` varchar(20) NOT NULL,
  `H_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hosting`
--

INSERT INTO `hosting` (`H_id`, `H_Name`, `H_Price`) VALUES
('1', 'host1', 10),
('2', 'host2', 15),
('3', 'host3', 20);

-- --------------------------------------------------------

--
-- Table structure for table `internet_service`
--

CREATE TABLE `internet_service` (
  `I_id` varchar(20) NOT NULL,
  `I_Name` varchar(20) NOT NULL,
  `I_Price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internet_service`
--

INSERT INTO `internet_service` (`I_id`, `I_Name`, `I_Price`) VALUES
('IS1001', 'Bronze', 100),
('IS1002', 'Silver', 125),
('IS1003', 'Gold', 150),
('IS1004', 'Platinum', 175);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `Invoice_No` int(10) UNSIGNED NOT NULL,
  `C_id` int(20) NOT NULL,
  `InternetService` varchar(20) NOT NULL,
  `IS_Price` int(20) NOT NULL,
  `Hosting` varchar(20) NOT NULL,
  `H_Price` int(20) NOT NULL,
  `IPblock` varchar(20) NOT NULL,
  `IP_price` int(20) NOT NULL,
  `Invoice_total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`Invoice_No`, `C_id`, `InternetService`, `IS_Price`, `Hosting`, `H_Price`, `IPblock`, `IP_price`, `Invoice_total`) VALUES
(100001, 1001, '', 0, '', 0, '', 0, 0),
(100003, 1008, 'Bronze', 100, 'host1', 10, '/32', 5, 115),
(100004, 1001, 'Silver', 125, 'host1', 10, '/32', 5, 140);

-- --------------------------------------------------------

--
-- Table structure for table `ipblocks`
--

CREATE TABLE `ipblocks` (
  `IP_id` varchar(10) NOT NULL,
  `ip_name` varchar(20) NOT NULL,
  `ip_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipblocks`
--

INSERT INTO `ipblocks` (`IP_id`, `ip_name`, `ip_price`) VALUES
('IP1001', '/32', 5),
('IP1002', '/30', 10),
('IP1003', '/26', 15);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `role`) VALUES
('abhi', 'abhi', 'client'),
('pradeep', 'pradeep', 'staff'),
('praveen', 'praveen', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `Ticket_Id` int(6) UNSIGNED NOT NULL,
  `C_id` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `severity` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `problem` varchar(50) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`Ticket_Id`, `C_id`, `status`, `severity`, `username`, `problem`, `Description`, `time`) VALUES
(1001, '', '', '', '', '', '', '2016-09-23 07:16:24'),
(1002, '1002', '', '', '', '', '', '2016-09-23 07:16:24'),
(1003, '1003', '', '', '', '', '', '2016-09-23 07:16:24'),
(1006, '1001', 'open', 'Low', 'pradeep', 'testing ticket creation', 'testing ticket creation', '2016-09-23 14:33:21'),
(1007, '1004', 'open', 'Low', 'praveen', 'testing ticket creation', 'testing', '2016-09-23 14:38:44'),
(1008, '1005', 'open', 'Low', 'praveen', 'testing ticket creation', 'testing', '2016-09-23 14:39:50'),
(1009, '1005', 'open', 'Low', 'praveen', 'testing ticket creation', 'testing', '2016-09-23 14:40:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `hosting`
--
ALTER TABLE `hosting`
  ADD PRIMARY KEY (`H_id`);

--
-- Indexes for table `internet_service`
--
ALTER TABLE `internet_service`
  ADD PRIMARY KEY (`I_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Invoice_No`);

--
-- Indexes for table `ipblocks`
--
ALTER TABLE `ipblocks`
  ADD PRIMARY KEY (`IP_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`Ticket_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `C_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `Invoice_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100005;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `Ticket_Id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
