-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2019 at 10:45 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cgr`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `leader_id` int(10) UNSIGNED NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_cg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_cg` time NOT NULL,
  `cluster_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `leader_id`, `department`, `day_cg`, `time_cg`, `cluster_area`, `venue`, `created_at`, `updated_at`) VALUES
(1, 3, 'women', 'Friday', '17:30:00', 'clark', 'oclub', '2019-08-07 17:45:34', '2019-08-07 17:45:34'),
(2, 4, 'women', 'Monday', '19:00:00', 'clark', 'clark 2', '2019-08-07 17:55:21', '2019-08-07 17:55:21'),
(4, 2, 'youth', 'Sunday', '15:30:00', 'malabanias', 'church', '2019-08-07 22:56:48', '2019-08-07 22:56:48'),
(6, 4, 'women', 'Wednesday', '19:27:00', 'clark', 'air base clark asd', '2019-08-11 23:32:04', '2019-08-11 23:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_05_162612_create_groups_table', 1),
(4, '2019_08_13_092003_create_reports_table', 1),
(5, '2019_08_20_161832_add_department_to_reports', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `leader_id` int(10) UNSIGNED NOT NULL,
  `cg_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'cg',
  `day_cg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_cg` time NOT NULL,
  `venue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cluster_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offering` double(15,4) DEFAULT NULL,
  `present` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `absent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consolidation_report` text COLLATE utf8mb4_unicode_ci,
  `date_submitted` timestamp NULL DEFAULT NULL,
  `comment_ch` text COLLATE utf8mb4_unicode_ci,
  `date_verified_ch` timestamp NULL DEFAULT NULL,
  `comment_dh` text COLLATE utf8mb4_unicode_ci,
  `date_verified_dh` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `leader_id`, `cg_id`, `type`, `day_cg`, `time_cg`, `venue`, `cluster_area`, `topic`, `offering`, `present`, `absent`, `consolidation_report`, `date_submitted`, `comment_ch`, `date_verified_ch`, `comment_dh`, `date_verified_dh`, `deleted_at`, `created_at`, `updated_at`, `department`) VALUES
(2, 4, 6, 'cg', 'Sunday', '17:30:00', 'new report venue', 'clark', 'new report topic', 25.0000, '5', NULL, 'c\r\no\r\nn\r\ns\r\no\r\nl\r\ni\r\nd\r\na\r\nt\r\ni\r\no\r\n\'\r\n\"\r\n/\r\n~\r\nn', '2019-08-15 07:14:37', 'test\r\nui', '2019-08-20 09:09:15', 'approve\r\nby\r\nthe \r\ndeparment\r\nhead\r\nme', '2019-08-21 03:35:30', '2019-08-22 05:49:36', '2019-08-16 06:35:19', '2019-08-22 05:49:36', 'women'),
(3, 4, 6, 'cg', 'Friday', '07:57:00', 'CHURCH 123', 'clark', 'test TOPIC 123', 456.8700, '5,7', NULL, 'test', '2019-08-19 08:32:56', NULL, NULL, NULL, NULL, '2019-08-22 03:52:25', '2019-08-19 08:32:56', '2019-08-22 03:52:25', 'women'),
(4, 4, 6, 'cg', 'Saturday', '03:55:00', 'test venue', 'clark', 'test topic', 32231.0000, '7', '5', 'test\r\nre\r\nport', '2019-08-21 03:49:41', NULL, NULL, NULL, NULL, NULL, '2019-08-21 03:49:41', '2019-08-21 03:49:41', 'women'),
(5, 3, 1, 'cg', 'Monday', '05:55:00', 'bonk', 'clark', 'bonk topic', 412.0000, '6', NULL, 'test', '2019-08-21 08:13:58', 'approve\r\nmy\r\nreport', '2019-08-21 08:15:13', 'check !', '2019-08-22 08:12:33', NULL, '2019-08-21 08:13:58', '2019-08-22 08:12:33', 'women');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `age` int(10) UNSIGNED NOT NULL,
  `group_age` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cluster_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_cluster_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `journey` char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pre-believer',
  `cldp` tinyint(4) DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `leader_id` int(10) UNSIGNED NOT NULL,
  `cg_id` int(10) UNSIGNED DEFAULT NULL,
  `is_leader` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `gender`, `birthday`, `age`, `group_age`, `address`, `cluster_area`, `head_cluster_area`, `head_department`, `contact`, `journey`, `cldp`, `username`, `password`, `type`, `leader_id`, `cg_id`, `is_leader`, `is_active`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Erwin', NULL, 'Capati', 'master@gmail.com', 'm', NULL, 0, 'youth', 'Some Address', 'clarkview 1', NULL, NULL, NULL, 'pre-believer', NULL, 'master', '$2y$10$v7Wr1lAM4mqw55CJ4sNbO.YlatLlDAaPWZMtj2P9bJCyg.Svcwp7e', 'master', 0, NULL, 0, 1, 'q9lr9p2XveCCI5dApdIzMEmFIFnJfwCV52SzYeULrrBc5vkvfEVaQZbl5YTo', NULL, '2019-05-26 19:38:17', '2019-08-07 21:33:15'),
(2, 'Sharon Rose', 'Ordillo', 'Tiru', NULL, 'f', NULL, 55, 'women', 'Church', 'malabanias', NULL, 'women', NULL, 'leader', 3, 'sharon', '$2y$10$mwiGBOpiT7aYkGbbb1TNkeHptsc2RbmSq1cCS/OJzaJ1Ii.zDG/BC', 'department head', 0, NULL, 1, 1, 'YDJ8WPDI6rIvgUI9lQlEaJTfWEnSibUJth1moiteRwhSLH5e4hV8AEJnuGY0', NULL, '2019-08-07 21:33:37', '2019-08-14 03:29:18'),
(3, 'Machelle', NULL, 'Del Mundo', NULL, 'f', '1996-04-15', 23, 'women', 'Machelle Address', 'clark', 'clark', NULL, '1234567', 'leader', 3, 'machelle', '$2y$10$0LdWioI4QKEiYOTfqH4yDeXFUWuxfFAw20UExkIgjf4dVOx2am7m.', 'cluster head', 2, 4, 1, 1, 'bOS2OkEcmP3piwIoGJdVmeUJtFToJw9rZ74Ja95uXJRpgQI3Ow9LvkGcDq3Y', NULL, '2019-08-07 09:32:40', '2019-08-20 06:48:52'),
(4, 'Narlyn', NULL, 'Soberano', NULL, 'f', '1996-04-15', 23, 'women', 'Narlyn Soberano address', 'clark', NULL, NULL, '321123', 'leader', 3, 'narlyn', '$2y$10$N./6wJ7jWfvP3s2FSTB35OTW3/Kk3OV0ju5Cz3xAFFO64qWwGFHGC', 'leader', 2, 4, 1, 1, 'ee1SG88hXXK5ZP0sANewt8pH5JdldXD2GHfI3yMdesCsY0WcFlDQB2p1sNle', NULL, '2019-08-05 22:19:19', '2019-08-14 08:28:58'),
(5, 'Sonia', 'ANGELES', 'Pili', NULL, 'f', NULL, 35, 'women', 'Sonia Pili ADDRESS', 'clark', NULL, NULL, '321317', 'believer', 2, NULL, '$2y$10$C36X9.k./fidSjUoqT325OHbDKgNL9ox2ZQxTQM4QIZnKYGvEq3Gy', 'member', 4, 6, 0, 1, 'EO6tKbfDz919J4U3yzM1CXqhBbKZKTfv07bCTt68', NULL, '2019-08-05 22:39:24', '2019-08-15 06:50:15'),
(6, 'Alpha', NULL, 'Bansil', NULL, 'f', '1990-06-05', 29, 'women', 'Alpha Bansil Address', 'clark', NULL, NULL, NULL, 'believer', 1, NULL, '$2y$10$b7onsn1IG3qION5j8cgbxeZVsvY2W1r7hISKZCSs7DBpzNIZrfnn2', 'member', 3, 1, 0, 0, 'E090FBO8UV6RSQWWisvGNtQucvDyHEUc4hzJhQj6', NULL, '2019-08-07 17:42:54', '2019-08-08 10:58:59'),
(7, 'Shaira', NULL, 'Isip', NULL, 'f', NULL, 23, 'youth', 'Clark barracks', 'clark', NULL, NULL, NULL, 'disciple', 3, NULL, '$2y$10$o.dLCzSD0cDO1ZsCP.8mnuExsBbTAuXJcoSbjJojUwRxykHf1SgDG', 'member', 4, 6, 1, 1, 'jPgfctSdtFdJyuXolg2Zj0KjKhXxhy0f8ZxUt5eA', NULL, '2019-08-08 14:27:02', '2019-08-15 06:50:15'),
(8, 'Augusto', NULL, 'Resada', NULL, 'm', NULL, 57, 'men', 'Angeles City', 'angeles', NULL, 'men', NULL, 'leader', 3, 'augusto', '$2y$10$DRgaVz6ELXTGgNR9/jAcYezUojqPiM2h2sx7xyJPJZIaK4Vgo9Vbe', 'department head', 0, NULL, 1, 1, 'OX6d1BwHZZnFOs9yNj8wLvhlFoKmBFb6Pi4Beot2nwpuWVGU2cGOshhdGyEH', NULL, '2019-08-11 19:50:22', '2019-08-11 19:50:22'),
(9, 'Bong', NULL, 'Tiru', NULL, 'm', NULL, 45, 'men', 'Church', 'clarkview', NULL, NULL, NULL, 'leader', 3, 'bong', '$2y$10$wZzeYjJtW5vGrBzVZ/cs7.Kmf/jFsoGYQ2E9WTdPZZZ/aP0jQLA/u', 'admin', 0, NULL, 1, 1, '7HoFYbK8YWd2cCYg9C2q7MMEVY9Kv5U4iv8GmdyR', NULL, '2019-08-11 21:17:50', '2019-08-11 21:24:40'),
(10, 'Jason', NULL, 'Nabong sadasdas', NULL, 'm', NULL, 33, 'Men', 'santol st malabanias', 'malabanias', NULL, NULL, NULL, 'disciple', 2, NULL, '$2y$10$D5DDiqcTflLO1x7khxB26OLxMmkGMLl3UMZ6Qsj.mjoWe4C3Qns6G', 'member', 0, NULL, 0, 1, 'WoQxoTQufGk2V58eW3ssMRFtaQt5VqBZ9Mc6NsRr', NULL, '2019-08-12 01:15:00', '2019-08-12 01:17:16'),
(11, '123', '456', '789', 'TEST@GMAIL.COM', 'f', '1996-04-15', 25, 'women', '6789', '0123', '789', NULL, '456', 'disciple', 2, 'test123', '$2y$10$5TSV4FrHP6WmMuiYKwyHZ.0jpYW/3VP430QiTu5tSUuLFLHAIpjwS', 'member', 2, 4, 0, 1, 'x93EhzMaxsz3nXiA0gZQXPaJ0WEApvpfrITW3qYp', NULL, '2019-08-14 03:38:08', '2019-08-15 09:10:44'),
(12, 'abc', 'efg', 'hij', 'temp@temp.com', 'f', '1997-04-15', 35, 'youth', 'test addresses', 'test cluster', NULL, NULL, '123456', 'disciple', 2, NULL, NULL, 'member', 2, 4, 0, 1, 'x93EhzMaxsz3nXiA0gZQXPaJ0WEApvpfrITW3qYp', NULL, '2019-08-14 03:41:51', '2019-08-15 09:10:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_head_cluster_area_unique` (`head_cluster_area`),
  ADD UNIQUE KEY `users_head_department_unique` (`head_department`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
