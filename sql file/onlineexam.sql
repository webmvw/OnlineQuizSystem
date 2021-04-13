-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 11:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_16_045908_create_roles_table', 1),
(7, '2021_04_12_035051_create_quizzes_table', 3),
(10, '2021_04_11_175608_create_questions_table', 4),
(11, '2021_04_11_175629_create_question_answers_table', 4),
(12, '2021_04_13_055803_create_student_quiz_results_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question_no`, `question`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'What is the other name for a chip?', '2021-04-11 23:27:52', '2021-04-11 23:27:52'),
(2, 7, 2, 'The first internet based news agency of Bangladesh is -', '2021-04-11 23:29:43', '2021-04-11 23:29:43'),
(4, 6, 1, 'HTML stands for what?', '2021-04-11 23:32:11', '2021-04-11 23:32:11'),
(5, 6, 2, 'Who is making the Web Standards?', '2021-04-11 23:33:16', '2021-04-11 23:33:16'),
(7, 6, 3, 'What is the correct HTML tag for inserting a line break?', '2021-04-12 05:55:24', '2021-04-12 05:55:24'),
(8, 7, 3, 'Monitor in a computer device knows as -', '2021-04-13 02:49:05', '2021-04-13 02:49:05'),
(9, 7, 4, 'A computer cannot work withwout-', '2021-04-13 02:50:23', '2021-04-13 02:50:23'),
(10, 7, 5, 'What does GUI Stand for?', '2021-04-13 02:51:51', '2021-04-13 02:51:51'),
(11, 7, 6, 'How Many columns does MS-Excel have?', '2021-04-13 02:53:01', '2021-04-13 02:53:01'),
(12, 7, 7, 'The extension of MS-Word file is?', '2021-04-13 02:53:56', '2021-04-13 02:53:56'),
(13, 7, 8, 'What type of software the MS-Excel is?', '2021-04-13 02:55:19', '2021-04-13 02:55:19'),
(14, 7, 9, 'The formula of calculating an average of cell A1 to A20 is?', '2021-04-13 02:57:20', '2021-04-13 02:57:20'),
(15, 7, 10, 'One kilobyte is equivalent to?', '2021-04-13 02:58:50', '2021-04-13 02:58:50'),
(16, 6, 4, 'Choose the correct HTML tag for the largest heading.', '2021-04-13 03:02:35', '2021-04-13 03:02:35'),
(17, 6, 5, 'What is the correct sequence of HTML tags for starting a webpage?', '2021-04-13 03:04:32', '2021-04-13 03:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

CREATE TABLE `question_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `right_answer` int(11) NOT NULL COMMENT '1:right answer|0:false answer',
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_answers`
--

INSERT INTO `question_answers` (`id`, `quiz_id`, `question_no`, `right_answer`, `answer`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, 'IC', '2021-04-11 23:27:52', '2021-04-11 23:27:52'),
(2, 7, 1, 0, 'ROM', '2021-04-11 23:27:52', '2021-04-11 23:27:52'),
(3, 7, 1, 0, 'LAN', '2021-04-11 23:27:52', '2021-04-11 23:27:52'),
(4, 7, 1, 0, 'RAM', '2021-04-11 23:27:52', '2021-04-11 23:27:52'),
(5, 7, 2, 0, 'E-News', '2021-04-11 23:29:43', '2021-04-11 23:29:43'),
(6, 7, 2, 1, 'BD News', '2021-04-11 23:29:43', '2021-04-11 23:29:43'),
(7, 7, 2, 0, 'NTV News', '2021-04-11 23:29:43', '2021-04-11 23:29:43'),
(8, 7, 2, 0, 'Cafe News', '2021-04-11 23:29:43', '2021-04-11 23:29:43'),
(13, 6, 1, 0, 'Hypertrophic Management Language', '2021-04-11 23:32:11', '2021-04-11 23:32:11'),
(14, 6, 1, 0, 'Hyperberic Tertiary Logrithm', '2021-04-11 23:32:11', '2021-04-11 23:32:11'),
(15, 6, 1, 1, 'Hypertext Markup Language', '2021-04-11 23:32:11', '2021-04-11 23:32:11'),
(16, 6, 1, 0, 'Hyperresonant Marginal Logrithm', '2021-04-11 23:32:11', '2021-04-11 23:32:11'),
(17, 6, 2, 0, 'Mozilla', '2021-04-11 23:33:16', '2021-04-11 23:33:16'),
(18, 6, 2, 0, 'Microsoft', '2021-04-11 23:33:16', '2021-04-11 23:33:16'),
(19, 6, 2, 0, 'Apple', '2021-04-11 23:33:16', '2021-04-11 23:33:16'),
(20, 6, 2, 1, 'The World Wide Web Consortium', '2021-04-11 23:33:16', '2021-04-11 23:33:16'),
(25, 6, 3, 0, 'break', '2021-04-12 05:55:24', '2021-04-12 05:55:24'),
(26, 6, 3, 1, 'br', '2021-04-12 05:55:24', '2021-04-12 05:55:24'),
(27, 6, 3, 0, 'hr', '2021-04-12 05:55:24', '2021-04-12 05:55:24'),
(28, 6, 3, 0, 'back', '2021-04-12 05:55:24', '2021-04-12 05:55:24'),
(29, 7, 3, 1, 'Output', '2021-04-13 02:49:06', '2021-04-13 02:49:06'),
(30, 7, 3, 0, 'Input Device', '2021-04-13 02:49:06', '2021-04-13 02:49:06'),
(31, 7, 3, 0, 'I/O device', '2021-04-13 02:49:06', '2021-04-13 02:49:06'),
(32, 7, 3, 0, 'None of these above', '2021-04-13 02:49:06', '2021-04-13 02:49:06'),
(33, 7, 4, 0, 'Hard Disk', '2021-04-13 02:50:23', '2021-04-13 02:50:23'),
(34, 7, 4, 0, 'Floppy Disk', '2021-04-13 02:50:23', '2021-04-13 02:50:23'),
(35, 7, 4, 1, 'Operating System', '2021-04-13 02:50:23', '2021-04-13 02:50:23'),
(36, 7, 4, 0, 'Mouse', '2021-04-13 02:50:23', '2021-04-13 02:50:23'),
(37, 7, 5, 0, 'Graphical User Icon', '2021-04-13 02:51:51', '2021-04-13 02:51:51'),
(38, 7, 5, 1, 'Graphical User Interface', '2021-04-13 02:51:51', '2021-04-13 02:51:51'),
(39, 7, 5, 0, 'Global User Interface', '2021-04-13 02:51:51', '2021-04-13 02:51:51'),
(40, 7, 5, 0, 'Gates Universal Interface', '2021-04-13 02:51:51', '2021-04-13 02:51:51'),
(41, 7, 6, 0, '255', '2021-04-13 02:53:01', '2021-04-13 02:53:01'),
(42, 7, 6, 1, '256', '2021-04-13 02:53:01', '2021-04-13 02:53:01'),
(43, 7, 6, 0, '250', '2021-04-13 02:53:02', '2021-04-13 02:53:02'),
(44, 7, 6, 0, '356', '2021-04-13 02:53:02', '2021-04-13 02:53:02'),
(45, 7, 7, 1, 'doc', '2021-04-13 02:53:56', '2021-04-13 02:53:56'),
(46, 7, 7, 0, 'dbf', '2021-04-13 02:53:56', '2021-04-13 02:53:56'),
(47, 7, 7, 0, 'bdf', '2021-04-13 02:53:56', '2021-04-13 02:53:56'),
(48, 7, 7, 0, 'none', '2021-04-13 02:53:56', '2021-04-13 02:53:56'),
(49, 7, 8, 0, 'Word Processing Software', '2021-04-13 02:55:19', '2021-04-13 02:55:19'),
(50, 7, 8, 0, 'Database Software', '2021-04-13 02:55:19', '2021-04-13 02:55:19'),
(51, 7, 8, 0, 'Opering system Software', '2021-04-13 02:55:19', '2021-04-13 02:55:19'),
(52, 7, 8, 1, 'Spreadsheet Software', '2021-04-13 02:55:19', '2021-04-13 02:55:19'),
(53, 7, 9, 0, '=Average(a1*b20)', '2021-04-13 02:57:20', '2021-04-13 02:57:20'),
(54, 7, 9, 0, '=Average(a1:b20)', '2021-04-13 02:57:20', '2021-04-13 02:57:20'),
(55, 7, 9, 0, '=Average(a1*a20)', '2021-04-13 02:57:20', '2021-04-13 02:57:20'),
(56, 7, 9, 1, '=Average(a1:a20)', '2021-04-13 02:57:20', '2021-04-13 02:57:20'),
(57, 7, 10, 0, '1000 byte', '2021-04-13 02:58:50', '2021-04-13 02:58:50'),
(58, 7, 10, 1, '1024 byte', '2021-04-13 02:58:50', '2021-04-13 02:58:50'),
(59, 7, 10, 0, '1012 byte', '2021-04-13 02:58:50', '2021-04-13 02:58:50'),
(60, 7, 10, 0, '1048 byte', '2021-04-13 02:58:50', '2021-04-13 02:58:50'),
(61, 6, 4, 0, 'h2', '2021-04-13 03:02:35', '2021-04-13 03:02:35'),
(62, 6, 4, 1, 'h1', '2021-04-13 03:02:35', '2021-04-13 03:02:35'),
(63, 6, 4, 0, 'H6', '2021-04-13 03:02:35', '2021-04-13 03:02:35'),
(64, 6, 4, 0, 'H3', '2021-04-13 03:02:35', '2021-04-13 03:02:35'),
(65, 6, 5, 0, 'Head, Title, HTML', '2021-04-13 03:04:32', '2021-04-13 03:04:32'),
(66, 6, 5, 1, 'HTML, Head, Title', '2021-04-13 03:04:32', '2021-04-13 03:04:32'),
(67, 6, 5, 0, 'Title, head, html', '2021-04-13 03:04:32', '2021-04-13 03:04:32'),
(68, 6, 5, 0, 'html, title, head', '2021-04-13 03:04:32', '2021-04-13 03:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_mark` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `total_question` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `name`, `total_mark`, `time`, `total_question`, `status`, `created_at`, `updated_at`) VALUES
(1, 'General Knowledge', 10, 10, 10, 0, '2021-04-11 22:24:16', '2021-04-11 22:24:16'),
(2, 'History', 8, 8, 8, 0, '2021-04-11 22:24:50', '2021-04-11 22:24:50'),
(3, 'Zoom Quizzes', 10, 10, 10, 0, '2021-04-11 22:25:12', '2021-04-11 22:32:38'),
(5, 'Science', 10, 10, 10, 0, '2021-04-11 22:38:08', '2021-04-11 22:38:08'),
(6, 'HTML', 5, 5, 5, 1, '2021-04-11 23:12:18', '2021-04-13 03:04:46'),
(7, 'ICT', 10, 10, 10, 1, '2021-04-11 23:19:17', '2021-04-13 03:00:47'),
(8, 'Basic Laravel', 10, 10, 10, 0, '2021-04-12 05:08:49', '2021-04-12 05:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-04-11 11:21:42', '2021-04-11 11:21:42'),
(2, 'User', '2021-04-11 11:21:42', '2021-04-11 11:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `student_quiz_results`
--

CREATE TABLE `student_quiz_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `total_mark` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2 COMMENT '1:admin|2:user',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1:active|0:inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `religion`, `id_no`, `dob`, `code`, `role_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md. Masud Rana', 'masudrana.bbpi@gmail.com', NULL, '$2y$10$cYgTRLkUujQwyhI1ZY/RheUWWzVJ/4v5Sh1jiOu1sVvL2Ic3T3gme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2021-04-11 11:21:42', '2021-04-11 11:21:42'),
(2, 'Md. Mamunur Rahman', 'mamun1213@gmail.com', NULL, '$2y$10$eihjLK9VN2UeNYqusO2cj.2jMcBcM2PRhnwXV2cq0GatjGrrPJ2vC', 1745842511, 'Bogura', 'Male', '1618247450manunur rahman.jpg', 'Islam', '72000001', '2002-08-12', 9575, 2, 1, NULL, '2021-04-12 11:10:50', '2021-04-12 11:10:50'),
(3, 'Nokibul Hasan', 'nakibul1213@gmail.com', NULL, '$2y$10$srj0qbobzbUuCBC1qNyRk.fpPjrSE996n7vdGTLq/04tToPyXGBYy', 1475457578, 'kurigram', 'Male', '1618247514nokibul hasan.jpg', 'Islam', '40150003', '1999-12-12', 8811, 2, 1, NULL, '2021-04-12 11:11:54', '2021-04-12 11:11:54'),
(4, 'Nasim Mahmud', 'nasim1213@gmail.com', NULL, '$2y$10$iVW5WTXYrKcb0O3xR11tge76hL0mvvXrMpu3BUUc8jVFNEqwZmMCW', 1245487548, 'Narsingdi', 'Male', '1618247568nasim.jpg', 'Islam', '85330004', '1998-10-24', 8849, 2, 1, NULL, '2021-04-12 11:12:48', '2021-04-12 11:12:48'),
(5, 'Moharia Khaton', 'moharani512@gmail.com', NULL, '$2y$10$Wsy/qGdeplGfUWsY2j20qefbf3k9PMAk3Ys2AUqyox/o8vRQqB9ze', 1745845124, 'Narsingdi', 'Female', '1618247619moharani.jpg', 'Islam', '1090005', '2005-01-26', 220, 2, 1, NULL, '2021-04-12 11:13:39', '2021-04-12 11:13:39'),
(6, 'Nasir Uddin', 'nasir512@gmail.com', NULL, '$2y$10$zWt1WVJm8J3BQ2uJ9/y4nuAjIm6Qw/xXgyJ7hBEWVvzAax/A6NUT6', 1745256548, 'Panchagor', 'Male', '1618247727nasim(19153).jpg', 'Islam', '87460006', '1999-05-03', 1072, 2, 1, NULL, '2021-04-12 11:15:27', '2021-04-12 11:15:27'),
(7, 'Mst. Rahima khatun', 'rahima512@gmail.com', NULL, '$2y$10$u5nN/Er.59x7u4v9GJBUu.OUJ6k4EjiLxwtgXAJUGhjmiR1dkubme', 1745842511, 'Bogura', 'Female', '1618247791Rohima khatun.jpg', 'Islam', '88770007', '1997-12-12', 6109, 2, 1, NULL, '2021-04-12 11:16:31', '2021-04-12 11:35:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_answers`
--
ALTER TABLE `question_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_quiz_results`
--
ALTER TABLE `student_quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `question_answers`
--
ALTER TABLE `question_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_quiz_results`
--
ALTER TABLE `student_quiz_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
