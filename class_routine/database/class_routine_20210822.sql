-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 03:26 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `class_routine`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '45', NULL, NULL),
(2, '46', NULL, NULL),
(3, '47', NULL, NULL),
(4, '48', NULL, NULL),
(5, '49', NULL, NULL),
(6, '50', NULL, NULL),
(7, '51', NULL, NULL),
(8, '52', NULL, NULL),
(9, '53', NULL, NULL),
(10, '54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_title`, `created_at`, `updated_at`) VALUES
(1, 'CEE-2110', 'Engineering Drawing', NULL, NULL),
(2, 'CHE-2311', 'Chemistry', NULL, NULL),
(3, 'CHE-2312', 'Chemistry Laboratory', NULL, NULL),
(4, 'CSE-1111', 'Introduction to Computers', NULL, NULL),
(5, 'CSE-1112', 'Introduction to Computers Sessional', NULL, NULL),
(6, 'ENG-1111', 'English Reading and Speaking ', NULL, NULL),
(7, 'MAT-1111', 'Differential and Integral Calculus', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fridays`
--

CREATE TABLE `fridays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nineAM_ninefiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenAM_tenfiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elevenAM_elevenfiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twelvePM_twelvefiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twoPM_twofiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `threePM_threefiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fourPM_fourfiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `break` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2021_07_29_173107_create_courses_table', 1),
(4, '2021_07_29_191839_create_teachers_table', 1),
(5, '2021_07_31_103534_create_sundays_table', 1),
(6, '2021_07_31_201259_create_mondays_table', 1),
(7, '2021_08_03_095519_create_tuesdays_table', 1),
(8, '2021_08_03_100255_create_thursdays_table', 1),
(9, '2021_08_03_100320_create_fridays_table', 1),
(10, '2021_08_03_100411_create_wednesdays_table', 1),
(11, '2021_08_03_100430_create_saturdays_table', 1),
(12, '2021_08_09_190526_create_rooms_table', 1),
(13, '2021_08_18_165256_create_sections_table', 1),
(14, '2021_08_18_165536_create_batches_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mondays`
--

CREATE TABLE `mondays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nineAM_ninefiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenAM_tenfiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elevenAM_elevenfiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twelvePM_twelvefiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twoPM_twofiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `threePM_threefiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fourPM_fourfiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `break` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_code`, `room_title`, `created_at`, `updated_at`) VALUES
(1, 'ECL', 'Electronics and Circuit Lab', NULL, NULL),
(2, 'ACL-1', 'Advanced Computer Lab 1', NULL, NULL),
(3, 'PhL', 'Physics Lab', NULL, NULL),
(4, 'ChL', 'Chemistry Lab', NULL, NULL),
(5, 'ACL-2', 'Advanced Computer Lab 2', NULL, NULL),
(6, 'NL', 'Network Lab', NULL, NULL),
(7, 'AB-1', 'Academic Building 1', NULL, NULL),
(8, 'R-302', 'R-302 CSE', NULL, NULL),
(9, 'R-304', 'R-304 CSE', NULL, NULL),
(10, 'R-306', 'R-306 CSE', NULL, NULL),
(11, 'R-309', 'R-309 CSE', NULL, NULL),
(12, 'G-2', 'Gallery 2 (2nd Floor)', NULL, NULL),
(13, 'G-3', 'Gallery 3 (3nd Floor)', NULL, NULL),
(14, 'GL', 'General Lab, AB-1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saturdays`
--

CREATE TABLE `saturdays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nineAM_ninefiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenAM_tenfiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elevenAM_elevenfiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twelvePM_twelvefiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twoPM_twofiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `threePM_threefiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fourPM_fourfiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `break` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `batch_id`, `created_at`, `updated_at`) VALUES
(1, '8A', NULL, NULL, NULL),
(2, '8B', NULL, NULL, NULL),
(3, '8C', NULL, NULL, NULL),
(4, '8D', NULL, NULL, NULL),
(5, '8E', NULL, NULL, NULL),
(6, '8F', NULL, NULL, NULL),
(7, '7', NULL, NULL, NULL),
(8, '6', NULL, NULL, NULL),
(9, '5A', NULL, NULL, NULL),
(10, '5B', NULL, NULL, NULL),
(11, '5C', NULL, NULL, NULL),
(12, '5D', NULL, NULL, NULL),
(13, '5E', NULL, NULL, NULL),
(14, '5F', NULL, NULL, NULL),
(15, '5G', NULL, NULL, NULL),
(16, '5H', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sundays`
--

CREATE TABLE `sundays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `break` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sundays`
--

INSERT INTO `sundays` (`id`, `section_id`, `batch_id`, `course_id`, `teacher_id`, `room_id`, `class_start`, `class_end`, `break`, `created_at`, `updated_at`) VALUES
(1, '6', '10', '2', '2', '4', '09:16', '09:45', NULL, '2021-08-22 03:15:26', '2021-08-22 03:15:26'),
(2, '6', '10', '2', '2', '4', '09:46', '10:15', NULL, '2021-08-22 03:17:28', '2021-08-22 03:17:28'),
(3, '6', '10', '2', '2', '4', '10:16', '10:45', NULL, '2021-08-22 03:19:16', '2021-08-22 03:19:16'),
(5, '1', '1', '1', '1', '1', '10:46', '11:15', NULL, '2021-08-22 03:37:27', '2021-08-22 03:37:27'),
(6, '1', '1', '1', '1', '1', '10:46', '11:15', NULL, '2021-08-22 03:38:01', '2021-08-22 03:38:01'),
(7, '1', '1', '1', '1', '1', '10:46', '11:15', NULL, '2021-08-22 03:38:05', '2021-08-22 03:38:05'),
(8, '1', '1', '1', '1', '1', '10:46', '11:15', NULL, '2021-08-22 03:44:58', '2021-08-22 03:44:58'),
(9, '1', '1', '1', '1', '1', '11:46', '12:15', NULL, '2021-08-22 03:46:23', '2021-08-22 03:46:23'),
(10, '1', '1', '1', '1', '1', '09:15', '12:15', NULL, '2021-08-22 03:47:48', '2021-08-22 03:47:48'),
(11, '1', '1', '1', '1', '1', '09:15', '12:15', NULL, '2021-08-22 05:14:57', '2021-08-22 05:14:57'),
(12, '1', '1', '1', '1', '1', '09:15', '12:15', NULL, '2021-08-22 05:15:02', '2021-08-22 05:15:02'),
(13, '1', '1', '1', '1', '1', '09:15', '12:15', NULL, '2021-08-22 05:15:05', '2021-08-22 05:15:05'),
(14, '1', '1', '1', '1', '1', '09:15', '12:15', NULL, '2021-08-22 05:31:02', '2021-08-22 05:31:02'),
(15, '1', '1', '1', '1', '1', '00:16', '00:45', NULL, '2021-08-22 06:06:16', '2021-08-22 06:06:16'),
(16, '1', '1', '1', '1', '1', '13:00', '13:45', NULL, '2021-08-22 06:36:19', '2021-08-22 06:36:19'),
(17, '1', '1', '1', '1', '1', '13:46', '14:30', NULL, '2021-08-22 06:41:25', '2021-08-22 06:41:25'),
(18, '1', '1', '1', '1', '1', '12:15', '12:45', NULL, '2021-08-22 06:48:10', '2021-08-22 06:48:10'),
(19, '1', '1', '1', '1', '1', '15:00', '15:45', NULL, '2021-08-22 06:52:16', '2021-08-22 06:52:16'),
(20, '7', '10', '1', '2', '2', '11:15', '12:00', NULL, '2021-08-22 07:14:24', '2021-08-22 07:14:24'),
(21, '7', '10', '1', '3', '2', '11:15', '12:00', NULL, '2021-08-22 07:15:35', '2021-08-22 07:15:35'),
(22, '7', '10', '1', '2', '3', '11:15', '12:00', NULL, '2021-08-22 07:17:07', '2021-08-22 07:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_code`, `teacher_name`, `teacher_position`, `created_at`, `updated_at`) VALUES
(1, 'SKB', 'Shafkat Kibria', 'Assistant Professor & Head (Acting)', NULL, NULL),
(2, 'RMS', 'Rumel M.S. Rahman Pir', 'Associate Professor', NULL, NULL),
(3, 'AHQ', 'Arafat Habib Quraishi', 'Senior Lecturer', NULL, NULL),
(4, 'EBH ', 'Ebrahim Hossain', 'Senior Lecturer', NULL, NULL),
(5, 'AAC', 'Adil Ahmed Chowdhury', 'Lecturer', NULL, NULL),
(6, 'MJH', 'Md. Jaber Hossain', 'Lecturer', NULL, NULL),
(7, 'STA', 'Syeda Tamanna Alam', 'Lecturer', NULL, NULL),
(8, 'SRK', 'Saidur Rahman Kohinoor', 'Lecturer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thursdays`
--

CREATE TABLE `thursdays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nineAM_ninefiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenAM_tenfiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elevenAM_elevenfiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twelvePM_twelvefiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twoPM_twofiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `threePM_threefiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fourPM_fourfiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `break` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tuesdays`
--

CREATE TABLE `tuesdays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nineAM_ninefiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenAM_tenfiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elevenAM_elevenfiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twelvePM_twelvefiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twoPM_twofiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `threePM_threefiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fourPM_fourfiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `break` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'M Shafee', 'admin', 'mshafee@gmail.com', NULL, '$2y$10$cMNJoUi.y.EieNA3pWvXWefovMEio4HbtsVelKHYr49JT0qWOWSRK', NULL, NULL, NULL),
(2, 'Ikbal A', 'admin', 'ikbal@gmail.com', NULL, '$2y$10$/Fj.TaeIpo.olAnFNcnKtuUdA4vnsli/t88flu/aURG3ZhGdz6JTm', NULL, NULL, NULL),
(3, 'Anisul', 'admin', 'anisul@gmail.com', NULL, '$2y$10$RXQYEkwK/Kb4jLoLBvTuCOWay.rSDHqidvCX6o48YSI6RcZ2oW146', NULL, NULL, NULL),
(4, 'Uxxol', 'admin', 'uzzolah@gmail.com', NULL, '$2y$10$HISbiTm99T/.GEEsOGoNkuscltuyu.u5VDigpdlKgw706ittpqJnK', NULL, NULL, NULL),
(5, 'asdfas sdfasdf', 'admin', 'majadul.dev@gmail.com', NULL, '$2y$10$4mZWK5n0qTfB.tRURyJWgOyXRaSecppx4OjWnpb7dN8TLLc6v/2hu', NULL, '2021-08-21 23:48:40', '2021-08-21 23:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `wednesdays`
--

CREATE TABLE `wednesdays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nineAM_ninefiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenAM_tenfiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elevenAM_elevenfiftyAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twelvePM_twelvefiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twoPM_twofiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `threePM_threefiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fourPM_fourfiftyPM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `break` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fridays`
--
ALTER TABLE `fridays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mondays`
--
ALTER TABLE `mondays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saturdays`
--
ALTER TABLE `saturdays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sundays`
--
ALTER TABLE `sundays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thursdays`
--
ALTER TABLE `thursdays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuesdays`
--
ALTER TABLE `tuesdays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wednesdays`
--
ALTER TABLE `wednesdays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fridays`
--
ALTER TABLE `fridays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mondays`
--
ALTER TABLE `mondays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `saturdays`
--
ALTER TABLE `saturdays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sundays`
--
ALTER TABLE `sundays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `thursdays`
--
ALTER TABLE `thursdays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tuesdays`
--
ALTER TABLE `tuesdays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wednesdays`
--
ALTER TABLE `wednesdays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
