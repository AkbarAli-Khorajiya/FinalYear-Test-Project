-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 07:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(5) NOT NULL,
  `que_id` int(5) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `que_id`, `answer`) VALUES
(1, 2, 'derive'),
(2, 3, 'hyper text transfer protocol'),
(3, 4, 'structured query language'),
(4, 16, 'structured query language'),
(5, 17, 'structured query language'),
(6, 18, 'structured query language'),
(7, 19, 'structured query language'),
(8, 20, 'structured query language'),
(9, 21, 'complex'),
(10, 22, 'programming language');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(5) NOT NULL,
  `que_id` int(5) DEFAULT NULL,
  `options` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `que_id`, `options`) VALUES
(1, 2, 'derive '),
(2, 2, 'basic'),
(3, 2, 'user define'),
(4, 2, 'non-linear'),
(5, 3, 'hyper text transfer protocol'),
(6, 3, 'hyper transfer text protocol'),
(7, 3, 'hyper transform transfer protocol'),
(8, 3, 'hyper transfer transform protocol'),
(9, 4, 'structured query language'),
(10, 4, 'structured qauntam language '),
(11, 4, 'simple query language'),
(12, 4, 'simple quantam language'),
(13, 5, 'structured query language'),
(14, 6, 'structured query language'),
(15, 6, 'structured qauntam language '),
(16, 6, 'simple query language'),
(17, 6, 'simple quantam language'),
(18, 7, 'structured query language'),
(19, 7, 'structured qauntam language '),
(20, 7, 'simple query language'),
(21, 7, 'simple quantam language'),
(22, 8, 'structured query language'),
(23, 8, 'structured qauntam language '),
(24, 8, 'simple query language'),
(25, 8, 'simple quantam language'),
(26, 9, 'structured query language'),
(27, 9, 'structured qauntam language '),
(28, 9, 'simple query language'),
(29, 9, 'simple quantam language'),
(30, 10, 'structured query language'),
(31, 10, 'structured qauntam language '),
(32, 10, 'simple query language'),
(33, 10, 'simple quantam language'),
(34, 11, 'structured query language'),
(35, 11, 'structured qauntam language '),
(36, 11, 'simple query language'),
(37, 11, 'simple quantam language'),
(38, 12, 'structured query language'),
(39, 12, 'structured qauntam language '),
(40, 12, 'simple query language'),
(41, 12, 'simple quantam language'),
(42, 13, 'structured query language'),
(43, 13, 'structured qauntam language '),
(44, 13, 'simple query language'),
(45, 13, 'simple quantam language'),
(46, 14, 'structured query language'),
(47, 14, 'structured qauntam language '),
(48, 14, 'simple query language'),
(49, 14, 'simple quantam language'),
(50, 15, 'structured query language'),
(51, 15, 'structured qauntam language '),
(52, 15, 'simple query language'),
(53, 15, 'simple quantam language'),
(54, 16, 'structured query language'),
(55, 16, 'structured qauntam language '),
(56, 16, 'simple query language'),
(57, 16, 'simple quantam language'),
(58, 17, 'structured query language'),
(59, 17, 'structured qauntam language '),
(60, 17, 'simple query language'),
(61, 17, 'simple quantam language'),
(62, 18, 'structured query language'),
(63, 18, 'structured qauntam language '),
(64, 18, 'simple query language'),
(65, 18, 'simple quantam language'),
(66, 19, 'structured query language'),
(67, 19, 'structured qauntam language '),
(68, 19, 'simple query language'),
(69, 19, 'simple quantam language'),
(70, 20, 'structured query language'),
(71, 20, 'structured qauntam language '),
(72, 20, 'simple query language'),
(73, 20, 'simple quantam language'),
(74, 21, 'portable'),
(75, 21, 'simple'),
(76, 21, 'object-oriented'),
(77, 21, 'complex'),
(78, 22, 'scrpting language'),
(79, 22, 'programming language'),
(80, 22, 'platform dependent language'),
(81, 22, 'low level language');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(5) NOT NULL,
  `test_id` int(5) DEFAULT NULL,
  `question` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `test_id`, `question`) VALUES
(2, 1, 'What is Array'),
(3, 1, 'full form of http'),
(4, 2, 'full form of sql?'),
(5, 1, 'full form of sql?'),
(6, 1, 'full form of sql?'),
(7, 1, 'full form of sql?'),
(8, 1, 'full form of sql?'),
(9, 1, 'full form of sql?'),
(10, 1, 'full form of sql?'),
(11, 1, 'full form of sql?'),
(12, 1, 'full form of sql?'),
(13, 1, 'full form of sql?'),
(14, 1, 'full form of sql?'),
(15, 1, 'full form of sql?'),
(16, 1, 'full form of sql?'),
(17, 1, 'full form of sql?'),
(18, 1, 'full form of sql?'),
(19, 1, 'full form of sql?'),
(20, 1, 'full form of sql?'),
(21, 4, 'which is not feature of java?'),
(22, 4, 'Java is a...');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(5) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `test_time` int(2) NOT NULL,
  `test_start_time` time DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `test_question` int(3) NOT NULL,
  `test_marks` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test_name`, `test_time`, `test_start_time`, `test_date`, `test_question`, `test_marks`) VALUES
(1, 'PHP test', 0, '10:30:00', '2024-04-03', 0, 5),
(2, ' SQL test', 30, '11:30:00', '2024-04-09', 0, 5),
(4, '  JAVA TEST', 30, '09:37:00', '2024-07-02', 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_submit`
--

CREATE TABLE `user_submit` (
  `id` int(5) NOT NULL,
  `user_id` int(5) DEFAULT NULL,
  `que_id` int(5) DEFAULT NULL,
  `ans_id` int(5) DEFAULT NULL,
  `total_que` int(3) DEFAULT NULL,
  `ans_que` int(3) DEFAULT NULL,
  `notans_que` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `que_id` (`que_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `que_id` (`que_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_submit`
--
ALTER TABLE `user_submit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `que_id` (`que_id`),
  ADD KEY `ans_id` (`ans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_submit`
--
ALTER TABLE `user_submit`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`que_id`) REFERENCES `question` (`id`);

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`que_id`) REFERENCES `question` (`id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`);

--
-- Constraints for table `user_submit`
--
ALTER TABLE `user_submit`
  ADD CONSTRAINT `user_submit_ibfk_1` FOREIGN KEY (`que_id`) REFERENCES `question` (`id`),
  ADD CONSTRAINT `user_submit_ibfk_2` FOREIGN KEY (`ans_id`) REFERENCES `options` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
