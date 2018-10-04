-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2018 at 01:56 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Apartment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `user`, `subject`, `Description`, `Date`) VALUES
(4, 'niki@gmail.com', 'Hello', 'user how areyou.....', '2016-06-29 12:07:19'),
(6, 'niki@gmail.com', 'adfdfdfdfd', 'bbbbbbbb', '2016-07-31 15:38:35'),
(7, 'ravi@gmail.com', 'adfdfdfdfd', 'aaaaaaaaaaaaaa', '2016-07-31 15:38:35'),
(8, 'welroy@test.com', 'qwer', 'qwer', '2018-05-08 15:12:17'),
(9, 'welroy@test.com', 'qazwsx', 'qazwsx', '2018-05-08 15:22:59'),
(10, 'welroy@test.com', 'qwer', 'qwer', '2018-05-08 18:08:09'),
(11, 'welroy@test.com', 'hello', 'hello', '2018-05-08 20:18:13'),
(12, 'gaurav@test.com', 'hello', 'hello', '2018-05-08 20:54:33'),
(13, 'welroy@test.com', 'Hello', 'Pest Control Inspection', '2018-05-10 07:11:35'),
(14, 'gaurav@test.com', 'Hello', 'Pest Control Inspection', '2018-05-10 07:11:35'),
(15, 'welroy@test.com', 'Hello', 'Pest Control Inspection', '2018-05-10 07:13:13'),
(16, 'gaurav@test.com', 'Hello', 'Pest Control Inspection', '2018-05-10 07:13:13'),
(17, 'welroy@test.com', 'Hello', 'Pest Control Inspection', '2018-05-10 07:13:18'),
(18, 'gaurav@test.com', 'Hello', 'Pest Control Inspection', '2018-05-10 07:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `code` int(5) NOT NULL,
  `apt_no` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`code`, `apt_no`) VALUES
(12345, 12),
(43671, 23),
(45053, 13),
(78840, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `code` int(5) NOT NULL DEFAULT '0',
  `apt_no` int(3) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `subscription` binary(1) NOT NULL DEFAULT '0',
  `_delete` binary(1) NOT NULL DEFAULT '0',
  `mobile` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `code`, `apt_no`, `name`, `email`, `password`, `subscription`, `_delete`, `mobile`) VALUES
(3, 12345, 12, 'Welroy Dmello', 'welroy@test.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0x30, 0x30, 1231231234),
(5, 12345, 12, 'Gaurav', 'gaurav@test.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0x30, 0x30, 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
