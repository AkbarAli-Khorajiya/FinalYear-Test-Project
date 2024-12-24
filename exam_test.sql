-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 04:09 AM
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
(51, 63, 'simple'),
(53, 65, 'Complicated syntax'),
(54, 66, '1991'),
(55, 67, 'Pythone uses reference counting mechanism'),
(56, 68, 'Tuple'),
(57, 69, 'List '),
(58, 70, 'compiled language'),
(59, 71, 'refrence variable'),
(60, 72, 'datatype variable name;');

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
(242, 63, 'portable'),
(243, 63, 'simple'),
(244, 63, 'platform dependent language'),
(245, 63, 'complex'),
(250, 65, 'Platform independent '),
(251, 65, 'Complicated syntax'),
(252, 65, 'Interpreted'),
(253, 65, 'High Performace '),
(254, 66, '1989'),
(255, 66, '1991'),
(256, 66, '1995'),
(257, 66, '2000'),
(258, 67, 'Programmer manages memory manually'),
(259, 67, 'Pythone uses reference counting mechanism'),
(260, 67, 'Memory is never used '),
(261, 67, 'Python does not manage memory'),
(262, 68, 'List'),
(263, 68, 'Tuple'),
(264, 68, 'Dictionary '),
(265, 68, 'Set'),
(266, 69, 'List '),
(267, 69, 'Tuple'),
(268, 69, 'String'),
(269, 69, 'FrozenSet'),
(270, 70, 'compiled language'),
(271, 70, 'object oriented'),
(272, 70, 'interpreted language'),
(273, 70, 'grabage collection'),
(274, 71, 'refrence variable'),
(275, 71, 'data type'),
(276, 71, 'method'),
(277, 71, 'class'),
(278, 72, 'variable name;'),
(279, 72, 'datatype variable name;'),
(280, 72, 'datatype;'),
(281, 72, 'none of the above');

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
(63, 62, 'Java is a...'),
(65, 63, 'which is not feature of python?'),
(66, 63, 'Which year was python first realesed?'),
(67, 63, 'Which of the following best describes python memory manangement?'),
(68, 63, 'Which of the following is an immutable data type?'),
(69, 63, 'Which is data type is mutable?'),
(70, 67, 'Which is feature of C?'),
(71, 67, 'What is Pointer?'),
(72, 67, 'what is right syntax for declaring variable?');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(5) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL,
  `test_start_date` date DEFAULT NULL,
  `test_start_time` time DEFAULT NULL,
  `created_for` varchar(11) NOT NULL,
  `marks_per_ques` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test_name`, `duration`, `test_start_date`, `test_start_time`, `created_for`, `marks_per_ques`) VALUES
(62, 'JAVA', 10, '2024-08-31', '20:04:00', 'First-Year', 30),
(63, 'PYTHON', 10, '2024-12-12', '11:07:00', 'Third-Year', 2),
(67, 'C Test', 50, '2024-12-23', '15:51:00', 'First-Year', 3),
(68, 'C Test 2', 50, '2024-12-24', '08:30:00', 'First-Year', 3),
(69, 'PHP 2', 12, '2024-12-25', '08:26:00', 'Third-Year', 5),
(70, 'JAVA 2', 10, '2024-12-24', '09:30:00', 'Second-Year', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` char(120) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `class` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `gender`, `status`, `class`, `created_at`) VALUES
(1, 'Suthar|Mahammad ali|Abid ali', 'mahammadali2307@gmail.com', '$2y$10$RBodw81eT3kb5tVbufLkOOdFNvfFaTBuwUJK19roOoDMs7YXkv5cC', 'Male', 1, 'Third-year', '2024-09-19 03:05:28'),
(2, 'sunasara|Ahesan ali|harun ali', 'ahesan@gmail.com', '$2y$10$cjzXUzMan/c.UP94ndnohOYLc94R7yunRamD.oIQz7iOtk.CLU6Vq', 'Female', 1, 'Second-year', '2024-09-19 03:27:14'),
(4, 'khorajiya|Akbarali|Mustakali', 'akbarali@gmail.com', '$2y$10$YLYfuAkkATmsWTRgTE.Vm.mqXZo8NU0nDJUfrzTptQj.iXeBn0kXW', 'Male', 1, 'First-Year', '2024-09-27 15:35:35'),
(5, 'Nandoliya|Kamiyab ali|Khijar ali', 'kamiyab@gmail.com', '$2y$10$C4GWexXdMMXHxB5D8W0M3OditVJLo.vd1KekHNyJwWcDhCcMOFD6e', 'Female', 1, 'Third-year', '2024-10-07 03:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_submit`
--

CREATE TABLE `user_submit` (
  `id` int(5) NOT NULL,
  `user_id` int(5) DEFAULT NULL,
  `test_name` varchar(50) DEFAULT NULL,
  `total_marks` int(3) DEFAULT NULL,
  `mark_obtain` int(3) DEFAULT NULL,
  `attempted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_submit`
--

INSERT INTO `user_submit` (`id`, `user_id`, `test_name`, `total_marks`, `mark_obtain`, `attempted_at`) VALUES
(1, 1, 'PHP', 30, 10, '2024-12-12 10:59:32'),
(2, 1, 'PYTHON', 10, 6, '2024-12-12 11:16:36'),
(3, 1, 'PYTHON', 10, 10, '2024-12-12 21:43:33'),
(4, 1, 'PYTHON', 10, 0, '2024-12-12 21:43:57'),
(5, 1, 'PYTHON', 10, 0, '2024-12-12 21:44:12'),
(6, 1, 'PYTHON', 10, 0, '2024-12-12 21:44:48'),
(7, 1, 'PYTHON', 10, 4, '2024-12-12 21:45:19'),
(8, 1, 'PYTHON', 10, 0, '2024-12-12 21:45:35'),
(9, 1, 'PYTHON', 10, 0, '2024-12-12 21:47:07'),
(10, 1, 'PYTHON', 10, 0, '2024-12-12 21:48:22'),
(11, 1, 'PYTHON', 10, 2, '2024-12-13 08:25:39'),
(12, 1, 'PYTHON', 10, 0, '2024-12-13 08:42:55'),
(13, 1, 'PYTHON', 10, 0, '2024-12-13 08:43:47'),
(14, 1, 'PYTHON', 10, 10, '2024-12-14 10:21:13'),
(15, 1, 'PYTHON', 10, 2, '2024-12-14 10:21:53'),
(16, 1, 'PYTHON', 10, 4, '2024-12-14 10:22:20'),
(17, 1, 'PYTHON', 10, 6, '2024-12-14 10:31:59'),
(18, 1, 'PYTHON', 10, 6, '2024-12-14 10:34:13'),
(19, 1, 'PYTHON', 10, 6, '2024-12-16 10:46:20'),
(20, 1, 'PYTHON', 10, 10, '2024-12-16 11:10:40'),
(21, 1, 'PYTHON', 10, 0, '2024-12-17 20:54:46'),
(22, 1, 'PYTHON', 10, 0, '2024-12-18 08:43:49'),
(23, 1, 'PYTHON', 10, 4, '2024-12-19 08:33:19'),
(24, 1, 'PYTHON', 10, 0, '2024-12-19 08:36:40'),
(25, 1, 'PYTHON', 10, 4, '2024-12-19 08:37:39'),
(26, 1, 'PYTHON', 10, 4, '2024-12-19 16:01:30'),
(27, 1, 'C Test', 9, 6, '2024-12-23 15:51:11');

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_submit`
--
ALTER TABLE `user_submit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_submit`
--
ALTER TABLE `user_submit`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  ADD CONSTRAINT `user_submit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
