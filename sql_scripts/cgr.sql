-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2019 at 03:49 AM
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
(3, '2019_08_05_162612_create_groups_table', 1);

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

INSERT INTO `groups` (`id`, `leader_id`, `department`, `day_cg`, `time_cg`, `cluster_area`, `venue`, `created_at`, `updated_at`) VALUES
(1, 3, 'women', 'Friday', '17:30:00', 'clark', 'oclub', '2019-08-08 09:45:34', '2019-08-08 09:45:34'),
(2, 4, 'women', 'Monday', '19:00:00', 'clark', 'clark 2', '2019-08-08 09:55:21', '2019-08-08 09:55:21'),
(4, 2, 'youth', 'Sunday', '15:30:00', 'malabanias', 'church', '2019-08-08 14:56:48', '2019-08-08 14:56:48');

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `gender`, `birthday`, `age`, `group_age`, `address`, `cluster_area`, `head_cluster_area`, `contact`, `journey`, `cldp`, `username`, `password`, `type`, `leader_id`, `cg_id`, `is_leader`, `is_active`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Erwin', NULL, 'Capati', 'master@gmail.com', 'm', NULL, 0, 'youth', 'Some Address', 'clarkview 1', NULL, NULL, 'pre-believer', NULL, 'master', '$2y$10$v7Wr1lAM4mqw55CJ4sNbO.YlatLlDAaPWZMtj2P9bJCyg.Svcwp7e', 'master', 0, NULL, 0, 1, 'yOSyN2EXJYACukOF4oMeyk0mfaKM48ZCDbOqowOCbvRFw9XgJnArV0v0sJce', NULL, '2019-05-27 11:38:17', '2019-08-08 13:33:15'),
(2, 'Sharon Rose', 'Ordillo', 'Tiru', NULL, 'f', NULL, 55, 'women', 'Church', 'malabanias', NULL, NULL, 'leader', 3, 'admin', '$2y$10$qNHVGlf9V1IX/u8FSfjCI.fvBYdM5QBszsEUjUvlKnnOAQdB2svHe', 'admin', 0, NULL, 1, 1, 'VTR3OPg35PIUY5E0DA1eTMZIOl7lbNVHwwMLDzB7', NULL, '2019-08-08 13:33:37', '2019-08-08 13:33:37'),
(3, 'Machelle', NULL, 'Del Mundo', NULL, 'f', '1996-04-15', 23, 'women', 'Machelle Address', 'clark', 'Clark', '1234567', 'leader', 3, 'machelle', '$2y$10$0LdWioI4QKEiYOTfqH4yDeXFUWuxfFAw20UExkIgjf4dVOx2am7m.', 'cluster head', 2, 4, 1, 1, 'OXKzaT5Rfyk692kCUEEVsZSLXrE4XdSvJzTqcCx7tzl2obIYRBh87mdZH3wp', NULL, '2019-08-08 01:32:40', '2019-08-09 07:11:07'),
(4, 'Narlyn', NULL, 'Soberano', NULL, 'f', '1996-04-15', 23, 'women', 'Narlyn Soberano address', 'clark', NULL, '321123', 'leader', 3, 'narlyn', '$2y$10$N./6wJ7jWfvP3s2FSTB35OTW3/Kk3OV0ju5Cz3xAFFO64qWwGFHGC', 'leader', 2, 4, 1, 1, 'TtgtCpqix0wqIuYrtT7BpOB78X2hwSWz6pqX32mcZFRFBigWCgCNF3tpCIYL', NULL, '2019-08-06 14:19:19', '2019-08-08 14:56:48'),
(5, 'Sonia', 'ANGELES', 'Pili', NULL, 'f', NULL, 35, 'women', 'Sonia Pili ADDRESS', 'clark', NULL, '321317', 'believer', 2, NULL, '$2y$10$C36X9.k./fidSjUoqT325OHbDKgNL9ox2ZQxTQM4QIZnKYGvEq3Gy', 'member', 4, 2, 0, 1, 'EO6tKbfDz919J4U3yzM1CXqhBbKZKTfv07bCTt68', NULL, '2019-08-06 14:39:24', '2019-08-08 14:07:45'),
(6, 'Alpha', NULL, 'Bansil', NULL, 'f', '1990-06-05', 29, 'women', 'Alpha Bansil Address', 'clark', NULL, NULL, 'believer', 1, NULL, '$2y$10$b7onsn1IG3qION5j8cgbxeZVsvY2W1r7hISKZCSs7DBpzNIZrfnn2', 'member', 3, 1, 0, 0, 'E090FBO8UV6RSQWWisvGNtQucvDyHEUc4hzJhQj6', NULL, '2019-08-08 09:42:54', '2019-08-09 02:58:59'),
(7, 'Shaira', NULL, 'Isip', NULL, 'f', NULL, 23, 'youth', 'Clark barracks', 'clark', NULL, NULL, 'disciple', 3, NULL, '$2y$10$o.dLCzSD0cDO1ZsCP.8mnuExsBbTAuXJcoSbjJojUwRxykHf1SgDG', 'member', 3, 1, 1, 1, 'jPgfctSdtFdJyuXolg2Zj0KjKhXxhy0f8ZxUt5eA', NULL, '2019-08-09 06:27:02', '2019-08-09 06:53:14');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_head_cluster_area_unique` (`head_cluster_area`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
