-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2018 at 02:00 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `africacodes`
--

-- --------------------------------------------------------

--
-- Table structure for table `customars`
--

CREATE TABLE `customars` (
  `id` int(10) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `location` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pic` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `pin` varchar(10) CHARACTER SET utf8 NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customars`
--

INSERT INTO `customars` (`id`, `email`, `fullname`, `phone`, `location`, `pic`, `date`, `pin`, `status`) VALUES
(3, 'sylithtro@gmail.com', 'David Bajomo', '+2349053250174', 'Ibadan', '5a7241db298e03368.png', '2018-01-31', '1102', 0),
(59, 'sylithtro@gmail.comww', 'achillestech', '2349053250174', 'Ibadan', '5a72530437efa2893.png', '2018-02-01', '1304', 0),
(60, 'sylithtro@gmail.nut', 'David Bajomo', '+2349053250174', 'Abuja', '5a72642f8a9f23756.png', '2018-02-01', '9460', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) NOT NULL,
  `customer` int(10) NOT NULL,
  `month` int(10) NOT NULL,
  `year` year(4) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer`, `month`, `year`, `status`) VALUES
(1, 3, 1, 2018, 1),
(2, 3, 1, 2018, 1),
(3, 3, 2, 2018, 1),
(4, 3, 3, 2018, 1),
(5, 3, 3, 2018, 1),
(6, 3, 4, 2018, 1),
(7, 3, 3, 2018, 1),
(8, 3, 3, 2018, 1),
(9, 3, 5, 2018, 1),
(10, 3, 6, 2018, 1),
(11, 3, 6, 2018, 1),
(12, 3, 4, 2018, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `unik` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) NOT NULL,
  `regdate` date NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `unik`, `password`, `regdate`, `status`) VALUES
(1, 'example@gmail.com', 'africacodes', '12345', '2018-01-30', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customars`
--
ALTER TABLE `customars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `customars`
--
ALTER TABLE `customars`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
