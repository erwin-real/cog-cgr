SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

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


CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

INSERT INTO `users` (`first_name`, `middle_name`, `last_name`, `email`, `gender`, `birthday`, `age`, `group_age`, `address`, `cluster_area`, `head_cluster_area`, `head_department`, `contact`, `journey`, `cldp`, `username`, `password`, `type`, `leader_id`, `cg_id`, `is_leader`, `is_active`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
('Master', NULL, 'User', 'master@gmail.com', 'm', NULL, 0, 'youth', 'N/A', 'n/a', NULL, NULL, NULL, 'N/A', NULL, 'master', '$2y$10$Q7O1xox/nYnVUehDuJyLCew.cfNCowqMRZ/yDpNhDxqcbtZLAdVnu', 'master', 0, NULL, 0, 1, '7mZRNqe4UTPRqON7wfFLZXUfhMxEnKkYklQU5Na7ugqxmmE2M8nzLkYyaZEx', NULL, '2019-05-26 11:38:17', '2019-08-23 06:45:17'),
('Bong', NULL, 'Tiru', NULL, 'm', '1967-10-03', 51, 'men', 'COG Clarkview', 'n/a', NULL, NULL, NULL, 'leader', 3, 'admin', '$2y$10$Njbg.M2ajv7X3L6ASQOpzuRrcPu4O.N3viUaICcn7ZImm1deXtAgS', 'admin', 0, NULL, 1, 1, '49wvtpfkf5pbCR1ekJlIoh0jUixE6BufdauBUTSlkdKtysy76TOa1i7jC4T6', NULL, '2019-08-23 06:44:21', '2019-08-23 06:44:21');

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
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