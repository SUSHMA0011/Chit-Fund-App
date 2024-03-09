-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 04:28 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetobid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `applieduser`
--

CREATE TABLE `applieduser` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `plan` varchar(11) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applieduser`
--

INSERT INTO `applieduser` (`id`, `user`, `plan`, `paid`, `date`, `status`, `reason`) VALUES
(4, 'charlie@gmail.com', '1', '5000', '2022-04-21', 'approved', ''),
(5, 'jack@gmail.com', '1', '5000', '2022-08-07', 'approved', ''),
(6, 'jack@gmail.com', '3', '10000', '2022-08-08', 'approved', ''),
(7, 'charlie@gmail.com', '3', '10000', '2022-08-22', 'rejected', 'couldnt validate your account');

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE `bidding` (
  `id` int(11) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bdate` date NOT NULL,
  `btime` time NOT NULL,
  `bamt` int(50) NOT NULL,
  `highest` varchar(50) NOT NULL,
  `bidder` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`id`, `pid`, `email`, `bdate`, `btime`, `bamt`, `highest`, `bidder`, `message`) VALUES
(2, '1', 'charlie@gmail.com', '2022-08-04', '13:30:00', 10000, '', '', ''),
(3, '1', 'charlie@gmail.com', '2022-08-04', '13:30:00', 2000, '', '', ''),
(4, '1', 'jack@gmail.com', '2022-08-08', '02:30:00', 8000, '9000', 'jack@gmail.com', ''),
(8, '1', 'Admin', '2022-08-08', '02:30:00', 0, '9000', 'jack@gmail.com', 'confirm1'),
(9, '1', 'Admin', '2022-08-08', '02:30:00', 0, '9000', 'jack@gmail.com', 'confirm2'),
(10, '1', 'jack@gmail.com', '2022-08-08', '02:30:00', 9000, '9000', 'jack@gmail.com', ''),
(11, '1', 'Admin', '2022-08-08', '02:30:00', 0, '9000', 'jack@gmail.com', 'confirm1'),
(12, '1', 'Admin', '2022-08-08', '02:30:00', 0, '9000', 'jack@gmail.com', 'confirm2'),
(13, '1', 'Admin', '2022-08-08', '02:30:00', 0, '9000', 'jack@gmail.com', 'confirm3'),
(15, '1', 'jack@gmail.com', '2022-08-08', '02:30:00', 12000, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bidrequest`
--

CREATE TABLE `bidrequest` (
  `id` int(11) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bdate` date NOT NULL,
  `btime` time NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidrequest`
--

INSERT INTO `bidrequest` (`id`, `pid`, `email`, `bdate`, `btime`, `status`) VALUES
(1, '1', 'charlie@gmail.com', '2022-08-04', '13:30:00', 'approved'),
(3, '1', 'jack@gmail.com', '2022-08-08', '02:30:00', 'approved'),
(4, '3', 'jack@gmail.com', '2022-08-24', '12:00:00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `pid`, `email`, `month`, `date`, `amount`) VALUES
(1, '1', 'charlie@gmail.com', '2', '2022-08-04', '5000'),
(2, '1', 'jack@gmail.com', '2', '2022-08-08', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `participants` varchar(50) NOT NULL,
  `applied` int(100) NOT NULL DEFAULT '0',
  `start` date NOT NULL,
  `bdate` date NOT NULL,
  `btime` time NOT NULL,
  `bamt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan`, `amount`, `duration`, `payment`, `participants`, `applied`, `start`, `bdate`, `btime`, `bamt`) VALUES
(1, 'One Year Plan', '60000', '12', '5000', '12', 2, '2022-05-01', '2022-08-08', '02:30:00', '8000'),
(3, 'Six Months Plan', '60000', '6', '10000', '6', 2, '2022-08-20', '2022-08-24', '12:00:00', '8000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `aadhar` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `accholder` varchar(50) NOT NULL,
  `accno` varchar(50) NOT NULL,
  `ifsc` varchar(50) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `gender`, `phone`, `address`, `aadhar`, `bank`, `accholder`, `accno`, `ifsc`, `question`, `answer`) VALUES
(1, 'Charlie', 'charlie@gmail.com', '1234', 'male', '8756456346', '  mangalore 575005', '', '', '', '', '', '', ''),
(2, 'Jack', 'jack@gmail.com', '123', 'male', '8756456346', '  mangalore 575005', '000011112223', 'State Bank', 'Jack', '20220145378422201', 'SBIMR0086', 'which is your favourite Dish', 'pasta'),
(3, 'Alan', 'alan@gmail.com', '123', 'male', '9867543654', 'Mangalore', '', '', '', '', '', 'which is your favourite Dish', 'biriyani');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applieduser`
--
ALTER TABLE `applieduser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidrequest`
--
ALTER TABLE `bidrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applieduser`
--
ALTER TABLE `applieduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bidrequest`
--
ALTER TABLE `bidrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
