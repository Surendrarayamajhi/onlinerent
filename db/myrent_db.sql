-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 01:56 AM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `isActive`) VALUES
(1, 'Single Room', 1),
(2, 'Two Room', 1),
(3, 'Three Room', 1),
(4, '1BHK', 1),
(5, 'Flat', 1),
(6, '2 Floor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `citylists`
--

CREATE TABLE `citylists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `citylists`
--

INSERT INTO `citylists` (`id`, `name`, `isActive`) VALUES
(2, 'Dharan', 1),
(3, 'Biratnager', 1),
(4, 'Kathmandu', 1),
(6, 'Pokhara', 0),
(8, 'Itahari', 0);

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
(59, 1, 45, 45, '2023-05-20 19:54:46'),
(60, 45, 41, 45, '2023-05-22 16:50:34'),
(61, 45, 16, 1, '2023-05-22 16:51:27'),
(62, 51, 46, 49, '2023-05-27 06:19:32'),
(63, 50, 48, 53, '2023-05-29 08:23:30'),
(64, 56, 47, 49, '2023-05-29 16:39:23'),
(66, 50, 49, 49, '2023-07-03 08:37:41'),
(68, 50, 46, 49, '2023-07-03 09:33:28'),
(69, 61, 53, 49, '2023-08-13 19:14:24'),
(70, 61, 54, 49, '2023-08-13 19:28:45'),
(71, 61, 43, 47, '2023-08-13 19:28:51'),
(72, 61, 55, 49, '2023-08-13 20:32:47'),
(75, 50, 14, 1, '2023-09-09 09:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `m_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`m_id`, `sender_id`, `receiver_id`, `message`, `created_at`) VALUES
(1, 0, 0, 'dd', '2023-05-21 07:21:44'),
(2, 1, 46, 'I am going towards my destinattion.', '2023-05-21 07:27:14'),
(3, 1, 46, 'dfdf', '2023-05-21 07:50:56'),
(4, 1, 46, 'dd', '2023-05-21 07:54:05'),
(5, 46, 1, 'latest', '2023-05-21 07:54:32'),
(6, 1, 46, 'gg', '2023-05-21 07:57:04'),
(7, 1, 46, 'jj', '2023-05-21 08:00:59'),
(8, 1, 46, 'll', '2023-05-21 08:02:57'),
(9, 1, 46, 'commit back', '2023-05-21 08:40:33'),
(10, 1, 46, 'hello 3399', '2023-05-21 09:06:18'),
(11, 1, 46, 'hello 3399', '2023-05-21 09:10:27'),
(12, 1, 46, 'hello 3399', '2023-05-21 09:11:54'),
(13, 1, 46, 'hello 355399', '2023-05-21 09:17:56'),
(14, 1, 46, 'hello 355390000009', '2023-05-21 09:19:25'),
(15, 1, 46, 'hello 9newewe', '2023-05-21 09:28:36'),
(16, 1, 46, 'hello 9cat', '2023-05-21 09:40:59'),
(17, 1, 46, 'hello 9cat100', '2023-05-21 10:29:45'),
(18, 0, 46, 'ff', '2023-05-22 07:55:59'),
(19, 0, 46, 'hh', '2023-05-22 07:57:19'),
(20, 1, 46, 'ff', '2023-05-22 07:57:52'),
(21, 1, 46, 'dd', '2023-05-22 07:59:10'),
(22, 1, 46, 'ddd', '2023-05-22 08:08:21'),
(23, 1, 46, 'Hello Hunchaa', '2023-05-22 08:08:32'),
(24, 1, 46, 'hello guys', '2023-05-22 08:18:00'),
(25, 1, 46, 'hello', '2023-05-22 08:24:22'),
(260, 49, 45, 'gg', '2023-05-25 20:20:46'),
(261, 49, 45, 'fdf', '2023-05-26 05:24:03'),
(262, 49, 1, 'to id 1', '2023-05-26 08:57:57'),
(263, 49, 1, 'to id 1 again', '2023-05-26 08:58:15'),
(264, 49, 45, 'to aastha', '2023-05-26 09:07:55'),
(265, 49, 1, 'to sandesh', '2023-05-26 09:08:08'),
(267, 50, 45, 'hello is this available', '2023-05-26 09:11:09'),
(274, 50, 49, 'hello pawan gi', '2023-05-26 13:04:31'),
(275, 50, 49, 'hello gm pawan', '2023-05-27 05:40:41'),
(276, 49, 50, 'gm balen', '2023-05-27 05:41:27'),
(277, 50, 49, 'room xa', '2023-05-27 05:41:45'),
(278, 49, 50, 'xa', '2023-05-27 05:41:53'),
(279, 49, 50, '2 wota xa', '2023-05-27 05:41:57'),
(280, 49, 50, '2ns floor ma', '2023-05-27 05:42:03'),
(281, 49, 50, 'hh', '2023-05-27 05:44:21'),
(282, 49, 49, 'fg', '2023-05-27 05:44:30'),
(283, 49, 46, 'd', '2023-05-27 05:51:11'),
(284, 50, 49, 'k xa', '2023-05-27 06:02:53'),
(285, 49, 50, 'hello balen', '2023-05-27 06:03:24'),
(286, 50, 49, 'hello pawan', '2023-05-27 06:03:32'),
(287, 50, 49, 'dfdf', '2023-05-27 06:08:38'),
(288, 50, 49, 'sdsd', '2023-05-27 06:08:54'),
(289, 51, 49, 'sdsd', '2023-05-27 06:09:09'),
(290, 51, 49, 'me aasign', '2023-05-27 06:09:14'),
(291, 51, 49, 'room xa', '2023-05-27 06:09:41'),
(292, 50, 49, 'sds', '2023-05-27 06:15:39'),
(293, 51, 49, 'hello', '2023-05-27 06:22:46'),
(294, 49, 51, 'hi', '2023-05-27 06:22:55'),
(295, 51, 49, 'rom?', '2023-05-27 06:23:01'),
(296, 49, 50, 'balen', '2023-05-27 06:23:19'),
(297, 49, 51, 'aasih', '2023-05-27 06:23:29'),
(298, 50, 49, 'hello is this available I am balen', '2023-05-27 06:29:51'),
(299, 51, 1, 'hello sir', '2023-05-27 06:48:02'),
(300, 51, 1, 'hello sir', '2023-05-27 06:52:58'),
(301, 51, 1, 'hello test', '2023-05-27 06:53:09'),
(303, 51, 1, 'hello 1', '2023-05-27 16:40:09'),
(304, 51, 45, 'hello 45', '2023-05-27 16:40:23'),
(305, 52, 49, 'Hello pawan 49', '2023-05-27 17:07:04'),
(306, 49, 52, 'tes Tenent1', '2023-05-27 17:07:52'),
(307, 52, 1, 'hello 1', '2023-05-27 17:08:42'),
(308, 52, 1, 'is this available  ', '2023-05-27 17:08:49'),
(309, 50, 1, 'hello 1 again', '2023-05-27 17:37:48'),
(310, 52, 47, 'hello 47 by tenent1 ', '2023-05-27 17:39:39'),
(311, 49, 46, 'ff', '2023-05-28 09:42:13'),
(312, 52, 49, 'hello bca', '2023-05-28 09:42:43'),
(313, 52, 49, 'how is bca', '2023-05-28 09:43:29'),
(314, 49, 52, 'its fine', '2023-05-28 09:43:36'),
(315, 52, 49, 'dfdf', '2023-05-28 09:46:48'),
(316, 52, 49, 'hello 47', '2023-05-29 06:18:27'),
(317, 47, 52, 'yes', '2023-05-29 06:19:06'),
(318, 52, 49, 'hello by 52', '2023-05-29 06:36:13'),
(319, 49, 52, 'yes ', '2023-05-29 06:36:47'),
(320, 52, 49, 'hello', '2023-05-29 06:48:24'),
(321, 49, 52, 'hello back', '2023-05-29 06:48:41'),
(322, 52, 49, 'hello v2', '2023-05-29 06:48:59'),
(323, 49, 52, 'h', '2023-05-29 06:49:11'),
(324, 52, 49, 'sdd', '2023-05-29 06:52:16'),
(325, 49, 52, 'sdd', '2023-05-29 06:52:20'),
(326, 52, 49, 'hello 46', '2023-05-29 06:59:55'),
(327, 49, 52, 'dff', '2023-05-29 07:13:01'),
(328, 49, 50, 'ffg', '2023-05-29 07:13:36'),
(329, 49, 50, 'fgfg', '2023-05-29 07:13:39'),
(330, 49, 50, 'fgfgfg', '2023-05-29 07:13:44'),
(331, 49, 50, 'fgfgfgfgfg', '2023-05-29 07:13:47'),
(332, 49, 50, '', '2023-05-29 07:13:48'),
(333, 49, 50, 'ff', '2023-05-29 07:13:56'),
(334, 52, 49, 'ggg', '2023-05-29 07:22:41'),
(335, 52, 49, 'lll', '2023-05-29 07:24:57'),
(336, 52, 49, 'kk', '2023-05-29 07:25:39'),
(337, 1, 46, 'klkl 47', '2023-05-29 07:26:06'),
(338, 46, 1, 'from 46', '2023-05-29 07:35:18'),
(339, 46, 1, 'dff', '2023-05-29 07:36:55'),
(340, 52, 47, 'ddfd', '2023-05-29 08:14:14'),
(341, 52, 49, 'fgfg', '2023-05-29 08:14:40'),
(342, 52, 49, 'fg', '2023-05-29 08:15:01'),
(343, 52, 53, 'hello is this available to test3', '2023-05-29 08:21:31'),
(344, 53, 52, 'yes available', '2023-05-29 08:22:01'),
(345, 50, 53, 'hello sir', '2023-05-29 08:25:14'),
(346, 50, 49, 'hello', '2023-05-29 08:25:35'),
(347, 53, 50, '', '2023-05-29 08:50:24'),
(348, 53, 50, 'sdsdsd', '2023-05-29 08:50:30'),
(349, 53, 50, 'sdsdsddsdsdsd', '2023-05-29 08:51:52'),
(350, 53, 50, 'dgfdgggdgddfgd', '2023-05-29 08:52:12'),
(351, 53, 50, 'fgdgdfg', '2023-05-29 08:52:16'),
(352, 53, 50, 'gdgfdg', '2023-05-29 08:52:37'),
(353, 53, 52, 'sdsd', '2023-05-29 08:53:18'),
(354, 50, 45, 'dfdf', '2023-05-29 08:56:52'),
(355, 50, 49, 'ghghg', '2023-05-29 08:56:59'),
(356, 50, 49, 'hh', '2023-05-29 08:57:05'),
(357, 53, 52, 'gfg', '2023-05-29 11:51:26'),
(358, 53, 50, 'helo balen', '2023-05-29 11:51:56'),
(359, 50, 53, 'yes', '2023-05-29 11:52:07'),
(360, 50, 53, 'yes 2', '2023-05-29 11:52:37'),
(361, 50, 53, 'hh', '2023-05-29 16:07:55'),
(362, 50, 53, 'gg', '2023-05-29 16:08:14'),
(363, 50, 53, 'fddfdf', '2023-05-29 16:09:04'),
(364, 50, 53, 'ghh', '2023-05-29 16:09:53'),
(365, 50, 53, 'ddfd', '2023-05-29 16:09:59'),
(366, 50, 53, 'fgfg', '2023-05-29 16:10:03'),
(367, 50, 53, 'dff', '2023-05-29 16:10:17'),
(368, 50, 53, 'aa', '2023-05-29 16:10:20'),
(369, 50, 53, 'bbbbbb fgfgf ', '2023-05-29 16:10:32'),
(370, 50, 53, 'ssss bb', '2023-05-29 16:10:54'),
(371, 56, 53, 'hello is this available', '2023-05-29 16:16:02'),
(372, 53, 56, 'yes it is', '2023-05-29 16:16:15'),
(373, 56, 53, 'okay', '2023-05-29 16:23:00'),
(374, 53, 52, 'kk', '2023-05-29 16:25:26'),
(375, 53, 53, 'dfd', '2023-05-29 16:28:18'),
(376, 56, 53, 'hello sir', '2023-05-29 16:29:28'),
(377, 53, 53, 'll', '2023-05-29 16:29:53'),
(378, 53, 53, 'll', '2023-05-29 16:29:58'),
(379, 56, 53, 'ff', '2023-05-29 16:34:36'),
(380, 56, 49, 'is this available', '2023-05-29 16:39:57'),
(381, 56, 47, 'g', '2023-05-29 16:41:15'),
(382, 56, 47, 'gdgdgdf', '2023-05-29 16:41:30'),
(383, 53, 52, 'll', '2023-05-29 17:02:40'),
(384, 53, 52, 'lllll', '2023-05-29 17:02:46'),
(385, 47, 56, 'lll', '2023-05-29 17:03:09'),
(386, 47, 56, 'lkjkj', '2023-05-29 17:03:26'),
(388, 53, 56, 'sdadsad', '2023-05-29 17:14:00'),
(389, 47, 56, 'hjhjhj', '2023-05-29 17:16:35'),
(391, 53, 50, 'fgfgfg', '2023-05-29 17:44:13'),
(392, 53, 50, 'hello mayor ', '2023-05-29 18:29:15'),
(393, 49, 50, 'c', '2023-06-04 07:59:53'),
(394, 57, 49, 'is available?', '2023-06-14 09:35:23'),
(395, 49, 57, 'yess', '2023-06-14 09:37:50'),
(396, 49, 57, 'at itahari', '2023-06-14 09:38:16'),
(397, 49, 57, 'ddf', '2023-06-14 09:38:32'),
(398, 57, 49, 'ffgfgfg', '2023-06-14 09:38:53'),
(399, 57, 49, 'vbvbb', '2023-06-14 09:38:57'),
(400, 49, 57, 'ghghghgh', '2023-06-14 09:40:07'),
(401, 49, 57, 'ffgfgfg', '2023-06-14 09:40:11'),
(402, 50, 49, 'klklk', '2023-06-14 09:41:50'),
(403, 50, 53, 'jkjk', '2023-06-14 09:41:55'),
(404, 50, 53, 'klklk', '2023-06-14 09:42:02'),
(405, 49, 50, 'jjj', '2023-06-14 09:42:25'),
(406, 49, 50, 'fgfgfg', '2023-06-14 09:42:52'),
(407, 49, 50, 'cat', '2023-06-14 09:43:03'),
(408, 50, 49, 'hello pawan', '2023-06-14 09:45:00'),
(409, 50, 49, 'kk', '2023-06-14 09:48:39'),
(410, 50, 1, 'kk', '2023-06-14 09:49:31'),
(411, 50, 49, 'hello sir', '2023-06-21 05:19:45'),
(412, 49, 50, 'yes sir', '2023-06-21 05:19:58'),
(413, 49, 50, 'yesss', '2023-06-21 05:20:14'),
(414, 50, 49, 'ok', '2023-06-21 05:20:19'),
(415, 49, 50, 'okkk', '2023-06-21 05:20:53'),
(416, 49, 50, 'uu', '2023-06-21 05:22:46'),
(417, 50, 49, 'vv', '2023-06-21 05:22:52'),
(418, 49, 50, 'lll', '2023-06-21 05:26:19'),
(419, 49, 50, 'llllllll', '2023-06-21 05:26:46'),
(420, 50, 49, 'jj', '2023-06-21 05:26:50'),
(421, 49, 50, 'lll', '2023-06-21 05:27:00'),
(422, 49, 50, 'mmmm', '2023-06-21 05:27:06'),
(423, 50, 49, 'balen', '2023-06-21 05:27:24'),
(424, 49, 50, 'balen 2', '2023-06-21 05:27:49'),
(425, 50, 53, 'jkjk', '2023-06-23 10:20:18'),
(426, 50, 53, 'hjhjhjhjj', '2023-06-23 10:21:05'),
(427, 50, 53, 'kkkk', '2023-06-23 10:21:19'),
(428, 49, 50, 'Hello pawan', '2023-06-23 10:29:05'),
(429, 50, 49, 'hello pawan', '2023-06-23 10:29:39'),
(430, 50, 49, 'how are you', '2023-06-23 10:30:00'),
(431, 50, 45, 'fgfg', '2023-06-23 10:37:20'),
(432, 49, 50, 'hello pawan', '2023-06-26 09:27:57'),
(433, 50, 49, 'yes balen', '2023-06-26 09:28:05'),
(434, 50, 49, 'hello bca', '2023-06-26 09:38:06'),
(435, 49, 50, 'yes balen', '2023-06-26 09:38:16'),
(436, 50, 49, 'fhh', '2023-06-26 09:38:30'),
(437, 49, 50, 'bb', '2023-06-26 09:38:36'),
(438, 49, 50, 'll', '2023-06-26 09:38:52'),
(439, 49, 50, 'lll', '2023-06-26 09:39:00'),
(440, 50, 49, 'hh', '2023-06-26 09:39:16'),
(441, 50, 49, 'hello agin', '2023-06-26 09:39:36'),
(442, 50, 1, 'hello balen', '2023-06-26 09:40:32'),
(443, 50, 1, 'balen', '2023-06-26 09:40:47'),
(444, 49, 51, 'kkk', '2023-06-26 10:01:25'),
(445, 50, 49, 'is available?', '2023-06-27 09:35:20'),
(446, 49, 50, 'avi', '2023-06-27 09:35:35'),
(447, 50, 49, 'fff', '2023-06-27 09:35:42'),
(448, 50, 49, 'hello can I visit room today?', '2023-07-03 08:25:14'),
(449, 49, 50, 'yes of course', '2023-07-03 08:25:48'),
(450, 50, 49, 'hello sir is this available?', '2023-07-03 09:44:57'),
(451, 49, 50, 'yes available, plase visit us', '2023-07-03 09:45:14'),
(452, 49, 56, 'hello jatha', '2023-07-03 09:56:52'),
(453, 49, 50, 'jatha balen', '2023-07-03 09:57:08'),
(454, 49, 50, 'jkjhkj', '2023-07-03 09:58:24'),
(455, 49, 50, 'kj;lkjjljlk', '2023-07-03 09:58:41'),
(456, 50, 49, 'hello pawan', '2023-07-03 10:00:14'),
(457, 49, 50, 'yes', '2023-07-03 10:00:22'),
(458, 49, 50, 'balen', '2023-07-03 10:00:27'),
(459, 45, 49, 'hello sir', '2023-08-13 23:03:23'),
(460, 49, 45, 'yes miss', '2023-08-13 23:03:39'),
(461, 45, 49, 'is this available', '2023-08-13 23:03:49'),
(462, 50, 53, 'alert();', '2023-08-13 23:28:54'),
(463, 50, 53, 'hi', '2023-08-13 23:29:18'),
(464, 50, 49, 'https://www.google.com/', '2023-08-14 07:54:39'),
(465, 50, 49, 'ff', '2023-08-14 07:58:01'),
(466, 50, 49, 'hello sir', '2023-08-14 08:36:15'),
(467, 49, 50, 'hi balen, how can I help you', '2023-08-14 08:36:28');

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

INSERT INTO `posts` (`p_id`, `p_title`, `user_id`, `p_category`, `p_city`, `p_address`, `p_price`, `p_description`, `p_latitude`, `p_longitude`, `p_status`, `is_approved`, `p_created`) VALUES
(14, '2 rooms', 1, '1', 3, 'Samyukta Chok,(near V.A School)', 2324, 'aas', 26.673493750000002, 87.27725575000001, 1, 1, '2023-05-09 08:41:01'),
(15, '2rromsplus', 1, '2', 6, 'Dolorum vitae conseq', 53, 'Eveniet aute hic vo', 26.6836911, 87.2776712, 0, 1, '2023-05-09 08:42:29'),
(17, 'nykofok@mailinator.com', 1, 'Select Category', 2, 'Id consectetur solut', 729, 'Tempor maxime deseru', 0, 0, 0, 1, '2023-05-09 08:51:05'),
(18, 'cehodyk@mailinator.com', 1, 'Select Category', 2, 'Officiis beatae ulla', 88, 'Ad rerum quo et temp', 0, 0, 0, 1, '2023-05-09 08:51:26'),
(19, 'cehodyk@mailinator.com', 1, '3', 2, 'Officiis beatae ulla', 88, 'Ad rerum quo et temp', 0, 0, 0, 1, '2023-05-09 08:51:54'),
(22, 'dyxegip@mailinator.com', 1, '2', 2, 'Repellendus Laboris', 971, 'Consequat Id qui si', 0, 0, 0, 1, '2023-05-09 19:30:23'),
(24, 'tedi@mailinator.com', 1, '3', 2, 'Magni laborum facere', 591, 'Pariatur In qui rer', 26.6836911, 87.2776712, 0, 1, '2023-05-09 19:37:15'),
(43, 'Flat for rent2', 47, '1', 2, 'Itahari-4', 10000, 'Big size flat', 26.6653197, 87.2806118, 1, 1, '2023-05-20 08:40:58'),
(45, 'Nostrud inventore eu23', 45, '3', 1, 'Culpa irure et mini', 757, 'Ut explicabo Offici', 26.6653079, 87.2806777, 1, 2, '2023-05-20 19:54:37'),
(55, 'rtrt', 49, '1', 4, 'rtrt', 4545, 'dfd', 26.66548965, 87.28013449999999, 1, 1, '2023-08-13 20:32:03'),
(56, '2 room', 50, '1', 4, 'Samyukta Chok,(near V.A School)', 3000, 'room', 26.673433642857148, 87.27725421428572, 1, 1, '2023-08-17 19:03:02'),
(57, 'fggf', 49, '1', 4, 'Samyukta Chok,(near V.A School)', 300, 'rttrt', 26.6650771, 87.2592579, 1, 1, '2023-08-17 20:00:33'),
(58, 'Room  for Students', 49, '1', 4, 'Kathmandu 4', 4000, 'Room suitable for students and study', 26.673209, 87.277111, 1, 1, '2023-09-09 09:43:09'),
(59, 'Big room for family', 49, '5', 6, 'Samyukta Chok,(near V.A School)', 4000, 'Good and big room', 26.67318, 87.277135, 1, 1, '2023-09-09 09:44:00'),
(60, 'Room rent', 49, '6', 3, 'Biratnagar 5', 4000, 'Good room', 26.673199, 87.277316, 1, 1, '2023-09-09 09:44:56');

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
(12, 'Screenshot (40).png', 15, 'active', '2023-05-12 09:18:27'),
(19, 'Screenshot (10).png', 17, 'active', '2023-05-12 09:18:27'),
(20, 'Screenshot (11).png', 18, 'active', '2023-05-12 09:18:27'),
(21, 'Screenshot (11).png', 19, 'active', '2023-05-12 09:18:27'),
(25, 'Screenshot (130).png', 22, 'active', '2023-05-12 09:18:27'),
(26, 'Screenshot (217).png', 22, 'active', '2023-05-12 09:18:27'),
(58, 'Screenshot (2).png', 24, 'active', '2023-05-14 10:48:53'),
(59, 'Screenshot (16).png', 24, 'active', '2023-05-14 10:48:53'),
(75, '1640447592118.jpg', 45, 'active', '2023-05-20 19:54:37'),
(104, 'photo-1633332755192-727a05c4013d.jpeg', 45, 'active', '2023-08-15 17:50:30'),
(105, 'vlcsnap-2023-06-03-14h24m28s428.png', 45, 'active', '2023-08-15 17:50:30'),
(106, 'vlcsnap-2023-08-14-06h35m41s186 (2).png', 15, 'active', '2023-08-16 08:16:02'),
(107, 'WhatsApp Image 2023-08-13 at 18.27.48.jpg', 14, 'active', '2023-08-16 16:47:05'),
(108, 'WhatsApp Image 2023-08-13 at 18.27.47.jpg', 14, 'active', '2023-08-16 16:47:25'),
(109, 'WhatsApp Image 2023-08-13 at 18.27.47.jpg', 56, 'active', '2023-08-17 19:03:02'),
(111, 'download (1).jpeg', 56, 'active', '2023-08-17 19:07:29'),
(117, 'images.jpeg', 57, 'active', '2023-09-09 09:37:23'),
(118, 'download (1).jpeg', 57, 'active', '2023-09-09 09:37:23'),
(119, 'industrial_bedroom_jaxonbed_1.jpg', 57, 'active', '2023-09-09 09:37:23'),
(120, 'hello-guest-house.jpg', 43, 'active', '2023-09-09 09:38:30'),
(121, 'wall-paint-color-ideas-for-home.jpg', 55, 'active', '2023-09-09 09:39:37'),
(122, 'download.jpeg', 55, 'active', '2023-09-09 09:39:37'),
(123, 'download (2).jpeg', 58, 'active', '2023-09-09 09:43:09'),
(124, 'images (1).jpeg', 58, 'active', '2023-09-09 09:43:09'),
(125, 'images (3).jpeg', 59, 'active', '2023-09-09 09:44:00'),
(126, 'images (2).jpeg', 59, 'active', '2023-09-09 09:44:00'),
(127, '07cece81324c9426febc095e65490654.jpg', 60, 'active', '2023-09-09 09:44:56');

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
(1, 'Test Owner', 'test@gmail.com', '12', '2023-05-18 06:51:19', '9842057828'),
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
(47, 'SuperAdmin', 'superadmin@gmail.com', 'superadmin', '2023-05-20 08:38:44', '987'),
(48, 'Sandesh', '98@gmail.com', '12', '2023-05-24 08:48:58', '9866252'),
(49, 'Pawan Acharya', 'pawan@gmail.com', '12', '2023-05-25 08:36:35', '9812345678'),
(50, 'Balen Shah', 'balen@gmail.com', '12', '2023-05-25 08:39:06', '981234567'),
(51, 'Aasish Shrestha', 'aasish@gmail.com', '12', '2023-05-27 06:07:27', '9812345678'),
(52, 'Tenent1', 'tenent@gmail.com', '12', '2023-05-27 17:06:28', '56565'),
(53, 'Test3', 'test3@gmail.com', '12', '2023-05-29 08:16:46', '3434'),
(55, 'Joy Heath', '12@mailinator.com', '12', '2023-05-29 16:14:11', '4545'),
(56, 'Charissa Solomon', '12@gmail.com', '12', '2023-05-29 16:15:16', '545'),
(57, 'Sandesh', '88@gmail.com', '123', '2023-06-14 09:34:33', '456789'),
(61, 'aasish shrestha', 'aa@gmail.com', '12', '2023-08-13 19:12:45', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citylists`
--
ALTER TABLE `citylists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interested`
--
ALTER TABLE `interested`
  ADD PRIMARY KEY (`i_id`),
  ADD UNIQUE KEY `unique_entry` (`user_id`,`post_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`m_id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `citylists`
--
ALTER TABLE `citylists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `interested`
--
ALTER TABLE `interested`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=468;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `post_images_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
