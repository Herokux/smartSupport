-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Aug 13, 2016 at 09:15 AM
-- Server version: 5.6.31
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartsupport`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` varchar(36) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `company` varchar(30) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstname`, `lastname`, `company`, `entry_date`) VALUES
('57af3342-0d70-444a-b4a2-59c8501a7f2d', 'Ashim', 'Qwhi', 'asdf', '2016-08-13 14:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `type` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `username`, `password`, `active`) VALUES
('57af31e8-cadc-4d40-9673-59ec501a7f2d', 'Client', 'ashim1994@gmail.com', '8f8e8955974db74cb886cf92d3b4c6d2fa902713', 1),
('57af3287-030c-4bb6-9c1a-271c501a7f2d', 'Client', 'ashimrajkonwar@gmail.com', '3dbabe532d81a31bc5a1b438b85c0780c7350f23', 1),
('57af32e8-b5c4-464e-92f5-6f30501a7f2d', 'Client', 'ashimrajkonwarclient@gmail.com', '3dbabe532d81a31bc5a1b438b85c0780c7350f23', 1),
('57af3342-0d70-444a-b4a2-59c8501a7f2d', 'Client', 'ashimrajkonwaqqqrclient@gmail.com', '3dbabe532d81a31bc5a1b438b85c0780c7350f23', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
