-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2019 at 08:48 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Msystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_self`
--

CREATE TABLE `admin_self` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_self`
--

INSERT INTO `admin_self` (`name`, `email`, `password`) VALUES
('Admin', 'r1@gmail.com', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `id` int(30) NOT NULL,
  `studentname` varchar(50) NOT NULL,
  `studentemail` varchar(50) NOT NULL,
  `assignto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`id`, `studentname`, `studentemail`, `assignto`) VALUES
(2, 'student', 'r1@gmail.com', 'teacher'),
(6, 'rohit', 'r1@gmail.com', 'viven'),
(7, 'css', 'ee@gmail.com', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `id` int(50) NOT NULL,
  `fromteacher` varchar(50) NOT NULL,
  `msg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id`, `fromteacher`, `msg`) VALUES
(1, 'teacher', '							Schedule from 9 to 11\r\n							'),
(4, 'viven', '							qwertyuiop\r\n							'),
(6, 'rohit', '							No need to come today.\r\n							'),
(7, 'student', '							Your Message to Students...\r\n							');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(30) NOT NULL,
  `fromstudent` varchar(50) NOT NULL,
  `toteacher` varchar(30) NOT NULL,
  `teacheremail` varchar(50) NOT NULL,
  `rate` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `fromstudent`, `toteacher`, `teacheremail`, `rate`) VALUES
(1, 'Admin', 'teacher', 'r1@gmail.com', 5),
(2, 'Admin', 'teacher', 'r1@gmail.com', 5),
(5, 'Admin', 'teacher1', 'r2@gmail.com', 4),
(6, 'Admin', 'teacher1', 'r2@gmail.com', 4),
(7, 'Admin', 'teacher', 'r1@gmail.com', 5),
(8, 'Admin', 'teacher', 'r1@gmail.com', 5),
(9, 'rohit', 'viven', 'r1@gmail.com', 5),
(10, 'Admin', 'viven', 'v1@gmail.com', 5),
(11, 'Admin', 'viven', 'v1@gmail.com', 1),
(12, 'Admin', 'viven', 'v1@gmail.com', 5),
(13, 'student', 'teacher', 'r1@gmail.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(30) NOT NULL,
  `studentname` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `studentname`, `status`) VALUES
(1, 'student', 'Accepted'),
(2, 'rohit', 'Rejected'),
(3, 'rohit', 'Accepted'),
(4, 'Admin', 'Accepted'),
(5, 'Admin', 'Rejected'),
(6, 'Admin', 'Accepted'),
(7, 'student', 'Accepted'),
(8, 'student', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`) VALUES
(1, 'student', 'r1@gmail.com', 'pass'),
(2, 'css', 'ee@gmail.com', 'sdd'),
(3, 'css', 'ee@gmail.com', '123'),
(4, 'rohit', 'r1@gmail.com', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `password`) VALUES
(1, 'teacher', 'r1@gmail.com', 'pass'),
(7, 'viven', 'v1@gmail.com', 'pass'),
(8, 'css', 'ee@gmail.com', 'pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
