-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2017 at 06:57 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ultra_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Verly Ananda', '2016-12-30 02:53:34', '2016-12-30 02:53:34'),
(2, 'Asep Mubarok', '2016-12-30 02:53:42', '2016-12-30 02:53:42'),
(3, 'Eminem', '2017-01-02 04:43:01', '2017-01-02 04:43:01'),
(4, 'Ucing endogan', '2017-01-03 04:43:53', '2017-01-03 04:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `cover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `amount`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Tutorial Membuat AR', 1, 1, NULL, '2016-12-30 02:54:04', '2017-01-02 00:15:32'),
(2, 'Rombak Rumah', 2, 4, NULL, '2016-12-30 02:54:31', '2017-01-03 03:16:50'),
(3, 'Tips Membeli Laptop ', 1, 4, '29e121948479185bf49cb59f951be420.jpg', '2017-01-02 01:20:22', '2017-01-02 01:20:22'),
(5, 'Rap God', 3, 2, NULL, '2017-01-02 04:55:31', '2017-01-02 04:55:31'),
(6, 'Not Afraid Story', 3, 1, NULL, '2017-01-02 05:04:51', '2017-01-03 03:14:52'),
(7, 'Cara dapet jodoh dengan cepat', 4, 2, NULL, '2017-01-03 04:44:25', '2017-01-03 04:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_logs`
--

CREATE TABLE IF NOT EXISTS `borrow_logs` (
  `id` int(10) unsigned NOT NULL,
  `book_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `is_returned` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrow_logs`
--

INSERT INTO `borrow_logs` (`id`, `book_id`, `user_id`, `is_returned`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 1, '2016-12-30 21:52:26', '2017-01-01 23:46:29'),
(2, 1, 4, 1, '2017-01-01 05:38:39', '2017-01-01 23:46:57'),
(3, 2, 4, 1, '2017-01-01 23:46:43', '2017-01-01 23:46:54'),
(4, 2, 4, 1, '2017-01-01 23:57:59', '2017-01-02 00:09:04'),
(5, 1, 4, 1, '2017-01-01 23:59:35', '2017-01-02 00:09:07'),
(6, 2, 5, 1, '2017-01-02 00:08:02', '2017-01-02 01:19:23'),
(7, 1, 5, 1, '2017-01-02 00:08:07', '2017-01-02 04:54:23'),
(8, 3, 4, 1, '2017-01-02 01:20:58', '2017-01-03 03:17:33'),
(9, 2, 4, 0, '2017-01-02 01:21:52', '2017-01-02 01:21:52'),
(10, 3, 5, 0, '2017-01-02 04:54:47', '2017-01-02 04:54:47'),
(11, 5, 4, 0, '2017-01-03 03:17:26', '2017-01-03 03:17:26'),
(12, 7, 4, 0, '2017-01-03 04:44:53', '2017-01-03 04:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2016_12_11_110857_create_posts_table', 1),
(28, '2016_12_11_131056_laratrust_setup_tables', 1),
(29, '2016_12_12_114448_create_authors_table', 1),
(30, '2016_12_12_120408_create_books_table', 1),
(31, '2016_12_30_094623_create_borrow_logs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, '2016-12-30 02:52:09', '2016-12-30 02:52:09'),
(2, 'member', 'Member', NULL, '2016-12-30 02:52:09', '2016-12-30 02:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(3, 1),
(2, 2),
(4, 2),
(5, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Ultraviolet', 'ultraviolet@gmail.com', '$2y$10$5.8kjEoi5W3ySWSqrVj63OkcOp/5jlLV3C52LkW6eTa4IDlqHD8Lm', NULL, '2016-12-30 02:52:09', '2016-12-30 02:52:09'),
(2, 'Sample Member', 'member@gmail.com', '$2y$10$96hHU6GTxUqEabmlczWipOnybUqxz20fn6i35ZbJ31tBvxavgonX2', NULL, '2016-12-30 02:52:10', '2016-12-30 02:52:10'),
(3, 'Verly Admin', 'verlyadmin@gmail.com', '$2y$10$CL4eqxfgA1i2gpP0HBsGiuYhZrPfoqBsi.MZcyzkjpM4N/aAEqU2W', '9OaZpyBHQtNoQOKXHrp3oE8sIRN9bVzjUO5NXzaMLNIT77sqIYIRq8Gy9zED', '2016-12-30 02:52:59', '2017-01-03 04:44:39'),
(4, 'verlymember', 'verlymember@gmail.com', '$2y$10$rDeroA/yICzFLnPLpM7ZYeTk8pT7iYunmtmQlHeGrZGEdIRzWPNnC', 'z19JdQy7OOvoHhHemXKWxKidLRB4nSXUbcFLNKub2dd8ScI38goszkR68J12', '2016-12-30 21:51:47', '2017-01-03 04:45:00'),
(5, 'jajang', 'jajang@gmail.com', '$2y$10$RjKyF9ZvIZKvwYpJM3sI1ukF6Hguu.L1HGWddmppVgNaIkAMsf4GG', 'FvYT2sP2Qah2aadoA9lxa6miKRPsFOO4wfcb7j1CfzRvOT0kFL0ZrQlqFeLd', '2017-01-02 00:07:57', '2017-01-02 01:19:30'),
(6, 'Perli', 'perli@gmail.com', '$2y$10$SuA.3D/RVC.eoCFncuNN6.EXTtPUeRa5UOQhzpo3u4Bfch7cHIkAe', 'GDH553YIwDKbNjp0eD1aG2lx13r6uHpELHZC72vUvRKMkzsNaAS3FknnrNR8', '2017-01-03 03:18:04', '2017-01-03 03:19:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_author_id_foreign` (`author_id`);

--
-- Indexes for table `borrow_logs`
--
ALTER TABLE `borrow_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrow_logs_book_id_index` (`book_id`),
  ADD KEY `borrow_logs_user_id_index` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_title_unique` (`title`);

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
  ADD PRIMARY KEY (`user_id`,`role_id`),
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
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `borrow_logs`
--
ALTER TABLE `borrow_logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrow_logs`
--
ALTER TABLE `borrow_logs`
  ADD CONSTRAINT `borrow_logs_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
