-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2024 at 10:22 AM
-- Server version: 10.6.16-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartstudent2_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `another_packages`
--

CREATE TABLE `another_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stage` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `expiry_date` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `another_packages`
--

INSERT INTO `another_packages` (`id`, `name`, `description`, `stage`, `class`, `price`, `expiry_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'الصف الرابع', '6 مذكرات', 'ابتدائي', 'الصف الرابع', '15', '2024-06-29', 1, '2024-01-24 21:59:03', '2024-01-24 21:59:03'),
(2, 'الصف الخامس', '6 مذكرات', 'ابتدائي', 'الصف الخامس', '15', '2024-06-29', 1, '2024-01-24 21:59:51', '2024-01-24 21:59:51'),
(3, 'الصف السادس', '6 مذكرات', 'متوسط', 'الصف السادس', '15', '2024-03-30', 1, '2024-01-24 22:00:47', '2024-01-24 22:00:47'),
(4, 'الصف السابع', '6 مذكرات', 'متوسط', 'الصف السابع', '15', '2024-06-29', 1, '2024-01-24 22:01:52', '2024-01-24 22:01:52'),
(5, 'الصف السابع', '6 مذكرات', 'متوسط', 'الصف السابع', '15', '2024-06-29', 1, '2024-01-24 22:10:32', '2024-01-24 22:10:32'),
(6, 'الصف الثامن', '6 مذكرات', 'متوسط', 'الصف الثامن', '15', '2024-06-29', 1, '2024-01-24 22:11:08', '2024-01-24 22:11:08'),
(7, 'الصف التاسع', '6 مذكرات', 'متوسط', 'الصف التاسع', '15', '2024-06-29', 1, '2024-01-24 22:14:44', '2024-01-24 22:14:44'),
(8, 'الصف العاشر', '8 مذكرات', 'ثانوي', 'الصف العاشر', '22', '2024-06-29', 1, '2024-01-24 22:16:06', '2024-01-24 22:16:06'),
(9, 'الصف الحادي عشر علمي', '8 مذكرات', 'ثانوي', 'الصف الحادي عشر', '23', '2024-06-29', 1, '2024-01-24 22:17:34', '2024-01-24 22:17:34'),
(12, 'الصف الحادى عشر  أدبي', '8 مذكرات', 'ثانوي', 'الصف الحادي عشر', '18', '2024-06-29', 1, '2024-01-24 22:24:14', '2024-01-24 22:24:14'),
(13, 'الصف الثاني عشر  أدبي', '8 مذكرات', 'ثانوي', 'الصف الثاني عشر', '22', '2024-06-29', 1, '2024-01-24 22:25:26', '2024-01-24 22:25:26'),
(14, 'الصف الثاني عشر  أدبي', '9 مذكرات', 'ثانوي', 'الصف الثاني عشر', '22', '2024-06-29', 1, '2024-01-24 22:25:54', '2024-01-24 22:25:54'),
(15, 'الصف الثاني عشر  علمى', '8 مذكرات', 'ثانوي', 'الصف الثاني عشر', '22', '2024-06-29', 1, '2024-01-24 22:26:48', '2024-01-24 22:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `techer_id` bigint(20) NOT NULL,
  `stage` varchar(255) NOT NULL,
  `classroom` varchar(255) NOT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `Teacher_ratio` double(8,2) DEFAULT NULL,
  `book_price` bigint(20) DEFAULT NULL,
  `term_type` enum('termone','termtow') NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `pdf` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `techer_id`, `stage`, `classroom`, `quantity`, `Teacher_ratio`, `book_price`, `term_type`, `active`, `pdf`, `created_at`, `updated_at`) VALUES
(1, 'الدستور', 9, 'ثانوي', 'الصف الثاني عشر', 0, 0.20, 3, 'termtow', 1, 'عينة دستور.pdf', '2024-01-24 08:21:44', '2024-01-24 08:21:44'),
(2, 'الفلسفة', 9, 'ثانوي', 'الصف الثاني عشر', 0, 0.20, 3, 'termtow', 1, 'عينة فلسفة.pdf', '2024-01-24 08:22:44', '2024-01-24 08:22:44'),
(3, 'علم النفس', 9, 'ثانوي', 'الصف الحادي عشر', 0, 0.20, 3, 'termtow', 1, 'عينة علم نفس.pdf', '2024-01-24 08:23:31', '2024-01-24 08:23:31'),
(4, 'الكيمياء', 14, 'ثانوي', 'الصف الثاني عشر', 0, 0.20, 3, 'termtow', 1, 'عينة كيمياء 12.pdf', '2024-01-24 08:24:55', '2024-01-24 08:24:55'),
(5, 'الكيمياء', 14, 'ثانوي', 'الصف الحادي عشر', 0, 0.20, 3, 'termtow', 1, 'عينة كيمياء 11.pdf', '2024-01-24 08:25:42', '2024-01-24 08:25:42'),
(6, 'الكيمياء', 14, 'ثانوي', 'الصف العاشر', 0, 0.20, 3, 'termtow', 1, 'عينة كيمياء 10.pdf', '2024-01-24 08:26:20', '2024-01-24 08:26:20'),
(7, 'الاجتماعيات', 18, 'ابتدائي', 'الصف الرابع', 10, 0.20, 3, 'termtow', 1, 'عينة اجتماعيات 4.pdf', '2024-01-24 08:30:15', '2024-01-24 12:44:33'),
(8, 'الاجتماعيات', 18, 'ابتدائي', 'الصف الخامس', 0, 0.20, 3, 'termtow', 1, 'عينة اجتماعيات 5.pdf', '2024-01-24 08:31:48', '2024-01-24 08:31:48'),
(9, 'الاجتماعيات', 18, 'متوسط', 'الصف السادس', -1, 0.20, 3, 'termtow', 1, 'عينة 6.pdf', '2024-01-24 08:32:34', '2024-01-24 22:28:56'),
(10, 'الاجتماعيات', 18, 'متوسط', 'الصف السابع', 0, 0.20, 3, 'termtow', 1, 'عينة 7.pdf', '2024-01-24 08:33:14', '2024-01-24 08:33:14'),
(11, 'الاجتماعيات', 18, 'متوسط', 'الصف الثامن', 0, 0.20, 3, 'termtow', 1, 'عينة 8.pdf', '2024-01-24 08:33:41', '2024-01-24 08:33:41'),
(12, 'الاجتماعيات', 18, 'متوسط', 'الصف التاسع', 0, 0.20, 3, 'termtow', 1, 'عينة 9.pdf', '2024-01-24 08:34:16', '2024-01-24 08:34:16'),
(13, 'التاريخ', 5, 'ثانوي', 'الصف العاشر', 0, 0.20, 3, 'termtow', 1, 'عينة تاريخ 10.pdf', '2024-01-24 08:57:55', '2024-01-24 08:57:55'),
(14, 'التاريخ', 5, 'ثانوي', 'الصف الحادي عشر', 0, 0.20, 3, 'termtow', 1, 'عينة تاريخ 11.pdf', '2024-01-24 08:58:30', '2024-01-24 08:58:30'),
(15, 'التاريخ', 5, 'ثانوي', 'الصف الثاني عشر', 0, 0.20, 3, 'termtow', 1, 'عينة تاريخ 12.pdf', '2024-01-24 08:58:58', '2024-01-24 08:58:58'),
(16, 'الجغرافيا', 5, 'ثانوي', 'الصف الحادي عشر', 0, 0.20, 3, 'termtow', 1, 'عينة جغرافيا 11.pdf', '2024-01-24 08:59:56', '2024-01-24 08:59:56'),
(17, 'الجغرافيا', 5, 'ثانوي', 'الصف الثاني عشر', 0, 0.20, 3, 'termtow', 1, 'عينة جغرافيا 12.pdf', '2024-01-24 09:00:26', '2024-01-24 09:00:26'),
(18, 'التربية الأسلامية', 20, 'ابتدائي', 'الصف الرابع', 10, 0.20, 3, 'termone', 1, 'عينة 4.pdf', '2024-01-24 09:03:05', '2024-01-24 12:44:33'),
(19, 'التربية الأسلامية', 20, 'ابتدائي', 'الصف الخامس', 0, 0.20, 3, 'termtow', 1, 'عينة 5.pdf', '2024-01-24 09:03:29', '2024-01-24 09:03:29'),
(20, 'التربية الأسلامية', 20, 'متوسط', 'الصف السادس', -2, 0.20, 3, 'termtow', 1, 'عينة 6.pdf', '2024-01-24 09:04:05', '2024-01-24 22:28:56'),
(21, 'التربية الأسلامية', 20, 'متوسط', 'الصف السابع', 0, 0.20, 3, 'termtow', 1, 'عينة 7.pdf', '2024-01-24 09:04:33', '2024-01-24 09:04:33'),
(22, 'التربية الأسلامية', 20, 'متوسط', 'الصف الثامن', 0, 0.20, 3, 'termtow', 1, 'عينة 8.pdf', '2024-01-24 09:05:20', '2024-01-24 09:05:20'),
(23, 'التربية الأسلامية', 20, 'متوسط', 'الصف التاسع', 0, 0.20, 3, 'termtow', 1, 'عينة 9.pdf', '2024-01-24 09:05:47', '2024-01-24 09:05:47'),
(24, 'التربية الأسلامية', 20, 'ثانوي', 'الصف العاشر', 0, 0.20, 3, 'termtow', 1, 'عينة 10.pdf', '2024-01-24 09:06:38', '2024-01-24 09:06:38'),
(25, 'التربية الأسلامية', 20, 'ثانوي', 'الصف الحادي عشر', 0, 0.20, 3, 'termtow', 1, 'عينة 11.pdf', '2024-01-24 09:07:04', '2024-01-24 09:07:04'),
(26, 'التربية الأسلامية', 20, 'ثانوي', 'الصف الثاني عشر', 0, 0.20, 3, 'termtow', 1, 'عينة 12.pdf', '2024-01-24 09:07:31', '2024-01-24 09:07:31'),
(27, 'اللغة الإنجليزية', 17, 'ابتدائي', 'الصف الرابع', 10, 0.20, 3, 'termtow', 1, 'عينة انجليزي 4.pdf', '2024-01-24 10:02:58', '2024-01-24 12:44:33'),
(28, 'اللغة الإنجليزية', 17, 'ابتدائي', 'الصف الخامس', 0, 0.20, 3, 'termtow', 1, 'عينة انجليزي 5.pdf', '2024-01-24 10:03:24', '2024-01-24 10:03:24'),
(29, 'اللغة الإنجليزية', 17, 'متوسط', 'الصف السادس', -1, 0.20, 3, 'termtow', 1, 'عينة 6.pdf', '2024-01-24 10:04:06', '2024-01-24 22:28:56'),
(30, 'اللغة الإنجليزية', 17, 'متوسط', 'الصف السابع', 0, 0.20, 3, 'termtow', 1, 'عينة انجليزي 7.pdf', '2024-01-24 10:04:43', '2024-01-24 10:04:43'),
(31, 'اللغة الإنجليزية', 17, 'متوسط', 'الصف الثامن', 0, 0.20, 3, 'termtow', 1, 'عينة 8.pdf', '2024-01-24 10:05:13', '2024-01-24 10:05:13'),
(32, 'اللغة الإنجليزية', 17, 'متوسط', 'الصف التاسع', 0, 0.20, 3, 'termtow', 1, 'عينة 9.pdf', '2024-01-24 10:05:56', '2024-01-24 10:05:56'),
(33, 'اللغة الإنجليزية', 4, 'ثانوي', 'الصف العاشر', 0, 0.20, 3, 'termtow', 1, 'عينة 10.pdf', '2024-01-24 10:06:38', '2024-01-24 10:06:38'),
(34, 'اللغة الإنجليزية', 4, 'ثانوي', 'الصف الحادي عشر', 0, 0.20, 3, 'termtow', 1, 'عينة انجليزي 11.pdf', '2024-01-24 10:07:20', '2024-01-24 10:07:20'),
(35, 'اللغة الإنجليزية', 4, 'ثانوي', 'الصف الثاني عشر', 0, 0.20, 3, 'termtow', 1, 'عينة انجليزي 12.pdf', '2024-01-24 10:07:52', '2024-01-24 10:07:52'),
(36, 'الأحياء', 2, 'ثانوي', 'الصف العاشر', 0, 0.20, 3, 'termtow', 1, 'عينة 10.pdf', '2024-01-24 10:09:33', '2024-01-24 10:57:27'),
(37, 'الأحياء', 2, 'ثانوي', 'الصف الحادي عشر', 0, 0.20, 3, 'termtow', 1, 'عينة 11.pdf', '2024-01-24 10:10:02', '2024-01-24 10:10:02'),
(38, 'الأحياء', 2, 'ثانوي', 'الصف الثاني عشر', 0, 0.20, 3, 'termtow', 1, 'عينة احياء 12.pdf', '2024-01-24 10:10:30', '2024-01-24 10:10:30'),
(39, 'الجيولوجيا', 3, 'ثانوي', 'الصف الحادي عشر', 0, 0.20, 3, 'termtow', 1, 'عينة جيولوجيا.pdf', '2024-01-24 10:11:23', '2024-01-24 10:11:23'),
(40, 'اللغة الفرنسية', 10, 'ثانوي', 'الصف الحادي عشر', 0, 0.20, 3, 'termtow', 1, 'عينة فرنسي 11.pdf', '2024-01-24 10:12:20', '2024-01-24 10:12:20'),
(41, 'اللغة الفرنسية', 10, 'ثانوي', 'الصف الثاني عشر', 0, 0.20, 3, 'termtow', 1, 'عينة فرنسي 12.pdf', '2024-01-24 10:12:48', '2024-01-24 10:12:48'),
(42, 'الفيزياء', 13, 'ثانوي', 'الصف العاشر', 0, 0.20, 3, 'termtow', 1, 'عينة فيزياء 10.pdf', '2024-01-24 10:14:31', '2024-01-24 10:14:31'),
(43, 'الفيزياء', 13, 'ثانوي', 'الصف الحادي عشر', 0, 0.20, 3, 'termtow', 1, 'عينة فيزياء 11.pdf', '2024-01-24 10:15:11', '2024-01-24 10:15:11'),
(44, 'الفيزياء', 13, 'ثانوي', 'الصف الثاني عشر', 0, 0.20, 3, 'termtow', 1, 'عينة فيزياء 12.pdf', '2024-01-24 10:15:49', '2024-01-24 10:15:49'),
(45, 'العلوم', 8, 'ابتدائي', 'الصف الرابع', 10, 0.20, 3, 'termtow', 1, 'عينة 4.pdf', '2024-01-24 10:21:48', '2024-01-24 12:44:33'),
(46, 'العلوم', 8, 'ابتدائي', 'الصف الخامس', 0, 0.20, 3, 'termtow', 1, 'عينة 5.pdf', '2024-01-24 10:22:14', '2024-01-24 10:22:14'),
(47, 'العلوم', 7, 'متوسط', 'الصف السادس', -1, 0.20, 3, 'termtow', 1, 'عينة علوم سادس.pdf', '2024-01-24 10:22:58', '2024-01-24 22:28:56'),
(48, 'العلوم', 7, 'متوسط', 'الصف السابع', 0, 0.20, 3, 'termtow', 1, 'عينة علوم 7.pdf', '2024-01-24 10:23:25', '2024-01-24 10:23:25'),
(49, 'العلوم', 7, 'متوسط', 'الصف السابع', 0, 0.20, 3, 'termtow', 1, 'عينة علوم 7.pdf', '2024-01-24 10:23:26', '2024-01-24 22:04:46'),
(50, 'العلوم', 7, 'متوسط', 'الصف الثامن', 0, 0.20, 3, 'termtow', 1, 'عينة ثامن.pdf', '2024-01-24 10:23:51', '2024-01-24 10:23:51'),
(51, 'العلوم', 7, 'متوسط', 'الصف التاسع', 0, 0.20, 3, 'termtow', 1, 'عينة علوم 9.pdf', '2024-01-24 10:24:19', '2024-01-24 10:24:19'),
(52, 'الرياضيات', 21, 'ابتدائي', 'الصف الرابع', 10, 0.20, 3, 'termtow', 1, 'عينة رياضيات 4.pdf', '2024-01-24 10:27:18', '2024-01-24 12:44:33'),
(53, 'الرياضيات', 21, 'ابتدائي', 'الصف الخامس', 0, 0.20, 3, 'termtow', 1, 'عينة رياضيات 5.pdf', '2024-01-24 10:29:26', '2024-01-24 10:29:26'),
(54, 'الرياضيات', 19, 'متوسط', 'الصف السادس', -2, 0.20, 3, 'termtow', 1, 'عينة رياضيات 6.pdf', '2024-01-24 10:30:27', '2024-01-24 22:28:56'),
(55, 'الرياضيات', 19, 'متوسط', 'الصف السابع', 0, 0.20, 3, 'termtow', 1, 'عينة رياضيات 7.pdf', '2024-01-24 10:31:06', '2024-01-24 10:31:06'),
(56, 'الرياضيات', 15, 'متوسط', 'الصف السابع', 0, 0.20, 3, 'termtow', 1, 'عينة رياضيات 8.pdf', '2024-01-24 10:31:49', '2024-01-24 22:07:02'),
(57, 'الرياضيات', 15, 'متوسط', 'الصف التاسع', 0, 0.20, 3, 'termtow', 1, 'عينة رياضيات 9.pdf', '2024-01-24 10:32:29', '2024-01-24 10:32:29'),
(58, 'الرياضيات', 21, 'ثانوي', 'الصف العاشر', 0, 0.20, 3, 'termtow', 1, 'عينة 10 رياضيات.pdf', '2024-01-24 10:34:33', '2024-01-24 10:34:33'),
(59, 'الرياضيات', 2, 'ثانوي', 'الصف الحادي عشر', 0, 0.20, 3, 'termtow', 1, 'عينة رياضيات 11.pdf', '2024-01-24 10:35:59', '2024-01-24 10:35:59'),
(60, 'الرياضيات', 21, 'ثانوي', 'الصف الحادي عشر', 0, 0.20, 3, 'termtow', 1, 'عينة رياضيات 11.pdf', '2024-01-24 10:40:01', '2024-01-24 10:40:01'),
(61, 'الرياضيات', 21, 'ثانوي', 'الصف الثاني عشر', 0, 0.20, 3, 'termtow', 1, 'عينة رياضيات.pdf', '2024-01-24 10:41:14', '2024-01-24 10:41:14'),
(62, 'اللغة العربية', 16, 'ابتدائي', 'الصف الرابع', 10, 0.20, 3, 'termtow', 1, 'عينة عربي 4.pdf', '2024-01-24 10:46:09', '2024-01-24 12:44:33'),
(63, 'اللغة العربية', 16, 'ابتدائي', 'الصف الخامس', 0, 0.20, 3, 'termtow', 1, 'عينة عربي 5.pdf', '2024-01-24 10:46:46', '2024-01-24 10:46:46'),
(64, 'اللغة العربية', 11, 'متوسط', 'الصف السادس', -1, 0.20, 3, 'termtow', 1, 'عينة عربي6.pdf', '2024-01-24 10:47:29', '2024-01-24 22:28:56'),
(65, 'اللغة العربية', 11, 'متوسط', 'الصف السابع', 0, 0.20, 3, 'termtow', 1, 'عينة سابع.pdf', '2024-01-24 10:48:26', '2024-01-24 10:48:26'),
(66, 'اللغة العربية', 6, 'متوسط', 'الصف الثامن', 0, 0.20, 3, 'termtow', 1, 'عينة 8.pdf', '2024-01-24 10:48:52', '2024-01-24 10:48:52'),
(67, 'اللغة العربية', 6, 'متوسط', 'الصف التاسع', 0, 0.20, 3, 'termtow', 1, 'عينة عربي تاسع.pdf', '2024-01-24 10:49:27', '2024-01-24 10:49:27'),
(68, 'اللغة العربية', 11, 'ثانوي', 'الصف العاشر', 0, 0.20, 3, 'termtow', 1, 'عينة عربي 10.pdf', '2024-01-24 10:50:24', '2024-01-24 10:50:24'),
(69, 'اللغة العربية', 11, 'ثانوي', 'الصف الحادي عشر', 0, 0.20, 3, 'termtow', 1, 'عينة عربي 11.pdf', '2024-01-24 10:50:48', '2024-01-24 10:50:48'),
(70, 'اللغة العربية', 11, 'ثانوي', 'الصف الثاني عشر', 0, 0.20, 3, 'termtow', 1, 'عينة عربي 12.pdf', '2024-01-24 10:51:47', '2024-01-24 10:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `book_carts`
--

CREATE TABLE `book_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `book_id` bigint(20) DEFAULT NULL,
  `package_id` bigint(20) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_carts`
--

INSERT INTO `book_carts` (`id`, `session_id`, `book_id`, `package_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'y54CEhMZzBtMQlDDSgmBOsnvKbOVnXmdvSmJkT5d', 54, NULL, 3.00, 1, '2024-01-24 11:06:11', '2024-01-24 11:06:11'),
(2, 'FY85LrhW9KcN722YsulvOQCjmNf7ZFQPTJr3js9t', 20, NULL, 3.00, 1, '2024-01-24 11:07:42', '2024-01-24 11:07:42'),
(3, 'mPiIXf9A5tXpOGs3qkxCDvFFnQyAZ32gG32rnyjm', 2, NULL, 3.00, 1, '2024-01-24 11:28:41', '2024-01-24 11:28:41'),
(6, 'VXNxcisVfgju1i5JcczEsMlgJ2qffAKij4Enxhol', 55, NULL, 3.00, 1, '2024-01-24 19:13:05', '2024-01-24 19:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `package_id` bigint(20) DEFAULT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deliver_price` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `deliver_price`, `created_at`, `updated_at`) VALUES
(1, 'حوالى', 2, '2024-01-24 11:18:57', '2024-01-24 11:18:57'),
(2, 'مبارك الكبير', 2, '2024-01-24 11:19:12', '2024-01-24 11:19:12'),
(3, 'الفروانية', 2, '2024-01-24 11:19:23', '2024-01-24 11:19:23'),
(4, 'الأحمدى', 2, '2024-01-24 11:19:36', '2024-01-24 11:19:36'),
(5, 'الجهراء', 2, '2024-01-24 11:19:46', '2024-01-24 11:19:46'),
(6, 'العاصمة', 2, '2024-01-24 11:20:00', '2024-01-24 11:20:00'),
(7, 'أم الهيمان', 3, '2024-01-24 11:20:14', '2024-01-24 11:20:14'),
(8, 'الوفرة', 6, '2024-01-24 11:20:51', '2024-01-24 11:20:51'),
(9, 'صباح الاحمد', 4, '2024-01-24 11:21:10', '2024-01-24 11:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `techer_id` bigint(20) NOT NULL,
  `stage` varchar(255) NOT NULL,
  `classroom` varchar(255) NOT NULL,
  `expiry_date` varchar(255) NOT NULL,
  `type` enum('free','cash') NOT NULL DEFAULT 'cash',
  `Teacher_ratio_course` bigint(20) DEFAULT NULL,
  `term_price` bigint(20) DEFAULT NULL,
  `monthly_subscription_price` bigint(20) DEFAULT NULL,
  `term_type` enum('termone','termtow') NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `subject_name`, `techer_id`, `stage`, `classroom`, `expiry_date`, `type`, `Teacher_ratio_course`, `term_price`, `monthly_subscription_price`, `term_type`, `active`, `created_at`, `updated_at`) VALUES
(1, 'الأحياء', 2, 'ثانوي', 'الصف العاشر', '2024-06-29', 'cash', NULL, 22, 10, 'termtow', 1, '2024-01-24 11:31:19', '2024-01-24 11:31:19'),
(2, 'الأحياء', 2, 'ثانوي', 'الصف الحادي عشر', '2024-06-29', 'cash', NULL, 30, 14, 'termtow', 1, '2024-01-24 11:32:10', '2024-01-24 11:32:10'),
(3, 'الأحياء', 2, 'ثانوي', 'الصف الثاني عشر', '2024-06-29', 'cash', NULL, 35, 16, 'termtow', 1, '2024-01-24 11:33:05', '2024-01-24 11:51:35'),
(4, 'الكيمياء', 14, 'ثانوي', 'الصف العاشر', '2024-06-29', 'cash', NULL, 25, 12, 'termtow', 1, '2024-01-24 11:35:39', '2024-01-24 11:35:39'),
(5, 'الكيمياء', 14, 'ثانوي', 'الصف الحادي عشر', '2024-06-29', 'cash', NULL, 30, 14, 'termtow', 1, '2024-01-24 11:36:32', '2024-01-24 11:36:32'),
(6, 'الكيمياء', 14, 'ثانوي', 'الصف الثاني عشر', '2024-06-29', 'cash', NULL, 35, 16, 'termtow', 1, '2024-01-24 11:37:14', '2024-01-24 11:37:14'),
(7, 'الرياضيات', 19, 'متوسط', 'الصف السادس', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:41:43', '2024-01-24 11:41:43'),
(8, 'الرياضيات', 19, 'متوسط', 'الصف السابع', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:42:20', '2024-01-24 11:42:20'),
(9, 'الرياضيات', 15, 'متوسط', 'الصف الثامن', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:43:05', '2024-01-24 11:43:05'),
(10, 'الرياضيات', 15, 'متوسط', 'الصف التاسع', '2024-06-24', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:44:03', '2024-01-24 11:44:03'),
(11, 'العلوم', 7, 'متوسط', 'الصف السادس', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:46:02', '2024-01-24 11:46:02'),
(12, 'العلوم', 7, 'متوسط', 'الصف السابع', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:46:29', '2024-01-24 11:46:29'),
(13, 'العلوم', 7, 'متوسط', 'الصف الثامن', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:46:59', '2024-01-24 11:46:59'),
(14, 'العلوم', 7, 'متوسط', 'الصف التاسع', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:47:33', '2024-01-24 11:47:33'),
(15, 'اللغة العربية', 11, 'متوسط', 'الصف السادس', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:48:27', '2024-01-24 11:48:27'),
(16, 'اللغة العربية', 11, 'متوسط', 'الصف السابع', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:49:06', '2024-01-24 11:49:06'),
(17, 'اللغة العربية', 6, 'متوسط', 'الصف الثامن', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:50:01', '2024-01-24 11:50:01'),
(18, 'اللغة العربية', 6, 'متوسط', 'الصف التاسع', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:50:37', '2024-01-24 11:50:37'),
(19, 'اللغة الانجليزية', 4, 'متوسط', 'الصف السادس', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:53:24', '2024-01-24 11:53:24'),
(20, 'اللغة الانجليزية', 4, 'متوسط', 'الصف السابع', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:53:55', '2024-01-24 11:53:55'),
(21, 'اللغة الانجليزية', 4, 'متوسط', 'الصف الثامن', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:54:19', '2024-01-24 11:54:19'),
(22, 'اللغة الانجليزية', 4, 'متوسط', 'الصف التاسع', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:54:54', '2024-01-24 11:54:54'),
(23, 'الاجتماعيات', 18, 'متوسط', 'الصف التاسع', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:55:56', '2024-01-24 11:58:57'),
(24, 'الاجتماعيات', 18, 'متوسط', 'الصف السابع', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:56:27', '2024-01-24 11:56:27'),
(25, 'الاجتماعيات', 18, 'متوسط', 'الصف الثامن', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:56:56', '2024-01-24 11:56:56'),
(26, 'الاجتماعيات', 18, 'متوسط', 'الصف السادس', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 11:57:23', '2024-01-24 11:57:23'),
(27, 'الفيزياء', 13, 'ثانوي', 'الصف العاشر', '2024-06-29', 'cash', NULL, 25, 12, 'termtow', 1, '2024-01-24 12:09:22', '2024-01-24 12:09:22'),
(28, 'الفيزياء', 13, 'ثانوي', 'الصف الحادي عشر', '2024-06-29', 'cash', NULL, 30, 14, 'termtow', 1, '2024-01-24 12:10:19', '2024-01-24 12:10:19'),
(29, 'الفيزياء', 13, 'ثانوي', 'الصف الثاني عشر', '2024-06-29', 'cash', NULL, 35, 16, 'termtow', 1, '2024-01-24 12:10:56', '2024-01-24 12:10:56'),
(30, 'الجيولوجيا', 3, 'ثانوي', 'الصف الحادي عشر', '2024-06-29', 'cash', NULL, 30, 14, 'termtow', 1, '2024-01-24 12:12:24', '2024-01-24 12:12:24'),
(31, 'التاريخ', 5, 'ثانوي', 'الصف العاشر', '2024-06-29', 'cash', NULL, 20, 8, 'termtow', 1, '2024-01-24 12:13:28', '2024-01-24 12:13:28'),
(32, 'التاريخ', 5, 'ثانوي', 'الصف الحادي عشر', '2024-06-29', 'cash', NULL, 24, 10, 'termtow', 1, '2024-01-24 12:14:42', '2024-01-24 12:14:42'),
(33, 'التاريخ', 5, 'ثانوي', 'الصف الثاني عشر', '2024-06-29', 'cash', NULL, 28, 12, 'termtow', 1, '2024-01-24 12:15:19', '2024-01-24 12:15:19'),
(34, 'الجغرافيا', 18, 'ثانوي', 'الصف الحادي عشر', '2024-06-29', 'cash', NULL, 24, 10, 'termtow', 1, '2024-01-24 12:16:12', '2024-01-24 12:16:12'),
(35, 'الجغرافيا', 18, 'ثانوي', 'الصف الثاني عشر', '2024-06-29', 'cash', NULL, 28, 12, 'termtow', 1, '2024-01-24 12:16:57', '2024-01-24 12:16:57'),
(36, 'الفلسفة', 9, 'ثانوي', 'الصف الثاني عشر', '2024-06-29', 'cash', NULL, 28, 12, 'termtow', 1, '2024-01-24 12:18:00', '2024-01-24 12:18:00'),
(37, 'علم النفس', 9, 'ثانوي', 'الصف الحادي عشر', '2024-06-29', 'cash', NULL, 24, 10, 'termtow', 1, '2024-01-24 12:18:53', '2024-01-24 12:18:53'),
(38, 'اللغة العربية', 6, 'ثانوي', 'الصف العاشر', '2024-06-29', 'cash', NULL, 22, 10, 'termtow', 1, '2024-01-24 12:19:38', '2024-01-24 12:19:38'),
(39, 'اللغة العربية', 11, 'ثانوي', 'الصف الحادي عشر', '2024-06-29', 'cash', NULL, 26, 12, 'termtow', 1, '2024-01-24 12:22:56', '2024-01-24 12:22:56'),
(40, 'اللغة العربية', 11, 'ثانوي', 'الصف الثاني عشر', '2024-06-29', 'cash', NULL, 30, 14, 'termtow', 1, '2024-01-24 12:23:39', '2024-01-24 12:23:39'),
(41, 'اللغة الانجليزية', 4, 'ثانوي', 'الصف الحادي عشر', '2024-06-29', 'cash', NULL, 22, 10, 'termtow', 1, '2024-01-24 12:24:34', '2024-01-24 12:24:34'),
(42, 'اللغة الانجليزية', 4, 'ثانوي', 'الصف الحادي عشر', '2024-06-29', 'cash', NULL, 26, 12, 'termtow', 1, '2024-01-24 12:25:19', '2024-01-24 12:25:19'),
(43, 'اللغة الانجليزية', 4, 'ثانوي', 'الصف الثاني عشر', '2024-06-29', 'cash', NULL, 30, 14, 'termtow', 1, '2024-01-24 12:26:11', '2024-01-24 12:26:11'),
(44, 'اللغة الفرنسية', 10, 'ثانوي', 'الصف الحادي عشر', '2024-06-29', 'cash', NULL, 26, 12, 'termtow', 1, '2024-01-24 12:27:56', '2024-01-24 12:27:56'),
(45, 'اللغة الفرنسية', 10, 'ثانوي', 'الصف الثاني عشر', '2024-06-29', 'cash', NULL, 30, 14, 'termtow', 1, '2024-01-24 12:28:40', '2024-01-24 12:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `season` varchar(255) DEFAULT NULL,
  `previous_test` varchar(255) DEFAULT NULL,
  `book_test` varchar(255) DEFAULT NULL,
  `solved_test` varchar(255) DEFAULT NULL,
  `unsolved_test` varchar(255) DEFAULT NULL,
  `kiser_1` varchar(255) DEFAULT NULL,
  `kiser_2` varchar(255) DEFAULT NULL,
  `final_review` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `grade_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mandub_books`
--

CREATE TABLE `mandub_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mandub_quantity` bigint(20) DEFAULT NULL,
  `minimum` bigint(20) NOT NULL DEFAULT 2,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `mandub_id` bigint(20) UNSIGNED NOT NULL,
  `station` bigint(20) DEFAULT NULL,
  `mandub_target` bigint(20) DEFAULT NULL,
  `mandub_active` tinyint(1) NOT NULL DEFAULT 0,
  `distributor_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mandub_books`
--

INSERT INTO `mandub_books` (`id`, `mandub_quantity`, `minimum`, `book_id`, `mandub_id`, `station`, `mandub_target`, `mandub_active`, `distributor_active`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 7, 22, 5, 5, 0, 1, '2024-01-24 12:44:33', '2024-01-24 12:44:54'),
(2, NULL, 2, 18, 22, 5, 5, 0, 1, '2024-01-24 12:44:33', '2024-01-24 12:45:13'),
(3, NULL, 2, 27, 22, 5, 5, 0, 1, '2024-01-24 12:44:33', '2024-01-24 12:45:28'),
(4, NULL, 2, 45, 22, 5, 5, 0, 1, '2024-01-24 12:44:33', '2024-01-24 12:45:26'),
(5, NULL, 2, 52, 22, 5, 5, 0, 1, '2024-01-24 12:44:33', '2024-01-24 12:45:24'),
(6, NULL, 2, 62, 22, 5, 5, 0, 1, '2024-01-24 12:44:33', '2024-01-24 12:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `mandub_cities`
--

CREATE TABLE `mandub_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mandoub_id` bigint(20) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mandub_cities`
--

INSERT INTO `mandub_cities` (`id`, `mandoub_id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 23, 7, '2024-01-24 11:24:07', '2024-01-24 11:24:07'),
(2, 23, 4, '2024-01-24 11:24:28', '2024-01-24 11:24:28'),
(3, 24, 5, '2024-01-24 11:25:12', '2024-01-24 11:25:12'),
(4, 22, 6, '2024-01-24 11:25:32', '2024-01-24 11:25:32'),
(5, 24, 6, '2024-01-24 11:25:39', '2024-01-24 11:25:39'),
(6, 22, 3, '2024-01-24 11:25:56', '2024-01-24 11:25:56'),
(7, 23, 8, '2024-01-24 11:26:12', '2024-01-24 11:26:12'),
(8, 22, 1, '2024-01-24 11:26:41', '2024-01-24 11:26:41'),
(9, 23, 9, '2024-01-24 11:26:55', '2024-01-24 11:26:55'),
(10, 23, 2, '2024-01-24 11:27:09', '2024-01-24 11:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0000_00_00_000000_create_websockets_statistics_entries_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_22_092506_create_grades_table', 1),
(7, '2023_11_22_093121_create_groups_table', 1),
(8, '2023_11_28_082509_create_courses_table', 1),
(9, '2023_11_28_083649_create_teachers_table', 1),
(10, '2023_11_28_091246_create_contacts_table', 1),
(11, '2023_11_29_113435_create_exams_table', 1),
(12, '2023_12_05_115702_create_tutorials_table', 1),
(13, '2023_12_05_115838_create_videos_table', 1),
(14, '2023_12_07_082112_create_packages_table', 1),
(15, '2023_12_10_121020_create_sitesetteings_table', 1),
(16, '2023_12_12_134906_create_video_comments_table', 1),
(17, '2023_12_20_085543_create_cart_items_table', 1),
(18, '2023_12_20_085701_create_orders_table', 1),
(19, '2023_12_20_133529_create_user_courses_table', 1),
(20, '2023_12_26_104537_create_package_courses_table', 1),
(21, '2023_12_30_112103_create_user_packages_table', 1),
(22, '2024_01_01_071949_create_books_table', 1),
(23, '2024_01_01_141234_create_cities_table', 1),
(24, '2024_01_02_085225_create_mandub_cities_table', 1),
(25, '2024_01_03_151004_create_another_packages_table', 1),
(26, '2024_01_03_154322_create_package_books_table', 1),
(27, '2024_01_04_110406_create_book_carts_table', 1),
(28, '2024_01_07_082711_create_target_books_table', 1),
(29, '2024_01_07_122906_create_term_ones_table', 1),
(30, '2024_01_07_123209_create_term_tows_table', 1),
(31, '2024_01_08_083043_create_mandub_books_table', 1),
(32, '2024_01_21_092535_create_order_book_details_table', 1),
(33, '2024_01_21_095233_create_order_book_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_items_id` bigint(20) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_book_details`
--

CREATE TABLE `order_book_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` enum('new','current','complate','finish') NOT NULL DEFAULT 'new',
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `mandub_id` bigint(20) DEFAULT NULL,
  `price_all` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_book_details`
--

INSERT INTO `order_book_details` (`id`, `buyer`, `phone`, `address`, `status`, `city_id`, `mandub_id`, `price_all`, `created_at`, `updated_at`) VALUES
(1, 'احمد', '٩٩٩٧٠٧٦٦', 'اشبليه', 'new', 1, NULL, '6', '2024-01-24 12:37:40', '2024-01-24 12:37:40'),
(2, 'احمد', '٩٩٩٧٠٧٦٦', 'اشبليه', 'new', 2, NULL, '15', '2024-01-24 22:28:56', '2024-01-24 22:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `order_book_items`
--

CREATE TABLE `order_book_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `book_id` bigint(20) DEFAULT NULL,
  `package_id` bigint(20) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_book_items`
--

INSERT INTO `order_book_items` (`id`, `session_id`, `book_id`, `package_id`, `order_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, '1eRDDIr5P3M7pYg3QwyKlsdQgjLJmRc3cwWkU39v', 54, NULL, 1, 1, '3.00', '2024-01-24 12:37:40', '2024-01-24 12:37:40'),
(2, '1eRDDIr5P3M7pYg3QwyKlsdQgjLJmRc3cwWkU39v', 20, NULL, 1, 1, '3.00', '2024-01-24 12:37:40', '2024-01-24 12:37:40'),
(3, 'jDXzwLTWUj35ezIBDmig80TnevcrRAIeo9a0Ebr4', NULL, 3, 2, 1, '15.00', '2024-01-24 22:28:56', '2024-01-24 22:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `package_type` varchar(255) NOT NULL,
  `stage` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `subject_count` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `expiry_date` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_books`
--

CREATE TABLE `package_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `package_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_books`
--

INSERT INTO `package_books` (`id`, `book_id`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 7, 1, NULL, NULL),
(2, 18, 1, NULL, NULL),
(3, 27, 1, NULL, NULL),
(4, 45, 1, NULL, NULL),
(5, 52, 1, NULL, NULL),
(6, 62, 1, NULL, NULL),
(7, 8, 2, NULL, NULL),
(8, 19, 2, NULL, NULL),
(9, 28, 2, NULL, NULL),
(10, 46, 2, NULL, NULL),
(11, 53, 2, NULL, NULL),
(12, 63, 2, NULL, NULL),
(13, 9, 3, NULL, NULL),
(14, 20, 3, NULL, NULL),
(15, 29, 3, NULL, NULL),
(16, 47, 3, NULL, NULL),
(17, 54, 3, NULL, NULL),
(18, 64, 3, NULL, NULL),
(19, 10, 5, NULL, NULL),
(20, 21, 5, NULL, NULL),
(21, 30, 5, NULL, NULL),
(22, 48, 5, NULL, NULL),
(23, 55, 5, NULL, NULL),
(24, 65, 5, NULL, NULL),
(25, 12, 7, NULL, NULL),
(26, 23, 7, NULL, NULL),
(27, 32, 7, NULL, NULL),
(28, 51, 7, NULL, NULL),
(29, 57, 7, NULL, NULL),
(30, 67, 7, NULL, NULL),
(31, 6, 8, NULL, NULL),
(32, 13, 8, NULL, NULL),
(33, 24, 8, NULL, NULL),
(34, 33, 8, NULL, NULL),
(35, 36, 8, NULL, NULL),
(36, 42, 8, NULL, NULL),
(37, 58, 8, NULL, NULL),
(38, 68, 8, NULL, NULL),
(39, 5, 9, NULL, NULL),
(40, 25, 9, NULL, NULL),
(41, 34, 9, NULL, NULL),
(42, 37, 9, NULL, NULL),
(43, 39, 9, NULL, NULL),
(44, 43, 9, NULL, NULL),
(45, 59, 9, NULL, NULL),
(46, 69, 9, NULL, NULL),
(47, 3, 10, NULL, NULL),
(48, 14, 10, NULL, NULL),
(49, 16, 10, NULL, NULL),
(50, 25, 10, NULL, NULL),
(51, 34, 10, NULL, NULL),
(52, 40, 10, NULL, NULL),
(53, 60, 10, NULL, NULL),
(54, 69, 10, NULL, NULL),
(55, 1, 11, NULL, NULL),
(56, 4, 11, NULL, NULL),
(57, 26, 11, NULL, NULL),
(58, 35, 11, NULL, NULL),
(59, 38, 11, NULL, NULL),
(60, 44, 11, NULL, NULL),
(61, 61, 11, NULL, NULL),
(62, 70, 11, NULL, NULL),
(63, 3, 12, NULL, NULL),
(64, 14, 12, NULL, NULL),
(65, 16, 12, NULL, NULL),
(66, 25, 12, NULL, NULL),
(67, 34, 12, NULL, NULL),
(68, 40, 12, NULL, NULL),
(69, 60, 12, NULL, NULL),
(70, 69, 12, NULL, NULL),
(71, 1, 14, NULL, NULL),
(72, 2, 14, NULL, NULL),
(73, 15, 14, NULL, NULL),
(74, 17, 14, NULL, NULL),
(75, 26, 14, NULL, NULL),
(76, 35, 14, NULL, NULL),
(77, 41, 14, NULL, NULL),
(78, 61, 14, NULL, NULL),
(79, 70, 14, NULL, NULL),
(80, 1, 15, NULL, NULL),
(81, 4, 15, NULL, NULL),
(82, 26, 15, NULL, NULL),
(83, 35, 15, NULL, NULL),
(84, 38, 15, NULL, NULL),
(85, 44, 15, NULL, NULL),
(86, 61, 15, NULL, NULL),
(87, 70, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_courses`
--

CREATE TABLE `package_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `package_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sitesetteings`
--

CREATE TABLE `sitesetteings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `head_name` text DEFAULT NULL,
  `content1` text NOT NULL DEFAULT '- هى المنصة الأولى من نوعها للتعليم .',
  `content2` text NOT NULL DEFAULT '- تقدم تجربة شاملة للمتعلمين والمعلمين على حد سواء .',
  `content3` text NOT NULL DEFAULT '- توفر المنصة مجموعة واسعة من الكتب والكورسات التعليمية في مختلف المجالات .',
  `content4` text NOT NULL DEFAULT '- يمكن للمستخدمين تصفح وشراء الموارد التعليمية بسهولة وفقًا لاحتياجاتهم .',
  `fb` text NOT NULL DEFAULT 'https://www.facebook.com/',
  `insta` text NOT NULL DEFAULT 'https://www.instagram.com/',
  `twitter` text NOT NULL DEFAULT 'https://twitter.com/',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `target_books`
--

CREATE TABLE `target_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `target` int(11) DEFAULT NULL,
  `print` int(11) DEFAULT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `target_books`
--

INSERT INTO `target_books` (`id`, `target`, `print`, `book_id`, `created_at`, `updated_at`) VALUES
(1, 5, 5, 7, '2024-01-24 12:39:51', '2024-01-24 12:39:51'),
(2, 5, 5, 18, '2024-01-24 12:39:51', '2024-01-24 12:39:51'),
(3, 5, 5, 27, '2024-01-24 12:39:51', '2024-01-24 12:39:51'),
(4, 5, 5, 45, '2024-01-24 12:39:51', '2024-01-24 12:39:51'),
(5, 5, 5, 52, '2024-01-24 12:39:51', '2024-01-24 12:39:51'),
(6, 5, 5, 62, '2024-01-24 12:39:51', '2024-01-24 12:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `term_ones`
--

CREATE TABLE `term_ones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `term_tows`
--

CREATE TABLE `term_tows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`id`, `name`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'الوحدة الخامسة', 44, '2024-01-24 18:36:52', '2024-01-24 18:36:52'),
(2, 'التفاعلات الكيميائية والمعادلات الكيميائية', 4, '2024-01-25 00:10:59', '2024-01-25 00:12:12'),
(3, 'التفاعلات المتجانسة والغير متجانسة', 4, '2024-01-25 00:12:40', '2024-01-25 00:12:40'),
(4, 'التفاعلات الكيميائية بحسب نوعها', 4, '2024-01-25 00:13:13', '2024-01-25 00:13:13'),
(5, 'الكتل المولية', 4, '2024-01-25 00:13:34', '2024-01-25 00:13:34'),
(6, 'النسب المئوية', 4, '2024-01-25 00:14:51', '2024-01-25 00:14:51'),
(7, 'المعادلة الكيميائية وحساب كمية المادة', 4, '2024-01-25 00:15:26', '2024-01-25 00:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `student_subscrip` varchar(255) DEFAULT NULL,
  `renew` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `Teacher_ratio_course` bigint(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `gender`, `grade`, `group`, `student_subscrip`, `renew`, `user_type`, `email_verified_at`, `Teacher_ratio_course`, `password`, `user_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '50260010', NULL, 'male', NULL, NULL, NULL, NULL, 'admin', NULL, NULL, '$2y$12$LqtdYYCbAGrqG1P4il0y1exVMtYk2edrcAfYfFPpu3sesmbE.Aboe', '123456', NULL, '2024-01-24 07:54:25', '2024-01-24 07:55:28'),
(2, 'أ / أحمد جابر', '97719006', 'abo.mohamad99@yahoo.com', 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$aUWcglZBVk2yQPQpQlKx/enGzikCSl/smYSV.bC4tIK53a5W1r6yO', '0123', NULL, '2024-01-24 07:58:01', '2024-01-24 11:52:16'),
(3, 'أ/ خالد الحبشي', '66485325', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$ypyGbPMuM.aPF0LLdF.hX.GE/fnY3FjpgJ3xG/UdnvTqjoN2W/6ea', '0123', NULL, '2024-01-24 07:58:32', '2024-01-24 19:09:40'),
(4, 'أ/ ربيع ابراهيم', '97406902', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$UizxvV8n9HTqnymd7429deb23KQ4dR27xWTiZiGZZM2N7cx/dcY2u', '0123', NULL, '2024-01-24 07:59:10', '2024-01-24 08:00:08'),
(5, 'أ/ فتحي عبد الجابر', '99568084', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$rlChuT/KOktR3D3uNgA3C.Nw9RlCLtUGScr9cT6bQOR1i.GPby0pW', '0123', NULL, '2024-01-24 07:59:38', '2024-01-24 08:00:21'),
(6, 'أ / محمد فتحي', '55792191', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 20, '$2y$12$Js3sBNevohr8tUfF2fWeduAp1Bz.O7HyV95YjGbiQ8ZMv1Hvr9D.a', '0123', NULL, '2024-01-24 08:01:14', '2024-01-24 08:09:17'),
(7, 'أ/ إيمان محمد علي', '67054737', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$GWS4mrx4mYAc6Y5ixQOSO.4iE/k9KMof1cmpSOfaUxS6.4nxJNvMK', '0123', NULL, '2024-01-24 08:01:47', '2024-01-24 08:01:47'),
(8, 'أ/ عمرو الشهاوي', '55363374', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$UZx0fOlEMiBA4VWphuGKRuY9RfgZG5lj3BUztaIXEaTPHGdLkNdTa', '0123', NULL, '2024-01-24 08:02:49', '2024-01-24 08:02:49'),
(9, 'أ/ محمد عبد الصبور', '50688948', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$lqqDw7WNaR1DtiUrYaEYDeeqMoHIaJal/suxvB0ZquovSy5gYmS9i', '0123', NULL, '2024-01-24 08:04:02', '2024-01-24 08:04:02'),
(10, 'أ/ محمد علي', '50646305', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$TYit1V4BG0nyCTlICbxSGO0CNc/u/9X2Ex2w7p13HnoLm8QDip7Hm', '0123', NULL, '2024-01-24 08:05:17', '2024-01-24 08:05:17'),
(11, 'أ/ نور  أبو  مدين', '66492479', 'noursalah216@gmail.com', 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 20, '$2y$12$FhZ1iF.biLUXWERYJwBQ3eXdnPy9D/2OxNpJvrfOlFrofchA7YWTC', '0123', NULL, '2024-01-24 08:09:03', '2024-01-24 13:21:42'),
(12, 'أ/ عماد السحيتي', '99876097', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$Cb6ZmH3yYRaerR//zSI.IuoJmLoMuh.DzecrmJApoEZLc8FuSFPte', '0123', NULL, '2024-01-24 08:09:52', '2024-01-24 10:44:21'),
(13, 'أ / فاطمة أحمد', '65670708', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$Wi3/K3FqK.F2lNWsMAYTte62N9MldVrhFaTT7F9TdwHVv0vKA16JC', '0123', NULL, '2024-01-24 08:11:07', '2024-01-24 08:11:07'),
(14, 'أ/ أيمن رضا', '99970766', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$V5BoU9xDFnKuoAbtrFiWRu5c9WyHUUTmGOxIRki.0DOVW2lbYL2rS', '0123', NULL, '2024-01-24 08:11:42', '2024-01-24 11:03:31'),
(15, 'أ/ رومانى كمال', '50579557', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$9ut0sEYIlB.qRUMfOky9gO1MForn2JlFw3XRzC6kY4M6N3teEg97i', '0123', NULL, '2024-01-24 08:13:32', '2024-01-24 08:13:32'),
(16, 'أ/ على خير الدين', '66076048', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$JFah58ip2pIMFPI5cuw6Du.uelEhVt9bz3647usF5/rSKle0oCEKu', '0123', NULL, '2024-01-24 08:14:45', '2024-01-24 10:45:01'),
(17, 'أ/ تامر العسيلي', '50655648', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$tFyAIjsQj3/2rmL.WCmxD.L85TuDmpWwNw9dYdAUms6VjNhqo1cs6', '0123', NULL, '2024-01-24 08:15:51', '2024-01-24 08:15:51'),
(18, 'أ/ رمضان عبد العزيز', '50210140', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$bM5RWuhSIYYQHbd3Hks0GuD4psL7jr6eZHRD7hwznUk6YJaWAgSku', '0123', NULL, '2024-01-24 08:16:30', '2024-01-24 08:16:30'),
(19, 'أ/ عبد القادر', '51027979', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$B/Nb4c5LjdIl5awXFzFG6OSYRSF3JQKYg2K0z5bMQjr0s/3vansk6', '0123', NULL, '2024-01-24 08:18:40', '2024-01-24 08:18:40'),
(20, 'أ/ أحمد فوزي', '50193355', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$A9v23ln.3oNr2YNxSmWtneiHBSBFMyDpPUPsg14bnPnBmQnPCcQiq', '0123', NULL, '2024-01-24 09:02:04', '2024-01-24 11:00:29'),
(21, 'أ/ أبو عمرو', '50370550', NULL, 'male', NULL, NULL, NULL, NULL, 'teacher', NULL, 50, '$2y$12$BV51HyiMbCroIORyGkNRouYgGKfFQoH1goxdNXu8AhZaMdW73wVh2', '0123', NULL, '2024-01-24 10:25:47', '2024-01-24 10:44:37'),
(22, 'أحمد عصام', '66370171', NULL, 'male', NULL, NULL, NULL, NULL, 'mandub', NULL, NULL, '$2y$12$4zM2tTiljDMLu.nJyYqnt.CgJ0sbLMdF6bG20xYzVAKiNc3McKw..', '0123', NULL, '2024-01-24 11:16:20', '2024-01-24 11:16:20'),
(23, 'مصطفي الأحمدي', '97672153', NULL, 'male', NULL, NULL, NULL, NULL, 'mandub', NULL, NULL, '$2y$12$anOpsriEkIgJokRHxhxLNuYHQzDEHOmUZaM0O9cTv5/6g2p3ux3G2', '0123', NULL, '2024-01-24 11:17:15', '2024-01-24 11:17:15'),
(24, 'ناصر الجهراء', '97370705', NULL, 'male', NULL, NULL, NULL, NULL, 'mandub', NULL, NULL, '$2y$12$SHhXF/.WwAOvqET.Dy5kYemH/TGneVnXZV8JxaXptYSjlZ8pAC7Vq', '0123', NULL, '2024-01-24 11:18:16', '2024-01-24 11:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `subscrip_type` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_packages`
--

CREATE TABLE `user_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `package_id` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `subscrip_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `type` enum('free','cash') NOT NULL DEFAULT 'cash',
  `tutorial_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `link`, `pdf`, `type`, `tutorial_id`, `created_at`, `updated_at`) VALUES
(1, 'الصيغ الكيميائية', 'https://player.vimeo.com/video/799796838?h=18ca7c1363&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479\" frameborder=\"0\" allow=', NULL, 'free', 2, '2024-01-25 00:17:52', '2024-01-25 00:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `video_comments`
--

CREATE TABLE `video_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) NOT NULL,
  `video_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `another_packages`
--
ALTER TABLE `another_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_carts`
--
ALTER TABLE `book_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `mandub_books`
--
ALTER TABLE `mandub_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mandub_books_book_id_foreign` (`book_id`),
  ADD KEY `mandub_books_mandub_id_foreign` (`mandub_id`);

--
-- Indexes for table `mandub_cities`
--
ALTER TABLE `mandub_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_book_details`
--
ALTER TABLE `order_book_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_book_details_city_id_foreign` (`city_id`);

--
-- Indexes for table `order_book_items`
--
ALTER TABLE `order_book_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_books`
--
ALTER TABLE `package_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_courses`
--
ALTER TABLE `package_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sitesetteings`
--
ALTER TABLE `sitesetteings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_books`
--
ALTER TABLE `target_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target_books_book_id_foreign` (`book_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_phone_unique` (`phone`);

--
-- Indexes for table `term_ones`
--
ALTER TABLE `term_ones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_tows`
--
ALTER TABLE `term_tows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_packages`
--
ALTER TABLE `user_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_comments`
--
ALTER TABLE `video_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `another_packages`
--
ALTER TABLE `another_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `book_carts`
--
ALTER TABLE `book_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mandub_books`
--
ALTER TABLE `mandub_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mandub_cities`
--
ALTER TABLE `mandub_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_book_details`
--
ALTER TABLE `order_book_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_book_items`
--
ALTER TABLE `order_book_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_books`
--
ALTER TABLE `package_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `package_courses`
--
ALTER TABLE `package_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sitesetteings`
--
ALTER TABLE `sitesetteings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `target_books`
--
ALTER TABLE `target_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `term_ones`
--
ALTER TABLE `term_ones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `term_tows`
--
ALTER TABLE `term_tows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_courses`
--
ALTER TABLE `user_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_packages`
--
ALTER TABLE `user_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video_comments`
--
ALTER TABLE `video_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mandub_books`
--
ALTER TABLE `mandub_books`
  ADD CONSTRAINT `mandub_books_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `mandub_books_mandub_id_foreign` FOREIGN KEY (`mandub_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_book_details`
--
ALTER TABLE `order_book_details`
  ADD CONSTRAINT `order_book_details_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `target_books`
--
ALTER TABLE `target_books`
  ADD CONSTRAINT `target_books_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
