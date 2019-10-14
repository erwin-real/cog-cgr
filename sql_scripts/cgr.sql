-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2019 at 04:41 AM
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
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `groups` (`id`, `leader_id`, `type`, `department`, `day_cg`, `time_cg`, `cluster_area`, `venue`, `created_at`, `updated_at`) VALUES
(1, 11, 'cg', 'women', 'Wednesday', '10:00:00', 'clarkview', 'COG CLarkview', '2019-10-13 05:10:34', '2019-10-13 05:10:34');

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
(5, '2019_08_20_161832_add_department_to_reports', 1);

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
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Master', NULL, 'User', 'master@gmail.com', 'm', NULL, 0, 'youth', 'N/A', 'n/a', NULL, NULL, NULL, 'N/A', NULL, 'master', '$2y$10$Q7O1xox/nYnVUehDuJyLCew.cfNCowqMRZ/yDpNhDxqcbtZLAdVnu', 'master', 0, NULL, 0, 1, 'sjxHjHcn9JXf6LjRp5O663O2be7rDkFrRpKDH5lxaAIBpiONK6kAuxOmSH2X', NULL, '2019-05-26 03:38:17', '2019-08-22 22:45:17'),
(2, 'Bong', NULL, 'Tiru', NULL, 'm', '1967-10-03', 51, 'men', 'COG Clarkview', 'n/a', NULL, NULL, NULL, 'leader', 3, 'admin', '$2y$10$Njbg.M2ajv7X3L6ASQOpzuRrcPu4O.N3viUaICcn7ZImm1deXtAgS', 'admin', 0, NULL, 1, 1, 'Iul7HsXHkjoUoHFjtXZyPmde5M76uqvJ79EbPYZbq9KtDjvt4iv0zdbWPt3j', NULL, '2019-08-22 22:44:21', '2019-08-22 22:44:21'),
(3, 'Steven', NULL, 'Baluyut', NULL, 'm', NULL, 55, 'men', 'Angeles City', 'balibago', NULL, 'men', NULL, 'leader', 3, 'steven', '$2y$10$UxegEosW6WwoUiJo3p5fVOqujVT6BIO0OA0C30v.ab9kqRUl77Rc2', 'department head', 0, NULL, 1, 1, 'dC6B1uytIj0hONZgveh0YtGNdOanwe8bK3WP0X6f', NULL, '2019-08-29 19:44:26', '2019-10-14 02:41:16'),
(4, 'Sharon Rose', NULL, 'Tiru', NULL, 'f', NULL, 47, 'women', 'Church apartment', 'malabanias', NULL, 'women', NULL, 'leader', 3, 'sharon', '$2y$10$W3pGOz.IRNesepzuN37F8.B6Ns.l6WoPIpMcVpVxm83LKhUurgPTu', 'department head', 0, NULL, 1, 1, 'AMeOdUEHIwhBnPbBk6FgxvxJiPKSaslOp99SKDjq', NULL, '2019-08-28 00:08:33', '2019-08-28 00:08:33'),
(5, 'Chie', NULL, 'Nabong', NULL, 'f', NULL, 40, 'youth', 'santol st malabanias', 'malabanias', NULL, 'youth', NULL, 'leader', 3, 'chie', '$2y$10$JaawIjOI4NIQQ3HQGilVeumq.I5bP3Pgxef/WgjZRVhlPYz4b2MnC', 'department head', 0, NULL, 1, 1, 'cXuJ1pQhZOKf33NtMhmzmUHWwgTb0QUfhZ9kL0hU', NULL, '2019-08-29 19:43:09', '2019-08-29 19:43:50'),
(6, 'Machelle', NULL, 'Del Mundo', NULL, 'f', NULL, 43, 'women', 'Clark Housing', 'clark', 'Clark', NULL, NULL, 'leader', 3, 'machelle', '$2y$10$j2X7fXyv.wCG4a1pCbf1k.SOC.HMjkBBPFc446rEpgQMKknYzWeL6', 'cluster head', 0, NULL, 1, 1, 'sRktUvOSSkYVedxv5NdHj1ahFBnXe34OU729BtKL6ihtduTVHdaMN5vZhD6G', NULL, '2019-08-28 00:04:25', '2019-08-28 00:04:25'),
(7, 'Narlyn', NULL, 'Soberano', NULL, 'f', NULL, 45, 'women', 'Clark Housing', 'clark', NULL, NULL, NULL, 'leader', 3, 'narlyn', '$2y$10$B4MDBokvrbSjzd.2vgcc.eZOYkvWqs7BdsTAuNeFsRKcw/FoiEH12', 'leader', 0, NULL, 1, 1, 'jGpVrndYrfXVvnudxwmeJN3hNyOxJURG6xxGQnTjOxHmhN0pgMzHRUR3Qqja', NULL, '2019-08-28 00:02:22', '2019-08-29 01:11:51'),
(8, 'Beth', NULL, 'Sales', NULL, 'f', NULL, 30, 'women', 'Mabalacat', 'clark', NULL, NULL, NULL, 'leader', 3, 'beth', '$2y$10$EDrZSLRdfgVTSWUFB754vuo9T9YBq.PH2aFCPqG3Z6FsPF/UMur7q', 'leader', 0, NULL, 1, 1, 'cXuJ1pQhZOKf33NtMhmzmUHWwgTb0QUfhZ9kL0hU', NULL, '2019-08-29 20:01:47', '2019-08-29 20:01:47'),
(9, 'Lorie', NULL, 'Olan', NULL, 'f', NULL, 30, 'women', 'Savana', 'clark', NULL, NULL, NULL, 'leader', 3, 'lorie', '$2y$10$jdHmrgBZNuQxRepDNS/2aeuk77X9NMxK0S8L9WAG781InWlXll4Ge', 'leader', 0, NULL, 1, 1, 'cXuJ1pQhZOKf33NtMhmzmUHWwgTb0QUfhZ9kL0hU', NULL, '2019-08-29 20:07:12', '2019-08-29 20:07:12'),
(10, 'Nancy', NULL, 'Isip', NULL, 'f', NULL, 30, 'women', 'Margot', 'clark', NULL, NULL, NULL, 'leader', 3, 'nancy', '$2y$10$8zcu5t1qhzH4S1R4/9vpX.6UaQC/ExN3ynzCE4fnKfg7GuOiBBRKW', 'leader', 0, NULL, 1, 1, 'cXuJ1pQhZOKf33NtMhmzmUHWwgTb0QUfhZ9kL0hU', NULL, '2019-08-29 20:07:55', '2019-08-29 20:07:55'),
(11, 'Norma', 'Manguerra', 'Flores', NULL, 'f', NULL, 54, 'women', 'Angeles City', 'clarkview', 'Clarkview', NULL, NULL, 'leader', 3, 'norma', '$2y$10$PcEQ/7vaKlq24lF8OnoNSuIqDrC6w8.rHShveHPaucCNphY/U5Vqi', 'cluster head', 0, NULL, 1, 1, 'wFVjQSrUWKcLfLV2XIxzMnsFDPKJe9CDvLYgHL9J', NULL, '2019-10-13 05:07:07', '2019-10-13 05:07:07'),
(12, 'Ann Margarette', NULL, 'Chua', 'marga_chua@gmail.com', 'f', NULL, 28, 'women', 'Angeles City', 'clarkview', NULL, NULL, '09087036342', 'believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'wFVjQSrUWKcLfLV2XIxzMnsFDPKJe9CDvLYgHL9J', NULL, '2019-10-13 05:08:36', '2019-10-13 05:10:34'),
(13, 'Mary Ann', NULL, 'Sevilla', 'gmbean1990@gmail.com', 'f', NULL, 28, 'women', 'Angeles City', 'clarkview', NULL, NULL, '09287675605', 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'wFVjQSrUWKcLfLV2XIxzMnsFDPKJe9CDvLYgHL9J', NULL, '2019-10-13 05:09:34', '2019-10-13 05:10:34'),
(14, 'Aljin', NULL, 'Singzon', 'singzonaljin@yahoo.com', 'f', NULL, 28, 'Women', 'Angeles City', 'clarkview', NULL, NULL, '09298571199', 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'fSAm7faTmMqOOJZiq1eQ6AUxgQP3pqS2r7KcYE3T', NULL, '2019-10-13 07:57:43', '2019-10-13 08:05:15'),
(15, 'Susan', NULL, 'Lannon', 'suzy.val@yahoo.com', 'f', NULL, 28, 'Women', 'Angeles City', 'clarkview', NULL, NULL, '09059555710', 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'fSAm7faTmMqOOJZiq1eQ6AUxgQP3pqS2r7KcYE3T', NULL, '2019-10-13 07:59:27', '2019-10-13 08:05:15'),
(16, 'Lani', 'M', 'Montoya', NULL, 'f', NULL, 28, 'Women', 'Angeles City', 'clarkview', NULL, NULL, '09482231010', 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'fSAm7faTmMqOOJZiq1eQ6AUxgQP3pqS2r7KcYE3T', NULL, '2019-10-13 08:00:22', '2019-10-13 08:05:16'),
(17, 'Debra', NULL, 'Pamintuan', 'iamhisperfumeph@gmail.com', 'f', NULL, 28, 'Women', 'Angeles City', 'clarkview', NULL, NULL, NULL, 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'fSAm7faTmMqOOJZiq1eQ6AUxgQP3pqS2r7KcYE3T', NULL, '2019-10-13 08:01:30', '2019-10-13 08:05:16'),
(18, 'Annabelle', NULL, 'Bautista', 'aerhabella29@gmail.com', 'f', NULL, 28, 'Women', 'Angeles City', 'clarkview', NULL, NULL, NULL, 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'fSAm7faTmMqOOJZiq1eQ6AUxgQP3pqS2r7KcYE3T', NULL, '2019-10-13 08:02:16', '2019-10-13 08:05:16'),
(19, 'Jocelyn', NULL, 'Matol', NULL, 'm', NULL, 28, 'Women', 'Angeles City', 'clarkview', NULL, NULL, NULL, 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'fSAm7faTmMqOOJZiq1eQ6AUxgQP3pqS2r7KcYE3T', NULL, '2019-10-13 08:02:46', '2019-10-13 08:05:16'),
(20, 'Daisy', NULL, 'Ducusin', NULL, 'f', NULL, 28, 'Women', 'Angeles City', 'clarkview', NULL, NULL, NULL, 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'fSAm7faTmMqOOJZiq1eQ6AUxgQP3pqS2r7KcYE3T', NULL, '2019-10-13 08:03:10', '2019-10-13 08:05:16'),
(21, 'Almira', NULL, 'Cortez', NULL, 'f', NULL, 28, 'Women', 'Lanzones st.', 'clarkview', NULL, NULL, NULL, 'leader', 3, 'almira', '$2y$10$oYPRoJe5m82E/52OYQhHp.H12kLFTDUeHYOAKPZcihrswf5Xq.mIe', 'leader', 0, NULL, 1, 1, 'fSAm7faTmMqOOJZiq1eQ6AUxgQP3pqS2r7KcYE3T', NULL, '2019-10-13 08:09:11', '2019-10-13 08:09:11');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
