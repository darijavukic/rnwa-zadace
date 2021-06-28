-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2018 at 12:51 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Database: `fsr-cms`
--
-- --------------------------------------------------------
--
-- Table structure for table `posts`
--
CREATE TABLE `posts` (
 `id` int(10) UNSIGNED NOT NULL,
 `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
 `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
 `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
 `post_thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `deleted_at` timestamp NULL DEFAULT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Dumping data for table `posts`
--
INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `post_thumbnail`,
`deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Počeo tradicionalni 19. FSR turnir u malom nogometu', '<p>Počeo
tradicionalni 19. FSR turnir u malom nogometu. Lorem ispum
all.</p>\r\n\r\n<p>The best&nbsp;<em>Android</em>&nbsp;tablets. 13 hours 
ago By Jerry Hildenbrand The great display and S Pen make the Galaxy Tab S3
the best&nbsp;<em>Android</em>&nbsp;tablet you can buy right now. How to
connect PlayStation VR to your PC. Steam games and more!.</p>\r\n\r\n<p>The
best&nbsp;<em>Android</em>&nbsp;tablets. 13 hours ago By Jerry Hildenbrand
The great display and S Pen make the Galaxy Tab S3 the
best&nbsp;<em>Android</em>&nbsp;tablet you can buy right now. How to
connect PlayStation VR to your PC. Steam games and more!</p>\r\n\r\n<p>.The
best&nbsp;<em>Android</em>&nbsp;tablets. 13 hours ago By Jerry Hildenbrand
The great display and S Pen make the Galaxy Tab S3 the
best&nbsp;<em>Android</em>&nbsp;tablet you can buy right now. How to
connect PlayStation VR to your PC. Steam games and more!</p>\r\n\r\n<p>The
best&nbsp;<em>Android</em>&nbsp;tablets. 13 hours ago By Jerry Hildenbrand
The great display and S Pen make the Galaxy Tab S3 the
best&nbsp;<em>Android</em>&nbsp;tablet you can buy right now. How to
connect PlayStation VR to your PC. Steam games and more!</p>', '1',
'1516007095.jpg', NULL, '2018-01-14 23:00:00', '2018-01-15 08:04:55'),
(2, 'POčetak nastave', 'POČELA JE NASTAVA...RADUJETE SE STUDENTI', '2',
'1516006913.png', NULL, '2018-01-15 08:01:53', '2018-01-15 08:01:53'),
(3, 'Kraj nastave', 'ZAVRSILA JE JE NASTAVA...', '2', '1516006913.png',
NULL, '2018-01-15 08:01:53', '2018-01-15 08:01:53'),
(18, 'Nove vijestie', 'NASTAVA...STUDENTI', '2', '1516006913.png', NULL,
NULL, NULL),
(19, 'Prvi znaci proljeÄ‡a', 'NASTAVA...STUDENTI', '2', '1516006913.png',
NULL, NULL, NULL);
--
-- Indexes for dumped tables
--
--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
 MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;