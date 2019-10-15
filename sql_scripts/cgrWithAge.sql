-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2019 at 09:46 AM
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
(1, 11, 'cg', 'women', 'Wednesday', '10:00:00', 'clarkview', 'COG CLarkview', '2019-10-13 05:10:34', '2019-10-13 05:10:34'),
(2, 21, 'cg', 'women', 'Thursday', '17:00:00', 'clarkview', 'Lanzones st.', '2019-10-14 03:36:32', '2019-10-14 03:36:32'),
(3, 17, 'cg', 'women', 'Sunday', '11:11:00', 'clarkview', 'Clarkview', '2019-10-14 03:43:33', '2019-10-14 03:43:33'),
(4, 10, 'cg', 'women', 'Thursday', '10:00:00', 'clarkview', 'Margot', '2019-10-14 03:58:37', '2019-10-14 03:58:37'),
(5, 42, 'cg', 'women', 'Thursday', '18:30:00', 'clark', 'Sisnes st. Clark', '2019-10-14 05:11:44', '2019-10-14 05:11:44'),
(7, 50, 'cg', 'women', 'Saturday', '19:00:00', 'clark', 'Tomcat st.', '2019-10-14 09:27:48', '2019-10-14 09:27:48'),
(8, 6, 'cg', 'women', 'Friday', '17:00:00', 'clark', 'Chinook - Kalaw', '2019-10-15 02:43:47', '2019-10-15 02:43:47'),
(9, 69, 'c2s', 'women', 'Thursday', '15:00:00', 'clark', 'Barracks', '2019-10-15 03:08:44', '2019-10-15 03:08:44'),
(10, 73, 'cg', 'women', 'Friday', '15:00:00', 'clark', 'Clark', '2019-10-15 03:24:24', '2019-10-15 03:24:24'),
(11, 61, 'cg', 'women', 'Wednesday', '16:00:00', 'clark', 'Canteen', '2019-10-15 03:51:51', '2019-10-15 03:51:51'),
(12, 85, 'cg', 'women', 'Thursday', '16:00:00', 'clarkview', 'Tamarind st.', '2019-10-15 05:06:55', '2019-10-15 05:06:55');

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
(1, 'Master', NULL, 'User', 'master@gmail.com', 'm', NULL, 0, 'none', 'N/A', 'n/a', NULL, NULL, NULL, 'N/A', NULL, 'master', '$2y$10$Q7O1xox/nYnVUehDuJyLCew.cfNCowqMRZ/yDpNhDxqcbtZLAdVnu', 'master', 0, 0, 0, 1, 'fdX6YIvhLEVKZu8FiqMzda2wu0ddraCkAtnwhsDRxyFVtBzweqi3SnKI29N3', NULL, '2019-05-26 03:38:17', '2019-08-22 22:45:17'),
(2, 'Bong', NULL, 'Tiru', NULL, 'm', '1967-10-03', 51, 'men', 'COG Clarkview', 'n/a', NULL, NULL, NULL, 'leader', 3, 'admin', '$2y$10$Njbg.M2ajv7X3L6ASQOpzuRrcPu4O.N3viUaICcn7ZImm1deXtAgS', 'admin', 0, 0, 1, 1, 'Mcw0DYBKSoakimjfL8vVxgRYli0VAC8POCjGTPgLVKXLTf1myT3QBBfGxlUZ', NULL, '2019-08-22 22:44:21', '2019-08-22 22:44:21'),
(3, 'Steven', NULL, 'Baluyut', NULL, 'm', NULL, 55, 'men', 'Angeles City', 'balibago', NULL, 'men', NULL, 'leader', 3, 'steven', '$2y$10$UxegEosW6WwoUiJo3p5fVOqujVT6BIO0OA0C30v.ab9kqRUl77Rc2', 'department head', 0, NULL, 1, 1, '1WlKCElZRp0CQAvRvt6SFxRU3ulTEzgDAHV1t44iXf00tdHICVNIm64EgNV0', NULL, '2019-08-29 19:44:26', '2019-10-14 02:41:16'),
(4, 'Sharon Rose', NULL, 'Tiru', NULL, 'f', NULL, 47, 'women', 'Church apartment', 'malabanias', NULL, 'women', NULL, 'leader', 3, 'sharon', '$2y$10$W3pGOz.IRNesepzuN37F8.B6Ns.l6WoPIpMcVpVxm83LKhUurgPTu', 'department head', 0, NULL, 1, 1, '89WjSJ6bq61TXwZOrlXDTQeUiUnvvnIdFVLtUr93c5ny7eexrbHHu3CjynQ5', NULL, '2019-08-28 00:08:33', '2019-08-28 00:08:33'),
(5, 'Chie', NULL, 'Nabong', NULL, 'f', NULL, 40, 'youth', 'santol st malabanias', 'malabanias', NULL, 'youth', NULL, 'leader', 3, 'chie', '$2y$10$JaawIjOI4NIQQ3HQGilVeumq.I5bP3Pgxef/WgjZRVhlPYz4b2MnC', 'department head', 0, NULL, 1, 1, 'cXuJ1pQhZOKf33NtMhmzmUHWwgTb0QUfhZ9kL0hU', NULL, '2019-08-29 19:43:09', '2019-08-29 19:43:50'),
(6, 'Machelle', NULL, 'Del Mundo', NULL, 'f', NULL, 43, 'women', 'Clark Housing', 'clark', 'Clark', NULL, NULL, 'leader', 3, 'machelle', '$2y$10$j2X7fXyv.wCG4a1pCbf1k.SOC.HMjkBBPFc446rEpgQMKknYzWeL6', 'cluster head', 0, NULL, 1, 1, 'sRktUvOSSkYVedxv5NdHj1ahFBnXe34OU729BtKL6ihtduTVHdaMN5vZhD6G', NULL, '2019-08-28 00:04:25', '2019-08-28 00:04:25'),
(10, 'Nancy', NULL, 'Isip', NULL, 'f', NULL, 30, 'women', 'Margot', 'clarkview', NULL, NULL, '09972067678', 'leader', 3, 'nancy', '$2y$10$8zcu5t1qhzH4S1R4/9vpX.6UaQC/ExN3ynzCE4fnKfg7GuOiBBRKW', 'leader', 50, 7, 1, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-08-29 20:07:55', '2019-10-14 09:27:48'),
(11, 'Norma', 'Manguerra', 'Flores', NULL, 'f', NULL, 54, 'women', 'Angeles City', 'clarkview', 'Clarkview', NULL, NULL, 'leader', 3, 'norma', '$2y$10$PcEQ/7vaKlq24lF8OnoNSuIqDrC6w8.rHShveHPaucCNphY/U5Vqi', 'cluster head', 0, NULL, 1, 1, 'wFVjQSrUWKcLfLV2XIxzMnsFDPKJe9CDvLYgHL9J', NULL, '2019-10-13 05:07:07', '2019-10-13 05:07:07'),
(12, 'Ann Margarette', '', 'Chua', 'marga_chua@gmail.com', 'f', NULL, 0, 'women', 'Angeles City', 'clarkview', NULL, NULL, '09087036342', 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'bjW6N9oEs6gsPWgGRwo2bpTLOvGvXsBWMKTqA7gA', NULL, '2019-10-13 05:08:36', '2019-10-15 07:45:45'),
(13, 'Mary Ann', NULL, 'Sevilla', 'gmbean1990@gmail.com', 'f', NULL, 28, 'women', 'Angeles City', 'clarkview', NULL, NULL, '09287675605', 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'wFVjQSrUWKcLfLV2XIxzMnsFDPKJe9CDvLYgHL9J', NULL, '2019-10-13 05:09:34', '2019-10-13 05:10:34'),
(14, 'Aljin', NULL, 'Singzon', 'singzonaljin@yahoo.com', 'f', NULL, 28, 'women', 'Angeles City', 'clarkview', NULL, NULL, '09298571199', 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'fSAm7faTmMqOOJZiq1eQ6AUxgQP3pqS2r7KcYE3T', NULL, '2019-10-13 07:57:43', '2019-10-13 08:05:15'),
(15, 'Susan', NULL, 'Lannon', 'suzy.val@yahoo.com', 'f', NULL, 28, 'women', 'Angeles City', 'clarkview', NULL, NULL, '09059555710', 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'fSAm7faTmMqOOJZiq1eQ6AUxgQP3pqS2r7KcYE3T', NULL, '2019-10-13 07:59:27', '2019-10-13 08:05:15'),
(16, 'Lani', 'M', 'Montoya', NULL, 'f', NULL, 28, 'women', 'Angeles City', 'clarkview', NULL, NULL, '09482231010', 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'fSAm7faTmMqOOJZiq1eQ6AUxgQP3pqS2r7KcYE3T', NULL, '2019-10-13 08:00:22', '2019-10-13 08:05:16'),
(17, 'Debra', NULL, 'Pamintuan', 'iamhisperfumeph@gmail.com', 'f', NULL, 28, 'women', 'Angeles City', 'clarkview', NULL, NULL, NULL, 'pre-believer', 0, 'debra', '$2y$10$/KmiB2.yZdaZ8WrU3wh.a.UFQ37Amhmbf1wYGrOPu3fdlLkCt7MuC', 'leader', 11, 1, 1, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-13 08:01:30', '2019-10-14 03:38:16'),
(18, 'Annabelle', NULL, 'Bautista', 'aerhabella29@gmail.com', 'f', NULL, 28, 'women', 'Angeles City', 'clarkview', NULL, NULL, NULL, 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'fSAm7faTmMqOOJZiq1eQ6AUxgQP3pqS2r7KcYE3T', NULL, '2019-10-13 08:02:16', '2019-10-13 08:05:16'),
(19, 'Jocelyn', NULL, 'Matol', NULL, 'm', NULL, 28, 'women', 'Angeles City', 'clarkview', NULL, NULL, NULL, 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'fSAm7faTmMqOOJZiq1eQ6AUxgQP3pqS2r7KcYE3T', NULL, '2019-10-13 08:02:46', '2019-10-13 08:05:16'),
(20, 'Daisy', NULL, 'Ducusin', NULL, 'f', NULL, 28, 'women', 'Angeles City', 'clarkview', NULL, NULL, NULL, 'pre-believer', 0, NULL, NULL, 'member', 11, 1, 0, 1, 'fSAm7faTmMqOOJZiq1eQ6AUxgQP3pqS2r7KcYE3T', NULL, '2019-10-13 08:03:10', '2019-10-13 08:05:16'),
(21, 'Almira', NULL, 'Cortez', NULL, 'f', NULL, 28, 'women', 'Lanzones st.', 'clarkview', NULL, NULL, NULL, 'leader', 3, 'almira', '$2y$10$oYPRoJe5m82E/52OYQhHp.H12kLFTDUeHYOAKPZcihrswf5Xq.mIe', 'leader', 0, NULL, 1, 1, 'TRvXx91xWIX7M8hAjhS81bEmApLOzi8p0wdU57C8B23DNDJpYPg9PEuYa6Dw', NULL, '2019-10-13 08:09:11', '2019-10-13 08:09:11'),
(22, 'Ching', NULL, 'Tulabut', NULL, 'f', NULL, 28, 'women', 'Clarkview', 'clarkview', NULL, NULL, '09064885878', 'believer', 0, NULL, NULL, 'member', 21, 2, 0, 1, 'Dm8CtKJ3W3kzG61ytBhhwEwNst8ZZfE0VJYwOw5M', NULL, '2019-10-14 03:11:34', '2019-10-14 03:36:32'),
(23, 'Rosalinda', NULL, 'Sueco', NULL, 'f', NULL, 28, 'women', 'Clarkview', 'clarkview', NULL, NULL, '09196855770', 'believer', 0, NULL, NULL, 'member', 21, 2, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:12:14', '2019-10-14 03:36:33'),
(24, 'Rowena', NULL, 'Bautro', NULL, 'f', NULL, 28, 'women', 'Clarkview', 'clarkview', NULL, NULL, '09565574471', 'believer', 0, NULL, NULL, 'member', 21, 2, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:13:58', '2019-10-14 03:36:33'),
(25, 'Joy', NULL, 'Mente', NULL, 'f', NULL, 28, 'women', 'Clarkview', 'clarkview', NULL, NULL, '09075683511', 'believer', 0, NULL, NULL, 'member', 21, 2, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:20:42', '2019-10-14 03:36:33'),
(26, 'Jane', NULL, 'Garcia', NULL, 'f', NULL, 28, 'women', 'Clarkview', 'clarkview', NULL, NULL, NULL, 'believer', 0, NULL, NULL, 'member', 21, 2, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:22:16', '2019-10-14 03:36:33'),
(27, 'Modesty', NULL, 'Talabucon', NULL, 'f', NULL, 28, 'women', 'Clarkview', 'clarkview', NULL, NULL, NULL, 'believer', 0, NULL, NULL, 'member', 21, 2, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:22:52', '2019-10-14 03:36:33'),
(28, 'Josephine', 'M', 'Lozano', 'gvbounce@gmail.com', 'f', NULL, 28, 'women', 'Clarkview', 'clarkview', NULL, NULL, '09158854618', 'believer', 0, NULL, NULL, 'member', 17, 3, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:39:32', '2019-10-14 03:43:33'),
(29, 'Ellen', 'U', 'Poneiano', 'pasaway_1984@yahoo.com', 'f', NULL, 28, 'women', 'Clarkview', 'clarkview', NULL, NULL, '09496573737', 'believer', 0, NULL, NULL, 'member', 17, 3, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:40:24', '2019-10-14 03:43:33'),
(30, 'Jenelyn', 'M', 'Castro', 'jenelyn_castro29@yahoo.com', 'f', NULL, 28, 'women', 'Clarkview', 'clarkview', NULL, NULL, '09751036894', 'believer', 0, NULL, NULL, 'member', 17, 3, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:41:12', '2019-10-14 03:43:33'),
(31, 'Jonessa', 'L', 'Cajes', 'jonessacajes@yahoo.com', 'f', NULL, 28, 'women', 'Clarkview', 'clarkview', NULL, NULL, '09556731073', 'believer', 0, NULL, NULL, 'member', 17, 3, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:42:09', '2019-10-14 03:43:33'),
(32, 'Jocelyn', NULL, 'Due', 'duejocelyn@yahoo.com', 'f', NULL, 28, 'women', 'Clarkview', 'clarkview', NULL, NULL, '09264991907', 'believer', 0, NULL, NULL, 'member', 17, 3, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:42:40', '2019-10-14 03:43:33'),
(33, 'Risabel', NULL, 'Sagun', NULL, 'f', NULL, 28, 'women', 'Margot', 'clarkview', NULL, NULL, '09486455303', 'believer', 0, NULL, NULL, 'member', 10, 4, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:53:46', '2019-10-14 03:58:37'),
(34, 'Cory', 'T', 'Gabriel', NULL, 'f', NULL, 28, 'women', 'Margot', 'clarkview', NULL, NULL, '09669127663', 'believer', 0, NULL, NULL, 'member', 10, 4, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:54:17', '2019-10-14 03:58:37'),
(35, 'Jane', 'S', 'Hailar', NULL, 'f', NULL, 28, 'women', 'Margot', 'clarkview', NULL, NULL, '09068840146', 'believer', 0, NULL, NULL, 'member', 10, 4, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:54:42', '2019-10-14 03:58:37'),
(36, 'Ressie', NULL, 'Valdevieso', NULL, 'f', NULL, 28, 'women', 'Margot', 'clarkview', NULL, NULL, '09977037869', 'believer', 0, NULL, NULL, 'member', 10, 4, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:55:14', '2019-10-14 03:58:37'),
(37, 'Aiko', NULL, 'Gabriel', NULL, 'f', NULL, 28, 'women', 'Margot', 'clarkview', NULL, NULL, '09367785800', 'believer', 0, NULL, NULL, 'member', 10, 4, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:55:47', '2019-10-14 03:58:37'),
(38, 'Juliet', NULL, 'Canlas', NULL, 'f', NULL, 28, 'women', 'Margot', 'clarkview', NULL, NULL, '09270714027', 'believer', 0, NULL, NULL, 'member', 10, 4, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:56:14', '2019-10-14 03:58:37'),
(39, 'Imelda', NULL, 'Bulatao', NULL, 'f', NULL, 28, 'women', 'Margot', 'clarkview', NULL, NULL, '09168494311', 'believer', 0, NULL, NULL, 'member', 10, 4, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:56:38', '2019-10-14 03:58:37'),
(40, 'Rogelyn', NULL, 'Bulatao', NULL, 'f', NULL, 28, 'women', 'Margot', 'clarkview', NULL, NULL, NULL, 'believer', 0, NULL, NULL, 'member', 10, 4, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:57:06', '2019-10-14 03:58:37'),
(41, 'Joemilyn', NULL, 'Sagun', NULL, 'f', NULL, 28, 'women', 'Margot', 'clarkview', NULL, NULL, NULL, 'believer', 0, NULL, NULL, 'member', 10, 4, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 03:57:28', '2019-10-14 03:58:37'),
(42, 'Marie Joyce', 'P', 'Catalan', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, NULL, 'leader', 3, 'marie', '$2y$10$uax6u4OG3B41XDLt3DQqqeMTMTuV4S1iQyWk8lS2QXjt6DHe99FTW', 'leader', 73, 10, 1, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 05:02:16', '2019-10-15 03:35:23'),
(43, 'Demy Rose', 'M', 'Manuel', 'demyrosemanuel01@gmail.com', 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09498544441', 'pre-believer', 0, NULL, NULL, 'member', 42, 5, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 05:03:50', '2019-10-14 07:04:10'),
(44, 'Anna Angela', 'O', 'Cortero', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09395454779', 'pre-believer', 0, NULL, NULL, 'member', 42, 5, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 05:04:36', '2019-10-14 07:04:10'),
(45, 'Carolyn', 'A', 'Villa', 'hasty_8486929@yahoo.com', 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09195452505', 'pre-believer', 0, NULL, NULL, 'member', 42, 5, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 05:05:12', '2019-10-14 07:04:10'),
(46, 'Katrine Kate', 'N', 'Mercado', 'kknorada88@yahoo.com', 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09368031948', 'pre-believer', 0, NULL, NULL, 'member', 42, 5, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 05:05:54', '2019-10-14 07:04:10'),
(47, 'Tessa Diane', NULL, 'Panelo', 'dianepanelo918833@gmail.com', 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09772431755', 'pre-believer', 0, NULL, NULL, 'member', 42, 5, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 05:06:28', '2019-10-14 07:04:10'),
(48, 'Gypsy Ann', 'N', 'Ongayo', 'annie16nunez@gmail.com', 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09062372757', 'pre-believer', 0, NULL, NULL, 'member', 42, 5, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 05:07:01', '2019-10-14 07:04:10'),
(49, 'Meriam', NULL, 'Samlani', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, NULL, 'pre-believer', 0, NULL, NULL, 'member', 42, 5, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 05:10:39', '2019-10-14 07:04:10'),
(50, 'Lorie', NULL, 'Olan', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, NULL, 'leader', 3, 'lorie', '$2y$10$bSAvIPEH1gjP3ZnQHDzVOuWOUzqEtu31naDw1xqCw.HvDEXayE68i', 'leader', 0, NULL, 1, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 08:53:55', '2019-10-14 08:53:55'),
(51, 'Maybel', NULL, 'Micutuan', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09357478722', 'believer', 3, NULL, NULL, 'member', 50, 7, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 08:55:42', '2019-10-14 09:27:48'),
(52, 'Enali', 'Masiclat', 'Dimaano', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09267162099', 'believer', 1, NULL, NULL, 'member', 50, 7, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 08:57:00', '2019-10-14 09:27:48'),
(53, 'Micah', NULL, 'Albano', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09555788636', 'believer', 0, NULL, NULL, 'member', 50, 7, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 08:59:16', '2019-10-14 09:27:48'),
(54, 'Ruth', NULL, 'Majan', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09501984535', 'believer', 0, NULL, NULL, 'member', 50, 7, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 09:03:30', '2019-10-14 09:27:48'),
(55, 'Juliet', NULL, 'Tamondong', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09088978355', 'believer', 0, NULL, NULL, 'member', 50, 7, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 09:04:06', '2019-10-14 09:27:48'),
(56, 'Cynthia', NULL, 'Mancita', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09065494438', 'believer', 0, NULL, NULL, 'member', 50, 7, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 09:04:42', '2019-10-14 09:27:48'),
(57, 'Beneliza', NULL, 'Salazar', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09157045125', 'believer', 1, NULL, NULL, 'member', 50, 7, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 09:05:16', '2019-10-14 09:27:48'),
(58, 'Karreen', NULL, 'Esperancilla', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09122557918', 'pre-believer', 0, NULL, NULL, 'member', 50, 7, 0, 1, '9CYqpj5wmB6kgXrELKPQgH7xvNukwJCbKLsLCHD9', NULL, '2019-10-14 09:05:55', '2019-10-14 09:27:48'),
(59, 'Milyn', 'Salcedo', 'Estojero', 'milyn.salcedo@gmail.com', 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09278472105', 'believer', 0, NULL, NULL, 'member', 6, 8, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 02:09:17', '2019-10-15 02:43:47'),
(60, 'Maybelle', NULL, 'Piso', 'maybellepiso@gmail.com', 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09223654491', 'pre-believer', 0, NULL, NULL, 'member', 6, 8, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 02:19:04', '2019-10-15 02:43:47'),
(61, 'Sherline', 'A', 'Verzosa', 'verzosasherline@gmail.com', 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09197341551', 'pre-believer', 0, 'sherline', '$2y$10$aS31.fhiVXU1UVlABG54xO9SI3ldqARCkpKzg2sVpzMRx.wNfJsia', 'leader', 6, 8, 1, 1, 'EdUhOKMbmXeeEEVLJqMVLg0WPWyOhrdqJGhJApQqSca6ShXuF2F2yWXp3FvE', NULL, '2019-10-15 02:20:27', '2019-10-15 03:44:08'),
(62, 'Alicia', 'Viray', 'Dioquino', 'aliciaviray@gmail.com', 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09480243832', 'pre-believer', 0, NULL, NULL, 'member', 6, 8, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 02:21:18', '2019-10-15 02:43:47'),
(63, 'Narlyn', NULL, 'Soberano', 'narlynsoberano@gmail.com', 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09612767051', 'pre-believer', 0, NULL, NULL, 'member', 6, 8, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 02:23:26', '2019-10-15 02:43:47'),
(64, 'Julie Ann', NULL, 'Gonzales', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09436116556', 'pre-believer', 0, NULL, NULL, 'member', 6, 8, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 02:40:37', '2019-10-15 02:43:47'),
(65, 'Joyce', NULL, 'Llanes', 'njoyce2285@gmail.com', 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09265469896', 'pre-believer', 0, NULL, NULL, 'member', 6, 8, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 02:41:27', '2019-10-15 02:43:47'),
(66, 'Mhel', NULL, 'Magbitang', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09204488796', 'pre-believer', 0, NULL, NULL, 'member', 6, 8, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 02:41:49', '2019-10-15 02:43:47'),
(67, 'Alpha', NULL, 'Bansil', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09499893048', 'pre-believer', 0, NULL, NULL, 'member', 6, 8, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 02:42:11', '2019-10-15 02:43:47'),
(68, 'Miriam', NULL, 'Rayos', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09056751240', 'pre-believer', 0, NULL, NULL, 'member', 6, 8, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 02:42:37', '2019-10-15 02:43:47'),
(69, 'Elizabeth', '', 'Lardizabal', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, NULL, 'pre-believer', 0, 'elizabeth', '$2y$10$gGklcaP71DFrlykhNJ9jQOg/86tIMzWJLVubFSolQ/yjq1zYqTode', 'leader', 73, 10, 1, 1, 'pGXYiAViIfto3esfcbuRAfJ3JrRPangoe5zHK7yr9BBA27NieuTM0qHQgUOr', NULL, '2019-10-15 03:05:47', '2019-10-15 03:35:24'),
(70, 'Rachel', NULL, 'Baculna', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09079441844', 'pre-believer', 0, NULL, NULL, 'member', 69, 9, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 03:06:18', '2019-10-15 03:08:44'),
(71, 'Maritess', NULL, 'Milana', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09387042890', 'pre-believer', 0, NULL, NULL, 'member', 69, 9, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 03:06:42', '2019-10-15 03:08:45'),
(72, 'Estela', NULL, 'Torres', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, NULL, 'pre-believer', 0, NULL, NULL, 'member', 69, 9, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 03:07:08', '2019-10-15 03:08:45'),
(73, 'Lilibeth', NULL, 'Sales', NULL, 'f', NULL, 28, 'women', 'Bamban', 'clark', NULL, NULL, NULL, 'leader', 3, 'beth', '$2y$10$yKdhRbGrGSMtbiQguxjm9uwbMKo9vLc.tluvwDQrWxy5UuGyg/3im', 'leader', 0, NULL, 1, 1, 'ErKcqaZMPTmubObj33JhLDin5kViINKjmtsjvhxmlqyoSkizHXPkCQ4glcnu', NULL, '2019-10-15 03:09:56', '2019-10-15 03:09:56'),
(74, 'Elma', NULL, 'Palis', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09172441253', 'disciple', 3, NULL, NULL, 'member', 73, 10, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 03:10:27', '2019-10-15 03:35:23'),
(75, 'Mercy', '', 'Asakil', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09295018216', 'believer', 1, 'mercy', '$2y$10$zYicAEO7kJ240LUR0U5EN.chma54mmgHUXrrebIY0mcSHVU/W.pQi', 'leader', 73, 10, 1, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 03:15:25', '2019-10-15 03:35:23'),
(76, 'Florenda', '', 'Romero', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09773706200', 'believer', 2, NULL, NULL, 'member', 73, 10, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 03:16:39', '2019-10-15 03:35:23'),
(77, 'Jenny', '', 'Tanguillig', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09153670561', 'pre-believer', 0, NULL, NULL, 'member', 73, 10, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 03:17:34', '2019-10-15 03:35:23'),
(78, 'Chin Grace', '', 'Rufo', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09651051498', 'pre-believer', 0, NULL, NULL, 'member', 73, 10, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 03:18:08', '2019-10-15 03:35:23'),
(79, 'Ruby', '', 'Flores', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09274401656', 'disciple', 3, NULL, NULL, 'member', 73, 10, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 03:18:56', '2019-10-15 03:35:23'),
(80, 'Roselle', '', 'Molina', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09166673845', 'believer', 1, NULL, NULL, 'member', 73, 10, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 03:19:21', '2019-10-15 03:35:23'),
(81, 'Mayline', '', 'Gabay', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09653407242', 'pre-believer', 0, NULL, NULL, 'member', 73, 10, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 03:27:21', '2019-10-15 03:35:24'),
(82, 'Elizabeth', '', 'De Guzman', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '0906863894', 'pre-believer', 0, NULL, NULL, 'member', 61, 11, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 03:42:20', '2019-10-15 03:51:51'),
(83, 'Angie', '', 'Luis', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09483174906', 'pre-believer', 0, NULL, NULL, 'member', 61, 11, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 03:42:49', '2019-10-15 03:51:51'),
(84, 'Cristina', '', 'Magan', NULL, 'f', NULL, 28, 'women', 'Clark', 'clark', NULL, NULL, '09356417916', 'pre-believer', 0, NULL, NULL, 'member', 61, 11, 0, 1, 'VLoLymUIxAa5qEVOUQ9u0DklyyPULRdaT0NDM99f', NULL, '2019-10-15 03:43:10', '2019-10-15 03:51:51'),
(85, 'Jennifer', 'Alcantara', 'Benosa', 'jhenbenosa15@gmail.com', 'f', '1976-05-11', 43, 'women', '1705 Mariveles St., Clarkview Angeles City', 'clarkview', NULL, NULL, '09493376980', 'leader', 3, 'jhen', '$2y$10$ssalAW.TcQdglV8adwZbtu.CinZo71ZcT4CePCshb8FNB55BNH3ey', 'leader', 0, NULL, 1, 1, 'dDwkTUvgsPRRkScIad1zzwZMGu2e7HgU1s98b359', NULL, '2019-10-15 05:04:04', '2019-10-15 07:27:22'),
(86, 'Alma', NULL, 'Asmolo', NULL, 'f', '1967-11-03', 51, 'women', 'Tamarind St., Clarkview', 'clarkview', NULL, NULL, '09294380089', 'believer', 0, NULL, NULL, 'member', 85, 12, 0, 1, 'dDwkTUvgsPRRkScIad1zzwZMGu2e7HgU1s98b359', NULL, '2019-10-15 05:04:52', '2019-10-15 07:41:23'),
(87, 'Leonila Gloria', NULL, 'Martinez', NULL, 'f', '1967-01-17', 52, 'women', 'Tamarind St., Clarkview', 'clarkview', NULL, NULL, NULL, 'believer', 0, NULL, NULL, 'member', 85, 12, 0, 1, 'dDwkTUvgsPRRkScIad1zzwZMGu2e7HgU1s98b359', NULL, '2019-10-15 05:05:10', '2019-10-15 07:41:33'),
(88, 'Jane', NULL, 'Pascasio', NULL, 'f', NULL, 28, 'women', 'Clarkview', 'clarkview', NULL, NULL, '09196564138', 'believer', 0, NULL, NULL, 'member', 85, 12, 0, 0, 'dDwkTUvgsPRRkScIad1zzwZMGu2e7HgU1s98b359', NULL, '2019-10-15 05:05:31', '2019-10-15 07:35:50'),
(89, 'Bernadith', NULL, 'Canlas', NULL, 'f', '1973-02-20', 46, 'women', 'Villa Esperanza Clarkview', 'clarkview', NULL, NULL, '09205469062', 'believer', 0, NULL, NULL, 'member', 85, 12, 0, 1, 'dDwkTUvgsPRRkScIad1zzwZMGu2e7HgU1s98b359', NULL, '2019-10-15 05:05:50', '2019-10-15 07:41:40'),
(90, 'Jelyn', NULL, 'Tuquib', NULL, 'f', '1988-09-21', 31, 'women', 'Clarkview', 'clarkview', NULL, NULL, NULL, 'believer', 0, NULL, NULL, 'member', 85, 12, 0, 0, 'dDwkTUvgsPRRkScIad1zzwZMGu2e7HgU1s98b359', NULL, '2019-10-15 05:06:07', '2019-10-15 07:36:02');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
