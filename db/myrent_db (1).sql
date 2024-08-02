-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 02:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myrent_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `interested`
--

CREATE TABLE `interested` (
  `i_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interested`
--

INSERT INTO `interested` (`i_id`, `user_id`, `post_id`, `owner_id`, `created_at`) VALUES
(48, 46, 14, 1, '2023-05-20 14:39:56'),
(51, 46, 19, 1, '2023-05-20 14:40:55'),
(52, 46, 41, 45, '2023-05-20 18:42:29'),
(53, 46, 43, 47, '2023-05-20 18:43:04'),
(55, 1, 43, 47, '2023-05-20 18:52:24'),
(56, 1, 44, 45, '2023-05-20 19:05:12'),
(57, 1, 22, 1, '2023-05-20 19:50:39'),
(58, 1, 42, 46, '2023-05-20 19:52:42'),
(59, 1, 45, 45, '2023-05-20 19:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `p_id` int(11) NOT NULL,
  `p_title` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_category` varchar(200) NOT NULL,
  `p_city` int(11) NOT NULL,
  `p_address` varchar(200) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_description` text NOT NULL,
  `p_latitude` double NOT NULL,
  `p_longitude` double NOT NULL,
  `p_status` int(11) NOT NULL DEFAULT 1,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `p_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`p_id`, `p_title`, `user_id`, `p_category`, `p_city`, `p_address`, `p_price`, `p_description`, `p_latitude`, `p_longitude`, `p_status`, `isApproved`, `p_created`) VALUES
(14, '2 rooms', 1, '1', 1, 'Samyukta Chok,(near V.A School)', 2324, 'aas', 26.6736902, 87.2777491, 0, 0, '2023-05-09 08:41:01'),
(15, '2rromsplus', 1, '2', 3, 'Dolorum vitae conseq', 53, 'Eveniet aute hic vo', 0, 0, 0, 0, '2023-05-09 08:42:29'),
(16, '2romms000', 1, '1', 1, 'Samyukta Chok,(near V.A School)', 44, 'des', 26.4732672, 87.2742912, 0, 0, '2023-05-09 08:44:55'),
(17, 'nykofok@mailinator.com', 1, 'Select Category', 2, 'Id consectetur solut', 729, 'Tempor maxime deseru', 0, 0, 0, 0, '2023-05-09 08:51:05'),
(18, 'cehodyk@mailinator.com', 1, 'Select Category', 2, 'Officiis beatae ulla', 88, 'Ad rerum quo et temp', 0, 0, 0, 0, '2023-05-09 08:51:26'),
(19, 'cehodyk@mailinator.com', 1, '3', 2, 'Officiis beatae ulla', 88, 'Ad rerum quo et temp', 0, 0, 0, 0, '2023-05-09 08:51:54'),
(22, 'dyxegip@mailinator.com', 1, '2', 2, 'Repellendus Laboris', 971, 'Consequat Id qui si', 0, 0, 0, 0, '2023-05-09 19:30:23'),
(24, 'tedi@mailinator.com', 1, '3', 2, 'Magni laborum facere', 591, 'Pariatur In qui rer', 26.5125888, 87.2873984, 0, 0, '2023-05-09 19:37:15'),
(38, 'Quia ad natus assume', 1, '5', 2, 'Nisi sed numquam et ', 542, 'Laborum nulla quos d', 0, 0, 1, 1, '2023-05-14 10:54:07'),
(40, 'kk', 1, '3', 3, 'Samyukta Chok,(near V.A School)', 3000, 'des', 26.6737269, 87.2776069, 1, 0, '2023-05-15 06:17:22'),
(41, 'Laudantium et animi', 45, '3', 5, 'Et repudiandae quis ', 171, 'Quis nihil harum des', 0, 0, 1, 0, '2023-05-20 07:29:13'),
(42, 'Dolor non architecto', 46, '3', 2, 'Vel eligendi sunt q', 785, 'Omnis facilis commod', 0, 0, 1, 0, '2023-05-20 07:50:05'),
(43, 'Flat for rent', 47, '5', 2, 'Itahari-4', 10000, 'Big size flat', 26.6737517, 87.277568, 1, 0, '2023-05-20 08:40:58'),
(44, 'Ut adipisicing labor', 45, '3', 2, 'Aliquip sunt qui ass', 861, 'Culpa id consequatur', 0, 0, 1, 0, '2023-05-20 19:04:06'),
(45, 'Nostrud inventore eu', 45, '3', 1, 'Culpa irure et mini', 757, 'Ut explicabo Offici', 0, 0, 1, 0, '2023-05-20 19:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `post_images_id` int(11) NOT NULL,
  `post_images` varchar(250) NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'show',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_images`
--

INSERT INTO `post_images` (`post_images_id`, `post_images`, `post_id`, `status`, `created_at`) VALUES
(11, 'Screenshot (5).png', 14, 'active', '2023-05-12 09:18:27'),
(12, 'Screenshot (40).png', 15, 'active', '2023-05-12 09:18:27'),
(18, 'Screenshot (19).png', 16, 'active', '2023-05-12 09:18:27'),
(19, 'Screenshot (10).png', 17, 'active', '2023-05-12 09:18:27'),
(20, 'Screenshot (11).png', 18, 'active', '2023-05-12 09:18:27'),
(21, 'Screenshot (11).png', 19, 'active', '2023-05-12 09:18:27'),
(25, 'Screenshot (130).png', 22, 'active', '2023-05-12 09:18:27'),
(26, 'Screenshot (217).png', 22, 'active', '2023-05-12 09:18:27'),
(58, 'Screenshot (2).png', 24, 'active', '2023-05-14 10:48:53'),
(59, 'Screenshot (16).png', 24, 'active', '2023-05-14 10:48:53'),
(60, 'Screenshot (11).png', 38, 'active', '2023-05-14 10:54:07'),
(61, 'Screenshot (19).png', 38, 'active', '2023-05-14 10:54:07'),
(65, 'Screenshot (7).png', 40, 'active', '2023-05-15 06:17:22'),
(66, 'Screenshot (41).png', 40, 'active', '2023-05-15 06:17:22'),
(67, 'Screenshot (71).png', 40, 'active', '2023-05-15 06:17:22'),
(68, 'Group 173.png', 41, 'active', '2023-05-20 07:29:13'),
(69, 'Rectangle 14469.png', 41, 'active', '2023-05-20 07:29:13'),
(70, '1683101586Group.png', 42, 'active', '2023-05-20 07:50:05'),
(71, 'Rectangle 14455 (1).png', 42, 'active', '2023-05-20 07:50:05'),
(72, 'Screenshot (221).png', 43, 'active', '2023-05-20 08:40:58'),
(73, 'Screenshot (13).png', 43, 'active', '2023-05-20 08:40:58'),
(74, '1640447591988.jpg', 44, 'active', '2023-05-20 19:04:06'),
(75, '1640447592118.jpg', 45, 'active', '2023-05-20 19:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_password` varchar(100) NOT NULL,
  `u_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `u_contact` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_password`, `u_created_at`, `u_contact`) VALUES
(1, 'Sandesh Adhikari', 'test@gmail.com', '12', '2023-05-18 06:51:19', '9842057828'),
(25, 'Sandesh', 'sandeshadhikari200756@gmail.com', '12', '2023-05-18 08:25:10', '9842057828'),
(26, 'Sandesh', 'sandeshadhikari204076@gmail.com', '12', '2023-05-18 08:27:12', '9842057828'),
(27, 'Sandesh', 'sandeshadhikari200ssd76@gmail.com', '1', '2023-05-18 08:29:18', '9842057828'),
(29, 'Sandesh', 'sandeshadhiggkari20076@gmail.com', '1', '2023-05-18 08:30:40', '9842057828'),
(30, 'Sandesh', 'sandeshadhikari2007f6@gmail.com', '1', '2023-05-18 08:31:17', '9842057828'),
(32, 'Sandesh', 'sandeshadhikari20dd076@gmail.com', '1', '2023-05-18 08:34:24', '9842057828'),
(33, 'Sandesh', 'sandeshadhiggkariss20076@gmail.com', '1', '2023-05-18 08:36:24', '9842057828'),
(35, 'Sandesh', 'sandeshadhikaaaari20076@gmail.com', '1', '2023-05-18 08:39:02', '9842057828'),
(36, 'Sandesh', 'sandeshadhiasskfgari20076@gmail.com', '1', '2023-05-18 08:41:34', '9842057828'),
(37, 'Sandesh', 'sandeshadhiasskfgaasri20076@gmail.com', '1', '2023-05-18 08:42:04', '9842057828'),
(38, 'Sandesh', 'sandeshadhiksari20076@gmail.com', '1', '2023-05-18 08:42:43', '9842057828'),
(40, 'Sandesh', 'sandessshadhikari20076@gmail.com', '1', '2023-05-18 08:43:12', '9842057828'),
(43, 'Sandesh', 'sandeshadhikadfdfri20076@gmail.com', '1', '2023-05-18 08:43:54', '9842057828'),
(44, 'Sandesh', 'sandeshadhikaddri20076@gmail.com', '1', '2023-05-18 08:44:43', '9842057828'),
(45, 'Aastha Adhikari', 'aastha@gmail.com', '12', '2023-05-19 06:25:34', '9812345678'),
(46, 'San', '123@gmail.com', '12', '2023-05-19 20:03:28', '345'),
(47, 'Admin Admin', 'admin@gmail.com', '12', '2023-05-20 08:38:44', '987');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interested`
--
ALTER TABLE `interested`
  ADD PRIMARY KEY (`i_id`),
  ADD UNIQUE KEY `unique_entry` (`user_id`,`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`post_images_id`),
  ADD KEY `fk_post_images_post_id` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_email` (`u_email`),
  ADD UNIQUE KEY `u_email_2` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `interested`
--
ALTER TABLE `interested`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `post_images_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_images`
--
ALTER TABLE `post_images`
  ADD CONSTRAINT `fk_post_images_post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`p_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
