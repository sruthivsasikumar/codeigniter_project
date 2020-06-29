-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2020 at 02:26 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniterDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch_student`
--

CREATE TABLE `batch_student` (
  `id` int(11) NOT NULL,
  `student_id` int(20) NOT NULL,
  `batch_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_student`
--

INSERT INTO `batch_student` (`id`, `student_id`, `batch_id`) VALUES
(1, 8, 10),
(2, 14, 11),
(3, 26, 11),
(4, 25, 11),
(5, 26, 12),
(12, 43, 10),
(16, 45, 10),
(17, 45, 11),
(18, 45, 12),
(20, 2, 10),
(21, 2, 11),
(22, 2, 12),
(23, 1, 12),
(25, 47, 10),
(26, 47, 11),
(41, 48, 11),
(42, 48, 12),
(43, 48, 22),
(48, 54, 12),
(49, 55, 22);

-- --------------------------------------------------------

--
-- Table structure for table `batch_table`
--

CREATE TABLE `batch_table` (
  `batch_id` int(11) NOT NULL,
  `batch_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_table`
--

INSERT INTO `batch_table` (`batch_id`, `batch_name`) VALUES
(10, 'BATCH10'),
(11, 'batch11'),
(12, 'batch12'),
(22, 'batch2020');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_table`
--

CREATE TABLE `permission_table` (
  `permission_id` int(11) NOT NULL,
  `permissions` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_table`
--

INSERT INTO `permission_table` (`permission_id`, `permissions`) VALUES
(1, 'view student'),
(2, 'view  batch'),
(3, 'add student'),
(4, 'add batch '),
(5, 'edit batch'),
(6, 'edit student'),
(7, 'delete student'),
(8, 'delete batch'),
(9, 'view permission'),
(10, 'view user'),
(11, 'add permission'),
(12, 'edit permission'),
(19, 'delete permission'),
(20, 'add user'),
(21, 'edit user'),
(22, 'delete user');

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(19, 4),
(20, 4),
(1, 20),
(2, 20),
(3, 20),
(4, 20),
(5, 20),
(6, 20),
(7, 20),
(8, 20),
(9, 20),
(1, 34),
(2, 34),
(3, 34),
(4, 34),
(5, 34),
(6, 34),
(7, 34),
(3, 35),
(4, 35),
(5, 35),
(6, 35),
(7, 35),
(8, 35),
(9, 35),
(10, 35),
(11, 35),
(12, 35),
(19, 35),
(20, 35),
(21, 35),
(22, 35),
(20, 52),
(20, 53),
(21, 55),
(3, 56),
(21, 57),
(20, 58);

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `age` int(20) DEFAULT NULL,
  `class` varchar(20) NOT NULL,
  `createdby_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`student_id`, `student_name`, `dob`, `age`, `class`, `createdby_id`) VALUES
(1, 'ashwin', '1992-06-02', 28, '6th', 2),
(2, 'miya', '1998-06-03', 22, '7th', 3),
(8, 'sana', '1990-02-03', 30, '4', 2),
(14, 'ziya', '1996-02-02', 24, 'wdefr', 1),
(25, 'sona', '1998-05-05', 22, '9', 4),
(26, 'shivani', '2000-02-02', 20, '5', 3),
(43, 'bindhu', '2222-04-04', -202, '34', 2),
(45, 'riya', '1993-04-04', 27, '6', 3),
(46, 'del', '1995-04-04', 25, '4', 3),
(47, 'vio', '1998-03-03', 22, '5', 1),
(48, 'imya fazhil', '0003-03-03', 2017, '4', 2),
(54, 'diya', '0003-03-02', 2017, '3', 1),
(55, 'siya', '0002-02-02', 2018, '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `name`, `dob`, `user_name`, `password`) VALUES
(1, 'admin', '1990-05-06', 'admin', '0192023a7bbd73250516f069df18b500'),
(2, 'anvika', '1994-06-03', 'anvika', 'e0a708cf1f061eb2b6c2b772b81e292a'),
(3, 'ashika', '1991-06-02', 'ashika', '6f64c9d1c7200350e75d7a06c694ddd6'),
(4, 'mayuri', '1994-06-03', 'mayuri', '6fcc80da1cda148ae03f19c241f04997'),
(20, 'saranya', '1997-03-03', 'saranya', '179cebefdcdae6e85703b0ddece7673b'),
(34, 'ziya', '1998-02-02', 'ziya', '8b72b58bd7cb7285351d07514b1c327e'),
(35, 'wow', '2222-02-02', 'wow', '96e79218965eb72c92a549dd5a330112'),
(52, 'man', '0003-03-03', 'mango', '1a100d2c0dab19c4430e7d73762b3423'),
(53, 'riya', '0003-03-03', 'riya', 'e3ceb5881a0a1fdaad01296d7554868d'),
(55, 'book', '0002-02-02', 'book', '343b1c4a3ea721b2d640fc8700db0f36'),
(56, 'note', '0002-02-02', 'note', '96e79218965eb72c92a549dd5a330112'),
(57, 'clip', '0001-01-01', 'board', '96e79218965eb72c92a549dd5a330112'),
(58, 'foo', '0002-02-02', 'dolar', '453e41d218e071ccfb2d1c99ce23906a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch_student`
--
ALTER TABLE `batch_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_table`
--
ALTER TABLE `batch_table`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_table`
--
ALTER TABLE `permission_table`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch_student`
--
ALTER TABLE `batch_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `batch_table`
--
ALTER TABLE `batch_table`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permission_table`
--
ALTER TABLE `permission_table`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
