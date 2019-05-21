-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2019 at 04:41 AM
-- Server version: 10.2.23-MariaDB-log-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciesta_project_sefflyco`
--

-- --------------------------------------------------------

--
-- Table structure for table `bal_det`
--

CREATE TABLE `bal_det` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `cr_date` datetime NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bal_det`
--

INSERT INTO `bal_det` (`id`, `user`, `amount`, `cr_date`, `type`) VALUES
(1, 2, 300, '2018-10-02 23:18:24', 'Referral from Pankaj'),
(2, 3, 300, '2018-10-02 23:21:21', 'Referral from Abhishek Verma'),
(3, 4, 300, '2018-10-02 23:23:27', 'Referral from Web Zone');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `status` char(1) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `cr_date` datetime NOT NULL,
  `pr_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user`, `amount`, `status`, `comment`, `cr_date`, `pr_date`) VALUES
(1, 1, '1000', 'C', 'Incomplete details', '2018-10-02 23:25:57', '2018-10-02 23:31:14'),
(2, 1, '1200', 'P', '375465766cgfcfhg', '2018-10-02 23:44:44', '2018-10-02 23:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `referral` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(10) NOT NULL,
  `cr_date` datetime NOT NULL,
  `accountno` varchar(20) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `ifsc` varchar(20) NOT NULL,
  `ballance` int(11) NOT NULL,
  `type` char(1) NOT NULL,
  `code` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  `refered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `referral`, `address`, `password`, `cr_date`, `accountno`, `bank`, `branch`, `ifsc`, `ballance`, `type`, `code`, `status`, `refered`) VALUES
(1, 'Admin', 'admin@gmail.com', '9999999999', 0, 'None', 'admin', '2018-10-02 23:08:04', '', '', '', '', 0, 'A', '', 'Y', 3);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `bal_det`
--
ALTER TABLE `bal_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
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
-- AUTO_INCREMENT for table `bal_det`
--
ALTER TABLE `bal_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
