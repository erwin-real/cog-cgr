-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2019 at 11:38 AM
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

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `gender`, `birthday`, `age`, `group_age`, `address`, `cluster_area`, `head_cluster_area`, `contact`, `journey`, `cldp`, `username`, `password`, `type`, `leader_id`, `cg_id`, `is_leader`, `is_active`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Erwin', NULL, 'Capati', 'admin@admin.com', 'm', NULL, 0, 'youth', 'Some Address', 'Clarkview 1', NULL, NULL, 'pre-believer', NULL, 'admin', '$2y$10$loF4Bn0HfcjP3f99jsgZ5uuYHPHzPh/kxn/NBVfFooW863sRJgasi', 'master', 0, NULL, 0, 1, 'gYAtr6ZMe0JZTQwwjGJaj6E1HatxFgUI1p5gQACcsdDpkOZEsR9RNX1m7Rv3', NULL, '2019-05-27 19:38:17', '2019-05-27 19:38:17'),
(2, 'Narlyn', NULL, 'Soberano', NULL, 'f', '1996-04-15', 23, 'women', 'Narlyn Soberano address', 'clark', NULL, '321123', 'leader', 3, 'narlyn', '$2y$10$N./6wJ7jWfvP3s2FSTB35OTW3/Kk3OV0ju5Cz3xAFFO64qWwGFHGC', 'leader', 1, NULL, 1, 1, 'ZWvM6FpO47eSxEhfWVGouVYExb33OM2wP0O3S3EKhUnnpuIts4rJR33kHx5o', NULL, '2019-08-06 22:19:19', '2019-08-08 07:20:44'),
(3, 'Sonia', 'ANGELES', 'Pili', NULL, 'f', NULL, 35, 'women', 'Sonia Pili ADDRESS', 'clark', NULL, '321317', 'believer', 2, NULL, '$2y$10$C36X9.k./fidSjUoqT325OHbDKgNL9ox2ZQxTQM4QIZnKYGvEq3Gy', 'member', 2, 1, 0, 1, 'EO6tKbfDz919J4U3yzM1CXqhBbKZKTfv07bCTt68', NULL, '2019-08-06 22:39:24', '2019-08-08 09:23:08'),
(4, 'Machelle', NULL, 'Del Mundo', NULL, 'f', '1996-04-15', 23, 'women', 'Machelle Address', 'clark', 'Clark', '1234567', 'leader', 3, 'machelle', '$2y$10$g10pkyIuxGOF8EkczjsgF.DoUsvUVACYrxtIqV3hFsSp392HnQ5ai', 'cluster head', 0, NULL, 1, 1, 'lpH5Op5o1tLndB1Ah2XI4uvEmZFougHXCRwRPzte', NULL, '2019-08-08 09:32:40', '2019-08-08 09:32:40');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
