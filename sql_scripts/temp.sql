DROP TABLE IF EXISTS `reports`;

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
  `offering` double(15,2) DEFAULT NULL,
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

ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;