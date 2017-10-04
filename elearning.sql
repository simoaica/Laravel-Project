-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2017 at 10:05 PM
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
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `author_id`, `image`, `published`, `created_at`, `updated_at`) VALUES
(1, 'Cursul despre React', 'Acest curs este despre ....', 3, NULL, 1, '2017-09-27 14:00:53', '2017-09-27 14:00:53'),
(2, 'Curs despre ECMA1', 'Acest curs este despre ECMA', 6, NULL, 0, '2017-09-27 14:11:18', '2017-09-27 14:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `course_id`, `position`, `title`, `description`, `image`, `video_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Lectia 1', 'Descriere lectia 1', NULL, 'tUdeA14wpQQ', '2017-09-27 14:00:53', '2017-09-27 14:00:53'),
(2, 1, 2, 'Lectia 2', 'Descriere lectia 2', NULL, 'BHSIsEHa5U8', '2017-09-27 14:00:54', '2017-09-27 14:00:54'),
(3, 1, 3, 'Lectia 3', 'descriere lectia 3', NULL, 'HCQpoMqkMn0', '2017-09-27 14:00:54', '2017-09-27 14:00:54'),
(4, 1, 4, 'Lectia 4', 'Descriere lectia 4', NULL, '80-kFHxmYOM', '2017-09-27 14:00:54', '2017-09-27 14:00:54'),
(5, 1, 5, 'Lectia 5', 'Descriere lectia 5', NULL, 'AHg20EARkk0', '2017-09-27 14:00:54', '2017-09-27 14:00:54'),
(14, 2, 1, 'Lectia 1 ECMA', 'Descr lectia 1ECMA', NULL, 'TscMCI6do2I', '2017-09-27 14:48:15', '2017-09-27 14:48:15'),
(15, 2, 2, 'Lectia 2 ECMA', 'Descr lectia 2 ECMA', NULL, 'YpTV0tFFykM', '2017-09-27 14:48:15', '2017-09-27 14:48:15'),
(16, 2, 3, 'Lectia 3 ECMA', 'Descr lectia 3 ECMA', NULL, 'Ayfx5TNDqoA', '2017-09-27 14:48:15', '2017-09-27 14:48:15'),
(17, 2, 4, 'Lectia 4 ECMA', 'Descriere lectia 4 ECMA', NULL, 'jRURVXPbSkU', '2017-09-27 14:48:15', '2017-09-27 14:48:15'),
(18, 2, 5, 'Lectia 5', 'Descriere 5', NULL, 'ntiAHaIO86M', '2017-09-27 14:48:15', '2017-09-27 14:48:15');

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
(3, '2017_08_11_030453_laratrust_setup_tables', 1),
(4, '2017_08_15_233105_add_avatar_to_users_table', 1),
(5, '2017_08_30_152528_create_courses_table', 1),
(6, '2017_08_30_153346_create_lessons_table', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-users', 'Create Users', 'Create Users', '2017-09-26 09:38:17', '2017-09-26 09:38:17'),
(2, 'read-users', 'Read Users', 'Read Users', '2017-09-26 09:38:17', '2017-09-26 09:38:17'),
(3, 'update-users', 'Update Users', 'Update Users', '2017-09-26 09:38:18', '2017-09-26 09:38:18'),
(4, 'delete-users', 'Delete Users', 'Delete Users', '2017-09-26 09:38:19', '2017-09-26 09:38:19'),
(5, 'read-profile', 'Read Profile', 'Read Profile', '2017-09-26 09:38:19', '2017-09-26 09:38:19'),
(6, 'update-profile', 'Update Profile', 'Update Profile', '2017-09-26 09:38:19', '2017-09-26 09:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2017-09-26 09:38:17', '2017-09-26 09:38:17'),
(2, 'administrator', 'Administrator', 'Administrator', '2017-09-26 09:38:20', '2017-09-26 09:38:20'),
(3, 'teacher', 'Teacher', 'Teacher', '2017-09-26 09:38:21', '2017-09-26 09:38:21'),
(4, 'subscriber', 'Subscriber', 'Subscriber', '2017-09-26 09:38:22', '2017-09-26 09:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(3, 3, 'App\\User'),
(4, 4, 'App\\User'),
(1, 5, 'App\\User'),
(3, 5, 'App\\User'),
(3, 6, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadministrator', 'superadministrator@app.com', '1506469881.jpg', '$2y$10$npj7.9/Mi/9IJdbly37//eXJeIQsMkrtHEvygxPOnRFW64DjYlfva', '4Tjokm7fzRbw8dzgDBmPWFqNkHqb6KEDmxPQjhFHK9mMfBZibgLO0mxppgw7', '2017-09-26 09:38:19', '2017-09-26 23:51:21'),
(2, 'Administrator', 'administrator@app.com', '1506521792.jpg', '$2y$10$8HQ/DK/2Vsullb03smxKg.TxoVY7bySquAkIiNF4ycnZik5mJ54AO', 'Dd9s0ZvrcWK5YhOZxdMrHC0FDWcodU71xI9r39X3CyIkm4rOK09IIdvNDkWY', '2017-09-26 09:38:21', '2017-09-27 14:16:32'),
(3, 'Teacher', 'teacher@app.com', 'default.jpg', '$2y$10$jdOzdcPZDa8Hv3o.N1lDGOk8XpvdIi58JF1X1TipbeubSSR2SX1na', '4OhOHipNHKAjuOZvSUmDqcETHXDXBMgYqIitgnBluhuafpM2U8XFbv2GvUhf', '2017-09-26 09:38:22', '2017-09-26 09:56:42'),
(4, 'Subscriber', 'subscriber@app.com', '1506521922.jpg', '$2y$10$SoMQBWKEKHr3665WhzQ5meOSl6cvBg5i4jgXvzh9b2hS0cS/d9dYm', 'Ve34ov30JfnHOiY0sK2InNbxahr96mWTLBFwOJqURyNJZWXiVcelRKjVKqnD', '2017-09-26 09:38:23', '2017-09-27 14:18:42'),
(5, 'Dan Simoaica', 'dan@app.com', '1507135145.jpg', '$2y$10$m7EGOwXh.V1JUvEHMbOsOe5j9wYrV.dtmmNx0vTriaXOvhjvrYnwi', 'PLfDdBoIs4UbXoD4Qdax5o6siD2ab5HqivKGjKzZCm1cT5j58JT6MikFOgkw', '2017-09-26 09:46:01', '2017-10-04 16:39:05'),
(6, 'Laurentiu Sabo', 'laur@app.com', 'default.jpg', '$2y$10$X0NCjE57X1WW2YBW4MIG5OOdhNSM9ZMv9fyNuwd13StQlzxLGwCEu', '7jODx0KuNU3wp92iNfJr0mCcL0aH8NLOh8WH0oBq7sOYH8XRcIclNM8DDraJ', '2017-09-27 13:11:10', '2017-09-27 13:11:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_author_id_foreign` (`author_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_course_id_foreign` (`course_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
