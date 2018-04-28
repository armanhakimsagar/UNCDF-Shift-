-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 01:19 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmasia_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `datasets`
--

CREATE TABLE `datasets` (
  `id` int(10) UNSIGNED NOT NULL,
  `dataset_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ref_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `producers` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sponsor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collection` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entry_time` date NOT NULL,
  `use_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collection_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `datasets`
--

INSERT INTO `datasets` (`id`, `dataset_title`, `ref_id`, `year`, `country`, `producers`, `sponsor`, `collection`, `entry_time`, `use_type`, `collection_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cds', 'vdv', 'vf', 'fdv', 'dfv', 'fdvf', 'dfv', '2018-04-26', 'fdv', 15, NULL, '2018-04-16 22:55:54', '2018-04-16 22:55:54'),
(2, 'fvdf', 'fd', 'dfv', 'vdf', 'fd', 'fdf', 'df', '2018-04-03', 'fdv', 15, NULL, '2018-04-16 23:09:28', '2018-04-16 23:09:28'),
(3, 'dvf', 'dvdv', 'fdvfv', 'fvf', 'fdvf', 'dvf', 'dfv', '2018-04-05', 'fdv', 15, NULL, '2018-04-16 23:21:48', '2018-04-16 23:21:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datasets`
--
ALTER TABLE `datasets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datasets_collection_id_foreign` (`collection_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datasets`
--
ALTER TABLE `datasets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `datasets`
--
ALTER TABLE `datasets`
  ADD CONSTRAINT `datasets_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
