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
-- Table structure for table `dbcollectionsdetails`
--

CREATE TABLE `dbcollectionsdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `posttype_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `post_subtype_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_filetype_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fileoriginalname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dataset_id` int(11) DEFAULT NULL,
  `collection_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dbcollectionsdetails`
--

INSERT INTO `dbcollectionsdetails` (`id`, `posttype_id`, `post_title`, `post_description`, `post_subtype_id`, `post_filetype_id`, `fileoriginalname`, `file_path`, `order`, `status`, `dataset_id`, `collection_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, '1', 'd', '1', 'Questionnaires', '1', 'DS.jpg', '1', '1', '1', 1, 14, NULL, '2018-04-17 05:15:37', '2018-04-17 05:15:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbcollectionsdetails`
--
ALTER TABLE `dbcollectionsdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dbcollectionsdetails_collection_id_foreign` (`collection_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbcollectionsdetails`
--
ALTER TABLE `dbcollectionsdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dbcollectionsdetails`
--
ALTER TABLE `dbcollectionsdetails`
  ADD CONSTRAINT `dbcollectionsdetails_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
