-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2023 at 05:16 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `manager_id` int DEFAULT '0',
  `employee_id` int DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `manager_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(24, 0, 26, '2023-03-24 17:18:19', '2023-03-24 17:18:19'),
(26, 0, 28, '2023-03-27 09:14:31', '2023-03-27 09:14:31'),
(27, 28, 29, '2023-03-27 09:25:45', '2023-03-27 09:25:45'),
(29, 28, 31, '2023-03-27 13:01:51', '2023-03-27 13:01:51'),
(30, 28, 32, '2023-03-27 14:07:16', '2023-03-27 14:07:16'),
(31, 26, 33, '2023-03-27 14:13:15', '2023-03-27 14:13:15'),
(32, 0, 34, '2023-05-23 17:15:01', '2023-05-23 17:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` bigint NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `gender`, `contact`, `email`, `password`, `created_at`, `updated_at`) VALUES
(26, 'Gulab Ansari', 'Manager', 'male', 9876543215, 'gulab@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2023-03-24 17:18:19', '2023-03-27 09:17:26'),
(28, 'Sam ', 'Manager', 'other', 7788912365, 'sam123@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2023-03-27 09:14:31', '2023-03-27 17:09:04'),
(29, 'Rohan', 'Employee', 'male', 1234569878, 'rohan123@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2023-03-27 09:25:45', '2023-03-27 16:57:28'),
(31, 'Kim', 'Employee', 'other', 1236512366, 'kim123@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2023-03-27 13:01:51', '2023-03-27 13:04:29'),
(32, 'Arora', 'Employee', 'female', 7788996655, 'arora123@mail.co', '81dc9bdb52d04dc20036dbd8313ed055', '2023-03-27 14:07:16', '2023-03-27 14:07:16'),
(33, 'Harray', 'Employee', 'male', 3366552244, 'harray123@mail.co', '81dc9bdb52d04dc20036dbd8313ed055', '2023-03-27 14:13:15', '2023-03-27 14:13:15'),
(34, 'Fddfg', 'Manager', 'female', 1234569878, 'wer123@mail.com', '9a69e50114a30c4c5c1d455a2cfb87d1', '2023-05-23 17:15:00', '2023-05-23 17:15:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
